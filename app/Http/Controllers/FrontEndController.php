<?php

namespace App\Http\Controllers;

use App\BlogPost;
use App\Category;
use App\Setting;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function index(){

        return view('index')
                                ->with('categories', Category::take(5)->get())
                                ->with('firstPost', BlogPost::orderBy('created_at', 'desc')->first())
                                ->with('secondPost', BlogPost::orderBy('created_at','desc')->skip(1)->take(1)->get()->first())
                                ->with('thirdPost', BlogPost::orderBy('created_at','desc')->skip(2)->take(1)->get()->first())
                                ->with('tech',Category::find(1))
                                ->with('movie',Category::find(3))
                                ->with('setting',Setting::first());

    }

    public function single_post($slug){

        $singlePost = BlogPost::where('slug', $slug)->first();
        $nextPost = BlogPost::where('id', '>', $singlePost->id)->min('id');
        $prevPost = BlogPost::where('id', '<', $singlePost->id)->max('id');




        return view('singlePost')
                                    ->with('singlePost', $singlePost)
                                    ->with('setting', Setting::first())
                                    ->with('categories', Category::take(5)->get())
                                    ->with('nextPost', BlogPost::find($nextPost))
                                    ->with('prevPost', BlogPost::find($prevPost));


    }
}

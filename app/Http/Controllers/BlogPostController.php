<?php

namespace App\Http\Controllers;

use App\Category;
use App\BlogPost;
use Illuminate\Http\Request;

class BlogPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.BlogPost.blogpostView')->with('posts',BlogPost::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        if(count($categories) == 0)
        {
            session()->flash('required_cat', 'You need to have a category to create a new post');
            return redirect()->back();
        }
        return view('admin.BlogPost.create')->with('category',$categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());


        $this->validate($request, [

            'title'     => 'required',
            'featured_image'  => 'required|image',
            'blog_content'   => 'required',
            'category_id'  => 'required'

        ]);

        $image = $request->featured_image;

        $image_name = time().$image->getClientOriginalName();
        $path = 'uploads/posts/';
        $image->move($path,$image_name);

    /*    $post = new Post();

        $post->title = $request->title;
        --------------------------------
        --------------------------------
    */
//
//    Now we will do is in a different and shortest way
//

        $post = BlogPost::create([

            'title'             => $request->title,
            'featured'          => $path.$image_name,
            'category_id'       => $request->category_id,
            'content'           => $request->blog_content,
            'slug'              => $request->title
        ]);

        session()->flash('success','Post is created');

        return redirect()->route('post.create');




    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = BlogPost::find($id);
        //$category = Category::all();

        return view('admin.BlogPost.edit')->with('post', $post)->with('category', Category::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = BlogPost::find($id);

        $this->validate($request,[

            'title'    => 'required',
            'category_id' => 'required',
            'blog_content'  => 'required'

        ]);

        if($request->hasFile('featured_image')){

            $imageName = $request->featured_image;
            $path = 'uploads/path/';
            $newName = time().$imageName->getClientOriginalName();

            $image = move($path, $newName);

            $post->featured = $newName;
        }


        $post->title = $request->title;
        $post->category_id = $request->category_id;
        $post->content = $request->blog_content;


        $post->save();

        session()->flash('success', 'The post is updated');

        return redirect()->route('post.view');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = BlogPost::find($id);
        $post->delete();

        session()->flash('success','Your post is deleted');
        return redirect()->route('post.view');
    }

    public function view_trashed(){

        $trashedPost = BlogPost::onlyTrashed()->get();

        return view('admin.BlogPost.trashedPost')->with('trashedPost',$trashedPost);

    }

    public function kill($id){
        $post = BlogPost::withTrashed()->where('id',$id);  //withTrashed means all post include the trashed


        $post->forceDelete();

        session()->flash('success', 'Post is permanently deleted');
        return redirect()->back();

    }

    public function restore($id){

        $post = BlogPost::withTrashed()->where('id', $id);

        $post->restore();
        session()->flash('success', 'Post is restored');

        return redirect()->back();

    }
}

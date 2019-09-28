<?php

namespace App\Http\Controllers;

use App\Category;
use DemeterChain\C;
use Illuminate\Http\Request;


class BlogCategoryController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.BlogCategory.categoryView')->with('category', Category::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.BlogCategory.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [

            'name' => 'required|max:255|unique:categories'

            ]);

        $category = new Category();

        $category->name = $request->name;

        $category->save();

        //$session = Session::flash();
        session()->flash('success', 'Category is Created');
        return redirect()->route('category');


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
        $catId = Category::find($id);
        session()->flash('success','Edit the category here');

        return view('admin.BlogCategory.categoryEdit')->with('id',$catId);

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
        $catId = Category::find($id);
        $catId->name = $request->name;

        $catId->save();

        session()->flash('success', 'Category Updated');
        return redirect()->route('category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $catId = Category::find($id);

        foreach ($catId->BlogPost as $post) {
            
            $post->forceDelete();
        }

        $catId->delete();

        session()->flash('success', 'Category Deleted');
        return redirect()->route('category');

    }
}

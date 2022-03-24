<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories=Category::get();

        return view('Category.index')->withCategories($categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //dd($request);
        $request->validate([
            'name'=>'required|min:2|unique:categories,name',
            'description'=>'required',
        ]);

        $category= new Category;

        $category->name=$request->name;
        $category->description=$request->description;

        $category->save();

        return redirect('category/index');
        //dd($category);
        // return view('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category,$id)
    {
        //
        $category=Category::where('id',$id)->first();
        //dd($category);
        if($category)
            return view('Category.edit',compact('category'));
        else
            return redirect()->route('c_index');
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name'=>'required|min:2|unique:categories,name,'.$request->id,
            'description'=>'required',
        ]);

        $category=Category::where('id',$request->id)->first();

        $category->name = $request->name;
        $category->description= $request->description;

        $category->save();

        return redirect()->route('c_index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category,Request $request)
    {
        $category=Category::where('id',$request->categoryId)->first();

        $category->delete();

        return redirect()->back();
    }
}

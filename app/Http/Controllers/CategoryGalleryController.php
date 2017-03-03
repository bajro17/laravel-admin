<?php

namespace App\Http\Controllers;

use App\CategoryGallery;
use Illuminate\Http\Request;

class CategoryGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = CategoryGallery::paginate(10);
        return view('admin.category.category', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create_category');
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
          'title' => 'required',
          'description' => 'required',
        ]);
        $category = new CategoryGallery;
        $category->title = $request->get('title');
        $category->description = $request->get('description');
        $category->active = 1;

        $category->save();
        session()->flash('message', 'Category created successfully');
        return redirect('category');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CategoryGallery  $categoryGallery
     * @return \Illuminate\Http\Response
     */
    public function show(CategoryGallery $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CategoryGallery  $categoryGallery
     * @return \Illuminate\Http\Response
     */
    public function edit(CategoryGallery $category)
    {
        return view('admin.category.edit_category', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CategoryGallery  $categoryGallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CategoryGallery $category)
    {
      $this->validate($request, [
        'title' => 'required',
        'description' => 'required',
      ]);
      $category = CategoryGallery::find($category->id);
      $category->title = $request->get('title');
      $category->description = $request->get('description');
      if($request->get('active') == null) {
        $category->active = 0;
        session()->flash('deactivation', 'You deactivate category successfully');
      }
      else $category->active = 1;
      session()->flash('message', 'You update category successfully');

      $category->update();
      session()->flash('message', 'Category created successfully');
      return redirect('category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CategoryGallery  $categoryGallery
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategoryGallery $category)
    {

      CategoryGallery::destroy($category->id);
      session()->flash('delete', 'Category is deleted');
      return back();
    }
}

<?php

namespace App\Http\Controllers;

use App\Image;
use App\CategoryGallery as Category;
use Illuminate\Http\Request;
use ImageResize;
use Route;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = Image::paginate(10);
<<<<<<< HEAD
=======

>>>>>>> 9a8e0e200c383d164397de7277bc19bba21d0707
        return view('admin.image.image', compact('images'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

      $categories = Category::all();
        return view('admin.image.create_image', compact('categories'));
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
          'image' => 'image',
        ]);

        $image = new Image;
        $image->title = $request->get('title');
        $image->description = $request->get('description');
        $image->big = $request->file('image')->store('images');

        ImageResize::configure(array('driver' => 'gd'));

        $temp = ImageResize::make($request->file('image')->getRealPath());
        $temp->resize(480, 270)->save('thumb/'.$image->big);
        $image->thumb = 'thumb/'.$image->big;


        $image->save();
        $image->category()->sync($request->get('category'), false);
        session()->flash('message', 'Image created successfully');
        return redirect('image');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function show(Image $image)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function edit(Image $image)
    {
      $category = Category::all();
        return view('admin.image.edit_image', compact('image','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Image $image)
    {
      $this->validate($request, [
        'title' => 'required',
        'description' => 'required',
        'image' => 'image',
      ]);


      $image->title = $request->get('title');
      $image->description = $request->get('description');
      if ($request->has('image')) {


      $image->big = $request->file('image')->store('images');

      ImageResize::configure(array('driver' => 'gd'));

      $temp = ImageResize::make($request->file('image')->getRealPath());
      $temp->resize(480, 270)->save('thumb/'.$image->big);
      $image->thumb = 'thumb/'.$image->big;
    }
      $image->update();
      $image->category()->sync($request->get('category'));
      session()->flash('message', 'You update image successfully');
      return redirect('image');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy(Image $image)
    {
        Image::destroy($image->id);
        session()->flash('destroy', 'Image deleted successfully');
        return redirect('image');
    }
}

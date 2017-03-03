<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate(10);
        return view('admin.post.post', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.post.create_post');
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
        'title' => 'required|min:5',
        'story' => 'required|min:5',
      ]);
      $post = new Post;
      $post->title = $request->get('title');
      $post->story = $request->get('story');
      $post->active = 1;
      $post->user_id = auth()->user()->id;
      $post->save();
      session()->flash('message', 'Post created successfully');
      return redirect('post');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('admin.post.edit_post', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {


        $this->validate($request, [
          'title' => 'required',
          'story' => 'required',


        ]);
        $post->title = $request->get('title');
        $post->story = $request->get('story');
        if($request->get('active') == null) {
          $post->active = 0;
          session()->flash('deactivation', 'You deactivate post successfully');
        }
        else $post->active = 1;
        session()->flash('message', 'You update post successfully');
        $post->update();
        return redirect('post');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        Post::destroy($post->id);
        session()->flash('delete', 'Post is deleted');
        return back();
    }
}

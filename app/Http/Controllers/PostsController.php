<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

use App\Tag;

use App\Category;

use App\Http\Requests\Posts\CreatePostsRequest;

use App\Http\Requests\Posts\UpdatePostRequest;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('posts.index')->with('posts', Post::all())->with('categories', Category::all())->with('tags', Tag::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create')->with('categories', Category::all())->with('tags', Tag::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostsRequest $request)
    {
        $post = Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'category_id' => $request->category
        ]);

        if($request->tags){
            $post->tags()->attach($request->tags);
        }

        // flash message

        session()->flash('success', 'Post created successfully.');

        // redirect

        return redirect(route('posts.index'));
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
    public function edit(Post $post)
    {
        return view('posts.create')->with('post', $post)->with('categories', Category::all())->with('tags', Tag::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $data = $request->only(['title', 'description' ]);

        if($request->category){
            $post->category_id = $request->category;
        }

        if($request->tags){
            $post->tags()->sync($request->tags);
        }
        
        //update attribute
        $post->update($data);

        
        //flash messafe
        session()->flash('success', 'Post updated successfully');


        //redirect user
        return redirect(route('posts.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->forceDelete();
        session()->flash('error', 'Post deleted successfully.');
        return redirect(route('posts.index'));
    }
}

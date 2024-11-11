<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'DESC')->get();
        return view('pages.admin.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.post.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'cover'             => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'category'          => 'required',
            'title'             => 'required',
            'body_content'      => 'required'
        ]);

        $cover = $request->file('cover');
        $cover->storeAs('public/img', $cover->hashName());


        Post::create([
            'cover'             => $cover->hashName(),
            'category'          => $request->category,
            'title'             => $request->title,
            'user_id'           => 1,
            'body_content'      => $request->body_content
        ]);
        
    return redirect()->route('post.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}

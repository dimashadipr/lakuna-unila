<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts  = Post::filter(request(['search', 'category']))->orderBy('created_at', 'DESC')->get();
        $title  = request('category');

        return view('pages.admin.post.index', compact('posts', 'title'));
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
        $cover->storeAs('img/posts/', $cover->hashName());


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
    public function edit(string $id): View
    {
        //get product by ID
        $post = Post::findOrFail($id);

        //render view with product
        return view('pages.admin.post.edit', compact('post'));
    }
    
    public function update(Request $request, $id): RedirectResponse
    {
        //validate form
        $request->validate([
            'cover'             => 'image|mimes:jpeg,jpg,png|max:2048',
            'category'          => 'required',
            'title'             => 'required',
            'body_content'      => 'required'
        ]);

        //get product by ID
        $post = Post::findOrFail($id);

        //check if image is uploaded
        if ($request->hasFile('cover')) {

            //upload new image
            $cover = $request->file('cover');
            $cover->storeAs('img/posts/', $cover->hashName());

            //delete old image
            Storage::delete('img/posts/'. $post->cover);

            //update product with new image
            $post->update([
                'cover'             => $cover->hashName(),
                'category'          => $request->category,
                'title'             => $request->title,
                'user_id'           => 1,
                'body_content'      => $request->body_content
            ]);

        } else {

            //update product without image
            $post->update([
                'title'             => $request->title,
                'category'          => $request->category,
                'title'             => $request->title,
                'user_id'           => 1,
                'body_content'      => $request->body_content
            ]);
        }

        //redirect to index
        return redirect()->route('post.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): RedirectResponse
    {
        $post = Post::findOrFail($id);

        if($post->cover) {
            Storage::delete('img/posts/' . $post->cover);
        }

        $post->delete();

        return redirect()->route('post.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}

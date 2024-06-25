<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all()->sortByDesc('created_at');
        return view('posts.index', compact('posts'));
    }

    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Post deleted successfully!');
    }

    public function show(string $id)
    {
        $post = Post::find($id);      
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the post
     */
    public function edit(string $id)
    {
        $post = Post::find($id);
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'subject' => 'required|string|max:255',
            'grades' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'language' => 'required|string|max:255',
        ]);

        $post = Post::findOrFail($id);

        $post->title = $request->title;
        $post->body = $request->body;
        $post->subject = $request->subject;
        $post->grades = $request->grades;
        $post->price = $request->price;
        $post->language = $request->language;
        $post->save();

        return redirect()->route('posts.show', $id)->with('success', 'Post updated successfully!');
    }

    public function create()
    {
        return view('posts.create');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'price' => 'required|numeric|min:0',
            'subject' => 'required|string|max:255',
            'grades' => 'required|string|max:255',
            'language' => 'required|string|max:255',
        ]);

        // Get the currently authenticated user
        $user = auth()->user();

        // Create the post and associate it with the current user
        $post = new Post();
        $post->title = $request->title;
        $post->body = $request->body;
        $post->subject = $request->subject;
        $post->grades = $request->grades;
        $post->price = $request->price;
        $post->language = $request->language;
        $post->author_id = $user->id; // Associate the post with the current user's ID
        $post->save();

        return redirect()->route('posts.index')->with('success', 'Post created successfully!');
    }

}

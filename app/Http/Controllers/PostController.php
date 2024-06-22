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
       Post::findOrfail($id)->delete();
       return redirect()->route('posts.index');
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
        if ($request->title == null || $request->subject == null || $request->body == null || $request->grades == null || $request->price == null ) {
            return redirect()->route('posts.edit', $id);
        }
        $post = Post::find($id);
        $post->title = $request->title;
        $post->body = $request->body;
        $post->subject = $request->subject;
        $post->grades = $request->grades;
        $post->price = $request->price;
        $post->save();
        return redirect()->route('posts.show', $id);
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
        'author' => 'required|string|max:255',
        'price' => 'required|numeric|min:0',
        'subject' => 'required|string|max:255',
        'grades' => 'required|string|max:255',
        'language' => 'required|string|max:255',
    ]);

    $post = new Post();
    $post->title = $request->title;
    $post->body = $request->body;
    $post->subject = $request->subject;
    $post->grades = $request->grades;
    $post->price = $request->price;
    $post->language = $request->language;
    $post->author = $request->author;
    $post->save();

    return redirect()->route('posts.index')->with('success', 'Post created successfully!');
}

}
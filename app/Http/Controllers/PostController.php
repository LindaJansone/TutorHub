<?php

namespace App\Http\Controllers;

use App\Events\AuditLogEvent;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index(Request $request)
    {

        $subject = $request->input('subject');
        $grades = $request->input('grades');
        $price_min = $request->input('price_min');
        $price_max = $request->input('price_max');
        $language = $request->input('language');

        $query = Post::query();

        if ($subject) {
            $query->where('subject', $subject);
        }

        if ($grades) {
            $query->where('grades', $grades);
        }

        if ($price_min !== null) {
            $query->where('price', '>=', $price_min);
        }

        if ($price_max !== null) {
            $query->where('price', '<=', $price_max);
        }

        if ($language) {
            $query->where('language', $language);
        }

        $posts = $query->orderBy('created_at', 'desc')->get();

        if ($request->ajax()) {
            return view('posts.partials.posts', compact('posts'))->render();
        }

        return view('posts.index', compact('posts'));
    }

    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        event(new AuditLogEvent(auth()->user(), 'deleted', $post));
        return redirect()->route('posts.index')->with('success', 'Post deleted successfully!');
    }

    public function show(string $id)
    {
        $post = Post::find($id);      
        return view('posts.show', compact('post'));
    }

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

        $oldValues = $post->getOriginal();

        $post->title = $request->title;
        $post->body = $request->body;
        $post->subject = $request->subject;
        $post->grades = $request->grades;
        $post->price = $request->price;
        $post->language = $request->language;
        $post->save();

        event(new AuditLogEvent(auth()->user(), 'updated', $post, $oldValues, $post->getChanges()));

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

        $user = auth()->user();

        $post = new Post();
        $post->title = $request->title;
        $post->body = $request->body;
        $post->subject = $request->subject;
        $post->grades = $request->grades;
        $post->price = $request->price;
        $post->language = $request->language;
        $post->author_id = $user->id;
        $post->save();

        event(new AuditLogEvent($user, 'created', $post));

        return redirect()->route('posts.index')->with('success', 'Post created successfully!');
    }
}
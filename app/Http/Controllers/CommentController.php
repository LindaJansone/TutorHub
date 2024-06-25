<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Request $request, $postId)
    {
        $request->validate([
            'content' => 'required|string',
        ]);

        $post = Post::findOrFail($postId);
        $comment = new Comment();
        $comment->author_id = auth()->id();
        $comment->content = $request->content;
        $comment->post_id = $post->id;
        $comment->save();

        return redirect()->route('posts.show', $post->id);
    }

    public function destroy(Comment $comment)
    {
        $postId = $comment->post_id;
        $comment->delete();
        return redirect()->route('posts.show', $postId)->with('success', 'Comment deleted successfully!');
    }

    public function index(Request $request)
    {
        $query = Post::query();

        if ($request->filled('subject')) {
            $query->where('subject', $request->subject);
        }

        if ($request->filled('grades')) {
            $query->where('grades', $request->grades);
        }

        if ($request->filled('price_min')) {
            $query->where('price', '>=', $request->price_min);
        }

        if ($request->filled('price_max')) {
            $query->where('price', '<=', $request->price_max);
        }

        $posts = $query->orderBy('created_at', 'desc')->get();

        return view('posts.index', compact('posts'));
    }


}

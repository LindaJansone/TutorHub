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
            'author' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $post = Post::findOrFail($postId);

        $comment = new Comment();
        $comment->author = $request->author;
        $comment->content = $request->content;
        $comment->post_id = $post->id;
        $comment->save();

        return redirect()->route('posts.show', $post->id);
    }
}

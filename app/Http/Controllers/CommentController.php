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
}

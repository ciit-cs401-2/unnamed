<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'comment_content' => 'required|string|max:1000',
            'reviewer_name' => 'nullable|string|max:255',
            'reviewer_email' => 'nullable|email|max:255',
            'post_id' => 'required|exists:posts,id',
            'parent_comment_id' => 'nullable|exists:comments,id',
        ]);

        $comment = new Comment($validated);
        $comment->user_id = auth()->check() ? auth()->id() : null;
        $comment->comment_date = now();
        $comment->save();

        return redirect()->route('posts.show', $comment->post_id)->with('success', 'Comment added!');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'comment_content' => 'required|string|max:1000',
            'post_id' => 'required|exists:posts,id',
            'parent_comment_id' => 'nullable|exists:comments,id',
        ]);

        $user = auth()->user();

        // dd($request->all());

        $comment = new Comment([
            'comment_content'     => $request->comment_content,
            'comment_date'        => now(),
            'reviewer_name'       => $user->name,
            'reviewer_email'      => $user->email,
            'is_hidden'           => false,
            'post_id'             => $request->post_id,
            'user_id'             => $user->id,
            'parent_comment_id'   => $request->parent_comment_id, // optional
        ]);

        $comment->save();

        return redirect()->route('posts.show', $request->post_id)->with('success', 'Comment added!');
    }

}

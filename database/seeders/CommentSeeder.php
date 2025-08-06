<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use App\Models\Comment;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Comment::create([
            'comment_content' => 'This is a great post!',
            'comment_date' => Carbon::now(),
            'reviewer_name' => 'Alice',
            'reviewer_email' => 'alice@example.com',
            'is_hidden' => false,
            'post_id' => 1,
            'user_id' => 1,
            'parent_comment_id' => null,
        ]);

        Comment::create([
            'comment_content' => 'Thanks for the insights.',
            'comment_date' => Carbon::now(),
            'reviewer_name' => 'Bob',
            'reviewer_email' => 'bob@example.com',
            'is_hidden' => false,
            'post_id' => 1,
            'user_id' => 1,
            'parent_comment_id' => 1,
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Faker\Factory as Faker;
use App\Models\Comment;

class CommentSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();
        $topLevelComments = [];

        // Step 1: Create top-level comments without parent_comment_id (temporarily)
        for ($i = 1; $i <= 10; $i++) {
            $comment = Comment::create([
                'comment_content' => $faker->sentence,
                'comment_date' => Carbon::now()->subDays(rand(0, 30)),
                'reviewer_name' => $faker->name,
                'reviewer_email' => $faker->email,
                'is_hidden' => false,
                'post_id' => rand(1, 5),
                'user_id' => rand(1, 3),
                'parent_comment_id' => null, // temp value
            ]);

            // Update to set parent_comment_id = id (self-reference)
            $comment->parent_comment_id = $comment->id;
            $comment->save();

            $topLevelComments[] = $comment->id;
        }

        // Step 2: Create replies to top-level comments
        foreach (range(1, 10) as $i) {
            Comment::create([
                'comment_content' => $faker->sentence,
                'comment_date' => Carbon::now()->subDays(rand(0, 30)),
                'reviewer_name' => $faker->name,
                'reviewer_email' => $faker->email,
                'is_hidden' => false,
                'post_id' => rand(1, 5),
                'user_id' => rand(1, 3),
                'parent_comment_id' => $faker->randomElement($topLevelComments), // must exist
            ]);
        }
    }
}

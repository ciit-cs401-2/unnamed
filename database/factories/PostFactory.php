<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $status = ["D", "P", "I"];
        $title = fake()->sentence(rand(1, 5));
        return [
            "title" => $title,
            "content" => fake()->sentences(rand(5, 10), true),
            "slug" => Str::slug($title),
            "publication_date" => null,
            "last_modified_date" => fake()->optional()->dateTime(),
            "status" => $status[array_rand($status)],
            "featured_image_url" => "https://picsum.photos/600/400",
            "views_count" => 0,
            "featured_post" => false
        ];
    }
}

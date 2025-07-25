<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Category::factory(env('MAX_CATEGORY_SEED'))->create();
        Category::create([
            "category_name" => "News",
            "slug" => Str::slug("News"),
            "description" => "News content."
        ]);
        Category::create([
            "category_name" => "Podcast",
            "slug" => Str::slug("Podcast"),
            "description" => "Podcast content."
        ]);
        Category::create([
            "category_name" => "Review",
            "slug" => Str::slug("Review"),
            "description" => "Review content."
        ]);
        Category::create([
            "category_name" => "Coverage",
            "slug" => Str::slug("Coverage"),
            "description" => "Coverage content."
        ]);
        Category::create([
            "category_name" => "Interview",
            "slug" => Str::slug("Interview"),
            "description" => "Interview content."
        ]);
        Category::create([
            "category_name" => "Commentary",
            "slug" => Str::slug("Commentary"),
            "description" => "Commentary content."
        ]);
    }
}

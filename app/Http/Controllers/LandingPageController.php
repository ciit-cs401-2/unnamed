<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index()
    {
        //$featuredPosts = Post::all();   //will get all for the meantime
        //$recentPosts = Post::all();
        //return view('welcome', ['featuredPosts' => $featuredPosts, 'recentPosts' => $recentPosts]);
        $featuredPosts = Post::where('featured_post', 1)
            ->orderBy('publication_date', 'desc')
            ->first();
        $recentPosts = Post::where('publication_date', '!=', null)
            ->orderBy('publication_date', 'desc')
            ->get();
        $mostPopular = Post::where('publication_date', '!=', null)
            ->orderBy('views_count', 'desc')
            ->take(10)  //top 10
            ->get();
        $categories = Category::all();
        // dd($mostPopular->first()->user()->get());
        return view(
            'welcome',
            [
                'featuredPosts' => $featuredPosts,
                'recentPosts' => $recentPosts,
                'mostPopular' => $mostPopular,
                'categories' => $categories
            ]
        );
    }
}

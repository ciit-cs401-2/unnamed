<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show($id)
    {
        $category = Category::findOrFail($id);
        $posts = $category->posts()
                          ->orderBy('publication_date', 'desc')
                          ->get();

        return view('categories.show', compact('category', 'posts'));
    }
}

<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Post;


class PostController extends Controller
{
    public function show($id)
    {
        $post = Post::with(['user', 'categories', 'comments.user'])->findOrFail($id);
        $post->increment('views_count');
        return view('posts.show', compact('post'));
    }


    public function create()
    {
        $categories = \App\Models\Category::all(); // if needed
        return view('posts.create', compact('categories'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        // dd(Auth::check());
        // dd(Auth::check(), Auth::id());

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category_id' => 'required|exists:categories,id',
             'featured_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
             'featured_post' => 'nullable|boolean', 
        ]);

        $imagePath = 'default.jpg'; // fallback

        if ($request->hasFile('featured_image')) {
            $imagePath = $request->file('featured_image')->store('uploads', 'public'); // stores in storage/app/public/uploads
        }

        $post = Post::create([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'slug' => Str::slug($validated['title']),
            'status' => 'D',
            'featured_image_url' => $imagePath,
            'publication_date' => now(),
             'featured_post' => $request->has('featured_post') ? 1 : 0,
            'user_id' => Auth::id(),
        ]);

        // dd($request->all());

        // Attach category to pivot table
        $post->categories()->attach($validated['category_id'] ?? 1); // default to category ID 1

        return redirect()->route('posts.show', $post->id)->with('success', 'Post created!');
    }


}

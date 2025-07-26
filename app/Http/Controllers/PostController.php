<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;


class PostController extends Controller
{
    public function show($id)
    {
        $post = \App\Models\Post::with(['user', 'categories'])->findOrFail($id);
        return view('posts.show', compact('post'));
    }

    public function create()
    {
        $categories = \App\Models\Category::all(); // if needed
        return view('posts.create', compact('categories'));
    }

    // public function store(Request $request)
    // {
    //     // dd($request->all());
        
    //     // Ensure user is authenticated
    //     $user = Auth::user();

    //     if (!$user) {
    //         abort(403, 'Unauthorized');
    //     }

    //     // Validate incoming request
    //     $validated = $request->validate([
    //         'title' => 'required|string|max:255',
    //         'content' => 'required|string',
    //         'category_id' => 'nullable|exists:categories,id',
    //     ]);

    //     // Create new post
    //     $post = new \App\Models\Post();
    //     $post->title = $validated['title'];
    //     $post->content = $validated['content'];
    //     $post->user_id = $user->id;
    //     $post->category_id = $validated['category_id'] ?? null;
    //     $post->save();

    //     // Redirect with success message
    //     return redirect()->route('posts.show', $post->id)->with('success', 'Post created successfully.');
    // }


    // public function store(Request $request)
    // {
    //     dd($request->all());
    //     $user = Auth::user();
        
    //     $validated = $request->validate([
    //         'title' => 'required|string|max:255',
    //         'content' => 'required|string',
    //         'category_id' => 'nullable|array', // multiple categories allowed
    //         'category_id.*' => 'exists:categories,id',
    //     ]);

    //     // Create the post
    //     $post = new \App\Models\Post();
    //     $post->title = $validated['title'];
    //     $post->content = $validated['content'];
    //     $post->slug = Str::slug($validated['title']);
    //     $post->status = 'D'; // Default as Draft
    //     $post->featured_image_url = ''; // Optional, handle later if you add images
    //     $post->user_id = $user->id;
    //     $post->save();

    //     // Attach categories via pivot table
    //     if (!empty($validated['category_id'])) {
    //         $post->categories()->attach($validated['category_id']);
    //     }

    //     return redirect()->route('posts.show', $post->id)
    //                     ->with('success', 'Post created successfully!');
    // }

    public function store(Request $request)
    {
        // dd($request->all());
        // dd(Auth::check());
        // dd(Auth::check(), Auth::id());

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category_id' => 'required|exists:categories,id'
        ]);

        $post = Post::create([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'slug' => Str::slug($validated['title']),
            'status' => 'D',
            'featured_image_url' => 'default.jpg',
            'user_id' => Auth::id(),
        ]);

        // Attach category to pivot table
        $post->categories()->attach($validated['category_id']);

        return redirect()->route('posts.show', $post->id)->with('success', 'Post created!');
    }


}

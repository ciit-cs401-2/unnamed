@extends('layouts.master')

@section('title', $category->category_name)

@section('content')
<div class="text-white">
    <h1 class="text-4xl font-bold mb-6">Category: {{ $category->category_name }}</h1>

    @if($posts->count() > 0)
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($posts as $post)
                @php
                    $imageUrl = Str::startsWith($post->featured_image_url, ['http', 'https'])
                        ? $post->featured_image_url
                        : asset('storage/' . $post->featured_image_url);
                @endphp

                <a href="{{ route('posts.show', $post->id) }}" 
                   class="bg-[#24263b] rounded-lg shadow-lg overflow-hidden hover:scale-[1.02] transition">
                    <img src="{{ $imageUrl }}" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <span class="text-xs bg-[#e94560] text-white px-2 py-1 rounded">
                            {{ $post->categories()->first()->category_name ?? 'Uncategorized' }}
                        </span>
                        <h2 class="text-xl font-bold mt-2">{{ $post->title }}</h2>
                        <p class="text-gray-400 text-sm mb-2">
                            By {{ $post->user->name }} • {{ date('M d, Y', strtotime($post->publication_date)) }}
                        </p>
                        <p class="text-gray-300 text-sm">{{ Str::limit($post->content, 100) }}</p>
                    </div>
                </a>
            @endforeach
        </div>
    @else
        <p class="text-gray-400">No posts found in this category.</p>
    @endif
</div>
@endsection

@extends('layouts.master')

@section('title', $post->title)

@section('content')
<div class="bg-[#24263b] p-8 rounded-lg shadow-lg text-white">
    <h1 class="text-4xl font-bold mb-4">{{ $post->title }}</h1>
    <p class="text-sm text-gray-400 mb-2">
        By {{ $post->user->name }} | {{ date('F d, Y', strtotime($post->publication_date)) }}
    </p>
    <p class="text-[#e94560] font-semibold mb-4">
        Category: {{ $post->categories->first()->category_name ?? 'Uncategorized' }}
    </p>

    @php
        $imageUrl = Str::startsWith($post->featured_image_url, ['http', 'https'])
            ? $post->featured_image_url
            : asset('storage/' . $post->featured_image_url);
    @endphp

    <img src="{{ $imageUrl }}" alt="Post Image" class="w-full h-auto rounded mb-6">

    <div class="text-lg leading-relaxed">{{ $post->content }}</div>
</div>
@endsection
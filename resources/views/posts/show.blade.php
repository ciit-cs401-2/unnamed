@extends('layouts.master')

@section('title', $post->title)

@section('content')
<div class="bg-[#24263b] p-8 rounded-lg shadow-lg text-white">
    <h1 class="text-4xl font-bold mb-4">{{ $post->title }}</h1>

    <p class="text-sm text-gray-400 mb-2 flex items-center gap-2">
        By {{ $post->user->name }} | {{ date('F d, Y', strtotime($post->publication_date)) }} 
        •  {{ $post->views_count }} views
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

{{-- Comments List --}}
<div class="mt-12 bg-[#1e1f2d] p-6 rounded-lg text-white">
    <h3 class="text-2xl font-bold mb-6">Comments ({{ $post->comments->count() }})</h3>

    @forelse ($post->comments as $comment)
        <div class="mb-6 border-b border-gray-700 pb-4">
            <p class="text-sm text-gray-400">
                <strong>{{ $comment->reviewer_name ?? $comment->user->name }}</strong> 
                • {{ \Carbon\Carbon::parse($comment->comment_date)->diffForHumans() }}
            </p>
            <p class="mt-2">{{ $comment->comment_content }}</p>
        </div>
    @empty
        <p class="text-gray-400">No comments yet. Be the first to comment!</p>
    @endforelse
</div>

{{-- Comment Form --}}
@auth
<div class="mt-10 bg-[#1e1f2d] p-6 rounded-lg text-white">
    <h3 class="text-2xl font-bold mb-4">Leave a Comment</h3>

    @if(session('success'))
        <div class="bg-green-600 p-2 rounded mb-4 text-white">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('comments.store') }}" method="POST" class="space-y-4">
        @csrf
        <input type="hidden" name="post_id" value="{{ $post->id }}">

        <div>
            <label for="comment_content" class="block mb-1 text-sm">Comment</label>
            <textarea name="comment_content" id="comment_content" rows="4" class="w-full p-2 rounded bg-[#2c2f48] text-white" required></textarea>
            @error('comment_content')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
        </div>

        <button type="submit" class="bg-[#e94560] text-white px-4 py-2 rounded hover:bg-pink-600">Post Comment</button>
    </form>
</div>
@else
    <div class="mt-10 bg-[#1e1f2d] p-6 rounded-lg text-white text-center">
        <p class="text-gray-300">You must <a href="{{ route('login') }}" class="text-[#e94560] underline">log in</a> to post a comment.</p>
    </div>
@endauth

@endsection
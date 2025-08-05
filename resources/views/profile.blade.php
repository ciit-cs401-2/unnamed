@extends('layouts.master')

@section('title', 'Your Profile')

@section('content')
<div class="text-white">
    <h2 class="text-2xl font-bold mb-6">Your Profile</h2>

    {{-- Success Message --}}
    @if(session('success'))
        <div class="mb-4 text-green-400">{{ session('success') }}</div>
    @endif

    {{-- Profile Info Card --}}
    <div class="bg-[#24263b] p-6 rounded-lg shadow-lg mb-6 max-w-xl">
        <p class="text-lg"><strong>Name:</strong> {{ $user->name }}</p>
        <p class="text-lg"><strong>Email:</strong> {{ $user->email }}</p>

        <button onclick="document.getElementById('editForm').classList.toggle('hidden')"
                class="mt-4 bg-[#e94560] hover:bg-[#d73750] text-white px-4 py-2 rounded transition">
            Update Details
        </button>
    </div>

    {{-- Hidden Update Form --}}
    <div id="editForm" class="hidden bg-[#1a1a2e] p-6 rounded-lg shadow-lg mb-10 max-w-xl">
        <form method="POST" action="{{ route('profile.update') }}">
            @csrf

            <div class="mb-4">
                <label for="name" class="block mb-1 text-gray-300">Name</label>
                <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}"
                       class="w-full px-4 py-2 rounded bg-[#24263b] text-white border border-gray-600 focus:outline-none focus:ring-2 focus:ring-[#e94560]">
                @error('name') <p class="text-red-400 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label for="email" class="block mb-1 text-gray-300">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}"
                       class="w-full px-4 py-2 rounded bg-[#24263b] text-white border border-gray-600 focus:outline-none focus:ring-2 focus:ring-[#e94560]">
                @error('email') <p class="text-red-400 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <button type="submit"
                    class="bg-[#e94560] hover:bg-[#d73750] text-white px-4 py-2 rounded transition">
                Save Changes
            </button>
        </form>
    </div>

    <h2 class="text-2xl font-semibold mb-4">Your Posts</h2>

    @if($user->posts->count() > 0)
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($user->posts as $post)
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
                        <h2 class="text-xl font-bold mt-2 text-white">{{ $post->title }}</h2>
                        <p class="text-gray-400 text-sm mb-2">
                            {{ date('M d, Y', strtotime($post->publication_date)) }}
                        </p>
                        <p class="text-gray-300 text-sm">{{ Str::limit($post->content, 100) }}</p>
                    </div>
                </a>
            @endforeach
        </div>
    @else
        <p class="text-gray-400">You haven't written any posts yet.</p>
    @endif
</div>

{{-- Minimal JS for toggle --}}
<script>
    // Optional: auto-scroll to form when showing
    document.getElementById('editForm')?.addEventListener('transitionend', function () {
        if (!this.classList.contains('hidden')) {
            this.scrollIntoView({ behavior: 'smooth' });
        }
    });
</script>
@endsection

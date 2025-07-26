@extends('layouts.master')

@section('title', 'Home')

@section('content')
<h1 class="text-3xl sm:text-5xl md:text-6xl font-extrabold text-white mb-12">#mindonmoney</h1>
<h2 class="text-3xl font-bold mb-6 text-white">Discover MoneyMinted featured stories</h2>
@include('components.featured-post', ['post' => $featuredPosts])
<div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-8">
    <div class="md:col-span-2">
        @include('components.recent-posts', ['recentPosts' => $recentPosts])
    </div>
    <div>
        @include('components.most-popular', ['mostPopular' => $mostPopular])
        @include('components.categories', ['categories' => $categories])
    </div>
</div>
@endsection

@auth
<a href="{{ route('posts.create') }}"
   class="fixed bottom-6 right-6 bg-[#e94560] hover:bg-[#c2364e] text-white text-2xl font-bold py-2 px-4 rounded-full shadow-lg transition duration-300 ease-in-out z-50">
   +
</a>
@endauth
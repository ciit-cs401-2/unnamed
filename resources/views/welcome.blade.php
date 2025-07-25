@extends('layouts.master')

@section('title', 'Home')

@section('content')
<h1 class="text-3xl sm:text-5xl md:text-6xl font-extrabold text-white mb-12">#mindonmoney</h1>
<h2 class="text-3xl font-bold mb-6 text-white">Discover MoneyMinted featured stories</h2>
@include('components.featured-post', ['featuredPosts' => $featuredPosts])
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
@extends('layouts.master')

@section('title', 'Create New Post')

@section('content')
<div class="bg-[#24263b] p-8 rounded-lg shadow-lg text-white max-w-3xl mx-auto mt-10">
    <h1 class="text-3xl font-bold mb-6 text-white">Create New Post</h1>

    @if ($errors->any())
        <div class="bg-red-500 text-white p-4 rounded mb-4">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-4">
            <label for="title" class="block mb-2 font-semibold">Title</label>
            <input type="text" id="title" name="title" class="w-full rounded px-4 py-2 bg-[#1f1f2e] text-white border border-gray-600 focus:outline-none focus:ring-2 focus:ring-[#e94560]" required>
        </div>

        <div class="mb-4">
            <label for="category_id" class="block mb-2 font-semibold">Category</label>
            <select name="category_id" id="category_id" class="w-full rounded px-4 py-2 bg-[#1f1f2e] text-white border border-gray-600">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="content" class="block mb-2 font-semibold">Content</label>
            <textarea id="content" name="content" rows="6" class="w-full rounded px-4 py-2 bg-[#1f1f2e] text-white border border-gray-600 focus:outline-none focus:ring-2 focus:ring-[#e94560]" required></textarea>
        </div>

        <div class="mb-4">
            <label for="featured_image" class="block mb-2 font-semibold">Featured Image</label>
            <input type="file" name="featured_image" id="featured_image" class="text-white">
        </div>

        <div class="mb-6">
            <label class="inline-flex items-center">
                <input type="checkbox" name="featured_post" value="1" class="form-checkbox text-[#e94560] mr-2">
                <span>Mark as Featured</span>
            </label>
        </div>

        <button type="submit" class="bg-[#e94560] hover:bg-[#c2364e] text-white font-bold py-2 px-6 rounded transition duration-300">Publish</button>
    </form>
</div>
@endsection

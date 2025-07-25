@extends('layouts.app')

@section('content')
<div class="container mx-auto bg-white p-6 rounded-lg shadow-xl w-full max-w-md">
    <h1 class="text-3xl font-bold text-gray-800 mb-6 text-center">Role Details</h1>

    <div class="mb-4">
        <p class="text-gray-700 text-lg mb-2"><span class="font-semibold">ID:</span> {{ $role->id }}</p>
        <p class="text-gray-700 text-lg mb-2"><span class="font-semibold">Name:</span> {{ $role->role_name }}</p>
        <p class="text-gray-700 text-lg mb-2"><span class="font-semibold">Name:</span> {{ $role->description }}</p>
        <p class="text-gray-700 text-lg mb-2"><span class="font-semibold">Created At:</span> {{
            $role->created_at->format('M d, Y H:i A') }}</p>
        <p class="text-gray-700 text-lg"><span class="font-semibold">Updated At:</span> {{ $role->updated_at->format('M
            d, Y H:i A') }}</p>
    </div>

    <div class="flex justify-center space-x-4 mt-6">
        <a href="{{ route('roles.edit', $role->id) }}"
            class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded-lg transition duration-150 ease-in-out">
            Edit Role
        </a>
        <a href="{{ route('roles.index') }}"
            class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded-lg transition duration-150 ease-in-out">
            Back to List
        </a>
    </div>
</div>
@endsection
@extends('layouts.app')
@section('content')
<div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-lg text-center">
    <h2 class="text-3xl font-bold text-gray-800 mb-6">Welcome to Your Dashboard!</h2>

    @auth
    <p class="text-gray-700 text-lg mb-4">You are logged in as <span class="font-semibold">
            {{ Auth::user()->name ??
            Auth::user()->email }}</span>.</p>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit"
            class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:shadow-outline transition duration-150 ease-in-out">
            Logout
        </button>
    </form>
    @else
    <p class="text-gray-700 text-lg mb-4">You are not logged in.</p>
    <a href="{{ route('login') }}"
        class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:shadow-outline transition duration-150 ease-in-out">
        Go to Login
    </a>
    @endauth
</div>
@endsection
@extends('layouts.master')

@section('content')
<div class="max-w-3xl mx-auto mt-10 bg-[#24263b] p-8 rounded-lg shadow-lg text-white">
    <h2 class="text-4xl font-bold mb-6">Contact Us</h2>

    @if(session('success'))
        <div class="bg-green-600 text-white p-4 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('contact.submit') }}" method="POST" class="space-y-6">
        @csrf

        <div>
            <label class="block text-sm font-medium mb-2">Name</label>
            <input 
                type="text" 
                name="name" 
                required
                class="w-full p-3 rounded bg-[#1f2032] text-white focus:outline-none focus:ring-2 focus:ring-[#e94560]"
            >
        </div>

        <div>
            <label class="block text-sm font-medium mb-2">Email</label>
            <input 
                type="email" 
                name="email" 
                required
                class="w-full p-3 rounded bg-[#1f2032] text-white focus:outline-none focus:ring-2 focus:ring-[#e94560]"
            >
        </div>

        <div>
            <label class="block text-sm font-medium mb-2">Message</label>
            <textarea 
                name="message" 
                rows="5" 
                required
                class="w-full p-3 rounded bg-[#1f2032] text-white focus:outline-none focus:ring-2 focus:ring-[#e94560]"
            ></textarea>
        </div>

        <button 
            type="submit" 
            class="bg-[#e94560] hover:bg-[#c2364e] text-white font-semibold py-3 px-6 rounded transition duration-200"
        >
            Send Message
        </button>
    </form>
</div>
@endsection

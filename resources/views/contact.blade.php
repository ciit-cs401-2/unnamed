@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Contact Us</h2>

    @if(session('success'))
        <div>{{ session('success') }}</div>
    @endif

    <form action="{{ route('contact.submit') }}" method="POST">
        @csrf
        <div>
            <label>Name:</label>
            <input type="text" name="name" required>
        </div>

        <div>
            <label>Email:</label>
            <input type="email" name="email" required>
        </div>

        <div>
            <label>Message:</label>
            <textarea name="message" required></textarea>
        </div>

        <button type="submit">Send</button>
    </form>
</div>
@endsection

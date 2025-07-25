<nav class="bg-[#1a1a2e] p-4 shadow-md"> {{-- Adjust background color --}}
    <div class="container mx-auto flex justify-between items-center">
        <div class="text-white text-2xl font-bold flex items-center"><img src="{{ asset('logo.png') }}" alt="Logo"
                class="h-8 mr-2"><a href={{route('welcome')}}>MoneyMinted</a></div>
        <div class="flex items-center space-x-4">
            <a href="{{route('welcome')}}" class="text-white hover:text-[#e94560]">Home</a>

            {{-- Conditional display for logged-in user --}}
            @auth {{-- This is a Laravel Blade directive to check if a user is authenticated --}}
            <span class="text-white">Welcome, {{ Auth::user()->name }}!</span>
            <form action="{{route('logout')}}" method="POST" class="inline">
                @csrf
                <button type="submit" class="text-white hover:text-[#e94560]">Logout</button>
            </form>
            @else
            <a href="{{route('login')}}" class="text-white hover:text-[#e94560]">Login</a>  
            @endauth

            {{-- Social Media Icons and Links --}}
            <div class="flex space-x-3 ml-4">
                <a href="https://www.facebook.com/" target="_blank" class="text-white hover:text-[#e94560]">
                    <img src="https://img.icons8.com/ios-filled/24/ffffff/facebook-new.png" alt="Facebook"
                        class="w-6 h-6" />
                </a>
                <a href="https://twitter.com" target="_blank" class="text-white hover:text-[#e94560]">
                    <img src="https://img.icons8.com/ios-filled/24/ffffff/twitter.png" alt="Twitter" class="w-6 h-6" />
                </a>
                <a href="https://instagram.com" target="_blank" class="text-white hover:text-[#e94560]">
                    <img src="https://img.icons8.com/ios-filled/24/ffffff/instagram-new--v1.png" alt="Instagram"
                        class="w-6 h-6" />
                </a>
            </div>
        </div>
    </div>
</nav>
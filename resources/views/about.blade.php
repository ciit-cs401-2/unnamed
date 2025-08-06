@extends('layouts.master')

@section('content')
<div class="bg-[#0f3460] min-h-screen text-white">
    <div class="container mx-auto px-4 py-12">
        <!-- Page Header -->
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold mb-4">About MoneyMinted</h1>
            <div class="w-24 h-1 bg-[#e94560] mx-auto"></div>
        </div>

        <!-- Main Content Section -->
        <div class="grid md:grid-cols-2 gap-12 mb-16">
            <!-- Our Story -->
            <div>
                <h2 class="text-2xl font-semibold mb-4">Our Story</h2>
                <p class="text-gray-300 leading-relaxed">
                    Founded in 2025, MoneyMinted began as a small blog dedicated to financial literacy and investment strategies. 
                    What started as a passion project has grown into a trusted resource for thousands of readers worldwide.
                </p>
                <p class="text-gray-300 leading-relaxed mt-4">
                    Our team of financial experts and writers are committed to providing clear, actionable advice to help you 
                    navigate the complex world of personal finance and investments.
                </p>
            </div>

            <!-- Our Mission -->
            <div>
                <h2 class="text-2xl font-semibold mb-4">Our Mission</h2>
                <p class="text-gray-300 leading-relaxed">
                    At MoneyMinted, we believe financial knowledge should be accessible to everyone. We're on a mission to 
                    demystify finance and empower our readers to make informed decisions about their money.
                </p>
                <div class="mt-6 bg-[#16213e] p-6 rounded-lg">
                    <h3 class="font-medium text-[#e94560] mb-2">Our Core Values</h3>
                    <ul class="list-disc pl-5 text-gray-300 space-y-2">
                        <li>Transparency in all our recommendations</li>
                        <li>Education before promotion</li>
                        <li>Practical, real-world advice</li>
                        <li>Community-focused approach</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Team Section -->
        <div class="mb-16">
            <h2 class="text-2xl font-semibold mb-8 text-center">Meet Our Team</h2>
            <div class="grid md:grid-cols-3 gap-8">
                <!-- Team Member 1 -->
                <div class="bg-[#16213e] p-6 rounded-lg shadow-md text-center">
                    <div class="w-32 h-32 bg-gray-700 rounded-full mx-auto mb-4 overflow-hidden">
                        <img src="{{ asset('images/team1.jpg') }}" alt="Team Member" class="w-full h-full object-cover">
                    </div>
                    <h3 class="text-xl font-medium">Mc Deniegas</h3>
                    <p class="text-[#e94560] mb-2">Founder & CEO</p>
                    <p class="text-gray-300 text-sm">
                        Financial expert with 10+ years experience in investment strategies and market analysis.
                    </p>
                </div>

                <!-- Team Member 2 -->
                <div class="bg-[#16213e] p-6 rounded-lg shadow-md text-center">
                    <div class="w-32 h-32 bg-gray-700 rounded-full mx-auto mb-4 overflow-hidden">
                        <img src="{{ asset('images/team2.jpg') }}" alt="Team Member" class="w-full h-full object-cover">
                    </div>
                    <h3 class="text-xl font-medium">Alex Johnson</h3>
                    <p class="text-[#e94560] mb-2">Senior Financial Analyst</p>
                    <p class="text-gray-300 text-sm">
                        Specializes in cryptocurrency markets and emerging financial technologies.
                    </p>
                </div>

                <!-- Team Member 3 -->
                <div class="bg-[#16213e] p-6 rounded-lg shadow-md text-center">
                    <div class="w-32 h-32 bg-gray-700 rounded-full mx-auto mb-4 overflow-hidden">
                        <img src="{{ asset('images/team3.jpg') }}" alt="Team Member" class="w-full h-full object-cover">
                    </div>
                    <h3 class="text-xl font-medium">Sarah Williams</h3>
                    <p class="text-[#e94560] mb-2">Content Director</p>
                    <p class="text-gray-300 text-sm">
                        Ensures our content remains accurate, relevant, and accessible to all readers.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Footer Section -->
<footer class="bg-[#1a1a2e] py-8">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div>
                <h3 class="font-medium text-white mb-4">Links</h3>
                <ul class="space-y-2">
                    <li><a href="{{ route('welcome') }}" class="text-gray-300 hover:text-[#e94560]">Homepage</a></li>
                    <li><a href="#" class="text-gray-300 hover:text-[#e94560]">Blog</a></li>
                    <li><a href="{{ route('about') }}" class="text-gray-300 hover:text-[#e94560]">About Us</a></li>
                    <li><a href="{{ route('contact.form') }}" class="text-gray-300 hover:text-[#e94560]">Contact</a></li>
                </ul>
            </div>
            <div>
                <h3 class="font-medium text-white mb-4">Tags</h3>
                <ul class="space-y-2">
                    <li><a href="#" class="text-gray-300 hover:text-[#e94560]">Investments</a></li>
                    <li><a href="#" class="text-gray-300 hover:text-[#e94560]">Finance</a></li>
                    <li><a href="#" class="text-gray-300 hover:text-[#e94560]">Markets</a></li>
                </ul>
            </div>
            <div>
                <h3 class="font-medium text-white mb-4">Social</h3>
                <div class="flex space-x-4">
                    <a href="https://www.facebook.com/" target="_blank" class="text-gray-300 hover:text-[#e94560]">
                        <img src="https://img.icons8.com/ios-filled/24/e94560/facebook-new.png" alt="Facebook" class="w-6 h-6" />
                    </a>
                    <a href="https://twitter.com" target="_blank" class="text-gray-300 hover:text-[#e94560]">
                        <img src="https://img.icons8.com/ios-filled/24/e94560/twitter.png" alt="Twitter" class="w-6 h-6" />
                    </a>
                    <a href="https://instagram.com" target="_blank" class="text-gray-300 hover:text-[#e94560]">
                        <img src="https://img.icons8.com/ios-filled/24/e94560/instagram-new--v1.png" alt="Instagram" class="w-6 h-6" />
                    </a>
                </div>
            </div>
        </div>
    </div>
</footer>
@endsection
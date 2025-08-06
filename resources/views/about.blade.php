@extends('layouts.master')

@section('title', 'About Us')

@section('content')
<div class="bg-[#1a1a2e] min-h-screen text-white">
    <div class="container mx-auto px-4 py-12">
        <!-- Page Header -->
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold mb-4">About <span class="text-[#e94560]">MoneyMinted</span></h1>
            <div class="w-24 h-1 bg-[#e94560] mx-auto rounded"></div>
        </div>

        <!-- Main Content Section -->
        <div class="grid md:grid-cols-2 gap-12 mb-16">
            <!-- Our Story -->
            <div class="bg-[#1a1a2e] p-6 rounded-lg shadow-md">
                <h2 class="text-2xl font-semibold text-[#e94560] mb-4">Our Story</h2>
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
            <div class="bg-[#1a1a2e] p-6 rounded-lg shadow-md">
                <h2 class="text-2xl font-semibold text-[#e94560] mb-4">Our Mission</h2>
                <p class="text-gray-300 leading-relaxed">
                    At MoneyMinted, we believe financial knowledge should be accessible to everyone. We're on a mission to
                    demystify finance and empower our readers to make informed decisions about their money.
                </p>
                <div class="mt-6 bg-[#24263b] p-6 rounded-lg">
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
                <!-- Member 1 -->
                <div class="bg-[#1a1a2e] p-6 rounded-lg shadow-md text-center">
                    <div class="w-32 h-32 bg-gray-700 rounded-full mx-auto mb-4 overflow-hidden">
                        <img src="{{ asset('images/team1.jpg') }}" alt="Mazee Deniega" class="w-full h-full object-cover">
                    </div>
                    <h3 class="text-xl font-medium text-white">Mazee Deniega</h3>
                    <p class="text-[#e94560] mb-2">Lead Strategist</p>
                    <p class="text-gray-300 text-sm">
                        Focused on developing scalable investment models and long-term portfolio strategies.
                    </p>
                </div>

                <!-- Member 2 -->
                <div class="bg-[#1a1a2e] p-6 rounded-lg shadow-md text-center">
                    <div class="w-32 h-32 bg-gray-700 rounded-full mx-auto mb-4 overflow-hidden">
                        <img src="{{ asset('images/team2.jpg') }}" alt="Ranjet Fortuna" class="w-full h-full object-cover">
                    </div>
                    <h3 class="text-xl font-medium text-white">Ranjet Fortuna</h3>
                    <p class="text-[#e94560] mb-2">Senior Advisor</p>
                    <p class="text-gray-300 text-sm">
                        Specializes in global economic forecasting and risk analysis for fintech startups.
                    </p>
                </div>

                <!-- Member 3 -->
                <div class="bg-[#1a1a2e] p-6 rounded-lg shadow-md text-center">
                    <div class="w-32 h-32 bg-gray-700 rounded-full mx-auto mb-4 overflow-hidden">
                        <img src="{{ asset('images/team3.jpg') }}" alt="Peter Santiago" class="w-full h-full object-cover">
                    </div>
                    <h3 class="text-xl font-medium text-white">Peter Santiago</h3>
                    <p class="text-[#e94560] mb-2">Technology Officer</p>
                    <p class="text-gray-300 text-sm">
                        Leads product development, data engineering, and platform integration for MoneyMinted.
                    </p>
                </div>

                <!-- Member 4 -->
                <div class="bg-[#1a1a2e] p-6 rounded-lg shadow-md text-center">
                    <div class="w-32 h-32 bg-gray-700 rounded-full mx-auto mb-4 overflow-hidden">
                        <img src="{{ asset('images/team4.jpg') }}" alt="Akio Yamagata" class="w-full h-full object-cover">
                    </div>
                    <h3 class="text-xl font-medium text-white">Akio Yamagata</h3>
                    <p class="text-[#e94560] mb-2">Data & Insights Lead</p>
                    <p class="text-gray-300 text-sm">
                        Combines machine learning with behavioral finance to optimize user engagement.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

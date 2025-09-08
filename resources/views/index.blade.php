<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
        <style>
            body {
                font-family: 'Inter', sans-serif;
                overflow-x: hidden;
                background-color: #030712;
                color: #e5e7eb;
            }
            .bg-pattern {
                background-image: radial-gradient(circle at 100% 100%, rgba(255,255,255,.05) 1px, transparent 1px), radial-gradient(circle at 0% 0%, rgba(255,255,255,.05) 1px, transparent 1px);
                background-size: 15px 15px;
            }
            /* Custom styles for horizontal scrolling on mobile */
            @media (max-width: 767px) {
                .horizontal-scroll-container {
                    overflow-x: auto;
                    -webkit-overflow-scrolling: touch;
                    scrollbar-width: none; /* Firefox */
                    -ms-overflow-style: none;  /* IE and Edge */
                }
                .horizontal-scroll-container::-webkit-scrollbar {
                    display: none; /* Chrome, Safari, Opera */
                }
                .horizontal-scroll-container > div {
                    min-width: 80%; /* Each card takes up 80% of the screen */
                    flex-shrink: 0;
                }
            }

        </style>
        {{-- <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" /> --}}
        <!-- Styles -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    {{-- <body class="bg-white min-h-screen">
        @guest
            <div class="flex flex-col items-center justify-center min-h-screen">
                <h1 class="text-2xl font-bold mb-4">Welcome to Our Application</h1>
                <p class="mb-6">Please log in or sign up to continue.</p>
                <div class="space-x-4">
                    <button x-data="{}" @click="$dispatch('open-login')" class="bg-blue-500 text-white px-4 py-2 rounded">
                        Login
                    </button>
                    <button x-data="{}" @click="$dispatch('open-register')" class="bg-green-500 text-white px-4 py-2 rounded">
                        Sign Up
                    </button>
                </div>
                <!-- Login Modal -->
                <livewire:auth.login />
                <!-- Register Modal -->
                <livewire:auth.signin />
            </div>
        @endguest

        @auth
            @yield('dashboard')
        @endauth
    </body> --}}
    <body class="bg-gray-950 text-white">

        <!-- Header Section -->
        <x-guest.header />

        <!-- Hero Section -->
        <x-guest.hero />

        @guest
            <!-- Our Values Section -->
            <x-guest.section1 />

            <!-- Key Features Section -->
            <x-guest.section2 />

            <!-- Main Content Block 1 -->
            <x-guest.content1 />

            <!-- Main Content Block 2 - Image on the left -->
            <x-guest.content2 />

            <!-- How It Works Section -->
            <x-guest.section3 />

            <!-- Testimonials Section -->
            <x-guest.section4 />

            <!-- Final CTA Section with form -->
            <x-guest.section5 />
        @endguest

        <x-guest.footer />

    </body>
</html>

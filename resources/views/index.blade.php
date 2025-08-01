<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <!-- Styles -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-white min-h-screen">
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
    </body>
</html>

{{-- @extends('index')

@section('dashboard')
<div class="min-h-screen flex bg-white">
    <!-- Sidebar -->
    <x-sidebar />

    <!-- Main Content Area -->
    <div class="flex-1 flex flex-col">
        <!-- Header -->
        <x-header />

        <!-- Main Content -->
        <main class="flex-1 p-6">
            <div class="container mx-auto py-4">
                <h2 class="text-2xl font-bold mb-4">@yield('title')</h2>
                @yield('content')
            </div>
        </main>

        <x-footer />
    </div>
</div>
@endsection --}}

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
            background-image: radial-gradient(circle at 100% 100%, rgba(255, 255, 255, .05) 1px, transparent 1px), radial-gradient(circle at 0% 0%, rgba(255, 255, 255, .05) 1px, transparent 1px);
            background-size: 15px 15px;
        }

        /* Custom styles for horizontal scrolling on mobile */
        @media (max-width: 767px) {
            .horizontal-scroll-container {
                overflow-x: auto;
                -webkit-overflow-scrolling: touch;
                scrollbar-width: none;
                /* Firefox */
                -ms-overflow-style: none;
                /* IE and Edge */
            }

            .horizontal-scroll-container::-webkit-scrollbar {
                display: none;
                /* Chrome, Safari, Opera */
            }

            .horizontal-scroll-container>div {
                min-width: 80%;
                /* Each card takes up 80% of the screen */
                flex-shrink: 0;
            }
        }
    </style>
    {{--
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" /> --}}
    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="min-h-screen flex bg-white">
        <!-- Sidebar -->
        <x-dashboard-sidebar />

        <!-- Main Content Area -->
        <div class="flex-1 flex flex-col">
            <!-- Header -->
            <x-dashboard-header />

            <!-- Main Content -->
            <main class="flex-1 p-6">
                <div class="container mx-auto py-4">
                    <h2 class="text-2xl font-bold mb-4">@yield('title')</h2>
                    @yield('content')
                </div>
            </main>

            <x-dashboard-footer />
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
</body>

</html>
@extends('index')

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
@endsection

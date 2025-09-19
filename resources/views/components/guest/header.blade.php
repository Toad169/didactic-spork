<div>
    <!-- An unexamined life is not worth living. - Socrates -->
    <header class="bg-gray-950 shadow-lg sticky top-0 z-50">
        <nav class="container mx-auto px-6 py-4 flex items-center justify-between">
            <div class="text-2xl font-bold text-white">
                <a href="#" class="rounded-lg p-2 hover:bg-gray-800 transition-colors">Logo</a>
            </div>
            @guest
                <div class="hidden md:flex items-center space-x-6">
                    <a href="#features" class="text-gray-400 hover:text-white transition duration-300">Features</a>
                    <a href="#how-it-works" class="text-gray-400 hover:text-white transition duration-300">How It Works</a>
                    <a href="#testimonials" class="text-gray-400 hover:text-white transition duration-300">Testimonials</a>
                </div>
            @endguest
            @auth
                <div class="hidden md:flex items-center space-x-6">
                    {{-- <a href="#features" class="text-gray-400 hover:text-white transition duration-300">Features</a>
                    <a href="#how-it-works" class="text-gray-400 hover:text-white transition duration-300">How It Works</a>
                    <a href="#testimonials" class="text-gray-400 hover:text-white transition duration-300">Testimonials</a>
                    --}}
                    <a href="{{ route('dashboard.home') }}"
                        class="bg-teal-600 text-white font-bold px-4 py-2 rounded-lg shadow-lg transition duration-300 transform hover:scale-105 hover:shadow-2xl">
                        Dashboard
                    </a>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit"
                            class="bg-red-600 text-white font-bold px-4 py-2 rounded-lg shadow-lg transition duration-300 transform hover:scale-105 hover:shadow-2xl">
                            Logout
                        </button>
                    </form>
                </div>
            @endauth
            <button class="md:hidden text-gray-400 focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7">
                    </path>
                </svg>
            </button>
        </nav>
    </header>
</div>
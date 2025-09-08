<div>
    <!-- Knowing is not enough; we must apply. Being willing is not enough; we must do. - Leonardo da Vinci -->
        <section class="py-60 md:py-86 bg-gray-950 relative overflow-hidden text-center">
            <div class="container mx-auto px-6 z-10 relative">
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold leading-tight tracking-wide">
                    Ethical Finance Solutions for the Modern World
                </h1>
                <p class="mt-4 text-xl text-gray-400 max-w-2xl mx-auto">
                    Manage your money in a way that aligns with your values. Our platform is built on transparency, integrity, and ethical principles.
                </p>
                <!-- Buttons are always side-by-side on all screen sizes -->
                @guest
                    <div class="mt-8 flex justify-center space-x-4">
                        <a x-data="{}" @click="$dispatch('open-login')" class="bg-teal-600 text-white font-bold px-8 py-4 rounded-lg shadow-lg transition duration-300 transform hover:scale-105 hover:shadow-2xl">
                            Login
                        </a>
                        <a x-data="{}" @click="$dispatch('open-register')" class="bg-gray-700 text-white font-bold px-8 py-4 rounded-lg shadow-lg transition duration-300 transform hover:scale-105 hover:bg-gray-600">
                            Signin
                        </a>
                    </div>
                    <!-- Login Modal -->
                    <livewire:auth.login />
                    <!-- Register Modal -->
                    <livewire:auth.signin />
                @endguest
                {{-- @auth
                    <div class="mt-8 flex justify-center space-x-4">
                        <a href="{{ route('dashboard') }}" class="bg-teal-600 text-white font-bold px-8 py-4 rounded-lg shadow-lg transition duration-300 transform hover:scale-105 hover:shadow-2xl">
                            Dashboard
                        </a>
                    </div>
                @endauth --}}
            </div>
            <div class="absolute inset-0 z-0 opacity-20 bg-pattern"></div>
        </section>
</div>

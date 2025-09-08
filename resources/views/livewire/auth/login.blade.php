<div
    x-data="{ show: false }"
    x-on:open-login.window="show = true"
    x-on:keydown.escape.window="show = false"
    x-show="show"
    class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-60"
    style="display: none;"
>
    <div class="bg-gray-900 p-8 rounded-xl shadow-2xl w-full max-w-md relative">
        <button type="button" @click="show = false" class="absolute top-4 right-4 text-gray-400 hover:text-white transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
        <h2 class="text-2xl font-bold mb-6 text-white text-center">Login</h2>
        @if (session()->has('error'))
            <p class="text-red-500 text-sm text-center mb-4">{{ session('error') }}</p>
        @endif
        <form wire:submit.prevent="login" class="space-y-4">
            @csrf
            <input wire:model.defer="email" type="email" placeholder="Email"
                class="w-full bg-gray-800 text-white border p-3 rounded-lg transition placeholder-gray-400 outline-none focus:ring-2 focus:border-green-500 focus:ring-green-600 @error('email') border-red-500 focus:border-red-500 focus:ring-red-600 @else border-gray-700 @enderror" />
            @error('email')
                <span class="text-red-500 text-xs">{{ $message }}</span>
            @enderror
            <input wire:model.defer="password" type="password" placeholder="Password"
                class="w-full bg-gray-800 text-white border p-3 rounded-lg transition placeholder-gray-400 outline-none focus:ring-2 focus:border-green-500 focus:ring-green-600 @error('password') border-red-500 focus:border-red-500 focus:ring-red-600 @else border-gray-700 @enderror" />
            @error('password')
                <span class="text-red-500 text-xs">{{ $message }}</span>
            @enderror
            <div class="flex justify-between items-center mt-6">
                <button type="button" @click="show = false"
                    class="bg-gray-700 hover:bg-gray-600 text-white px-5 py-2 rounded-lg transition font-medium">Cancel</button>
                <button type="submit"
                    class="bg-green-600 hover:bg-green-700 text-white px-5 py-2 rounded-lg transition font-semibold shadow">Login</button>
            </div>
        </form>
    </div>
</div>

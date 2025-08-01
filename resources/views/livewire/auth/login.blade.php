<div 
    x-data="{ show: false }"
    x-on:open-login.window="show = true"
    x-on:keydown.escape.window="show = false"
    x-show="show"
    class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-60"
    style="display: none;"
>
    <div class="bg-white p-6 rounded shadow w-96">
        <h2 class="text-xl font-semibold mb-4">Login</h2>
        @if (session()->has('error'))
            <p class="text-red-500 text-sm">{{ session('error') }}</p>
        @endif
        <form action="{{ route('login.post') }}" method="POST" wire:submit.prevent="login">
            <input wire:model.defer="email" type="email" placeholder="Email" class="w-full border p-2 mb-3 rounded">
            {{-- <input wire:model.defer="phone_number" type="text" placeholder="Phone Number" class="w-full border p-2 mb-3 rounded"> --}}
            
            <input wire:model.defer="password" type="password" placeholder="Password" class="w-full border p-2 mb-3 rounded">
            <div class="flex justify-between mt-4">
                <button type="button" @click="show = false" class="bg-gray-400 text-white px-4 py-2 rounded">Cancel</button>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Login</button>
            </div>
        </form>
    </div>
</div>

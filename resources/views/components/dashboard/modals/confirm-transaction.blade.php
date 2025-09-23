<div
    x-data="{ open: false, success: false }"
    class="flex items-center justify-center min-h-screen bg-gray-100 font-sans"
>
    <!-- Trigger Button -->
    <button
        @click="open = true"
        class="px-8 py-3 bg-indigo-600 text-white font-semibold rounded-full shadow-lg hover:bg-indigo-700 focus:outline-none focus:ring-4 focus:ring-indigo-500 focus:ring-opacity-50 transition duration-300"
    >
        Show Confirmation Modal
    </button>

    <!-- Confirmation Modal -->
    <div
        x-show="open"
        x-transition.opacity
        class="fixed inset-0 flex items-center justify-center p-4 bg-black bg-opacity-50 z-50"
    >
        <div
            x-show="open"
            x-transition.scale
            class="bg-white rounded-2xl shadow-2xl p-8 md:p-10 w-full max-w-sm text-center"
        >
            <h2 class="text-2xl font-bold text-gray-800 mb-4">Confirm Action</h2>
            <p class="text-gray-600 mb-6">Are you sure you want to proceed?</p>
            <div class="flex justify-center space-x-4">
                <button
                    @click="open = false"
                    class="w-1/2 px-6 py-3 border border-gray-300 text-gray-700 font-semibold rounded-full hover:bg-gray-100 transition duration-300"
                >
                    Cancel
                </button>
                <button
                    @click="open = false; success = true; setTimeout(() => success = false, 3000)"
                    class="w-1/2 px-6 py-3 bg-emerald-600 text-white font-semibold rounded-full hover:bg-emerald-700 transition duration-300"
                >
                    Confirm
                </button>
            </div>
        </div>
    </div>

    <!-- Success Message -->
    <div
        x-show="success" 
        x-transition.scale
        class="fixed inset-0 flex items-center justify-center p-4 z-50"
    >
        <div class="bg-emerald-500 text-white p-6 rounded-xl shadow-2xl">
            <p class="text-xl font-semibold text-center">Action Confirmed!</p>
        </div>
    </div>
</div>

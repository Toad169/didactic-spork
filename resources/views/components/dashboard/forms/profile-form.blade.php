<div class="bg-gray-100 flex items-center justify-center min-h-screen p-4 md:p-8 font-sans">
    <div class="w-full max-w-5xl bg-white rounded-2xl shadow-xl overflow-hidden md:flex">

        <!-- Sidebar Navigation -->
        <div class="w-full md:w-1/4 p-6 bg-gray-50 border-r border-gray-200" x-data="{ active: 'private' }">
            <h2 class="text-xl font-bold text-gray-800 mb-6">Settings</h2>
            <nav class="space-y-2">
                <button type="button"
                        @click="active = 'profile'"
                        :class="active === 'profile' ? 'bg-blue-600 text-white hover:bg-blue-700' : 'text-gray-700 hover:text-blue-600 hover:bg-gray-200'"
                        class="w-full text-left flex items-center p-3 rounded-lg text-sm font-semibold transition duration-200">
                    Profile & Details
                </button>
                <button type="button"
                        @click="active = 'private'"
                        :class="active === 'private' ? 'bg-blue-600 text-white hover:bg-blue-700' : 'text-gray-700 hover:text-blue-600 hover:bg-gray-200'"
                        class="w-full text-left flex items-center p-3 rounded-lg text-sm font-semibold transition duration-200">
                    Private Data
                </button>
                <button type="button"
                        @click="active = 'payment'"
                        :class="active === 'payment' ? 'bg-blue-600 text-white hover:bg-blue-700' : 'text-gray-700 hover:text-blue-600 hover:bg-gray-200'"
                        class="w-full text-left flex items-center p-3 rounded-lg text-sm font-semibold transition duration-200">
                    Payment Info
                </button>
            </nav>
        </div>

        <!-- Form Content -->
        <div class="w-full md:w-3/4 p-6 md:p-10" x-data="{ active: 'private', success: false }">
            <h1 class="text-2xl md:text-3xl font-extrabold text-gray-800 mb-2">My Account</h1>
            <p class="text-gray-500 mb-8">Manage your account information and payment methods.</p>

            <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data" @submit.prevent="success = true; setTimeout(() => success = false, 3000)">
                @csrf
                @method('PUT')

                <!-- Section: Private Data -->
                <div x-show="active === 'private'" class="space-y-6">
                    <h2 class="text-xl font-bold text-gray-700">Private Data</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <x-input name="fullName" label="Full Name" placeholder="Jane Doe" required />
                        <x-input type="email" name="email" label="Email Address" placeholder="jane.doe@example.com" required />
                        <x-input type="password" name="password" label="Password" placeholder="••••••••" required />
                        <x-input type="tel" name="phone" label="Phone Number" placeholder="(123) 456-7890" />
                    </div>
                </div>

                <!-- Section: Profile -->
                <div x-show="active === 'profile'" class="space-y-6">
                    <h2 class="text-xl font-bold text-gray-700">Profile & Other Details</h2>
                    <x-input type="file" name="profilePic" label="Profile Picture" />
                    <x-textarea name="bio" label="Bio" placeholder="Tell us about yourself..." />
                    <x-input name="address" label="Address" placeholder="123 Main St, Anytown" />
                    <x-input type="date" name="dob" label="Date of Birth" />
                </div>

                <!-- Section: Payment -->
                <div x-show="active === 'payment'" class="space-y-6">
                    <h2 class="text-xl font-bold text-gray-700">Payment Information</h2>
                    <x-input name="cardNumber" label="Card Number" placeholder="xxxx xxxx xxxx xxxx" />
                    <x-input name="expDate" label="Expiration Date" placeholder="MM/YY" />
                    <x-input name="cvv" label="CVV" placeholder="123" />
                    <x-input name="cardName" label="Name on Card" placeholder="Jane Doe" />
                </div>

                <!-- Save Button -->
                <div class="text-center md:text-right pt-4">
                    <x-button type="submit">Save Changes</x-button>
                </div>
            </form>

            <!-- Success Message -->
            <div x-show="success" class="fixed inset-0 flex items-center justify-center p-4">
                <div class="bg-green-500 text-white p-6 rounded-xl shadow-2xl">
                    <p class="text-xl font-semibold text-center">Profile updated successfully!</p>
                </div>
            </div>
        </div>
    </div>
</div>

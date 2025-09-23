<div class="flex justify-center items-start min-h-screen p-6 bg-gray-100">
    <div class="w-full max-w-lg bg-white p-8 md:p-10 rounded-2xl shadow-xl border border-gray-200">
        <h1 class="text-3xl md:text-4xl font-extrabold text-gray-800 text-center mb-2">Send Money</h1>
        <p class="text-center text-gray-500 mb-8">Enter the transaction details below.</p>

        <div x-data="{ success: false }">
            <form method="POST" action="{{ route('transactions.store') }}" class="space-y-8"
                  @submit.prevent="success = true; setTimeout(() => success = false, 3000)">
                @csrf

                <!-- Transaction Details -->
                <div class="space-y-6">
                    <h2 class="text-xl font-bold text-gray-700 pb-2 border-b border-gray-200">Transaction Details</h2>
                    <div class="grid grid-cols-1 gap-6">
                        <x-input name="recipient" label="Recipient Name" placeholder="Recipient's Name" required />
                        <div>
                            <label for="amount" class="block text-sm font-medium text-gray-700 mb-1">Amount</label>
                            <div class="relative">
                                <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400">$</span>
                                <input type="number" name="amount" id="amount" step="0.01"
                                       placeholder="0.00"
                                       class="w-full pl-8 pr-4 py-3 border border-gray-300 rounded-lg
                                              focus:outline-none focus:ring-2 focus:ring-emerald-500 transition duration-200"
                                       required>
                            </div>
                        </div>
                        <x-textarea name="description" label="Description (Optional)" placeholder="Add a note or description" rows="3" />
                    </div>
                </div>

                <!-- Payment Method -->
                <div class="space-y-6">
                    <h2 class="text-xl font-bold text-gray-700 pb-2 border-b border-gray-200">Payment Method</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <x-input name="cardNumber" label="Card Number" placeholder="xxxx xxxx xxxx xxxx" class="md:col-span-2" />
                        <x-input name="expDate" label="Expiration Date" placeholder="MM/YY" />
                        <x-input name="cvv" label="CVV" placeholder="123" />
                    </div>
                </div>

                <!-- Submit -->
                <div class="text-center pt-4">
                    <x-button type="submit" color="emerald">Send Payment</x-button>
                </div>
            </form>

            <!-- Success Message -->
            <div x-show="success" class="fixed inset-0 flex items-center justify-center p-4">
                <div class="bg-emerald-500 text-white p-6 rounded-xl shadow-2xl">
                    <p class="text-xl font-semibold text-center">Transaction successful!</p>
                </div>
            </div>
        </div>
    </div>
</div>

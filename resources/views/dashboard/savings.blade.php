@extends('dashboard')

@section('title', 'saving')

@section('content')
<div class="bg-white rounded-lg shadow-md overflow-hidden">
    <div class="px-6 py-4 border-b border-gray-200">
        <h2 class="text-xl font-semibold text-gray-900">Recent Transactions</h2>
        <p class="text-sm text-gray-600 mt-1">Complete list of your financial activities</p>
    </div>

  <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Category</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Account</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Amount</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <!-- Transaction rows will be populated here -->
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">2025-01-1</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Monthly Savings Deposit</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Savings</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Main Account</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-green-600">+$500.00</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                            Completed
                        </span>
                        <span class="px-2 inline-flex text-xs"></span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<!-- Savings Goals Section -->
<div class="mt-8 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    <div class="bg-white rounded-lg shadow-md p-6">
        <h3 class="text-lg font-semibold text-gray-900 mb-4">Emergency Fund</h3>
        <div class="mb-2">
            <div class="flex justify-between text-sm text-gray-600">
                <span>Progress</span>
                <span>75%</span>
            </div>
            <div class="w-full bg-gray-200 rounded-full h-2">
                <div class="bg-blue-600 h-2 rounded-full" style="width: 75%"></div>
            </div>
        </div>
        <p class="text-sm text-gray-500">$7,500 of $10,000 saved</p>
    </div>

    <div class="bg-white rounded-lg shadow-md p-6">
        <h3 class="text-lg font-semibold text-gray-900 mb-4">Vacation Fund</h3>
        <div class="mb-2">
            <div class="flex justify-between text-sm text-gray-600">
                <span>Progress</span>
                <span>45%</span>
            </div>
            <div class="w-full bg-gray-200 rounded-full h-2">
                <div class="bg-green-600 h-2 rounded-full" style="width: 45%"></div>
            </div>
        </div>
        <p class="text-sm text-gray-500">$2,250 of $5,000 saved</p>
    </div>

    <div class="bg-white rounded-lg shadow-md p-6">
        <h3 class="text-lg font-semibold text-gray-900 mb-4">New Car</h3>
        <div class="mb-2">
            <div class="flex justify-between text-sm text-gray-600">
                <span>Progress</span>
                <span>20%</span>
            </div>
            <div class="w-full bg-gray-200 rounded-full h-2">
                <div class="bg-purple-600 h-2 rounded-full" style="width: 20%"></div>
            </div>
        </div>
        <p class="text-sm text-gray-500">$4,000 of $20,000 saved</p>
    </div>
</div>

@endsection

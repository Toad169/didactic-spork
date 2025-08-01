@extends('dashboard')

@section('title', 'Report Details')

@section('content')

<div class="reports-show">
    <!-- You must be the change you wish to see in the world. - Mahatma Gandhi -->
    <div class="max-w-4xl mx-auto p-6 bg-white rounded-xl shadow-md">
        <h2 class="text-2xl font-semibold mb-4">Report Details</h2>

        <div class="mb-4">
            <label class="block font-medium text-gray-700">Report ID:</label>
            <p class="text-gray-900">{{ $report->id }}</p>
        </div>

        <div class="mb-4">
            <label class="block font-medium text-gray-700">Title:</label>
            <p class="text-gray-900">{{ $report->title ?? 'N/A' }}</p>
        </div>

        <div class="mb-4">
            <label class="block font-medium text-gray-700">Description:</label>
            <p class="text-gray-900">{{ $report->description ?? 'No description provided.' }}</p>
        </div>

        <div class="mb-4">
            <label class="block font-medium text-gray-700">Created At:</label>
            <p class="text-gray-900">{{ $report->created_at->format('F j, Y H:i') }}</p>
        </div>

        <div class="mb-4">
            <label class="block font-medium text-gray-700">Updated At:</label>
            <p class="text-gray-900">{{ $report->updated_at->format('F j, Y H:i') }}</p>
        </div>

        <a href="{{ route('reports') }}" class="inline-block mt-4 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
            Back to Reports
        </a>
    </div>
</div>
@endsection
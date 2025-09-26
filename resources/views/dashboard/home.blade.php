@extends('dashboard')

@section('title', 'Dashboard Home')

@section('content')
    {{-- <div class="bg-red-500 text-white p-4">
        Debug text: if you see this, Blade is working.
    </div> --}}
    <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-4">
        <x-dashboard.cards.card href="#">
            <x-slot name="title">
                Accounts
            </x-slot>
            Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.
        </x-dashboard.cards.card>
        <x-dashboard.cards.card href="#">
            <x-slot name="title">
                Transactions
            </x-slot>
            Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.
        </x-dashboard.cards.card>
        <x-dashboard.cards.card href="#">
            <x-slot name="title">
                Savings
            </x-slot>
            Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.
        </x-dashboard.cards.card>
        <x-dashboard.cards.card href="#">
            <x-slot name="title">
                Zakat
            </x-slot>
            Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.
        </x-dashboard.cards.card>
    </div>
@endsection


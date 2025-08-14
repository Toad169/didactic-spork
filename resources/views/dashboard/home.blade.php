@extends('dashboard')

@section('title', 'Dashboard')

@section('content')
{{-- <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
    <x-card title="Users" value="{{ $users->count() }}" />
    <x-card title="Balance" value="Rp {{ number_format($account->balance, 2) }}" />
    <x-card title="Goals" value="{{ $goals->count() }}" />
    <x-card title="Budgets" value="{{ $budgets->count() }}" />
</div>
<div class="grid grid-cols-2 md:grid-cols-4 gap-4">
    <x-card title="Reports" value="{{ $reports->count() }}" />
    <x-card title="Transfers" value="{{ $transfers->count() }}" />
    <x-card title="Transactions" value="{{ $transactions->count() }}" />
</div> --}}
@endsection

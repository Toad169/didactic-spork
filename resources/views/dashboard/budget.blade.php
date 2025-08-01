@extends('dashboard')

@section('title', 'Budgets')

@section('content')
<table class="table-auto w-full">
    <thead>
        <tr><th>Title</th><th>Total</th><th>Spent</th><th>Remaining</th></tr>
    </thead>
    <tbody>
        @foreach ($budgets as $budget)
        <tr>
            <td>{{ $budget->title }}</td>
            <td>Rp {{ number_format($budget->total_amount, 2) }}</td>
            <td>Rp {{ number_format($budget->spent_amount, 2) }}</td>
            <td>Rp {{ number_format($budget->total_amount - $budget->spent_amount, 2) }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection

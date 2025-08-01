@extends('dashboard')

@section('title', 'Transfers')

@section('content')
<table class="table-auto w-full">
    <thead><tr><th>To</th><th>Amount</th><th>Status</th><th>Time</th></tr></thead>
    <tbody>
        @foreach ($transfers as $transfer)
        <tr>
            <td>{{ $transfer->receiver->user->name }}</td>
            <td>Rp {{ number_format($transfer->amount, 2) }}</td>
            <td>{{ $transfer->status }}</td>
            <td>{{ $transfer->created_at }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection

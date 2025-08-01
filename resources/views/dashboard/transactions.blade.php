@extends('dashboard')

@section('title', 'Transaction History')

@section('content')
<table class="table-auto w-full">
    <thead><tr><th>Type</th><th>Amount</th><th>Status</th><th>Time</th></tr></thead>
    <tbody>
        @foreach ($transactions as $tx)
        <tr>
            <td>{{ ucfirst($tx->type) }}</td>
            <td>Rp {{ number_format($tx->amount, 2) }}</td>
            <td>{{ ucfirst($tx->status) }}</td>
            <td>{{ $tx->created_at }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection

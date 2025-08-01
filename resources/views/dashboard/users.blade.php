@extends('dashboard')

@section('title', 'All Users')

@section('content')
<table class="table-auto w-full">
    <thead><tr><th>Name</th><th>Email</th><th>Type</th></tr></thead>
    <tbody>
        @foreach ($users as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ ucfirst($user->account_type) }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
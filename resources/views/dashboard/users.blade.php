@extends('dashboard')

@section('title', 'All users')

@section('content')
<table>
    <thead>
        <tr>
            <th>Nama</th>
            <th>Email</th>
            <th>Jenis Akun</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
            <td>{{ $users->name }}</td>
            <td>{{ $users->email }}</td>
            <td>{{ ucfirst($users->account_type) }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

    


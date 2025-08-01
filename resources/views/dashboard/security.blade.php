@extends('dashboard')

@section('title', 'Security Settings')

@section('content')
<ul>
    <li>Email: {{ auth()->user()->email }}</li>
    <li>Password: ••••••••</li>
    <li><a href="{{ route('password.change') }}">Change Password</a></li>
</ul>
@endsection

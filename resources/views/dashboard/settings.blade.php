@extends('dashboard')

@section('title', 'User Settings')

@section('content')
<form method="POST" action="{{ route('settings.update') }}">
    @csrf
    @method('PUT')
    <input type="text" name="name" value="{{ auth()->user()->name }}">
    <button type="submit">Save</button>
</form>
<ul>
    <li>Email: {{ auth()->user()->email }}</li>
    <li>Password: ••••••••</li>
    <li><a href="{{ route('password.change') }}">Change Password</a></li>
</ul>
@endsection

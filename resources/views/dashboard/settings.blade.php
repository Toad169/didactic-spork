@extends('dashboard')

@section('title', 'User Settings')

@section('content')
<form method="POST" action="{{ route('settings.update') }}">
    @csrf
    @method('PUT')
    <input type="text" name="name" value="{{ auth()->user()->name }}">
    <button type="submit">Save</button>
</form>
@endsection

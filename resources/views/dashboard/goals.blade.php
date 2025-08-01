@extends('dashboard')

@section('title', 'Savings Goals')

@section('content')
<ul class="space-y-4">
    @foreach ($goals as $goal)
    <li>
        <strong>{{ $goal->name }}</strong> —
        {{ $goal->saved_amount }} / {{ $goal->target_amount }} ({{ $goal->priority }})
    </li>
    @endforeach
</ul>
@endsection

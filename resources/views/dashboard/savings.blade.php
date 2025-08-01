@extends('dashboard')

@section('title', 'Savings Plans')

@section('content')
<table class="table-auto w-full">
    <thead><tr><th>Title</th><th>Target</th><th>Progress</th></tr></thead>
    <tbody>
        @foreach ($savings as $save)
        <tr>
            <td>{{ $save->title }}</td>
            <td>{{ $save->target_amount }}</td>
            <td>{{ $save->current_amount }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection

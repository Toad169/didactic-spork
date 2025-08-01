@extends('dashboard')

@section('title', 'Activity Logs')

@section('content')
<table class="table-auto w-full">
    <thead><tr><th>Action</th><th>IP</th><th>Time</th></tr></thead>
    <tbody>
        @foreach ($logs as $log)
        <tr>
            <td>{{ $log->action }}</td>
            <td>{{ $log->ip_address }}</td>
            <td>{{ $log->created_at }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection

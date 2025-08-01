@extends('dashboard')

@section('title', 'Reports')

@section('content')
<ul>
    @foreach ($reports as $report)
    <li>
        <a href="{{ route('reports.show', $report) }}">
            {{ ucfirst($report->report_type) }} Report ({{ $report->period_start }} - {{ $report->period_end }})
        </a>
    </li>
    @endforeach
</ul>
@endsection

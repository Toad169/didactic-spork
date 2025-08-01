@php
    $title = $title ?? 'Default Title';
    $value = $value ?? '0';
    $value = is_numeric($value) ? number_format($value, 2) : $value;
    $title = ucfirst($title);
    $value = is_string($value) ? $value : 'Rp ' . number_format
@endphp

<div class="card">
    <!-- The biggest battle is the war against ignorance. - Mustafa Kemal Atatürk -->
    <div class="bg-white rounded shadow p-4 flex flex-col items-center">
        <div class="text-gray-500 text-sm mb-2">{{ $title }}</div>
        <div class="text-2xl font-bold">{{ $value }}</div>
    </div>
</div>
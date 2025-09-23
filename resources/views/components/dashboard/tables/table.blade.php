{{-- resources/views/components/table.blade.php --}}
@props([
    'headers' => [],   // array of column names
    'rows' => [],      // array of row data (array or object)
])

<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table {{ $attributes->merge(['class' => 'w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400']) }}>
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                @foreach ($headers as $header)
                    <th scope="col" class="px-6 py-3">
                        {{ $header }}
                    </th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @forelse ($rows as $row)
                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200">
                    @foreach ($row as $cell)
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $cell }}
                        </td>
                    @endforeach
                </tr>
            @empty
                <tr>
                    <td colspan="{{ count($headers) }}" class="px-6 py-4 text-center text-gray-500 dark:text-gray-400">
                        No data available
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

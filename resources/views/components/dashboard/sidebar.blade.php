<aside id="logo-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
    aria-label="Sidebar">
    <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
        <ul class="space-y-2 font-medium">
            @switch(Auth::user()->role)
                @case('admin')
                    <x-dashboard.sidebar.item href="{{ route('home') }}">
                        <x-slot name="icon">
                            {{-- You can pass in your own SVG icon --}}
                            <svg xmlns="http://www.w3.org/2000/svg" width="200" height="200" viewBox="0 0 24 24">
    <path fill="currentColor" d="M4 21V9l8-6l8 6v12h-6v-7h-4v7H4Z"/>
</svg>
                        </x-slot>
                        Dashboard
                    </x-dashboard.sidebar.item>

                    <x-dashboard.sidebar.item href="{{ route('user.index') }}">
                        <x-slot name="icon">
                            {{-- You can pass in your own SVG icon --}}
                            <svg xmlns="http://www.w3.org/2000/svg" width="200" height="200" viewBox="0 0 24 24">
    <path fill="currentColor" d="M14 7V5h8v2h-8Zm0 4V9h8v2h-8Zm0 4v-2h8v2h-8Zm-6-1q-1.25 0-2.125-.875T5 11q0-1.25.875-2.125T8 8q1.25 0 2.125.875T11 11q0 1.25-.875 2.125T8 14Zm-6 6v-1.9q0-.525.25-1t.7-.75q1.125-.675 2.388-1.012T8 15q1.4 0 2.663.338t2.387 1.012q.45.275.7.75t.25 1V20H2Z"/>
</svg>
                        </x-slot>
                        Users
                    </x-dashboard.sidebar.item>

                    <x-dashboard.sidebar.item href="{{ route('transaction.index') }}">
                        <x-slot name="icon">
                            {{-- You can pass in your own SVG icon --}}
                            <svg xmlns="http://www.w3.org/2000/svg" width="200" height="200" viewBox="0 0 24 24">
    <path fill="currentColor" d="M14 13q-1.25 0-2.125-.875T11 10q0-1.25.875-2.125T14 7q1.25 0 2.125.875T17 10q0 1.25-.875 2.125T14 13Zm-7 3q-.825 0-1.413-.588T5 14V6q0-.825.588-1.413T7 4h14q.825 0 1.413.588T23 6v8q0 .825-.588 1.413T21 16H7Zm2-2h10q0-.825.588-1.413T21 12V8q-.825 0-1.413-.588T19 6H9q0 .825-.588 1.413T7 8v4q.825 0 1.413.588T9 14Zm11 6H3q-.825 0-1.413-.588T1 18V7h2v11h17v2ZM7 14V6v8Z"/>
</svg>
                        </x-slot>
                        Transactions
                    </x-dashboard.sidebar.item>

                    <x-dashboard.sidebar.item href="{{ route('saving.index') }}">
                        <x-slot name="icon">
                            {{-- You can pass in your own SVG icon --}}
                            <svg xmlns="http://www.w3.org/2000/svg" width="200" height="200" viewBox="0 0 24 24">
    <path fill="currentColor" d="M16 11q.425 0 .713-.288T17 10q0-.425-.288-.713T16 9q-.425 0-.713.288T15 10q0 .425.288.713T16 11ZM8 9h5V7H8v2ZM4.5 21q-.85-2.85-1.675-5.688T2 9.5q0-2.3 1.6-3.9T7.5 4h5q.725-.95 1.763-1.475T16.5 2q.625 0 1.063.438T18 3.5q0 .15-.038.3t-.087.275q-.1.275-.188.563t-.137.587L19.825 7.5H22v6.975l-2.825.925L17.5 21H12v-2h-2v2H4.5ZM6 19h2v-2h6v2h2l1.55-5.15l2.45-.825V9.5h-1L15.5 6q0-.5.063-.963t.187-.937q-.725.2-1.275.688T13.675 6H7.5Q6.05 6 5.025 7.025T4 9.5q0 2.45.675 4.788T6 19Zm6-7.45Z"/>
</svg>
                        </x-slot>
                        Savings
                    </x-dashboard.sidebar.item>
                
                    @break

                @case('staff')
                <x-dashboard.sidebar.item href="{{ route('home') }}">
                    <x-slot name="icon">
                        {{-- You can pass in your own SVG icon --}}
                        <svg><!-- ... --></svg>
                    </x-slot>
                    Dashboard
                </x-dashboard.sidebar.item>

                <x-dashboard.sidebar.item href="{{ route('users.index') }}">
                    <x-slot name="icon">
                        {{-- You can pass in your own SVG icon --}}
                        <svg><!-- ... --></svg>
                    </x-slot>
                    Users
                </x-dashboard.sidebar.item>

                <x-dashboard.sidebar.item href="{{ route('transactions.index') }}">
                    <x-slot name="icon">
                        {{-- You can pass in your own SVG icon --}}
                        <svg><!-- ... --></svg>
                    </x-slot>
                    Transactions
                </x-dashboard.sidebar.item>

                <x-dashboard.sidebar.item href="{{ route('savings.index') }}">
                    <x-slot name="icon">
                        {{-- You can pass in your own SVG icon --}}
                        <svg><!-- ... --></svg>
                    </x-slot>
                    Savings
                </x-dashboard.sidebar.item>
                    @break

                @case('user')
                <x-dashboard.sidebar.item href="{{ route('home') }}">
                    <x-slot name="icon">
                        {{-- You can pass in your own SVG icon --}}
                        <svg><!-- ... --></svg>
                    </x-slot>
                    Dashboard
                </x-dashboard.sidebar.item>

                <x-dashboard.sidebar.item href="{{ route('users.index') }}">
                    <x-slot name="icon">
                        {{-- You can pass in your own SVG icon --}}
                        <svg><!-- ... --></svg>
                    </x-slot>
                    Users
                </x-dashboard.sidebar.item>

                <x-dashboard.sidebar.item href="{{ route('transactions.index') }}">
                    <x-slot name="icon">
                        {{-- You can pass in your own SVG icon --}}
                        <svg><!-- ... --></svg>
                    </x-slot>
                    Transactions
                </x-dashboard.sidebar.item>

                <x-dashboard.sidebar.item href="{{ route('savings.index') }}">
                    <x-slot name="icon">
                        {{-- You can pass in your own SVG icon --}}
                        <svg><!-- ... --></svg>
                    </x-slot>
                    Savings
                </x-dashboard.sidebar.item>
                    @break

                @default
                    <li class="text-gray-500">No menu available</li>
            @endswitch
        </ul>
    </div>
</aside>

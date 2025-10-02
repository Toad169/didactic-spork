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
                            <svg><!-- ... --></svg>
                        </x-slot>
                        Dashboard
                    </x-dashboard.sidebar.item>

                    <x-dashboard.sidebar.item href="{{ route('user.index') }}">
                        <x-slot name="icon">
                            {{-- You can pass in your own SVG icon --}}
                            <svg><!-- ... --></svg>
                        </x-slot>
                        Users
                    </x-dashboard.sidebar.item>

                    <x-dashboard.sidebar.item href="{{ route('transaction.index') }}">
                        <x-slot name="icon">
                            {{-- You can pass in your own SVG icon --}}
                            <svg><!-- ... --></svg>
                        </x-slot>
                        Transactions
                    </x-dashboard.sidebar.item>

                    <x-dashboard.sidebar.item href="{{ route('saving.index') }}">
                        <x-slot name="icon">
                            {{-- You can pass in your own SVG icon --}}
                            <svg><!-- ... --></svg>
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

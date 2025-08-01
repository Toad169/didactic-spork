<div class="header">
    <!-- Life is available only in the present moment. - Thich Nhat Hanh -->
    <header class="bg-white shadow-sm border-b">
        <div class="px-6 py-4">
            <div class="flex justify-between items-center">
                <div class="flex items-center space-x-4">
                    {{-- <h1 class="text-2xl font-bold text-gray-900">
                        @if(request()->routeIs('admin.dashboard'))
                            Dashboard
                        @elseif(request()->routeIs('admin.users'))
                            User Management
                        @elseif(request()->routeIs('admin.reports'))
                            Reports
                        @elseif(request()->routeIs('admin.stats'))
                            Stats
                        @elseif(request()->routeIs('admin.settings'))
                            Settings
                        @else
                            Admin Panel
                        @endif
                    </h1> --}}
                </div>
                <div class="flex items-center space-x-4">
                    <div class="flex items-center space-x-2">
                        <span class="text-sm text-gray-700">Welcome, {{ auth()->user()->name }}</span>
                        {{-- <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                            Admin
                        </span> --}}
                    </div>
                    {{-- <a href="{{ route('home') }}" class="text-gray-600 hover:text-gray-900 text-sm">
                        Back to Site
                    </a> --}}
                </div>
            </div>
        </div>
    </header>
</div>

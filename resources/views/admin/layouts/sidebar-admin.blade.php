<!-- Sidebar Navigation -->
<aside class="admin-sidebar fixed left-0 top-16 bottom-0 w-64 z-40 overflow-y-auto">
    <div class="p-6">
        <!-- Main Navigation -->
        <nav class="space-y-2">
            <div class="mb-6">
                <h3 class="text-xs font-bold text-gray-500 uppercase tracking-wider mb-3">Main</h3>
                <a href="#{{ url('/dashboard-admin') }}"
                    class="nav-item flex items-center px-4 py-3 text-sm rounded-lg">
                    <i class="fas fa-tachometer-alt w-5"></i>
                    <span class="ml-3">Dashboard</span>
                </a>
                <a href="{{ url('/management-user') }}" class="nav-item flex items-center px-4 py-3 text-sm rounded-lg">
                    <i class="fas fa-users w-5"></i>
                    <span class="ml-3">User Management</span>
                    <span class="ml-auto bg-blue-600 text-xs px-2 py-1 rounded-full">1.2K</span>
                </a>
                <a href="{{ url('/management-game') }}" class="nav-item flex items-center px-4 py-3 text-sm rounded-lg">
                    <i class="fas fa-gamepad w-5"></i>
                    <span class="ml-3">Game Management</span>
                    <span class="ml-auto bg-green-600 text-xs px-2 py-1 rounded-full">45</span>
                </a>
                <a href="{{ url('/management-asset') }}"
                    class="nav-item flex items-center px-4 py-3 text-sm rounded-lg">
                    <i class="fas fa-puzzle-piece w-5"></i>
                    <span class="ml-3">Assets Management</span>
                    <span class="ml-auto bg-green-600 text-xs px-2 py-1 rounded-full">45</span>
                </a>
            </div>
            <div class="mb-6">
                <h3 class="text-xs font-bold text-gray-500 uppercase tracking-wider mb-3">Content</h3>
                <a href="{{ url('/report') }}" class="nav-item flex items-center px-4 py-3 text-sm rounded-lg">
                    <i class="fas fa-flag w-5"></i>
                    <span class="ml-3">Laporan</span>
                    <span class="ml-auto bg-red-600 text-xs px-2 py-1 rounded-full">12</span>
                </a>
                <a href="{{ url('/analisis') }}" class="nav-item flex items-center px-4 py-3 text-sm rounded-lg">
                    <i class="fas fa-chart-line w-5"></i>
                    <span class="ml-3">Analytics</span>
                </a>
                <a href="{{ url('/management-uang') }}" class="nav-item flex items-center px-4 py-3 text-sm rounded-lg">
                    <i class="fas fa-money-bill-wave w-5"></i>
                    <span class="ml-3">Penarikan</span>
                    <span class="ml-auto bg-yellow-600 text-xs px-2 py-1 rounded-full">5</span>
                </a>
            </div>

            <div class="mb-6">
                </a>
            </div>
        </nav>

        <!-- System Status -->
        <div class="mt-8 p-4 bg-gray-900 rounded-lg border border-gray-800">
            <h4 class="text-sm font-bold text-white mb-2">System Status</h4>
            <div class="space-y-2">
                <div class="flex items-center justify-between text-xs">
                    <span class="text-gray-400">Server</span>
                    <span class="text-green-400">● Online</span>
                </div>
                <div class="flex items-center justify-between text-xs">
                    <span class="text-gray-400">Database</span>
                    <span class="text-green-400">● Healthy</span>
                </div>
                <div class="flex items-center justify-between text-xs">
                    <span class="text-gray-400">API</span>
                    <span class="text-yellow-400">● Slow</span>
                </div>
            </div>
        </div>
    </div>
</aside>
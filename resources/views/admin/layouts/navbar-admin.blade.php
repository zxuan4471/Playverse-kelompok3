    <!-- Top Navigation Bar -->
    <nav class="admin-topbar fixed top-0 left-0 right-0 z-50 h-16">
        <div class="flex items-center justify-between h-full px-6">
            <!-- Left Section - Logo & Title -->
            <div class="flex items-center space-x-4">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-gradient-to-r from-blue-600 to-purple-600 rounded-lg flex items-center justify-center">
                        <i class="fas fa-shield-alt text-white"></i>
                    </div>
                    <div>
                        <h1 class="text-lg font-bold text-white">GameHub Admin</h1>
                        <p class="text-xs text-gray-400">Control Panel</p>
                    </div>
                </div>
            </div>

            <!-- Center Section - Search -->
            <div class="flex-1 max-w-md mx-8">
                <div class="relative">
                    <input type="text" placeholder="Search users, games, reports..." 
                           class="search-box w-full pl-10 pr-4 py-2 rounded-lg outline-none">
                    <i class="fas fa-search absolute left-3 top-2.5 text-gray-400"></i>
                </div>
            </div>

            <!-- Right Section - Actions & Profile -->
            <div class="flex items-center space-x-4">
                <!-- Notifications -->
                <div class="relative">
                    <button class="p-2 rounded-lg bg-gray-800 hover:bg-gray-700 transition-colors">
                        <i class="fas fa-bell text-gray-400"></i>
                        <div class="notification-dot"></div>
                    </button>
                </div>

                <!-- Quick Actions -->
                <div class="relative">
                    <button class="p-2 rounded-lg bg-gray-800 hover:bg-gray-700 transition-colors">
                        <i class="fas fa-cog text-gray-400"></i>
                    </button>
                </div>

                <!-- Profile -->
                <div class="flex items-center space-x-3 pl-4 border-l border-gray-700">
                    <div class="text-right">
                        <p class="text-sm font-medium text-white">Admin User</p>
                        <p class="text-xs text-gray-400">Super Admin</p>
                    </div>
                    <div class="w-10 h-10 bg-gradient-to-r from-purple-500 to-blue-500 rounded-full flex items-center justify-center">
                        <span class="text-white font-bold text-sm">AU</span>
                    </div>
                </div>
            </div>
        </div>
    </nav>
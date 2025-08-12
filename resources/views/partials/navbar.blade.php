    <nav class="navbar-glass fixed top-0 left-0 right-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <div class="flex items-center">
                    <div class="flex-shrink-0 flex items-center">
                        <div class="w-10 h-10 bg-gradient-to-r from-blue-500 via-purple-500 to-cyan-500 rounded-lg flex items-center justify-center neon-glow">
                        </div>
                        <span class="ml-3 text-xl font-bold gradient-text">Playverse</span>
                    </div>
                </div>

                <!-- Desktop Navigation Links -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="{{ url('/') }}" class="text-white px-3 py-2 text-sm font-medium transition-colors border-b-2 border-blue-500">Home</a>
                    <a href="{{ url('/developer') }}" class="text-gray-300 hover:text-white px-3 py-2 text-sm font-medium transition-colors">Developer Mode</a>
                    <a href="#" class="text-gray-300 hover:text-white px-3 py-2 text-sm font-medium transition-colors">Community</a>
                </div>

                <!-- Search, Auth & Profile -->
                <div class="flex items-center space-x-4">
                    <!-- Enhanced Search -->
                    <div class="search-container">
                        <div class="search-icon">🔍</div>
                        <input type="text" 
                               class="search-input" 
                               placeholder="Cari game favorit kamu..."
                               id="searchInput">
                        <button class="search-clear" id="searchClear" style="display: none;">✕</button>
                    </div>

                    <!-- Profile -->
                    <div class="profile-container">
                        <div class="profile-btn">
                            <img src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?w=80&h=80&fit=crop&crop=face" 
                                 alt="Profile" 
                                 class="profile-img">
                        </div>
                        <div class="profile-dropdown">
                            <div class="mb-3 pb-3 border-b border-gray-600">
                                <div class="text-white font-semibold">John Doe</div>
                                <div class="text-gray-400 text-sm">john@example.com</div>
                            </div>
                            <a href="#" class="dropdown-item">
                                <span>👤</span>
                                <span>Profile</span>
                            </a>
                            <a href="#" class="dropdown-item">
                                <span>🎮</span>
                                <span>My Games</span>
                            </a>
                            <a href="#" class="dropdown-item">
                                <span>❤️</span>
                                <span>Favorites</span>
                            </a>
                            <a href="#" class="dropdown-item">
                                <span>⚙️</span>
                                <span>Settings</span>
                            </a>
                            <div class="border-t border-gray-600 mt-2 pt-2">
                                <a href="#" class="dropdown-item text-red-400">
                                    <span>🚪</span>
                                    <span>Logout</span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Mobile menu button -->
                    <button class="mobile-menu-btn md:hidden">
                        ☰
                    </button>
                </div>
            </div>
        </div>
    </nav>
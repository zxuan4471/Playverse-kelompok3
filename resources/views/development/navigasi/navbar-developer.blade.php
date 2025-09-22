    <!-- Main Navigation -->
    <nav class="glass-morphism fixed top-0 left-0 right-0 z-50 border-b border-blue-500/20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <!-- Logo -->
                <div class="flex items-center">
                    <div class="flex-shrink-0 flex items-center">
                        <div class="w-10 h-10 bg-gradient-to-r from-blue-500 via-purple-500 to-cyan-500 rounded-lg flex items-center justify-center neon-glow">
                            <span class="text-white font-bold text-lg">G</span>
                        </div>
                        <span class="ml-3 text-xl font-bold gradient-text">Playverse</span>
                    </div>
                </div>
                <!-- Navigation Links -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="{{ url('/') }}" class="text-gray-300 hover:text-white px-3 py-2 text-sm font-medium transition-colors">Home</a>
                    <a href="{{ url('/developer') }}" class="text-gray-300 hover:text-white px-3 py-2 text-sm font-medium transition-colors">Developer Mode</a>
                    <a href="{{ url('/pendaftaran-daveloper') }}" class="text-gray-300 hover:text-white px-3 py-2 text-sm font-medium transition-colors">Join as Developer</a>
                </div>
                <!-- User Actions -->
                <div class="flex items-center space-x-4">
                    <div class="relative">
                        <button class="bg-gray-800/50 border border-blue-500/30 rounded-lg px-3 py-2 text-sm text-white">
                            🔔 <span class="ml-1 bg-red-500 text-xs px-1.5 py-0.5 rounded-full">3</span>
                        </button>
                    </div>
                    <div class="flex items-center space-x-2">
                        <div class="w-8 h-8 bg-gradient-to-r from-purple-500 to-blue-500 rounded-full"></div>
                        <span class="text-sm font-medium">Developer</span>
                    </div>
                </div>
            </div>
        </div>
    </nav>
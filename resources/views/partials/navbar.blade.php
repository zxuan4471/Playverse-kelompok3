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
                    <a href="{{ url('/') }}" class="text-white px-3 py-2 text-sm font-medium transition-colors border-b-2 border-blue-500">Home</a>
                    <a href="{{ url('/developer-dashboard') }}" class="text-gray-300 hover:text-white px-3 py-2 text-sm font-medium transition-colors">Developer Mode</a>
                    <a href="{{ url('/pendaftaran-daveloper') }}" class="text-gray-300 hover:text-white px-3 py-2 text-sm font-medium transition-colors">Join as Developer</a>
                    <a href="#" class="text-gray-300 hover:text-white px-3 py-2 text-sm font-medium transition-colors">Community</a>
                </div>
                <!-- User Actions -->
            
<div class="flex items-center space-x-2">
    @guest
        <a href="{{ route('login') }}" class="text-gray-300 hover:text-white px-3 py-2 text-sm font-medium transition-colors">Login</a>
        <a href="{{ route('register') }}" class="btn-neon px-4 py-2 rounded-lg text-sm font-medium">Sign Up</a>
    @endguest

    @auth
        <span class="text-white px-3 py-2 text-sm font-medium">{{ Auth::user()->username }}</span>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn-neon px-4 py-2 rounded-lg text-sm font-medium">Logout</button>
        </form>
    @endauth
</div>


            </div>
        </div>
    </nav>
    
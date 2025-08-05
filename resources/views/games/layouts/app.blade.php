<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    {{-- SEO Meta Tags --}}
    <title>@yield('title', 'Playverse - Discover Amazing Indie Games')</title>
    <meta name="description" content="@yield('description', 'Explore the best indie games from itch.io. Play directly in your browser without downloads. Discover adventure, action, puzzle games and more!')">
    <meta name="keywords" content="@yield('keywords', 'indie games, browser games, itch.io, free games, online games, game discovery')">
    
    {{-- Open Graph Tags --}}
    <meta property="og:title" content="@yield('og_title', 'Playverse - Discover Amazing Indie Games')">
    <meta property="og:description" content="@yield('og_description', 'Explore the best indie games from itch.io. Play directly in your browser!')">
    <meta property="og:image" content="@yield('og_image', asset('images/og-image.jpg'))">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">
    
    {{-- Twitter Card --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('twitter_title', 'Playverse - Discover Amazing Indie Games')">
    <meta name="twitter:description" content="@yield('twitter_description', 'Explore the best indie games from itch.io')">
    <meta name="twitter:image" content="@yield('twitter_image', asset('images/og-image.jpg'))">
    
    {{-- Canonical URL --}}
    <link rel="canonical" href="{{ url()->current() }}">
    
    {{-- Favicon --}}
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/apple-touch-icon.png') }}">
    
    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    {{-- Styles --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    @stack('styles')
    
    {{-- Base Styles --}}
    <style>
        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-track {
            background: rgba(15, 15, 35, 0.5);
        }
        ::-webkit-scrollbar-thumb {
            background: rgba(59, 130, 246, 0.5);
            border-radius: 4px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: rgba(59, 130, 246, 0.7);
        }
        
        /* Line clamp utility */
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        
        /* Smooth scrolling */
        html {
            scroll-behavior: smooth;
        }
        
        /* Loading states */
        .loading {
            opacity: 0.6;
            pointer-events: none;
        }
    </style>
    
    {{-- Analytics --}}
    @if(config('services.google_analytics.id'))
    <!-- Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id={{ config('services.google_analytics.id') }}"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', '{{ config('services.google_analytics.id') }}');
    </script>
    @endif
</head>

<body class="text-white min-h-screen antialiased">
    {{-- Navigation --}}
    <nav class="glass-morphism fixed top-0 left-0 right-0 z-50 border-b border-blue-500/20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                {{-- Logo --}}
                <div class="flex items-center">
                    <div class="flex-shrink-0 flex items-center">
                        <a href="{{ route('search.index') }}" class="flex items-center">
                            <div class="w-10 h-10 bg-gradient-to-r from-blue-500 via-purple-500 to-cyan-500 rounded-lg flex items-center justify-center neon-glow">
                                <span class="text-white font-bold text-lg">P</span>
                            </div>
                            <span class="ml-3 text-xl font-bold gradient-text">Playverse</span>
                        </a>
                    </div>
                </div>

                {{-- Navigation Links --}}
                <div class="hidden md:flex items-center space-x-8">
                    <a href="{{ route('search.index') }}" 
                       class="text-gray-300 hover:text-white px-3 py-2 text-sm font-medium transition-colors {{ request()->routeIs('search.index') ? 'text-white' : '' }}">
                        Home
                    </a>
                    <a href="{{ route('games.featured') }}" 
                       class="text-gray-300 hover:text-white px-3 py-2 text-sm font-medium transition-colors {{ request()->routeIs('games.featured') ? 'text-white' : '' }}">
                        Featured
                    </a>
                    <a href="{{ route('games.category', 'action') }}" 
                       class="text-gray-300 hover:text-white px-3 py-2 text-sm font-medium transition-colors">
                        Categories
                    </a>
                    <a href="{{ route('games.random') }}" 
                       class="text-gray-300 hover:text-white px-3 py-2 text-sm font-medium transition-colors">
                        Random
                    </a>
                </div>

                {{-- Search and Auth --}}
                <div class="flex items-center space-x-4">
                    {{-- Quick Search --}}
                    <div class="relative hidden lg:block">
                        <form action="{{ route('search.index') }}" method="GET" id="quick-search-form">
                            <input type="text" 
                                   name="q"
                                   placeholder="Quick search..." 
                                   class="bg-gray-800/50 border border-blue-500/30 rounded-lg px-4 py-2 pl-10 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 text-white placeholder-gray-400 w-64"
                                   value="{{ request('q') }}">
                            <div class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400">🔍</div>
                        </form>
                    </div>
                    
                    {{-- User Menu --}}
                    @auth
                        <div class="relative" x-data="{ open: false }">
                            <button @click="open = !open" 
                                    class="flex items-center space-x-2 text-gray-300 hover:text-white">
                                <img src="{{ auth()->user()->avatar ?? 'https://ui-avatars.com/api/?name=' . urlencode(auth()->user()->name) }}" 
                                     alt="{{ auth()->user()->name }}" 
                                     class="w-8 h-8 rounded-full">
                                <span class="hidden md:block">{{ auth()->user()->name }}</span>
                            </button>
                            
                            <div x-show="open" 
                                 @click.away="open = false"
                                 class="absolute right-0 mt-2 w-48 glass-morphism rounded-lg shadow-lg py-2 z-50">
                                <a href="{{ route('profile.index') }}" 
                                   class="block px-4 py-2 text-sm text-gray-300 hover:text-white hover:bg-blue-500/20">
                                    👤 Profile
                                </a>
                                <a href="{{ route('profile.favorites') }}" 
                                   class="block px-4 py-2 text-sm text-gray-300 hover:text-white hover:bg-blue-500/20">
                                    ❤️ Favorites
                                </a>
                                <hr class="border-gray-600 my-2">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" 
                                            class="w-full text-left px-4 py-2 text-sm text-gray-300 hover:text-white hover:bg-red-500/20">
                                        🚪 Logout
                                    </button>
                                </form>
                            </div>
                        </div>
                    @else
                        <a href="{{ route('login') }}" 
                           class="text-gray-300 hover:text-white px-3 py-2 text-sm font-medium transition-colors">
                            Login
                        </a>
                        <a href="{{ route('register') }}" 
                           class="btn-neon px-4 py-2 rounded-lg text-sm font-medium text-white">
                            Register
                        </a>
                    @endauth
                    
                    {{-- Mobile Menu Button --}}
                    <button class="md:hidden text-gray-300 hover:text-white" 
                            onclick="toggleMobileMenu()">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        
        {{-- Mobile Menu --}}
        <div id="mobile-menu" class="hidden md:hidden glass-morphism border-t border-gray-700">
            <div class="px-2 pt-2 pb-3 space-y-1">
                <a href="{{ route('search.index') }}" 
                   class="block px-3 py-2 text-base font-medium text-gray-300 hover:text-white">
                    Home
                </a>
                <a href="{{ route('games.featured') }}" 
                   class="block px-3 py-2 text-base font-medium text-gray-300 hover:text-white">
                    Featured
                </a>
                <div class="px-3 py-2">
                    <form action="{{ route('search.index') }}" method="GET">
                        <input type="text" 
                               name="q"
                               placeholder="Search games..." 
                               class="w-full bg-gray-800/50 border border-blue-500/30 rounded-lg px-3 py-2 text-sm text-white placeholder-gray-400">
                    </form>
                </div>
            </div>
        </div>
    </nav>

    {{-- Main Content --}}
    <main>
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer class="mt-16 bg-gray-900/50 backdrop-blur-sm border-t border-gray-700">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                {{-- Logo and Description --}}
                <div class="md:col-span-2">
                    <div class="flex items-center mb-4">
                        <div class="w-8 h-8 bg-gradient-to-r from-blue-500 via-purple-500 to-cyan-500 rounded-lg flex items-center justify-center">
                            <span class="text-white font-bold">P</span>
                        </div>
                        <span class="ml-2 text-lg font-bold gradient-text">Playverse</span>
                    </div>
                    <p class="text-gray-400 mb-4">
                        Discover and play amazing indie games from itch.io. No downloads required - play directly in your browser!
                    </p>
                    <div class="flex space-x-4">
                        <a href="https://twitter.com/playverse" 
                           class="text-gray-400 hover:text-blue-400 transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                            </svg>
                        </a>
                        <a href="https://github.com/playverse" 
                           class="text-gray-400 hover:text-purple-400 transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
                            </svg>
                        </a>
                        <a href="https://discord.gg/playverse" 
                           class="text-gray-400 hover:text-indigo-400 transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M20.317 4.3698a19.7913 19.7913 0 00-4.8851-1.5152.0741.0741 0 00-.0785.0371c-.211.3753-.4447.8648-.6083 1.2495-1.8447-.2762-3.68-.2762-5.4868 0-.1636-.3933-.4058-.8742-.6177-1.2495a.077.077 0 00-.0785-.037 19.7363 19.7363 0 00-4.8852 1.515.0699.0699 0 00-.0321.0277C.5334 9.0458-.319 13.5799.0992 18.0578a.0824.0824 0 00.0312.0561c2.0528 1.5076 4.0413 2.4228 5.9929 3.0294a.0777.0777 0 00.0842-.0276c.4616-.6304.8731-1.2952 1.226-1.9942a.076.076 0 00-.0416-.1057c-.6528-.2476-1.2743-.5495-1.8722-.8923a.077.077 0 01-.0076-.1277c.1258-.0943.2517-.1923.3718-.2914a.0743.0743 0 01.0776-.0105c3.9278 1.7933 8.18 1.7933 12.0614 0a.0739.0739 0 01.0785.0095c.1202.099.246.1981.3728.2924a.077.077 0 01-.0066.1276 12.2986 12.2986 0 01-1.873.8914.0766.0766 0 00-.0407.1067c.3604.698.7719 1.3628 1.225 1.9932a.076.076 0 00.0842.0286c1.961-.6067 3.9495-1.5219 6.0023-3.0294a.077.077 0 00.0313-.0552c.5004-5.177-.8382-9.6739-3.5485-13.6604a.061.061 0 00-.0312-.0286zM8.02 15.3312c-1.1825 0-2.1569-1.0857-2.1569-2.419 0-1.3332.9555-2.4189 2.157-2.4189 1.2108 0 2.1757 1.0952 2.1568 2.419-.0002 1.3332-.9555 2.4189-2.1569 2.4189zm7.9748 0c-1.1825 0-2.1569-1.0857-2.1569-2.419 0-1.3332.9554-2.4189 2.1569-2.4189 1.2108 0 2.1757 1.0952 2.1568 2.419 0 1.3332-.9554 2.4189-2.1568 2.4189Z"/>
                            </svg>
                        </a>
                    </div>
                </div>
                
                {{-- Quick Links --}}
                <div>
                    <h3 class="text-white font-semibold mb-4">Quick Links</h3>
                    <ul class="space-y-2">
                        <li><a href="{{ route('search.index') }}" class="text-gray-400 hover:text-white transition-colors">Browse Games</a></li>
                        <li><a href="{{ route('games.featured') }}" class="text-gray-400 hover:text-white transition-colors">Featured</a></li>
                        <li><a href="{{ route('games.random') }}" class="text-gray-400 hover:text-white transition-colors">Random Game</a></li>
                        <li><a href="{{ route('search.advanced') }}" class="text-gray-400 hover:text-white transition-colors">Advanced Search</a></li>
                    </ul>
                </div>
                
                {{-- Categories --}}
                <div>
                    <h3 class="text-white font-semibold mb-4">Categories</h3>
                    <ul class="space-y-2">
                        <li><a href="{{ route('games.category', 'action') }}" class="text-gray-400 hover:text-white transition-colors">Action</a></li>
                        <li><a href="{{ route('games.category', 'adventure') }}" class="text-gray-400 hover:text-white transition-colors">Adventure</a></li>
                        <li><a href="{{ route('games.category', 'puzzle') }}" class="text-gray-400 hover:text-white transition-colors">Puzzle</a></li>
                        <li><a href="{{ route('games.category', 'rpg') }}" class="text-gray-400 hover:text-white transition-colors">RPG</a></li>
                    </ul>
                </div>
            </div>
            
            {{-- Bottom Footer --}}
            <div class="mt-8 pt-8 border-t border-gray-700 flex flex-col md:flex-row justify-between items-center">
                <p class="text-gray-400 text-sm">
                    © {{ date('Y') }} Playverse. All rights reserved. Made with ❤️ for indie game lovers.
                </p>
                <div class="flex space-x-6 mt-4 md:mt-0">
                    <a href="/privacy" class="text-gray-400 hover:text-white text-sm transition-colors">Privacy Policy</a>
                    <a href="/terms" class="text-gray-400 hover:text-white text-sm transition-colors">Terms of Service</a>
                    <a href="/contact" class="text-gray-400 hover:text-white text-sm transition-colors">Contact</a>
                </div>
            </div>
        </div>
    </footer>

    {{-- Scripts --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.10.2/cdn.min.js" defer></script>
    @stack('scripts')
    
    {{-- Base JavaScript --}}
    <script>
        // Mobile menu toggle
        function toggleMobileMenu() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        }
        
        // Close mobile menu when clicking outside
        document.addEventListener('click', function(event) {
            const menu = document.getElementById('mobile-menu');
            const button = event.target.closest('button');
            
            if (!menu.contains(event.target) && !button?.onclick?.toString().includes('toggleMobileMenu')) {
                menu.classList.add('hidden');
            }
        });
        
        // Keyboard shortcuts
        document.addEventListener('keydown', function(e) {
            // Ctrl/Cmd + K to focus search
            if ((e.ctrlKey || e.metaKey) && e.key === 'k') {
                e.preventDefault();
                const searchInput = document.querySelector('input[name="q"]');
                if (searchInput) {
                    searchInput.focus();
                    searchInput.select();
                }
            }
            
            // Escape to close modals/menus
            if (e.key === 'Escape') {
                // Close mobile menu
                document.getElementById('mobile-menu').classList.add('hidden');
                
                // Close any open dropdowns (Alpine.js will handle this)
                document.dispatchEvent(new CustomEvent('keydown-escape'));
            }
        });
        
        // Smooth loading states
        function showLoading(element) {
            if (element) {
                element.classList.add('loading');
            }
        }
        
        function hideLoading(element) {
            if (element) {
                element.classList.remove('loading');
            }
        }
        
        // Progressive enhancement for forms
        document.addEventListener('DOMContentLoaded', function() {
            // Auto-submit search forms on input (with debounce)
            const searchInputs = document.querySelectorAll('input[name="q"]');
            searchInputs.forEach(input => {
                let timeout;
                input.addEventListener('input', function() {
                    clearTimeout(timeout);
                    timeout = setTimeout(() => {
                        if (this.value.length >= 2 || this.value.length === 0) {
                            // Only auto-submit if we're on the search page
                            if (window.location.pathname.includes('/search')) {
                                this.form.submit();
                            }
                        }
                    }, 500);
                });
            });
            
            // Add loading states to buttons
            const buttons = document.querySelectorAll('button[type="submit"], .btn-submit');
            buttons.forEach(button => {
                button.addEventListener('click', function() {
                    showLoading(this);
                    setTimeout(() => hideLoading(this), 3000); // Fallback
                });
            });
        });
        
        // Error handling for images
        document.addEventListener('error', function(e) {
            if (e.target.tagName === 'IMG') {
                e.target.src = 'https://via.placeholder.com/400x300/374151/ffffff?text=Image+Not+Found';
                e.target.classList.add('opacity-75');
            }
        }, true);
        
        // Lazy loading enhancement
        if ('IntersectionObserver' in window) {
            const imageObserver = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const img = entry.target;
                        if (img.dataset.src) {
                            img.src = img.dataset.src;
                            img.classList.remove('opacity-0');
                            img.classList.add('opacity-100');
                            observer.unobserve(img);
                        }
                    }
                });
            });
            
            document.querySelectorAll('img[data-src]').forEach(img => {
                imageObserver.observe(img);
            });
        }
    </script>
    
    {{-- Service Worker for PWA (optional) --}}
    @if(config('app.env') === 'production')
    <script>
        if ('serviceWorker' in navigator) {
            window.addEventListener('load', function() {
                navigator.serviceWorker.register('/sw.js')
                    .then(function(registration) {
                        console.log('SW registered: ', registration);
                    })
                    .catch(function(registrationError) {
                        console.log('SW registration failed: ', registrationError);
                    });
            });
        }
    </script>
    @endif
</body>
</html>
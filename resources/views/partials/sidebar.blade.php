    <!-- Laravel-style Container -->
    <div class="pt-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex gap-8">
                <!-- Sidebar -->
                <aside class="w-64 sidebar-glass rounded-2xl p-6 h-fit sticky top-0 self-start">
                    <h2 class="text-lg font-bold gradient-text mb-6">Kategori Game</h2>
                    
                    <nav class="space-y-2">
                        <a href="{{ url('/') }}" class="sidebar-item block px-4 py-3 text-sm text-gray-300 hover:text-white rounded-lg transition-all">
                            Home
                        </a>
                        <a href="{{ url('/all_game') }}" class="sidebar-item block px-4 py-3 text-sm text-gray-300 hover:text-white rounded-lg transition-all" data-category="all">
                            Semua Game
                        </a>
                        <a href="{{ url('/assets') }}" class="sidebar-item block px-4 py-3 text-sm text-gray-300 hover:text-white rounded-lg transition-all">
                             Assets
                        </a>
                        <div class="px-4 py-2 text-sm text-gray-300" x-data="{ open: false }">
    <!-- Judul Genre bisa diklik untuk toggle -->
    <button @click="open = !open" class="flex items-center w-full text-left text-gray-300 hover:text-white">
        <svg class="w-4 h-4 mr-2 transform" :class="{ 'rotate-90': open }" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M6 4l6 6-6 6" clip-rule="evenodd" />
        </svg>
        Genre
    </button>

    <!-- Daftar Genre -->
    <div x-show="open" x-transition class="mt-2 ml-4 space-y-2">
        @php
            $genres = ['Action', 'Adventure', 'Card Game', 'Educational', 'Fighting', 'Interactive Fiction', 'Platformer', 'Puzzle', 'Racing', 'Rhythm'];
        @endphp

        @foreach ($genres as $genre)
            <a href="#" class="flex items-center text-gray-400 hover:text-white transition">
                <svg class="w-4 h-4 mr-2 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M2 10a8 8 0 1116 0 8 8 0 01-16 0zm9-4H9v4h2V6zm0 6H9v2h2v-2z" />
                </svg>
                {{ $genre }}
            </a>
        @endforeach
    </div>
</div>
                        <div class="px-4 py-2 text-sm text-gray-300" x-data="{ open: false }">
    <!-- Judul Genre bisa diklik untuk toggle -->
    <button @click="open = !open" class="flex items-center w-full text-left text-gray-300 hover:text-white">
        <svg class="w-4 h-4 mr-2 transform" :class="{ 'rotate-90': open }" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M6 4l6 6-6 6" clip-rule="evenodd" />
        </svg>
        Genre
    </button>

    <!-- Daftar Genre -->
    <div x-show="open" x-transition class="mt-2 ml-4 space-y-2">
        @php
            $genres = ['Action', 'Adventure', 'Card Game', 'Educational', 'Fighting', 'Interactive Fiction', 'Platformer', 'Puzzle', 'Racing', 'Rhythm'];
        @endphp

        @foreach ($genres as $genre)
            <a href="#" class="flex items-center text-gray-400 hover:text-white transition">
                <svg class="w-4 h-4 mr-2 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M2 10a8 8 0 1116 0 8 8 0 01-16 0zm9-4H9v4h2V6zm0 6H9v2h2v-2z" />
                </svg>
                {{ $genre }}
            </a>
        @endforeach
    </div>
</div>
                        <div class="relative group">
                    </nav>
                    <!-- Featured Game -->
                    <div class="mt-8 p-4 bg-gradient-to-br from-purple-600/20 to-blue-600/20 rounded-xl border border-purple-500/30">
                        <h3 class="text-sm font-bold text-white mb-2">🏆 Game of the Day</h3>
                        <p class="text-xs text-gray-300 mb-3">A Mind-Bending Puzzle Adventure</p>
                        <button class="w-full bg-purple-600 hover:bg-purple-700 text-white py-2 px-3 rounded-lg text-xs font-medium transition-colors">
                            Play Now
                        </button>
                    </div>
                </aside>

                <!-- Tambahkan di atas halaman kamu jika belum -->
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
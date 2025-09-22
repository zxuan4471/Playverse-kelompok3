<!-- Laravel-style Container -->
<div class="pt-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex gap-8">
            <!-- Sidebar -->
            <aside class="w-64 sidebar-glass rounded-2xl p-6 sticky top-0 self-start h-screen overflow-y-auto">
                <h2 class="text-lg font-bold gradient-text mb-6">Kategori Game</h2>

                <nav class="space-y-2">
                    <a href="{{ url('/') }}"
                        class="sidebar-item block px-4 py-3 text-sm text-gray-300 hover:text-white rounded-lg transition-all">
                        Home
                    </a>
                    <a href="{{ url('/all_game') }}"
                        class="sidebar-item block px-4 py-3 text-sm text-gray-300 hover:text-white rounded-lg transition-all"
                        data-category="all">
                        Semua Game
                    </a>
                    <a href="{{ url('/assets') }}"
                        class="sidebar-item block px-4 py-3 text-sm text-gray-300 hover:text-white rounded-lg transition-all">
                        Assets
                    </a>
                    <div class="px-4 py-2 text-sm text-gray-300" x-data="{ open: false }">

                        <!-- Daftar Genre -->
                        
                </nav>
                <!-- Featured Game -->

            </aside>

            <!-- Tambahkan di atas halaman kamu jika belum -->
            <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
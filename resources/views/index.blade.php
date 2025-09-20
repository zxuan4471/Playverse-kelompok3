<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GameHub - Koleksi Game Itch.io Terbaik</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="text-white min-h-screen">
@include('partials.navbar')
@include('partials.sidebar')
    
                <!-- Main Content -->
                <main class="flex-1">
                    <!-- Breadcrumb -->
                    <div class="breadcrumb">
                    </div>

                    <!-- Hero Section -->
                    <section class="bg-gradient-to-r from-purple-600 via-blue-500 to-cyan-500 rounded-2xl p-8 mb-8 neon-glow">
                        <div class="max-w-2xl">
                            <h1 class="text-4xl font-bold mb-4">Discover Amazing Indie Games</h1>
                            <p class="text-lg text-blue-100 mb-6">Jelajahi koleksi game indie terbaik dari game kita Mainkan langsung di browser tanpa perlu download!</p>
                        </div>
                    </section>

                    <!-- Filter Bar -->
                    <div class="flex flex-wrap items-center gap-4 mb-8 p-4 glass-morphism rounded-xl">
                        <span class="text-sm font-medium text-gray-300">Filter:</span>
                        <button class="category-badge active" data-filter="all">All</button>
                        <button class="category-badge" data-filter="free">Free</button>
                        <button class="category-badge" data-filter="paid">Paid</button>
                        <button class="category-badge" data-filter="new">New</button>
                        <button class="category-badge" data-filter="popular">Popular</button>
                    </div>

                    <!-- Games Grid -->
                    <div id="games-container" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                        <!-- Game Card 1 -->
                        <div class="game-card rounded-xl overflow-hidden" data-category="adventure" data-price="free">
                            <div class="relative">
                                <img src="https://via.placeholder.com/300x200/4338ca/ffffff?text=Forest+Game" alt="Mystical Forest Adventure" class="game-thumbnail">
                                <div class="absolute top-3 right-3">
                                    <span class="category-badge">Adventure</span>
                                </div>
                                <div class="absolute bottom-3 left-3">
                                    <span class="text-green-400 font-bold text-sm bg-black/50 px-2 py-1 rounded">Free</span>
                                </div>
                            </div>
                            <div class="p-4">
                                <h3 class="font-bold text-white mb-2 text-lg">Mystical Forest Adventure</h3>
                                <p class="text-gray-400 text-sm mb-3 line-clamp-2">Explore a magical forest filled with secrets and creatures. A beautiful point-and-click adventure game.</p>
                                <div class="flex items-center justify-between mb-3">
                                    <div class="flex items-center space-x-1">
                                        <span class="text-yellow-400">⭐⭐⭐⭐⭐</span>
                                        <span class="text-yellow-400 font-bold">4.8</span>
                                    </div>
                                    <span class="text-gray-500 text-xs">by PixelCraft Studios</span>
                                </div>
                                <div class="flex space-x-2">
                                    <a href="{{ url('/game') }}">
                                    <button class="flex-1 btn-neon text-white py-2 px-4 rounded-lg font-semibold text-sm">
                                         Play
                                    </button>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Game Card 2 -->
                        <div class="game-card rounded-xl overflow-hidden" data-category="action" data-price="paid">
                            <div class="relative">
                                <img src="https://via.placeholder.com/300x200/7c3aed/ffffff?text=Neon+Runner" alt="Neon Runner 2077" class="game-thumbnail">
                                <div class="absolute top-3 right-3">
                                    <span class="category-badge">Action</span>
                                </div>
                                <div class="absolute bottom-3 left-3">
                                    <span class="text-yellow-400 font-bold text-sm bg-black/50 px-2 py-1 rounded">$4.99</span>
                                </div>
                            </div>
                            <div class="p-4">
                                <h3 class="font-bold text-white mb-2 text-lg">Neon Runner 2077</h3>
                                <p class="text-gray-400 text-sm mb-3 line-clamp-2">Fast-paced cyberpunk platformer with stunning neon aesthetics and electronic soundtrack.</p>
                                <div class="flex items-center justify-between mb-3">
                                    <div class="flex items-center space-x-1">
                                        <span class="text-yellow-400">⭐⭐⭐⭐⭐</span>
                                        <span class="text-yellow-400 font-bold">4.6</span>
                                    </div>
                                    <span class="text-gray-500 text-xs">by NeonDev</span>
                                </div>
                                <div class="flex space-x-2">
                                    <a href="{{ url('/game') }}">
                                    <button class="flex-1 btn-neon text-white py-2 px-4 rounded-lg font-semibold text-sm">
                                         Play
                                    </button>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Game Card 3 -->
                        <div class="game-card rounded-xl overflow-hidden" data-category="action" data-price="paid">
                            <div class="relative">
                                <img src="https://via.placeholder.com/300x200/7c3aed/ffffff?text=Neon+Runner" alt="Neon Runner 2077" class="game-thumbnail">
                                <div class="absolute top-3 right-3">
                                    <span class="category-badge">Action</span>
                                </div>
                                <div class="absolute bottom-3 left-3">
                                    <span class="text-yellow-400 font-bold text-sm bg-black/50 px-2 py-1 rounded">$4.99</span>
                                </div>
                            </div>
                            <div class="p-4">
                                <h3 class="font-bold text-white mb-2 text-lg">Neon Runner 2077</h3>
                                <p class="text-gray-400 text-sm mb-3 line-clamp-2">Fast-paced cyberpunk platformer with stunning neon aesthetics and electronic soundtrack.</p>
                                <div class="flex items-center justify-between mb-3">
                                    <div class="flex items-center space-x-1">
                                        <span class="text-yellow-400">⭐⭐⭐⭐⭐</span>
                                        <span class="text-yellow-400 font-bold">4.6</span>
                                    </div>
                                    <span class="text-gray-500 text-xs">by NeonDev</span>
                                </div>
                                <div class="flex space-x-2">
                                    <a href="{{ url('/game') }}">
                                    <button class="flex-1 btn-neon text-white py-2 px-4 rounded-lg font-semibold text-sm">
                                         Play
                                    </button>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Asset Card 7 -->
                        <div class="asset-card rounded-xl overflow-hidden" data-category="sprites" data-price="free">
                            <div class="relative">
                                <img src="https://via.placeholder.com/300x180/059669/ffffff?text=UI+Elements" alt="Game UI Elements" class="asset-thumbnail">
                                <div class="price-tag" style="background: linear-gradient(45deg, #10b981, #059669);">FREE</div>
                            </div>
                            <div class="p-4">
                                <h3 class="font-bold text-white mb-2 text-lg">Game UI Elements</h3>
                                <p class="text-gray-400 text-sm mb-3 line-clamp-2">Koleksi lengkap button, panel, icon, dan elemen UI untuk game mobile dan desktop.</p>

                                <div class="flex items-center justify-between mb-3">
                                    <div class="flex items-center space-x-1">
                                        <span class="text-yellow-400">⭐⭐⭐⭐⭐</span>
                                        <span class="text-yellow-400 font-bold">4.8</span>
                                    </div>
                                    <span class="download-count">4.2k downloads</span>
                                </div>
                                <div class="flex space-x-2">
                                    <button class="btn-success text-white py-2 px-4 rounded-lg font-semibold text-sm">
                                         Download
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Asset Card 8 -->
                        <div class="asset-card rounded-xl overflow-hidden" data-category="audio" data-price="premium">
                            <div class="relative">
                                <img src="https://via.placeholder.com/300x180/7c3aed/ffffff?text=SFX+Library" alt="Sound Effects Library" class="asset-thumbnail">
                                <div class="price-tag">Rp.20.000</div>
                            </div>
                            <div class="p-4">
                                <h3 class="font-bold text-white mb-2 text-lg">Sound Effects Library</h3>
                                <p class="text-gray-400 text-sm mb-3 line-clamp-2">200+ sound effect berkualitas tinggi untuk berbagai genre game. Explosion, magic, UI sounds.</p>

                                <div class="flex items-center justify-between mb-3">
                                    <div class="flex items-center space-x-1">
                                        <span class="text-yellow-400">⭐⭐⭐⭐⭐</span>
                                        <span class="text-yellow-400 font-bold">4.9</span>
                                    </div>
                                    <span class="download-count">2.7k downloads</span>
                                </div>
                                <div class="flex space-x-2">
                                    <button class="btn-success text-white py-2 px-4 rounded-lg font-semibold text-sm">
                                         Beli
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Asset Card 9 -->
                        <div class="asset-card rounded-xl overflow-hidden" data-category="templates" data-price="premium">
                            <div class="relative">
                                <img src="https://via.placeholder.com/300x180/dc2626/ffffff?text=RPG+System" alt="RPG Game System" class="asset-thumbnail">
                                <div class="price-tag">Rp.12.000</div>
                            </div>
                            <div class="p-4">
                                <h3 class="font-bold text-white mb-2 text-lg">RPG Game System</h3>
                                <p class="text-gray-400 text-sm mb-3 line-clamp-2">Sistem RPG lengkap dengan inventory, skill tree, quest system, dan character progression.</p>

                                <div class="flex items-center justify-between mb-3">
                                    <div class="flex items-center space-x-1">
                                        <span class="text-yellow-400">⭐⭐⭐⭐⭐</span>
                                        <span class="text-yellow-400 font-bold">5.0</span>
                                    </div>
                                    <span class="download-count">340 downloads</span>
                                </div>
                                <div class="flex space-x-2">
                                    <button class="btn-success text-white py-2 px-4 rounded-lg font-semibold text-sm">
                                         Beli
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Load More Button -->
                    <div class="text-center">
                        <button id="load-more" class="btn-neon px-8 py-3 rounded-xl font-semibold">
                            Load More Games
                        </button>
                    </div>
                </main>
            </div>
        </div>
    </div>

    <!-- Game Modal -->
    <div id="game-modal" class="modal">
        <div class="modal-content relative w-full max-w-4xl h-3/4">
            <button class="close-modal">&times;</button>
            <div id="modal-game-content" class="w-full h-full">
                <!-- Game iframe will be loaded here -->
            </div>
        </div>
    </div>
</body>
</html>
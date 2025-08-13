<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Playverse Assets - Digital Assets Marketplace</title>
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
                            <h1 class="text-4xl font-bold mb-4">Digital Assets Marketplace</h1>
                            <p class="text-lg text-blue-100 mb-6">Temukan sprite, musik, font, dan aset digital berkualitas tinggi untuk proyek game Anda. Buat game lebih cepat dengan aset premium!</p>
                            <button class="btn-neon px-8 py-3 rounded-xl font-semibold">
                                 Jelajahi Aset
                            </button>
                        </div>
                    </section>

                    <!-- Filter Bar -->
                    <div class="flex flex-wrap items-center gap-4 mb-8 p-4 glass-morphism rounded-xl">
                        <span class="text-sm font-medium text-gray-300">Filter:</span>
                        <button class="category-badge active" data-filter="all">Semua</button>
                        <button class="category-badge" data-filter="free">Gratis</button>
                        <button class="category-badge" data-filter="premium">Premium</button>
                        <button class="category-badge" data-filter="popular">Populer</button>
                        <button class="category-badge" data-filter="newest">Terbaru</button>
                    </div>

                    <!-- Assets Grid -->
                    <div id="assets-container" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                        
                        <!-- Asset Card 1 -->
                        <div class="asset-card rounded-xl overflow-hidden">
                            <div class="relative">
                                <img src="" alt="Pixel Character Pack" class="asset-thumbnail">
                                <div class="price-tag">Rp. 12.000</div>
                            </div>
                            <div class="p-4">
                                <h3 class="font-bold text-white mb-2 text-lg">Pixel Character Pack</h3>
                                <p class="text-gray-400 text-sm mb-3 line-clamp-2">Koleksi lengkap 50+ karakter pixel art dengan animasi walking, running, dan idle.</p>
                                
                                <div class="stats-grid">
                                    <div class="stat-item">
                                        <div class="text-blue-400 font-bold">50+</div>
                                        <div class="text-xs text-gray-400">Sprites</div>
                                    </div>
                                    <div class="stat-item">
                                        <div class="text-green-400 font-bold">PNG</div>
                                        <div class="text-xs text-gray-400">Format</div>
                                    </div>
                                    <div class="stat-item">
                                        <div class="text-purple-400 font-bold">2D</div>
                                        <div class="text-xs text-gray-400">Style</div>
                                    </div>
                                </div>

                                <div class="flex items-center justify-between mb-3">
                                    <div class="flex items-center space-x-1">
                                        <span class="text-yellow-400">⭐⭐⭐⭐⭐</span>
                                        <span class="text-yellow-400 font-bold">4.9</span>
                                    </div>
                                    <span class="download-count">1.2k downloads</span>
                                </div>
                                <div class="flex space-x-2">
                                    <button onclick="buyAsset(1)" class="btn-success text-white py-2 px-4 rounded-lg font-semibold text-sm">
                                         Beli
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Asset Card 2 -->
                        <div class="asset-card rounded-xl overflow-hidden">
                            <div class="relative">
                                <img src="" alt="Epic Game Soundtrack" class="asset-thumbnail">
                                <div class="price-tag" style="background: linear-gradient(45deg, #10b981, #059669);">FREE</div>
                            </div>
                            <div class="p-4">
                                <h3 class="font-bold text-white mb-2 text-lg">Epic Game Soundtrack</h3>
                                <p class="text-gray-400 text-sm mb-3 line-clamp-2">10 track musik epik untuk game RPG dan adventure. High quality WAV dan MP3.</p>
                                
                                <div class="stats-grid">
                                    <div class="stat-item">
                                        <div class="text-blue-400 font-bold">10</div>
                                        <div class="text-xs text-gray-400">Tracks</div>
                                    </div>
                                    <div class="stat-item">
                                        <div class="text-green-400 font-bold">WAV</div>
                                        <div class="text-xs text-gray-400">Format</div>
                                    </div>
                                    <div class="stat-item">
                                        <div class="text-purple-400 font-bold">2min</div>
                                        <div class="text-xs text-gray-400">Avg Length</div>
                                    </div>
                                </div>

                                <div class="flex items-center justify-between mb-3">
                                    <div class="flex items-center space-x-1">
                                        <span class="text-yellow-400">⭐⭐⭐⭐⭐</span>
                                        <span class="text-yellow-400 font-bold">4.7</span>
                                    </div>
                                    <span class="download-count">3.5k downloads</span>
                                </div>
                                <div class="flex space-x-2">
                                    <button class="btn-success text-white py-2 px-4 rounded-lg font-semibold text-sm">
                                         Download
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Asset Card 3 -->
                        <div class="asset-card rounded-xl overflow-hidden">
                            <div class="relative">
                                <img src="https://via.placeholder.com/300x180/059669/ffffff?text=Platformer+Template" alt="Platformer Game Template" class="asset-thumbnail">
                                <div class="price-tag">Rp.10.000</div>
                            </div>
                            <div class="p-4">
                                <h3 class="font-bold text-white mb-2 text-lg">Platformer Game Template</h3>
                                <p class="text-gray-400 text-sm mb-3 line-clamp-2">Template game platformer lengkap dengan Unity project, scripts, dan dokumentasi.</p>
                                
                                <div class="stats-grid">
                                    <div class="stat-item">
                                        <div class="text-blue-400 font-bold">Unity</div>
                                        <div class="text-xs text-gray-400">Engine</div>
                                    </div>
                                    <div class="stat-item">
                                        <div class="text-green-400 font-bold">C#</div>
                                        <div class="text-xs text-gray-400">Scripts</div>
                                    </div>
                                    <div class="stat-item">
                                        <div class="text-purple-400 font-bold">Full</div>
                                        <div class="text-xs text-gray-400">Project</div>
                                    </div>
                                </div>

                                <div class="flex items-center justify-between mb-3">
                                    <div class="flex items-center space-x-1">
                                        <span class="text-yellow-400">⭐⭐⭐⭐⭐</span>
                                        <span class="text-yellow-400 font-bold">4.8</span>
                                    </div>
                                    <span class="download-count">890 downloads</span>
                                </div>
                                <div class="flex space-x-2">
                                    <button class="btn-success text-white py-2 px-4 rounded-lg font-semibold text-sm">
                                         Beli
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Asset Card 4 -->
                        <div class="asset-card rounded-xl overflow-hidden" data-category="fonts" data-price="free">
                            <div class="relative">
                                <img src="https://via.placeholder.com/300x180/dc2626/ffffff?text=Pixel+Font+Pack" alt="Pixel Font Collection" class="asset-thumbnail">
                                <div class="price-tag" style="background: linear-gradient(45deg, #10b981, #059669);">FREE</div>
                            </div>
                            <div class="p-4">
                                <h3 class="font-bold text-white mb-2 text-lg">Pixel Font Collection</h3>
                                <p class="text-gray-400 text-sm mb-3 line-clamp-2">5 font pixel style unik untuk UI game retro. Termasuk angka dan simbol khusus.</p>
                                
                                <div class="stats-grid">
                                    <div class="stat-item">
                                        <div class="text-blue-400 font-bold">5</div>
                                        <div class="text-xs text-gray-400">Fonts</div>
                                    </div>
                                    <div class="stat-item">
                                        <div class="text-green-400 font-bold">TTF</div>
                                        <div class="text-xs text-gray-400">Format</div>
                                    </div>
                                    <div class="stat-item">
                                        <div class="text-purple-400 font-bold">Pixel</div>
                                        <div class="text-xs text-gray-400">Style</div>
                                    </div>
                                </div>

                                <div class="flex items-center justify-between mb-3">
                                    <div class="flex items-center space-x-1">
                                        <span class="text-yellow-400">⭐⭐⭐⭐⭐</span>
                                        <span class="text-yellow-400 font-bold">4.6</span>
                                    </div>
                                    <span class="download-count">2.1k downloads</span>
                                </div>
                                <div class="flex space-x-2">
                                    <button class="btn-success text-white py-2 px-4 rounded-lg font-semibold text-sm">
                                         Download
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Asset Card 5 -->
                        <div class="asset-card rounded-xl overflow-hidden" data-category="textures" data-price="premium">
                            <div class="relative">
                                <img src="https://via.placeholder.com/300x180/1f2937/ffffff?text=Medieval+Textures" alt="Medieval Texture Pack" class="asset-thumbnail">
                                <div class="price-tag">Rp.30.000</div>
                            </div>
                            <div class="p-4">
                                <h3 class="font-bold text-white mb-2 text-lg">Medieval Texture Pack</h3>
                                <p class="text-gray-400 text-sm mb-3 line-clamp-2">100+ texture medieval berkualitas tinggi untuk environment dan building game.</p>
                                
                                <div class="stats-grid">
                                    <div class="stat-item">
                                        <div class="text-blue-400 font-bold">100+</div>
                                        <div class="text-xs text-gray-400">Textures</div>
                                    </div>
                                    <div class="stat-item">
                                        <div class="text-green-400 font-bold">4K</div>
                                        <div class="text-xs text-gray-400">Resolution</div>
                                    </div>
                                    <div class="stat-item">
                                        <div class="text-purple-400 font-bold">PBR</div>
                                        <div class="text-xs text-gray-400">Material</div>
                                    </div>
                                </div>

                                <div class="flex items-center justify-between mb-3">
                                    <div class="flex items-center space-x-1">
                                        <span class="text-yellow-400">⭐⭐⭐⭐⭐</span>
                                        <span class="text-yellow-400 font-bold">4.9</span>
                                    </div>
                                    <span class="download-count">650 downloads</span>
                                </div>
                                <div class="flex space-x-2">
                                    <button class="btn-success text-white py-2 px-4 rounded-lg font-semibold text-sm">
                                         Beli
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Asset Card 6 -->
                        <div class="asset-card rounded-xl overflow-hidden" data-category="animations" data-price="premium">
                            <div class="relative">
                                <img src="https://via.placeholder.com/300x180/1e40af/ffffff?text=Combat+Animations" alt="Combat Animation Pack" class="asset-thumbnail">
                                <div class="price-tag">Rp.11.000</div>
                            </div>
                            <div class="p-4">
                                <h3 class="font-bold text-white mb-2 text-lg">Combat Animation Pack</h3>
                                <p class="text-gray-400 text-sm mb-3 line-clamp-2">25+ animasi combat untuk karakter 2D. Attack, defend, special moves, dan death animations.</p>
                                
                                <div class="stats-grid">
                                    <div class="stat-item">
                                        <div class="text-blue-400 font-bold">25+</div>
                                        <div class="text-xs text-gray-400">Animations</div>
                                    </div>
                                    <div class="stat-item">
                                        <div class="text-green-400 font-bold">FBX</div>
                                        <div class="text-xs text-gray-400">Format</div>
                                    </div>
                                    <div class="stat-item">
                                        <div class="text-purple-400 font-bold">60fps</div>
                                        <div class="text-xs text-gray-400">Quality</div>
                                    </div>
                                </div>

                                <div class="flex items-center justify-between mb-3">
                                    <div class="flex items-center space-x-1">
                                        <span class="text-yellow-400">⭐⭐⭐⭐⭐</span>
                                        <span class="text-yellow-400 font-bold">4.7</span>
                                    </div>
                                    <span class="download-count">1.8k downloads</span>
                                </div>
                                <div class="flex space-x-2">
                                    <button class="btn-success text-white py-2 px-4 rounded-lg font-semibold text-sm">
                                        💳 Beli
                                    </button>
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
                                
                                <div class="stats-grid">
                                    <div class="stat-item">
                                        <div class="text-blue-400 font-bold">80+</div>
                                        <div class="text-xs text-gray-400">Elements</div>
                                    </div>
                                    <div class="stat-item">
                                        <div class="text-green-400 font-bold">SVG</div>
                                        <div class="text-xs text-gray-400">Vector</div>
                                    </div>
                                    <div class="stat-item">
                                        <div class="text-purple-400 font-bold">Scalable</div>
                                        <div class="text-xs text-gray-400">Quality</div>
                                    </div>
                                </div>

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
                                
                                <div class="stats-grid">
                                    <div class="stat-item">
                                        <div class="text-blue-400 font-bold">200+</div>
                                        <div class="text-xs text-gray-400">SFX</div>
                                    </div>
                                    <div class="stat-item">
                                        <div class="text-green-400 font-bold">WAV</div>
                                        <div class="text-xs text-gray-400">48kHz</div>
                                    </div>
                                    <div class="stat-item">
                                        <div class="text-purple-400 font-bold">Studio</div>
                                        <div class="text-xs text-gray-400">Quality</div>
                                    </div>
                                </div>

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
                                
                                <div class="stats-grid">
                                    <div class="stat-item">
                                        <div class="text-blue-400 font-bold">Full</div>
                                        <div class="text-xs text-gray-400">System</div>
                                    </div>
                                    <div class="stat-item">
                                        <div class="text-green-400 font-bold">Unity</div>
                                        <div class="text-xs text-gray-400">2022.3</div>
                                    </div>
                                    <div class="stat-item">
                                        <div class="text-purple-400 font-bold">Pro</div>
                                        <div class="text-xs text-gray-400">Level</div>
                                    </div>
                                </div>

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
                            Muat Lebih Banyak Aset
                        </button>
                    </div>
                </main>
            </div>
        </div>
    </div>

    <!-- Asset Preview Modal -->
    <div id="asset-modal" class="modal">
        <div class="modal-content relative w-full max-w-4xl h-3/4">
            <button class="close-modal">&times;</button>
            <div id="modal-asset-content" class="w-full h-full">
                <!-- Asset details will be loaded here -->
            </div>
        </div>
    </div>
</body>
</html>
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
                            <p class="text-lg text-blue-100 mb-6">Jelajahi koleksi game indie terbaik dari itch.io. Mainkan langsung di browser tanpa perlu download!</p>
                            <button class="btn-neon px-8 py-3 rounded-xl font-semibold">
                                🚀 Explore Games
                            </button>
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
                                    <button onclick="playGame(1)" class="flex-1 btn-neon text-white py-2 px-4 rounded-lg font-semibold text-sm">
                                        🎮 Play
                                    </button>
                                    <button onclick="viewGame('https://pixelcraft.itch.io/mystical-forest')" class="bg-gray-700 hover:bg-gray-600 text-white py-2 px-4 rounded-lg font-semibold text-sm transition-colors">
                                        👁 View
                                    </button>
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
                                    <button onclick="playGame(2)" class="flex-1 btn-neon text-white py-2 px-4 rounded-lg font-semibold text-sm">
                                        🎮 Play
                                    </button>
                                    <button onclick="viewGame('https://neondev.itch.io/neon-runner')" class="bg-gray-700 hover:bg-gray-600 text-white py-2 px-4 rounded-lg font-semibold text-sm transition-colors">
                                        👁 View
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Game Card 3 -->
                        <div class="game-card rounded-xl overflow-hidden" data-category="puzzle" data-price="free">
                            <div class="relative">
                                <img src="https://via.placeholder.com/300x200/059669/ffffff?text=Quantum+Puzzle" alt="Quantum Puzzle Box" class="game-thumbnail">
                                <div class="absolute top-3 right-3">
                                    <span class="category-badge">Puzzle</span>
                                </div>
                                <div class="absolute bottom-3 left-3">
                                    <span class="text-green-400 font-bold text-sm bg-black/50 px-2 py-1 rounded">Free</span>
                                </div>
                            </div>
                            <div class="p-4">
                                <h3 class="font-bold text-white mb-2 text-lg">Quantum Puzzle Box</h3>
                                <p class="text-gray-400 text-sm mb-3 line-clamp-2">Mind-bending physics puzzles that challenge your understanding of space and time.</p>
                                <div class="flex items-center justify-between mb-3">
                                    <div class="flex items-center space-x-1">
                                        <span class="text-yellow-400">⭐⭐⭐⭐⭐</span>
                                        <span class="text-yellow-400 font-bold">4.9</span>
                                    </div>
                                    <span class="text-gray-500 text-xs">by Quantum Games</span>
                                </div>
                                <div class="flex space-x-2">
                                    <button onclick="playGame(3)" class="flex-1 btn-neon text-white py-2 px-4 rounded-lg font-semibold text-sm">
                                        🎮 Play
                                    </button>
                                    <button onclick="viewGame('https://quantum.itch.io/puzzle-box')" class="bg-gray-700 hover:bg-gray-600 text-white py-2 px-4 rounded-lg font-semibold text-sm transition-colors">
                                        👁 View
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Game Card 4 -->
                        <div class="game-card rounded-xl overflow-hidden" data-category="simulation" data-price="paid">
                            <div class="relative">
                                <img src="https://via.placeholder.com/300x200/dc2626/ffffff?text=Farm+Sim" alt="Pixel Farm Simulator" class="game-thumbnail">
                                <div class="absolute top-3 right-3">
                                    <span class="category-badge">Simulation</span>
                                </div>
                                <div class="absolute bottom-3 left-3">
                                    <span class="text-yellow-400 font-bold text-sm bg-black/50 px-2 py-1 rounded">$7.99</span>
                                </div>
                            </div>
                            <div class="p-4">
                                <h3 class="font-bold text-white mb-2 text-lg">Pixel Farm Simulator</h3>
                                <p class="text-gray-400 text-sm mb-3 line-clamp-2">Build and manage your dream farm in this charming pixel art simulation game.</p>
                                <div class="flex items-center justify-between mb-3">
                                    <div class="flex items-center space-x-1">
                                        <span class="text-yellow-400">⭐⭐⭐⭐⭐</span>
                                        <span class="text-yellow-400 font-bold">4.5</span>
                                    </div>
                                    <span class="text-gray-500 text-xs">by PixelFarm Co</span>
                                </div>
                                <div class="flex space-x-2">
                                    <button onclick="playGame(4)" class="flex-1 btn-neon text-white py-2 px-4 rounded-lg font-semibold text-sm">
                                        🎮 Play
                                    </button>
                                    <button onclick="viewGame('https://pixelfarm.itch.io/farm-simulator')" class="bg-gray-700 hover:bg-gray-600 text-white py-2 px-4 rounded-lg font-semibold text-sm transition-colors">
                                        👁 View
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Game Card 5 -->
                        <div class="game-card rounded-xl overflow-hidden" data-category="action" data-price="paid">
                            <div class="relative">
                                <img src="https://via.placeholder.com/300x200/1f2937/ffffff?text=Shadow+Knight" alt="Shadow Knight" class="game-thumbnail">
                                <div class="absolute top-3 right-3">
                                    <span class="category-badge">Action</span>
                                </div>
                                <div class="absolute bottom-3 left-3">
                                    <span class="text-yellow-400 font-bold text-sm bg-black/50 px-2 py-1 rounded">$6.99</span>
                                </div>
                            </div>
                            <div class="p-4">
                                <h3 class="font-bold text-white mb-2 text-lg">Shadow Knight</h3>
                                <p class="text-gray-400 text-sm mb-3 line-clamp-2">Epic action-platformer with fluid combat and dark atmospheric visuals.</p>
                                <div class="flex items-center justify-between mb-3">
                                    <div class="flex items-center space-x-1">
                                        <span class="text-yellow-400">⭐⭐⭐⭐⭐</span>
                                        <span class="text-yellow-400 font-bold">4.7</span>
                                    </div>
                                    <span class="text-gray-500 text-xs">by Dark Studio</span>
                                </div>
                                <div class="flex space-x-2">
                                    <button onclick="playGame(5)" class="flex-1 btn-neon text-white py-2 px-4 rounded-lg font-semibold text-sm">
                                        🎮 Play
                                    </button>
                                    <button onclick="viewGame('https://darkstudio.itch.io/shadow-knight')" class="bg-gray-700 hover:bg-gray-600 text-white py-2 px-4 rounded-lg font-semibold text-sm transition-colors">
                                        👁 View
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Game Card 6 -->
                        <div class="game-card rounded-xl overflow-hidden" data-category="adventure" data-price="free">
                            <div class="relative">
                                <img src="https://via.placeholder.com/300x200/1e40af/ffffff?text=Space+Explorer" alt="Space Explorer" class="game-thumbnail">
                                <div class="absolute top-3 right-3">
                                    <span class="category-badge">Adventure</span>
                                </div>
                                <div class="absolute bottom-3 left-3">
                                    <span class="text-green-400 font-bold text-sm bg-black/50 px-2 py-1 rounded">Free</span>
                                </div>
                            </div>
                            <div class="p-4">
                                <h3 class="font-bold text-white mb-2 text-lg">Space Explorer</h3>
                                <p class="text-gray-400 text-sm mb-3 line-clamp-2">Explore vast galaxies and discover new planets in this space exploration game.</p>
                                <div class="flex items-center justify-between mb-3">
                                    <div class="flex items-center space-x-1">
                                        <span class="text-yellow-400">⭐⭐⭐⭐⭐</span>
                                        <span class="text-yellow-400 font-bold">4.4</span>
                                    </div>
                                    <span class="text-gray-500 text-xs">by Cosmic Games</span>
                                </div>
                                <div class="flex space-x-2">
                                    <button onclick="playGame(6)" class="flex-1 btn-neon text-white py-2 px-4 rounded-lg font-semibold text-sm">
                                        🎮 Play
                                    </button>
                                    <button onclick="viewGame('https://cosmic.itch.io/space-explorer')" class="bg-gray-700 hover:bg-gray-600 text-white py-2 px-4 rounded-lg font-semibold text-sm transition-colors">
                                        👁 View
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

    <script>
        // Game data for modal functionality
        const gameData = {
            1: { title: "Mystical Forest Adventure", author: "PixelCraft Studios", url: "https://pixelcraft.itch.io/mystical-forest", description: "Explore a magical forest filled with secrets and creatures. A beautiful point-and-click adventure game." },
            2: { title: "Neon Runner 2077", author: "NeonDev", url: "https://neondev.itch.io/neon-runner", description: "Fast-paced cyberpunk platformer with stunning neon aesthetics and electronic soundtrack." },
            3: { title: "Quantum Puzzle Box", author: "Quantum Games", url: "https://quantum.itch.io/puzzle-box", description: "Mind-bending physics puzzles that challenge your understanding of space and time." },
            4: { title: "Pixel Farm Simulator", author: "PixelFarm Co", url: "https://pixelfarm.itch.io/farm-simulator", description: "Build and manage your dream farm in this charming pixel art simulation game." },
            5: { title: "Shadow Knight", author: "Dark Studio", url: "https://darkstudio.itch.io/shadow-knight", description: "Epic action-platformer with fluid combat and dark atmospheric visuals." },
            6: { title: "Space Explorer", author: "Cosmic Games", url: "https://cosmic.itch.io/space-explorer", description: "Explore vast galaxies and discover new planets in this space exploration game." }
        };

        // Initialize
        document.addEventListener('DOMContentLoaded', function() {
            setupEventListeners();
        });

        function setupEventListeners() {
            // Category filters
            document.querySelectorAll('[data-category]').forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    const category = this.dataset.category;
                    filterByCategory(category);
                });
            });

            // Filter buttons
            document.querySelectorAll('[data-filter]').forEach(button => {
                button.addEventListener('click', function() {
                    // Remove active class from all buttons
                    document.querySelectorAll('[data-filter]').forEach(btn => {
                        btn.classList.remove('active');
                    });
                    // Add active class to clicked button
                    this.classList.add('active');
                    
                    const filter = this.dataset.filter;
                    filterGames(filter);
                });
            });

            // Modal close
            document.querySelector('.close-modal').addEventListener('click', closeModal);
            document.getElementById('game-modal').addEventListener('click', function(e) {
                if (e.target === this) closeModal();
            });

            // Search functionality
            const searchInput = document.querySelector('input[type="text"]');
            searchInput.addEventListener('input', function(e) {
                searchGames(e.target.value);
            });
        }

        function filterByCategory(category) {
            const allCards = document.querySelectorAll('.game-card');
            
            allCards.forEach(card => {
                if (category === 'all') {
                    card.style.display = 'block';
                } else {
                    const cardCategory = card.dataset.category;
                    if (cardCategory === category) {
                        card.style.display = 'block';
                    } else {
                        card.style.display = 'none';
                    }
                }
            });
        }

        function filterGames(filter) {
            const allCards = document.querySelectorAll('.game-card');
            
            allCards.forEach(card => {
                let show = false;
                
                switch (filter) {
                    case 'free':
                        show = card.dataset.price === 'free';
                        break;
                    case 'paid':
                        show = card.dataset.price === 'paid';
                        break;
                    case 'new':
                    case 'popular':
                    case 'all':
                    default:
                        show = true;
                        break;
                }
                
                card.style.display = show ? 'block' : 'none';
            });
        }

        function searchGames(query) {
            const allCards = document.querySelectorAll('.game-card');
            const searchTerm = query.toLowerCase();
            
            allCards.forEach(card => {
                const title = card.querySelector('h3').textContent.toLowerCase();
                const description = card.querySelector('.line-clamp-2').textContent.toLowerCase();
                
                if (!query.trim() || title.includes(searchTerm) || description.includes(searchTerm)) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        }

        function playGame(gameId) {
            const game = gameData[gameId];
            if (game) {
                openModal(game);
            }
        }

        function viewGame(url) {
            window.open(url, '_blank');
        }

        function openModal(game) {
            const modal = document.getElementById('game-modal');
            const content = document.getElementById('modal-game-content');
            
            content.innerHTML = `
                <div class="w-full h-full flex flex-col">
                    <div class="p-4 border-b border-gray-700">
                        <h2 class="text-xl font-bold text-white">${game.title}</h2>
                        <p class="text-gray-400 text-sm">by ${game.author}</p>
                    </div>
                    <div class="flex-1 p-4">
                        <div class="w-full h-full bg-gray-800 rounded-lg flex items-center justify-center">
                            <div class="text-center">
                                <div class="text-6xl mb-4">🎮</div>
                                <h3 class="text-xl text-white mb-2">${game.title}</h3>
                                <p class="text-gray-400 mb-4">${game.description}</p>
                                <button onclick="window.open('${game.url}', '_blank')" class="btn-neon px-6 py-3 rounded-lg font-semibold">
                                    Play on Itch.io
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            `;
            
            modal.classList.add('active');
        }

        function closeModal() {
            const modal = document.getElementById('game-modal');
            modal.classList.remove('active');
            document.getElementById('modal-game-content').innerHTML = '';
        }

        // Keyboard shortcuts
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeModal();
            }
        });
    </script>
</body>
</html>
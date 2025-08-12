<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mystical Forest Adventure - Playverse</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="text-white min-h-screen">
  @include('partials.navbar')  

    <!-- Main Content -->
    <div class="pt-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                
                <!-- Game Player Section -->
                <div class="lg:col-span-2">
                    <!-- Game Container -->
                    <div class="game-container mb-6">
                        <div class="fullscreen-btn">
                            <span id="fullscreen-icon"></span>
                        </div>
                        
                        <div class="game-frame" id="game-frame">
                            <div class="game-overlay" id="game-overlay">
                                <div class="text-center">
                                    <h2 class="text-3xl font-bold mb-4 gradient-text">Mystical Forest Adventure</h2>
                                    <p class="text-gray-300 mb-6 max-w-md">Siap untuk memulai petualangan magis? Klik tombol di bawah untuk memulai permainan!</p>
                                    <button class="btn-neon px-8 py-4 rounded-xl font-bold text-lg">
                                         Mulai Game
                                    </button>
                                </div>
                            </div>
                            
                            <!-- Loading state -->
                            <div id="loading-state" class="hidden">
                                <div class="loading-spinner mb-4"></div>
                                <p class="text-gray-300">Loading game...</p>
                            </div>
                            
                            <!-- Game iframe akan dimuat di sini -->
                            <iframe id="game-iframe" style="display: none;" class="w-full h-full"></iframe>
                        </div>
                    </div>

                    <!-- Game Controls -->
                    <div class="game-info-card p-6 mb-6">
                        <h3 class="text-lg font-bold mb-4 flex items-center">
                             <span class="ml-2">Game Controls</span>
                        </h3>
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                            <button class="control-btn" > Pause</button>
                            <button class="control-btn" > Restart</button>
                            <button class="control-btn" > Sound</button>
                            <button class="control-btn" > Help</button>
                        </div>
                    </div>

                    <!-- Game Progress -->
                    <div class="game-info-card p-6 mb-6">
                        <div class="flex items-center justify-between mb-3">
                            <h3 class="text-lg font-bold"> Progress</h3>
                            <span class="text-sm text-gray-400">Level 1</span>
                        </div>
                        <div class="progress-bar mb-2">
                            <div class="progress-fill" style="width: 35%"></div>
                        </div>
                        <div class="flex justify-between text-sm text-gray-400">
                            <span>35% Complete</span>
                            <span>⭐ Score: 1,250</span>
                        </div>
                    </div>
                </div>

                <!-- Game Info Sidebar -->
                <div class="lg:col-span-1">
                    
                    <!-- Game Details -->
                    <div class="game-info-card p-6 mb-6">
                        <div class="flex items-center mb-4">
                            <img src="https://via.placeholder.com/80x80/4338ca/ffffff?text=" 
                                 alt="Game Icon" class="w-16 h-16 rounded-xl mr-4">
                            <div>
                                <h2 class="text-xl font-bold">Mystical Forest Adventure</h2>
                                <p class="text-gray-400 text-sm">by PixelCraft Studios</p>
                            </div>
                        </div>

                        <div class="space-y-3 mb-6">
                            <div class="flex items-center justify-between">
                                <span class="text-gray-400">Rating:</span>
                                <div class="flex items-center">
                                    <span class="rating-stars mr-2">⭐⭐⭐⭐⭐</span>
                                    <span class="text-yellow-400 font-bold">4.8</span>
                                </div>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="text-gray-400">Price:</span>
                                <span class="text-green-400 font-bold">Free</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="text-gray-400">Category:</span>
                                <span class="bg-purple-600/30 text-purple-300 px-2 py-1 rounded-lg text-xs">Adventure</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="text-gray-400">Players:</span>
                                <span class="text-blue-400">1,234 playing</span>
                            </div>
                        </div>

                        <div class="space-y-2">
                            <button class="w-full btn-neon py-3 rounded-lg font-semibold">
                                 Add to Favorites
                            </button>
                            <button class="w-full bg-gray-700 hover:bg-gray-600 text-white py-3 rounded-lg font-semibold transition-colors">
                                 Share Game
                            </button>
                        </div>
                    </div>

                    <!-- Game Description -->
                    <div class="game-info-card p-6 mb-6">
                        <h3 class="text-lg font-bold mb-4"> About This Game</h3>
                        <p class="text-gray-300 text-sm leading-relaxed mb-4">
                            Explore a magical forest filled with secrets, mystical creatures, and ancient puzzles. 
                            Use your wit and courage to uncover the mysteries hidden within the enchanted woods.
                        </p>
                        <div class="space-y-2">
                            <h4 class="font-semibold text-sm"> Tags:</h4>
                            <div class="flex flex-wrap gap-2">
                                <span class="bg-blue-600/30 text-blue-300 px-2 py-1 rounded text-xs">Adventure</span>
                                <span class="bg-green-600/30 text-green-300 px-2 py-1 rounded text-xs">Point & Click</span>
                                <span class="bg-purple-600/30 text-purple-300 px-2 py-1 rounded text-xs">Fantasy</span>
                                <span class="bg-yellow-600/30 text-yellow-300 px-2 py-1 rounded text-xs">Puzzle</span>
                            </div>
                        </div>
                    </div>

                    <!-- Leaderboard -->
                    <div class="game-info-card p-6 mb-6">
                        <h3 class="text-lg font-bold mb-4"> Leaderboard</h3>
                        <div class="space-y-3">
                            <div class="flex items-center justify-between text-sm">
                                <div class="flex items-center">
                                    <span>ProGamer123</span>
                                </div>
                                <span class="text-yellow-400 font-bold">15,420</span>
                            </div>
                            <div class="flex items-center justify-between text-sm">
                                <div class="flex items-center">
                                    <span>AdventureQueen</span>
                                </div>
                                <span class="text-blue-400 font-bold">12,890</span>
                            </div>
                            <div class="flex items-center justify-between text-sm">
                                <div class="flex items-center">
                                    <span>MysticExplorer</span>
                                </div>
                                <span class="text-green-400 font-bold">11,650</span>
                            </div>
                            <div class="flex items-center justify-between text-sm border-t border-gray-600 pt-2">
                                <div class="flex items-center">
                                    <span class="text-gray-500 mr-2">#42</span>
                                    <span class="text-blue-400">You</span>
                                </div>
                                <span class="text-gray-400">1,250</span>
                            </div>
                        </div>
                    </div>

                    <!-- Comments Section -->
                    <div class="game-info-card p-6">
                        <h3 class="text-lg font-bold mb-4"> Comments</h3>
                        
                        <!-- Comment Form -->
                        <div class="mb-4">
                            <textarea placeholder="Write a comment..." 
                                    class="w-full bg-gray-800/50 border border-blue-500/30 rounded-lg p-3 text-sm text-white placeholder-gray-400 resize-none"
                                    rows="3"></textarea>
                            <button class="mt-2 btn-neon px-4 py-2 rounded-lg text-sm font-medium">
                                Post Comment
                            </button>
                        </div>

                        <!-- Comments List -->
                        <div class="space-y-3 max-h-60 overflow-y-auto">
                            <div class="comment-card">
                                <div class="flex items-center mb-2">
                                    <div class="w-6 h-6 bg-blue-500 rounded-full flex items-center justify-center text-xs mr-2">G</div>
                                    <span class="font-semibold text-sm">GameLover99</span>
                                    <span class="text-gray-500 text-xs ml-auto">2h ago</span>
                                </div>
                                <p class="text-gray-300 text-sm">Amazing game! The graphics are beautiful and the puzzles are challenging but fair.</p>
                            </div>
                            
                            <div class="comment-card">
                                <div class="flex items-center mb-2">
                                    <div class="w-6 h-6 bg-purple-500 rounded-full flex items-center justify-center text-xs mr-2">A</div>
                                    <span class="font-semibold text-sm">AdventureSeeker</span>
                                    <span class="text-gray-500 text-xs ml-auto">5h ago</span>
                                </div>
                                <p class="text-gray-300 text-sm">Love the atmospheric music and sound effects. Really immersive experience!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
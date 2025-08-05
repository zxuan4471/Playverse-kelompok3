<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mystical Forest Adventure - Playverse</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #0f0f23 0%, #1a1a2e 50%, #16213e 100%);
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
        }
        
        .neon-glow {
            box-shadow: 0 0 20px rgba(59, 130, 246, 0.3), 0 0 40px rgba(59, 130, 246, 0.1);
        }
        
        .glass-morphism {
            background: rgba(30, 30, 63, 0.8);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .game-container {
            background: linear-gradient(145deg, #1e1e3f 0%, #2a2a5a 100%);
            border: 2px solid rgba(59, 130, 246, 0.3);
            border-radius: 16px;
            overflow: hidden;
            position: relative;
        }
        
        .game-frame {
            width: 100%;
            height: 600px;
            border: none;
            background: #000;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }
        
        .game-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg, rgba(59, 130, 246, 0.1), rgba(139, 92, 246, 0.1));
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            transition: opacity 0.3s ease;
        }
        
        .game-overlay.hidden {
            opacity: 0;
            pointer-events: none;
        }
        
        .btn-neon {
            background: linear-gradient(45deg, #3b82f6, #1d4ed8);
            box-shadow: 0 0 15px rgba(59, 130, 246, 0.4);
            transition: all 0.3s ease;
        }
        
        .btn-neon:hover {
            box-shadow: 0 0 25px rgba(59, 130, 246, 0.6), 0 0 35px rgba(59, 130, 246, 0.3);
            transform: translateY(-2px);
        }
        
        .gradient-text {
            background: linear-gradient(45deg, #3b82f6, #8b5cf6, #06b6d4);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .game-info-card {
            background: rgba(30, 30, 63, 0.9);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(59, 130, 246, 0.2);
            border-radius: 16px;
            transition: all 0.3s ease;
        }
        
        .game-info-card:hover {
            border-color: rgba(59, 130, 246, 0.4);
            box-shadow: 0 8px 32px rgba(59, 130, 246, 0.1);
        }
        
        .control-btn {
            background: rgba(59, 130, 246, 0.2);
            border: 1px solid rgba(59, 130, 246, 0.4);
            color: white;
            padding: 8px 16px;
            border-radius: 8px;
            transition: all 0.3s ease;
            cursor: pointer;
        }
        
        .control-btn:hover {
            background: rgba(59, 130, 246, 0.3);
            box-shadow: 0 0 15px rgba(59, 130, 246, 0.3);
        }
        
        .control-btn.active {
            background: linear-gradient(45deg, #3b82f6, #1d4ed8);
            box-shadow: 0 0 15px rgba(59, 130, 246, 0.5);
        }
        
        .loading-spinner {
            border: 3px solid rgba(59, 130, 246, 0.3);
            border-top: 3px solid #3b82f6;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            animation: spin 1s linear infinite;
        }
        
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        
        .rating-stars {
            color: #fbbf24;
            filter: drop-shadow(0 0 4px rgba(251, 191, 36, 0.3));
        }
        
        .fullscreen-btn {
            position: absolute;
            top: 16px;
            right: 16px;
            z-index: 10;
            background: rgba(0, 0, 0, 0.7);
            border: 1px solid rgba(59, 130, 246, 0.4);
            color: white;
            padding: 8px;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .fullscreen-btn:hover {
            background: rgba(59, 130, 246, 0.3);
            box-shadow: 0 0 15px rgba(59, 130, 246, 0.3);
        }
        
        .progress-bar {
            height: 4px;
            background: rgba(59, 130, 246, 0.2);
            border-radius: 2px;
            overflow: hidden;
        }
        
        .progress-fill {
            height: 100%;
            background: linear-gradient(90deg, #3b82f6, #8b5cf6);
            border-radius: 2px;
            transition: width 0.3s ease;
        }
        
        .breadcrumb {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 24px;
            color: rgba(255, 255, 255, 0.7);
        }
        
        .breadcrumb a {
            color: #3b82f6;
            text-decoration: none;
            transition: color 0.3s ease;
        }
        
        .breadcrumb a:hover {
            color: #60a5fa;
        }
        
        .comment-card {
            background: rgba(30, 30, 63, 0.6);
            border: 1px solid rgba(59, 130, 246, 0.1);
            border-radius: 12px;
            padding: 16px;
            margin-bottom: 16px;
            transition: all 0.3s ease;
        }
        
        .comment-card:hover {
            border-color: rgba(59, 130, 246, 0.3);
            background: rgba(30, 30, 63, 0.8);
        }
        
        @media (max-width: 768px) {
            .game-frame {
                height: 400px;
            }
        }
    </style>
</head>
<body class="text-white min-h-screen">

    <!-- Navigation Bar (sama seperti sebelumnya) -->
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
                    <a href="#" class="text-gray-300 hover:text-white px-3 py-2 text-sm font-medium transition-colors">Home</a>
                    <a href="#" class="text-white px-3 py-2 text-sm font-medium">Browse Games</a>
                    <a href="#" class="text-gray-300 hover:text-white px-3 py-2 text-sm font-medium transition-colors">Categories</a>
                    <a href="#" class="text-gray-300 hover:text-white px-3 py-2 text-sm font-medium transition-colors">Featured</a>
                </div>

                <!-- Search and Auth -->
                <div class="flex items-center space-x-4">
                    <div class="relative">
                        <input type="text" placeholder="Cari game..." 
                               class="bg-gray-800/50 border border-blue-500/30 rounded-lg px-4 py-2 pl-10 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 text-white placeholder-gray-400">
                        <div class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400">🔍</div>
                    </div>
                    <button class="btn-neon px-4 py-2 rounded-lg text-sm font-medium text-white">Login</button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="pt-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            
            <!-- Breadcrumb -->
            <div class="breadcrumb">
                <a href="#" onclick="goBack()">Home</a>
                <span>/</span>
                <a href="#" onclick="goBack()">Browse Games</a>
                <span>/</span>
                <span>Mystical Forest Adventure</span>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                
                <!-- Game Player Section -->
                <div class="lg:col-span-2">
                    <!-- Game Container -->
                    <div class="game-container mb-6">
                        <div class="fullscreen-btn" onclick="toggleFullscreen()">
                            <span id="fullscreen-icon">⛶</span>
                        </div>
                        
                        <div class="game-frame" id="game-frame">
                            <div class="game-overlay" id="game-overlay">
                                <div class="text-center">
                                    <div class="w-24 h-24 mx-auto mb-6 bg-gradient-to-br from-blue-500 to-purple-600 rounded-2xl flex items-center justify-center neon-glow">
                                        <span class="text-4xl">🌲</span>
                                    </div>
                                    <h2 class="text-3xl font-bold mb-4 gradient-text">Mystical Forest Adventure</h2>
                                    <p class="text-gray-300 mb-6 max-w-md">Siap untuk memulai petualangan magis? Klik tombol di bawah untuk memulai permainan!</p>
                                    <button onclick="startGame()" class="btn-neon px-8 py-4 rounded-xl font-bold text-lg">
                                        🎮 Mulai Game
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
                            🎮 <span class="ml-2">Game Controls</span>
                        </h3>
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                            <button class="control-btn" onclick="pauseGame()">⏸️ Pause</button>
                            <button class="control-btn" onclick="restartGame()">🔄 Restart</button>
                            <button class="control-btn" onclick="toggleSound()">🔊 Sound</button>
                            <button class="control-btn" onclick="showHelp()">❓ Help</button>
                        </div>
                    </div>

                    <!-- Game Progress -->
                    <div class="game-info-card p-6 mb-6">
                        <div class="flex items-center justify-between mb-3">
                            <h3 class="text-lg font-bold">📊 Progress</h3>
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
                            <img src="https://via.placeholder.com/80x80/4338ca/ffffff?text=🌲" 
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
                                ❤️ Add to Favorites
                            </button>
                            <button class="w-full bg-gray-700 hover:bg-gray-600 text-white py-3 rounded-lg font-semibold transition-colors">
                                📤 Share Game
                            </button>
                        </div>
                    </div>

                    <!-- Game Description -->
                    <div class="game-info-card p-6 mb-6">
                        <h3 class="text-lg font-bold mb-4">📖 About This Game</h3>
                        <p class="text-gray-300 text-sm leading-relaxed mb-4">
                            Explore a magical forest filled with secrets, mystical creatures, and ancient puzzles. 
                            Use your wit and courage to uncover the mysteries hidden within the enchanted woods.
                        </p>
                        <div class="space-y-2">
                            <h4 class="font-semibold text-sm">🏷️ Tags:</h4>
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
                        <h3 class="text-lg font-bold mb-4">🏆 Leaderboard</h3>
                        <div class="space-y-3">
                            <div class="flex items-center justify-between text-sm">
                                <div class="flex items-center">
                                    <span class="text-yellow-400 mr-2">🥇</span>
                                    <span>ProGamer123</span>
                                </div>
                                <span class="text-yellow-400 font-bold">15,420</span>
                            </div>
                            <div class="flex items-center justify-between text-sm">
                                <div class="flex items-center">
                                    <span class="text-gray-400 mr-2">🥈</span>
                                    <span>AdventureQueen</span>
                                </div>
                                <span class="text-blue-400 font-bold">12,890</span>
                            </div>
                            <div class="flex items-center justify-between text-sm">
                                <div class="flex items-center">
                                    <span class="text-orange-400 mr-2">🥉</span>
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
                        <h3 class="text-lg font-bold mb-4">💬 Comments</h3>
                        
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

    <script>
        let gameStarted = false;
        let isFullscreen = false;
        let soundEnabled = true;

        function startGame() {
            const overlay = document.getElementById('game-overlay');
            const loading = document.getElementById('loading-state');
            const iframe = document.getElementById('game-iframe');
            
            // Hide overlay
            overlay.classList.add('hidden');
            
            // Show loading
            loading.classList.remove('hidden');
            
            // Simulate loading time
            setTimeout(() => {
                loading.classList.add('hidden');
                iframe.style.display = 'block';
                
                // In real implementation, you would load the actual game
                iframe.src = 'about:blank'; // Placeholder
                iframe.srcdoc = `
                    <div style="
                        width: 100%; 
                        height: 100%; 
                        background: linear-gradient(45deg, #1a1a2e, #16213e); 
                        display: flex; 
                        align-items: center; 
                        justify-content: center;
                        color: white;
                        font-family: Arial, sans-serif;
                        text-align: center;
                    ">
                        <div>
                            <div style="font-size: 4rem; margin-bottom: 1rem;">🌲</div>
                            <h2 style="margin-bottom: 1rem;">Game is Running!</h2>
                            <p style="color: #888;">This is where the actual game would be embedded</p>
                            <div style="margin-top: 2rem;">
                                <button onclick="parent.updateProgress()" style="
                                    background: linear-gradient(45deg, #3b82f6, #1d4ed8);
                                    color: white;
                                    border: none;
                                    padding: 10px 20px;
                                    border-radius: 8px;
                                    cursor: pointer;
                                    margin: 5px;
                                ">Simulate Progress</button>
                            </div>
                        </div>
                    </div>
                `;
                
                gameStarted = true;
                updateGameControls();
            }, 2000);
        }

        function toggleFullscreen() {
            const gameContainer = document.querySelector('.game-container');
            const icon = document.getElementById('fullscreen-icon');
            
            if (!isFullscreen) {
                if (gameContainer.requestFullscreen) {
                    gameContainer.requestFullscreen();
                } else if (gameContainer.webkitRequestFullscreen) {
                    gameContainer.webkitRequestFullscreen();
                } else if (gameContainer.msRequestFullscreen) {
                    gameContainer.msRequestFullscreen();
                }
                icon.textContent = '⛉';
                isFullscreen = true;
            } else {
                if (document.exitFullscreen) {
                    document.exitFullscreen();
                } else if (document.webkitExitFullscreen) {
                    document.webkitExitFullscreen();
                } else if (document.msExitFullscreen) {
                    document.msExitFullscreen();
                }
                icon.textContent = '⛶';
                isFullscreen = false;
            }
        }

        function pauseGame() {
            if (gameStarted) {
                alert('Game paused! (In real implementation, this would pause the actual game)');
            }
        }

        function restartGame() {
            if (gameStarted) {
                if (confirm('Are you sure you want to restart the game?')) {
                    // Reset progress
                    document.querySelector('.progress-fill').style.width = '0%';
                    alert('Game restarted!');
                }
            }
        }

        function toggleSound() {
            soundEnabled = !soundEnabled;
            const btn = event.target;
            btn.innerHTML = soundEnabled ? '🔊 Sound' : '🔇 Muted';
            btn.classList.toggle('active');
        }

        function showHelp() {
            alert(`Game Controls:
            
🖱️ Mouse: Navigate and interact with objects
⌨️ Arrow Keys: Move character (if applicable)
🎯 Click on objects to examine them
🎮 Use inventory items by dragging
            
Good luck exploring the mystical forest!`);
        }

        function updateGameControls() {
            const controls = document.querySelectorAll('.control-btn');
            controls.forEach(btn => {
                btn.disabled = !gameStarted;
                if (gameStarted) {
                    btn.style.opacity = '1';
                } else {
                    btn.style.opacity = '0.5';
                }
            });
        }

        function updateProgress() {
            const progressFill = document.querySelector('.progress-fill');
            const currentWidth = parseInt(progressFill.style.width) || 35;
            const newWidth = Math.min(currentWidth + 15, 100);
            
            progressFill.style.width = newWidth + '%';
            
            // Update score
            const scoreElement = document.querySelector('[class*="Score"]');
            if (scoreElement) {
                const currentScore = parseInt(scoreElement.textContent.match(/\d+/)[0]);
                scoreElement.textContent = `⭐ Score: ${currentScore + 150}`;
            }
            
            if (newWidth === 100) {
                setTimeout(() => {
                    alert('🎉 Congratulations! You completed the level!');
                }, 500);
            }
        }

        function goBack() {
            if (confirm('Are you sure you want to leave the game?')) {
                window.history.back();
            }
        }

        // Initialize game controls state
        document.addEventListener('DOMContentLoaded', function() {
            updateGameControls();
            
            // Handle fullscreen change events
            document.addEventListener('fullscreenchange', function() {
                if (!document.fullscreenElement) {
                    isFullscreen = false;
                    document.getElementById('fullscreen-icon').textContent = '⛶';
                }
            });
        });

        // Keyboard shortcuts
        document.addEventListener('keydown', function(e) {
            if (gameStarted) {
                switch(e.key) {
                    case ' ':
                        e.preventDefault();
                        pauseGame();
                        break;
                    case 'r':
                        if (e.ctrlKey) {
                            e.preventDefault();
                            restartGame();
                        }
                        break;
                    case 'f':
                        if (e.ctrlKey) {
                            e.preventDefault();
                            toggleFullscreen();
                        }
                        break;
                    case 'm':
                        toggleSound();
                        break;
                }
            }
        });
    </script>
</body>
</html>
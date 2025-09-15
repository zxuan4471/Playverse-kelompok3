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
                            <iframe 
    id="game-iframe" 
    src="{{ asset('storage/games/namafile/index.html') }}" 
    class="w-full h-full" 
    style="display:none; border:0;">
</iframe>
                        </div>
                    </div>

                    <!-- Comments Section (moved from controls position) -->
                    <div class="game-info-card p-6 mb-6">
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

                    <!-- Game Progress -->
                </div>

                <!-- Game Info Sidebar -->
                <div class="lg:col-span-1">
                    
                    <!-- Game Details (simplified) -->
                    <div class="game-info-card p-6 mb-6">
                        <div class="mb-4">
                            <h2 class="text-xl font-bold mb-2">Mystical Forest Adventure</h2>
                            <p class="text-gray-400 text-sm">by PixelCraft Studios</p>
                        </div>

                        <div class="space-y-3 mb-6">
                            <div class="flex items-center justify-between">
                                <span class="text-gray-400">Price:</span>
                                <span class="text-green-400 font-bold">Free</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="text-gray-400">Genre:</span>
                                <span class="bg-purple-600/30 text-purple-300 px-2 py-1 rounded-lg text-xs">Adventure</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="text-gray-400">Status:</span>
                                <span class="bg-green-600/30 text-green-300 px-2 py-1 rounded-lg text-xs">Released</span>
                            </div>
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
                        </div>
                    </div>

                    <!-- Screenshots Section (replaced leaderboard) -->
                    <div class="game-info-card p-6 mb-6">
                        <h3 class="text-lg font-bold mb-4"> Screenshots</h3>
                        <div class="space-y-3">
                            <div class="aspect-video bg-gray-800/50 rounded-lg overflow-hidden">
                                <img src="https://via.placeholder.com/300x169/4338ca/ffffff?text=Screenshot+1" 
                                     alt="Game Screenshot 1" class="w-full h-full object-cover">
                            </div>
                            <div class="grid grid-cols-2 gap-2">
                                <div class="aspect-video bg-gray-800/50 rounded-lg overflow-hidden">
                                    <img src="https://via.placeholder.com/150x84/6366f1/ffffff?text=Screenshot+2" 
                                         alt="Game Screenshot 2" class="w-full h-full object-cover">
                                </div>
                                <div class="aspect-video bg-gray-800/50 rounded-lg overflow-hidden">
                                    <img src="https://via.placeholder.com/150x84/8b5cf6/ffffff?text=Screenshot+3" 
                                         alt="Game Screenshot 3" class="w-full h-full object-cover">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
document.addEventListener("DOMContentLoaded", function() {
    const startBtn = document.querySelector(".btn-neon");
    const overlay = document.getElementById("game-overlay");
    const iframe = document.getElementById("game-iframe");

    startBtn.addEventListener("click", function() {
        overlay.style.display = "none";
        iframe.style.display = "block";
    });
});
</script>

</body>
</html>
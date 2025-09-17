<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Playverse</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        .game-frame {
    position: relative;
    width: 100%;
    height: 80vh; /* kotak utama */
    background: #000; /* biar tidak ada putih */
    overflow: hidden;
    border-radius: 0.5rem;
}

#game-iframe {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    border: none;
}

    </style>
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
                                    <h2 class="text-3xl font-bold mb-4 gradient-text">{{ $game->title }}</h2>
                                    <p class="text-gray-300 mb-6 max-w-md">Klik tombol di bawah untuk memulai permainan!
                                    </p>
                                    <button id="start-game-btn" class="btn-neon px-8 py-4 rounded-xl font-bold text-lg">
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
                            <div class="game-frame">
    <iframe id="game-iframe"
            src="{{ asset($game->game_file) }}"
            frameborder="0"
            allowfullscreen>
    </iframe>
</div>




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
                                    <div
                                        class="w-6 h-6 bg-blue-500 rounded-full flex items-center justify-center text-xs mr-2">
                                        G</div>
                                    <span class="font-semibold text-sm">GameLover99</span>
                                    <span class="text-gray-500 text-xs ml-auto">2h ago</span>
                                </div>
                                <p class="text-gray-300 text-sm">Amazing game! The graphics are beautiful and the
                                    puzzles are challenging but fair.</p>
                            </div>

                            <div class="comment-card">
                                <div class="flex items-center mb-2">
                                    <div
                                        class="w-6 h-6 bg-purple-500 rounded-full flex items-center justify-center text-xs mr-2">
                                        A</div>
                                    <span class="font-semibold text-sm">AdventureSeeker</span>
                                    <span class="text-gray-500 text-xs ml-auto">5h ago</span>
                                </div>
                                <p class="text-gray-300 text-sm">Love the atmospheric music and sound effects. Really
                                    immersive experience!</p>
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
                            <h2 class="text-3xl font-bold mb-4 gradient-text">{{ $game->title }}</h2>
                            <p class="text-gray-400 text-sm">by {{ $game->developer->name ?? 'Unknown' }}</p>
                        </div>

                        <div class="space-y-3 mb-6">
                            <div class="flex items-center justify-between">
                                <span class="text-gray-400">Price:</span>
                                <span class="text-green-400 font-bold">{{ ucfirst($game->pricing) }}</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="text-gray-400">Genre:</span>
                                <span
                                    class="bg-purple-600/30 text-purple-300 px-2 py-1 rounded-lg text-xs">{{ $game->category->name ?? 'Unknown' }}</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="text-gray-400">Status:</span>
                                <span class="bg-green-600/30 text-green-300 px-2 py-1 rounded-lg text-xs">
                                    {{ ucfirst($game->visibility) }}
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Game Description -->
                    <div class="game-info-card p-6 mb-6">
                        <h3 class="text-lg font-bold mb-4"> About This Game</h3>
                        <p class="text-gray-300 text-sm leading-relaxed mb-4">{{ $game->description }}</p>
                        <div class="space-y-2">
                        </div>
                    </div>

                    <!-- Screenshots Section (replaced leaderboard) -->
                    <div class="game-info-card p-6 mb-6">
                        <h3 class="text-lg font-bold mb-4"> Screenshots</h3>
                        <div class="space-y-3">
                            @foreach($game->screenshots as $screenshot)
                                <div class="aspect-video bg-gray-800/50 rounded-lg overflow-hidden">
                                    <img src="{{ asset('storage/' . $screenshot->screenshots_path) }}" alt="Game Screenshot"
                                        class="w-full h-full object-cover">
                                </div>
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
    document.addEventListener("DOMContentLoaded", function () {
        const startBtn = document.getElementById("start-game-btn");
        const overlay = document.getElementById("game-overlay");
        const iframe = document.getElementById("game-iframe");
        const loading = document.getElementById("loading-state");

        if (startBtn) {
            startBtn.addEventListener("click", function () {
                overlay.style.display = "none";        // Hilangkan overlay
                loading.classList.remove("hidden");   // Tampilkan loading

                // Refresh src iframe supaya game benar-benar load ulang
                iframe.src = iframe.getAttribute("src");

                iframe.onload = function () {
                    loading.classList.add("hidden");   // Sembunyikan loading
                    iframe.classList.remove("hidden"); // Tampilkan game
                };
            });
        }
    });
</script>




</body>

</html>
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
            height: 70vh;
            background: #000;
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
            overflow: hidden;
        }

        #game-iframe::-webkit-scrollbar {
            display: none;
        }

        .game-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.8);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 10;
        }

        .loading-spinner {
            width: 40px;
            height: 40px;
            border: 4px solid rgba(59, 130, 246, 0.3);
            border-top: 4px solid #3b82f6;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }
    </style>
</head>

<body class="text-white min-h-screen">
    @include('partials.navbar')

    <!-- Main Content -->
    <div class="pt-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

            <!-- Game Player Section (full width atas) -->
            <div class="mb-8">
                

                    
                        <!-- Overlay -->
                       <iframe 
  src="{{ asset($game->game_file) }}"
  style="width:960px; height:700px; border:none; display:block; margin:0 auto;"
  allowfullscreen>
</iframe>

                    
                
            </div>

            <!-- Info + Screenshots (grid 2 kolom) -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
                <!-- Info -->
                <div>
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
                                <span class="bg-purple-600/30 text-purple-300 px-2 py-1 rounded-lg text-xs">
                                    {{ $game->category->name ?? 'Unknown' }}
                                </span>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="text-gray-400">Status:</span>
                                <span class="bg-green-600/30 text-green-300 px-2 py-1 rounded-lg text-xs">
                                    {{ ucfirst($game->visibility) }}
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="game-info-card p-6">
                        <h3 class="text-lg font-bold mb-4">About This Game</h3>
                        <p class="text-gray-300 text-sm leading-relaxed mb-4">
                            {{ $game->description }}
                        </p>
                    </div>
                </div>

                <!-- Screenshots -->
                <div>
                    <div class="game-info-card p-6">
                        <h3 class="text-lg font-bold mb-4">Screenshots</h3>
                        <div class="space-y-4">
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

            <!-- Comments (full width bawah) -->
            <div class="game-info-card p-6">
                <h3 class="text-lg font-bold mb-4">Comments</h3>
                <div class="mb-4">
                    <textarea placeholder="Write a comment..."
                        class="w-full bg-gray-800/50 border border-blue-500/30 rounded-lg p-3 text-sm text-white placeholder-gray-400 resize-none"
                        rows="3"></textarea>
                    <button class="mt-2 btn-neon px-4 py-2 rounded-lg text-sm font-medium">
                        Post Comment
                    </button>
                </div>

                <!-- Sample comments -->
                <div class="space-y-3 max-h-60 overflow-y-auto">
                    <div class="comment-card">
                        <div class="flex items-center mb-2">
                            <div class="w-6 h-6 bg-blue-500 rounded-full flex items-center justify-center text-xs mr-2">
                                G</div>
                            <span class="font-semibold text-sm">GameLover99</span>
                            <span class="text-gray-500 text-xs ml-auto">2h ago</span>
                        </div>
                        <p class="text-gray-300 text-sm">Amazing game! The graphics are beautiful and the puzzles are
                            challenging but fair.</p>
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
                    overlay.style.display = "none";
                    loading.classList.remove("hidden");

                    iframe.src = iframe.getAttribute("src");
                    iframe.onload = function () {
                        loading.classList.add("hidden");
                        iframe.classList.remove("hidden");
                    };
                });
            }
        });
    </script>
</body>

</html>
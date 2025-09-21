<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pixel Character Pack - Playverse Assets</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .asset-frame {
            position: relative;
            width: 100%;
            height: 80vh;
            background: #000;
            overflow: hidden;
            border-radius: 0.5rem;
        }

        #asset-preview {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: none;
        }

        #asset-preview {
            overflow: hidden;
            scrollbar-width: none;
        }

        #asset-preview::-webkit-scrollbar {
            display: none;
        }
        
        .gradient-text {
            background: linear-gradient(to right, #8B5CF6, #3B82F6);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }
        
        .game-info-card {
            background: rgba(30, 41, 59, 0.5);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(59, 130, 246, 0.2);
            border-radius: 0.75rem;
        }
        
        .comment-card {
            background: rgba(30, 41, 59, 0.3);
            border-radius: 0.5rem;
            padding: 0.75rem;
        }
        
        .loading-spinner {
            border: 3px solid rgba(59, 130, 246, 0.3);
            border-radius: 50%;
            border-top: 3px solid #3B82F6;
            width: 40px;
            height: 40px;
            animation: spin 1s linear infinite;
        }
        
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        
        .btn-neon {
            background: linear-gradient(45deg, #8B5CF6, #3B82F6);
            box-shadow: 0 0 15px rgba(59, 130, 246, 0.5);
            transition: all 0.3s ease;
        }
        
        .btn-neon:hover {
            box-shadow: 0 0 20px rgba(59, 130, 246, 0.8);
        }
    </style>
</head>
<body class="text-white min-h-screen">
    @include('partials.navbar')

    <!-- Main Content -->
    <div class="pt-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                <!-- Asset Preview Section -->
                <div class="lg:col-span-2">
                    <!-- Asset Container -->
                    <div class="game-container mb-6">
                        <div class="fullscreen-btn">
                            <span id="fullscreen-icon"></span>
                        </div>

                        <div class="asset-frame" id="asset-frame">
                            <!-- Overlay (tombol mulai preview) -->
                            <div class="game-overlay" id="asset-overlay">
                                <div class="text-center">
                                    <h2 class="text-3xl font-bold mb-4 gradient-text">Pixel Character Pack</h2>
                                    <p class="text-gray-300 mb-6 max-w-md">
                                        Klik tombol di bawah untuk melihat preview asset!
                                    </p>
                                    <button id="start-preview-btn" class="btn-neon px-8 py-4 rounded-xl font-bold text-lg">
                                        Lihat Preview
                                    </button>
                                </div>
                            </div>

                            <!-- Loading state -->
                            <div id="loading-state" class="hidden absolute inset-0 flex flex-col items-center justify-center bg-black/80">
                                <div class="loading-spinner mb-4"></div>
                                <p class="text-gray-300">Loading preview...</p>
                            </div>

                            <!-- Asset Preview -->
                            <div id="asset-preview-container" class="hidden w-full h-full">
                                <img id="asset-preview" src="https://via.placeholder.com/800x600/4f46e5/ffffff?text=Pixel+Character+Pack+Preview" alt="Asset Preview" class="w-full h-full object-contain">
                                
                                <!-- Preview Navigation -->
                                <div class="absolute bottom-4 left-0 right-0 flex justify-center space-x-2">
                                    <button class="bg-black/50 hover:bg-black/70 w-10 h-10 rounded-full flex items-center justify-center">
                                        <i class="fas fa-chevron-left"></i>
                                    </button>
                                    <button class="bg-black/50 hover:bg-black/70 w-10 h-10 rounded-full flex items-center justify-center">
                                        <i class="fas fa-chevron-right"></i>
                                    </button>
                                </div>
                                
                                <!-- Preview Indicators -->
                                <div class="absolute bottom-4 right-4 flex space-x-1">
                                    <div class="w-2 h-2 bg-white rounded-full"></div>
                                    <div class="w-2 h-2 bg-white/50 rounded-full"></div>
                                    <div class="w-2 h-2 bg-white/50 rounded-full"></div>
                                    <div class="w-2 h-2 bg-white/50 rounded-full"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Comments Section -->
                    <div class="game-info-card p-6 mb-6">
                        <h3 class="text-lg font-bold mb-4">Komentar</h3>

                        <!-- Comment Form -->
                        <div class="mb-4">
                            <textarea placeholder="Tulis komentar..."
                                class="w-full bg-gray-800/50 border border-blue-500/30 rounded-lg p-3 text-sm text-white placeholder-gray-400 resize-none"
                                rows="3"></textarea>
                            <button class="mt-2 btn-neon px-4 py-2 rounded-lg text-sm font-medium">
                                Kirim Komentar
                            </button>
                        </div>

                        <!-- Comments List -->
                        <div class="space-y-3 max-h-60 overflow-y-auto">
                            <div class="comment-card">
                                <div class="flex items-center mb-2">
                                    <div class="w-6 h-6 bg-blue-500 rounded-full flex items-center justify-center text-xs mr-2">
                                        J
                                    </div>
                                    <span class="font-semibold text-sm">JohnDeveloper</span>
                                    <span class="text-gray-500 text-xs ml-auto">2 jam lalu</span>
                                </div>
                                <p class="text-gray-300 text-sm">Kualitas sprite sangat bagus! Animasi halus dan mudah diimplementasikan.</p>
                            </div>

                            <div class="comment-card">
                                <div class="flex items-center mb-2">
                                    <div class="w-6 h-6 bg-purple-500 rounded-full flex items-center justify-center text-xs mr-2">
                                        A
                                    </div>
                                    <span class="font-semibold text-sm">AnnaStudio</span>
                                    <span class="text-gray-500 text-xs ml-auto">5 jam lalu</span>
                                </div>
                                <p class="text-gray-300 text-sm">Variasi karakter yang banyak dan konsisten gayanya. File PSD sangat membantu!</p>
                            </div>
                            
                            <div class="comment-card">
                                <div class="flex items-center mb-2">
                                    <div class="w-6 h-6 bg-green-500 rounded-full flex items-center justify-center text-xs mr-2">
                                        M
                                    </div>
                                    <span class="font-semibold text-sm">MikeGameDev</span>
                                    <span class="text-gray-500 text-xs ml-auto">1 hari lalu</span>
                                </div>
                                <p class="text-gray-300 text-sm">Bagus untuk prototyping cepat. Worth every penny!</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Asset Info Sidebar -->
                <div class="lg:col-span-1">
                    <!-- Asset Details -->
                    <div class="game-info-card p-6 mb-6">
                        <div class="mb-4">
                            <h2 class="text-3xl font-bold mb-4 gradient-text">Pixel Character Pack</h2>
                            <p class="text-gray-400 text-sm">oleh PixelMaster Studio</p>
                        </div>

                        <div class="space-y-3 mb-6">
                            <div class="flex items-center justify-between">
                                <span class="text-gray-400">Harga:</span>
                                <span class="text-green-400 font-bold">Rp. 12.000</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="text-gray-400">Kategori:</span>
                                <span class="bg-purple-600/30 text-purple-300 px-2 py-1 rounded-lg text-xs">Sprites</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="text-gray-400">Rating:</span>
                                <div class="flex items-center">
                                    <span class="text-yellow-400 mr-1">⭐⭐⭐⭐⭐</span>
                                    <span class="text-sm">4.9</span>
                                </div>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="text-gray-400">Status:</span>
                                <span class="bg-green-600/30 text-green-300 px-2 py-1 rounded-lg text-xs">
                                    Tersedia
                                </span>
                            </div>
                        </div>
                        
                        <div class="flex space-x-3">
                            <button class="flex-1 btn-neon py-3 rounded-lg font-semibold">
                                <i class="fas fa-shopping-cart mr-2"></i>Beli Sekarang
                            </button>
                            <button class="bg-gray-700 hover:bg-gray-600 w-12 h-12 rounded-lg flex items-center justify-center">
                                <i class="fas fa-heart"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Asset Description -->
                    <div class="game-info-card p-6 mb-6">
                        <h3 class="text-lg font-bold mb-4">Tentang Asset Ini</h3>
                        <p class="text-gray-300 text-sm leading-relaxed mb-4">
                            Pixel Character Pack adalah koleksi lengkap karakter pixel art berkualitas tinggi yang dirancang khusus untuk pengembang game indie. Paket ini berisi lebih dari 50 karakter dengan berbagai animasi yang siap digunakan dalam proyek game Anda.
                        </p>
                        <div class="space-y-2">
                            <div class="flex items-center text-gray-300 text-sm">
                                <i class="fas fa-check-circle text-green-400 mr-2"></i>
                                50+ karakter unik dengan berbagai profesi
                            </div>
                            <div class="flex items-center text-gray-300 text-sm">
                                <i class="fas fa-check-circle text-green-400 mr-2"></i>
                                Animasi lengkap: walking, running, idle, jumping
                            </div>
                            <div class="flex items-center text-gray-300 text-sm">
                                <i class="fas fa-check-circle text-green-400 mr-2"></i>
                                Format PNG dengan background transparan
                            </div>
                            <div class="flex items-center text-gray-300 text-sm">
                                <i class="fas fa-check-circle text-green-400 mr-2"></i>
                                Lisensi komersial untuk semua proyek
                            </div>
                        </div>
                    </div>

                    <!-- Technical Specifications -->
                    <div class="game-info-card p-6 mb-6">
                        <h3 class="text-lg font-bold mb-4">Spesifikasi Teknis</h3>
                        <div class="space-y-3">
                            <div class="flex justify-between">
                                <span class="text-gray-400 text-sm">Format File:</span>
                                <span class="text-sm">PNG, PSD</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-400 text-sm">Resolusi:</span>
                                <span class="text-sm">32x32px, 64x64px</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-400 text-sm">Frame Rate:</span>
                                <span class="text-sm">12 FPS</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-400 text-sm">Ukuran File:</span>
                                <span class="text-sm">45 MB</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-400 text-sm">Kompatibilitas:</span>
                                <span class="text-sm">Unity, Godot, Construct</span>
                            </div>
                        </div>
                    </div>

                    <!-- Screenshots Section -->
                    <div class="game-info-card p-6">
                        <h3 class="text-lg font-bold mb-4">Preview</h3>
                        <div class="space-y-3">
                            <div class="aspect-video bg-gray-800/50 rounded-lg overflow-hidden">
                                <img src="https://via.placeholder.com/400x225/4f46e5/ffffff?text=Character+Preview" alt="Asset Preview" class="w-full h-full object-cover">
                            </div>
                            <div class="aspect-video bg-gray-800/50 rounded-lg overflow-hidden">
                                <img src="https://via.placeholder.com/400x225/7c3aed/ffffff?text=Animation+Preview" alt="Asset Preview" class="w-full h-full object-cover">
                            </div>
                            <div class="aspect-video bg-gray-800/50 rounded-lg overflow-hidden">
                                <img src="https://via.placeholder.com/400x225/2563eb/ffffff?text=Sprite+Sheet" alt="Asset Preview" class="w-full h-full object-cover">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const startBtn = document.getElementById("start-preview-btn");
            const overlay = document.getElementById("asset-overlay");
            const previewContainer = document.getElementById("asset-preview-container");
            const loading = document.getElementById("loading-state");

            if (startBtn) {
                startBtn.addEventListener("click", function () {
                    overlay.style.display = "none";        // Hilangkan overlay
                    loading.classList.remove("hidden");   // Tampilkan loading

                    // Simulasi loading preview
                    setTimeout(() => {
                        loading.classList.add("hidden");   // Sembunyikan loading
                        previewContainer.classList.remove("hidden"); // Tampilkan preview
                    }, 1500);
                });
            }
        });
    </script>
</body>
</html>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Playverse - Game Details</title>
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
        
        .details-card {
            background: linear-gradient(145deg, #1e1e3f 0%, #2a2a5a 100%);
            border: 1px solid rgba(59, 130, 246, 0.2);
            backdrop-filter: blur(10px);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }
        
        .details-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(59, 130, 246, 0.15), 0 0 20px rgba(59, 130, 246, 0.1);
            border-color: rgba(59, 130, 246, 0.4);
        }
        
        .upload-zone {
            border: 2px dashed rgba(59, 130, 246, 0.3);
            background: rgba(59, 130, 246, 0.05);
            transition: all 0.3s ease;
        }
        
        .upload-zone:hover {
            border-color: rgba(59, 130, 246, 0.6);
            background: rgba(59, 130, 246, 0.1);
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
        
        .btn-secondary {
            background: linear-gradient(45deg, #6b7280, #4b5563);
            transition: all 0.3s ease;
        }
        
        .btn-secondary:hover {
            background: linear-gradient(45deg, #9ca3af, #6b7280);
            transform: translateY(-1px);
        }
        
        .gradient-text {
            background: linear-gradient(45deg, #3b82f6, #8b5cf6, #06b6d4);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .step-indicator {
            background: rgba(59, 130, 246, 0.1);
            border: 2px solid rgba(59, 130, 246, 0.3);
        }
        
        .step-indicator.active {
            background: linear-gradient(45deg, #3b82f6, #1d4ed8);
            border-color: #3b82f6;
            box-shadow: 0 0 15px rgba(59, 130, 246, 0.4);
        }
        
        .step-indicator.completed {
            background: linear-gradient(45deg, #22c55e, #16a34a);
            border-color: #22c55e;
        }
        
        .form-input {
            background: rgba(30, 30, 63, 0.8);
            border: 1px solid rgba(59, 130, 246, 0.3);
            backdrop-filter: blur(10px);
            transition: all 0.3s ease;
            color: white;
        }
        
        .form-input:focus {
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
            outline: none;
        }
        
        .form-input::placeholder {
            color: rgba(156, 163, 175, 0.7);
        }
        
        .tag-input {
            background: rgba(59, 130, 246, 0.1);
            border: 1px solid rgba(59, 130, 246, 0.3);
            color: white;
            padding: 4px 8px;
            border-radius: 16px;
            font-size: 12px;
            margin: 2px;
            display: inline-flex;
            align-items: center;
        }
        
        .category-option {
            background: rgba(30, 30, 63, 0.6);
            border: 1px solid rgba(59, 130, 246, 0.2);
            transition: all 0.3s ease;
            cursor: pointer;
        }
        
        .category-option:hover {
            border-color: rgba(59, 130, 246, 0.5);
            background: rgba(59, 130, 246, 0.1);
        }
        
        .category-option.selected {
            border-color: #3b82f6;
            background: rgba(59, 130, 246, 0.2);
            box-shadow: 0 0 15px rgba(59, 130, 246, 0.3);
        }
        
        .screenshot-preview {
            background: rgba(15, 15, 35, 0.9);
            border: 1px solid rgba(59, 130, 246, 0.2);
            backdrop-filter: blur(10px);
            border-radius: 8px;
            overflow: hidden;
        }
        
        .monetization-option {
            background: rgba(30, 30, 63, 0.6);
            border: 1px solid rgba(59, 130, 246, 0.2);
            transition: all 0.3s ease;
            cursor: pointer;
        }
        
        .monetization-option:hover {
            border-color: rgba(59, 130, 246, 0.5);
            background: rgba(59, 130, 246, 0.1);
        }
        
        .monetization-option.selected {
            border-color: #3b82f6;
            background: rgba(59, 130, 246, 0.2);
            box-shadow: 0 0 15px rgba(59, 130, 246, 0.3);
        }
    </style>
</head>
<body class="text-white min-h-screen">

    <!-- Main Navigation -->
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
                        <span class="ml-2 px-2 py-1 bg-purple-600 text-xs rounded-full">DEV</span>
                    </div>
                </div>

                <!-- Navigation Links -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="#" class="text-gray-300 hover:text-white px-3 py-2 text-sm font-medium transition-colors">Home</a>
                    <a href="#" class="text-white px-3 py-2 text-sm font-medium transition-colors border-b-2 border-blue-500">Developer Mode</a>
                    <a href="#" class="text-gray-300 hover:text-white px-3 py-2 text-sm font-medium transition-colors">Community</a>
                </div>

                <!-- User Actions -->
                <div class="flex items-center space-x-4">
                    <div class="relative">
                        <button class="bg-gray-800/50 border border-blue-500/30 rounded-lg px-3 py-2 text-sm text-white">
                            🔔 <span class="ml-1 bg-red-500 text-xs px-1.5 py-0.5 rounded-full">3</span>
                        </button>
                    </div>
                    <div class="flex items-center space-x-2">
                        <div class="w-8 h-8 bg-gradient-to-r from-purple-500 to-blue-500 rounded-full"></div>
                        <span class="text-sm font-medium">Developer</span>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="pt-24">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="mb-8">
                <div class="flex items-center justify-between">
                    <div>
                        <h1 class="text-3xl font-bold gradient-text">Game Details</h1>
                        <p class="text-gray-400 mt-2">Lengkapi informasi game Anda untuk publikasi</p>
                    </div>
                    <button class="btn-secondary px-4 py-2 rounded-lg text-sm font-medium">
                        ← Kembali ke Upload
                    </button>
                </div>
            </div>

            <!-- Progress Steps -->
            <div class="mb-12">
                <div class="flex items-center justify-center space-x-8">
                    <div class="flex items-center">
                        <div class="step-indicator completed w-10 h-10 rounded-full flex items-center justify-center text-sm font-bold">✓</div>
                        <span class="ml-2 text-sm font-medium text-green-400">Upload File</span>
                    </div>
                    <div class="w-16 h-1 bg-green-500 rounded-full"></div>
                    <div class="flex items-center">
                        <div class="step-indicator active w-10 h-10 rounded-full flex items-center justify-center text-sm font-bold">2</div>
                        <span class="ml-2 text-sm font-medium text-white">Detail Game</span>
                    </div>
                    <div class="w-16 h-1 bg-gray-600 rounded-full">
                        <div class="w-0 h-full bg-gradient-to-r from-blue-500 to-purple-500 rounded-full transition-all duration-500"></div>
                    </div>
                    <div class="flex items-center">
                        <div class="step-indicator w-10 h-10 rounded-full flex items-center justify-center text-sm font-bold">3</div>
                        <span class="ml-2 text-sm font-medium text-gray-400">Publikasi</span>
                    </div>
                </div>
            </div>

            <!-- Main Form -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Left Column - Basic Info -->
                <div class="lg:col-span-2 space-y-6">
                    <!-- Basic Information -->
                    <div class="details-card rounded-xl p-6">
                        <h2 class="text-xl font-bold text-white mb-6">📝 Informasi Dasar</h2>
                        
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-300 mb-2">Nama Game *</label>
                                <input type="text" class="form-input w-full px-4 py-3 rounded-lg" placeholder="Masukkan nama game Anda" value="Mystical Forest Adventure">
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-300 mb-2">Tagline Singkat</label>
                                <input type="text" class="form-input w-full px-4 py-3 rounded-lg" placeholder="Deskripsi singkat yang menarik" value="An enchanting journey through magical realms">
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-300 mb-2">Deskripsi Game *</label>
                                <textarea class="form-input w-full px-4 py-3 rounded-lg h-32 resize-none" placeholder="Ceritakan tentang game Anda...">Embark on an epic adventure through mystical forests filled with ancient magic, dangerous creatures, and hidden treasures. Solve puzzles, battle monsters, and uncover the secrets of the enchanted realm in this captivating RPG experience.</textarea>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-300 mb-2">Version</label>
                                    <input type="text" class="form-input w-full px-4 py-3 rounded-lg" placeholder="1.0.0" value="1.2.3">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-300 mb-2">Developer/Studio</label>
                                    <input type="text" class="form-input w-full px-4 py-3 rounded-lg" placeholder="Nama developer" value="Mystic Games Studio">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Category & Tags -->
                    <div class="details-card rounded-xl p-6">
                        <h2 class="text-xl font-bold text-white mb-6">🏷️ Kategori & Tag</h2>
                        
                        <div class="space-y-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-300 mb-4">Pilih Kategori *</label>
                                <div class="grid grid-cols-2 md:grid-cols-3 gap-3">
                                    <div class="category-option selected rounded-lg p-3 text-center">
                                        <div class="text-2xl mb-1">🗡️</div>
                                        <span class="text-sm font-medium">RPG</span>
                                    </div>
                                    <div class="category-option rounded-lg p-3 text-center">
                                        <div class="text-2xl mb-1">🎯</div>
                                        <span class="text-sm font-medium">Action</span>
                                    </div>
                                    <div class="category-option rounded-lg p-3 text-center">
                                        <div class="text-2xl mb-1">🧩</div>
                                        <span class="text-sm font-medium">Puzzle</span>
                                    </div>
                                    <div class="category-option rounded-lg p-3 text-center">
                                        <div class="text-2xl mb-1">🏃</div>
                                        <span class="text-sm font-medium">Platformer</span>
                                    </div>
                                    <div class="category-option rounded-lg p-3 text-center">
                                        <div class="text-2xl mb-1">🚗</div>
                                        <span class="text-sm font-medium">Racing</span>
                                    </div>
                                    <div class="category-option rounded-lg p-3 text-center">
                                        <div class="text-2xl mb-1">🎲</div>
                                        <span class="text-sm font-medium">Strategy</span>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-300 mb-2">Tags Game</label>
                                <input type="text" class="form-input w-full px-4 py-3 rounded-lg" placeholder="Ketik tag dan tekan Enter" id="tag-input">
                                <div class="mt-3 min-h-[40px] flex flex-wrap" id="tags-container">
                                    <span class="tag-input">fantasy <button class="ml-1 text-red-400">×</button></span>
                                    <span class="tag-input">adventure <button class="ml-1 text-red-400">×</button></span>
                                    <span class="tag-input">magic <button class="ml-1 text-red-400">×</button></span>
                                    <span class="tag-input">singleplayer <button class="ml-1 text-red-400">×</button></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Screenshots & Media -->
                    <div class="details-card rounded-xl p-6">
                        <h2 class="text-xl font-bold text-white mb-6">🖼️ Screenshots & Media</h2>
                        
                        <div class="space-y-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-300 mb-4">Screenshots Game (Min. 3, Max. 8)</label>
                                <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                                    <div class="screenshot-preview aspect-video bg-gradient-to-br from-purple-600 to-blue-600 flex items-center justify-center relative group">
                                        <span class="text-white font-medium">Screenshot 1</span>
                                        <button class="absolute top-2 right-2 bg-red-500 text-white rounded-full w-6 h-6 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">×</button>
                                    </div>
                                    <div class="screenshot-preview aspect-video bg-gradient-to-br from-green-600 to-cyan-600 flex items-center justify-center relative group">
                                        <span class="text-white font-medium">Screenshot 2</span>
                                        <button class="absolute top-2 right-2 bg-red-500 text-white rounded-full w-6 h-6 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">×</button>
                                    </div>
                                    <div class="upload-zone aspect-video rounded-lg flex flex-col items-center justify-center cursor-pointer">
                                        <div class="text-3xl mb-2">📸</div>
                                        <span class="text-sm text-center">Add Screenshot</span>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-300 mb-4">Trailer Video (Opsional)</label>
                                <div class="upload-zone rounded-lg p-8 text-center">
                                    <div class="text-4xl mb-3">🎥</div>
                                    <h3 class="text-lg font-bold text-white mb-2">Upload Trailer</h3>
                                    <p class="text-gray-400 text-sm mb-4">MP4, WebM, maksimal 100MB</p>
                                    <button class="btn-secondary px-6 py-2 rounded-lg">Choose File</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Column - Settings -->
                <div class="space-y-6">
                    <!-- Game Cover -->
                    <div class="details-card rounded-xl p-6">
                        <h2 class="text-lg font-bold text-white mb-4">🎨 Cover Game</h2>
                        
                        <div class="aspect-square bg-gradient-to-br from-purple-600 via-blue-600 to-cyan-600 rounded-lg mb-4 flex items-center justify-center relative group">
                            <span class="text-white font-bold text-lg">Cover Image</span>
                            <div class="absolute inset-0 bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 transition-opacity rounded-lg flex items-center justify-center">
                                <button class="btn-neon px-4 py-2 rounded-lg">Change Cover</button>
                            </div>
                        </div>
                        
                        <p class="text-gray-400 text-xs">Ratio 1:1 (512x512px recommended)</p>
                    </div>

                    <!-- Game Settings -->
                    <div class="details-card rounded-xl p-6">
                        <h2 class="text-lg font-bold text-white mb-4">⚙️ Pengaturan</h2>
                        
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-300 mb-2">Resolusi Game</label>
                                <select class="form-input w-full px-4 py-3 rounded-lg">
                                    <option>1920x1080 (Full HD)</option>
                                    <option>1280x720 (HD)</option>
                                    <option>800x600 (Standard)</option>
                                    <option>Auto Scale</option>
                                </select>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-300 mb-2">Orientasi</label>
                                <div class="flex space-x-2">
                                    <button class="btn-neon flex-1 py-2 rounded-lg">Landscape</button>
                                    <button class="btn-secondary flex-1 py-2 rounded-lg">Portrait</button>
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-300 mb-2">Kontrol</label>
                                <div class="space-y-2 text-sm">
                                    <label class="flex items-center">
                                        <input type="checkbox" class="mr-2" checked>
                                        <span>Keyboard</span>
                                    </label>
                                    <label class="flex items-center">
                                        <input type="checkbox" class="mr-2" checked>
                                        <span>Mouse</span>
                                    </label>
                                    <label class="flex items-center">
                                        <input type="checkbox" class="mr-2">
                                        <span>Touch (Mobile)</span>
                                    </label>
                                    <label class="flex items-center">
                                        <input type="checkbox" class="mr-2">
                                        <span>Gamepad</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Monetization -->
                    <div class="details-card rounded-xl p-6">
                        <h2 class="text-lg font-bold text-white mb-4">💰 Monetisasi</h2>
                        
                        <div class="space-y-3">
                            <div class="monetization-option selected rounded-lg p-3 border">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <h3 class="font-bold text-white text-sm">Free to Play</h3>
                                        <p class="text-xs text-gray-400">Gratis dengan iklan</p>
                                    </div>
                                    <div class="text-lg">🆓</div>
                                </div>
                            </div>
                            
                            <div class="monetization-option rounded-lg p-3 border">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <h3 class="font-bold text-white text-sm">Premium</h3>
                                        <p class="text-xs text-gray-400">Bayar sekali main</p>
                                    </div>
                                    <div class="text-lg">💎</div>
                                </div>
                            </div>
                            
                            <div class="monetization-option rounded-lg p-3 border">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <h3 class="font-bold text-white text-sm">Freemium</h3>
                                        <p class="text-xs text-gray-400">Gratis + In-App Purchase</p>
                                    </div>
                                    <div class="text-lg">🛒</div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-4 pt-4 border-t border-gray-600">
                            <div class="flex items-center justify-between text-sm">
                                <span class="text-gray-400">Revenue Share</span>
                                <span class="text-white font-bold">70% / 30%</span>
                            </div>
                        </div>
                    </div>

                    <!-- Visibility -->
                    <div class="details-card rounded-xl p-6">
                        <h2 class="text-lg font-bold text-white mb-4">👁️ Visibilitas</h2>
                        
                        <div class="space-y-3">
                            <label class="flex items-center justify-between">
                                <span class="text-sm text-gray-300">Publish setelah review</span>
                                <input type="checkbox" class="toggle" checked>
                            </label>
                            
                            <label class="flex items-center justify-between">
                                <span class="text-sm text-gray-300">Allow comments</span>
                                <input type="checkbox" class="toggle" checked>
                            </label>
                            
                            <label class="flex items-center justify-between">
                                <span class="text-sm text-gray-300">Show on featured</span>
                                <input type="checkbox" class="toggle">
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex items-center justify-center space-x-4 my-12">
                <button class="btn-secondary px-8 py-3 rounded-lg font-medium">
                    ← Previous Step
                </button>
                <button class="btn-secondary px-6 py-3 rounded-lg font-medium">
                    Save Draft
                </button>
                <a href="{{ url('/publish-game') }}">
                <button class="btn-neon px-8 py-3 rounded-lg font-medium">
                    Next: Publikasi →
                </button>
                </a>
            </div>
        </div>
    </div>
    </body>
    </html>
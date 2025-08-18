<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Playverse - Game Publication</title>
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
        
        .btn-success {
            background: linear-gradient(45deg, #22c55e, #16a34a);
            box-shadow: 0 0 15px rgba(34, 197, 94, 0.4);
            transition: all 0.3s ease;
        }
        
        .btn-success:hover {
            box-shadow: 0 0 25px rgba(34, 197, 94, 0.6), 0 0 35px rgba(34, 197, 94, 0.3);
            transform: translateY(-2px);
        }
        
        .btn-warning {
            background: linear-gradient(45deg, #f59e0b, #d97706);
            box-shadow: 0 0 15px rgba(245, 158, 11, 0.4);
            transition: all 0.3s ease;
        }
        
        .btn-warning:hover {
            box-shadow: 0 0 25px rgba(245, 158, 11, 0.6), 0 0 35px rgba(245, 158, 11, 0.3);
            transform: translateY(-2px);
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
        
        .game-preview {
            background: linear-gradient(145deg, #1e1e3f 0%, #2a2a5a 100%);
            border: 1px solid rgba(59, 130, 246, 0.3);
            backdrop-filter: blur(10px);
        }
        
        .status-badge {
            padding: 4px 12px;
            border-radius: 16px;
            font-size: 12px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .status-pending {
            background: rgba(245, 158, 11, 0.2);
            color: #f59e0b;
            border: 1px solid rgba(245, 158, 11, 0.3);
        }
        
        .status-published {
            background: rgba(34, 197, 94, 0.2);
            color: #22c55e;
            border: 1px solid rgba(34, 197, 94, 0.3);
        }
        
        .checklist-item {
            display: flex;
            items: center;
            padding: 12px;
            background: rgba(30, 30, 63, 0.5);
            border: 1px solid rgba(59, 130, 246, 0.2);
            border-radius: 8px;
            transition: all 0.3s ease;
        }
        
        .checklist-item.completed {
            background: rgba(34, 197, 94, 0.1);
            border-color: rgba(34, 197, 94, 0.3);
        }
        
        .checklist-item.warning {
            background: rgba(245, 158, 11, 0.1);
            border-color: rgba(245, 158, 11, 0.3);
        }
        
        .pulse-animation {
            animation: pulse 2s infinite;
        }
        
        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.7; }
        }
        
        .celebration-animation {
            animation: celebration 0.8s ease-out;
        }
        
        @keyframes celebration {
            0% { transform: scale(0.8); opacity: 0; }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); opacity: 1; }
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
                            <span class="text-white font-bold text-lg">P</span>
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
                        <h1 class="text-3xl font-bold gradient-text">Game Publication</h1>
                        <p class="text-gray-400 mt-2">Review dan publikasikan game Anda ke platform</p>
                    </div>
                    <button class="btn-secondary px-4 py-2 rounded-lg text-sm font-medium" onclick="goToDashboard()">
                        ← Kembali ke Dashboard
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
                        <div class="step-indicator completed w-10 h-10 rounded-full flex items-center justify-center text-sm font-bold">✓</div>
                        <span class="ml-2 text-sm font-medium text-green-400">Detail Game</span>
                    </div>
                    <div class="w-16 h-1 bg-green-500 rounded-full"></div>
                    <div class="flex items-center">
                        <div class="step-indicator active w-10 h-10 rounded-full flex items-center justify-center text-sm font-bold">3</div>
                        <span class="ml-2 text-sm font-medium text-white">Publikasi</span>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Left Column - Game Preview & Review -->
                <div class="lg:col-span-2 space-y-6">
                    <!-- Game Preview -->
                    <div class="details-card rounded-xl p-6">
                        <h2 class="text-xl font-bold text-white mb-6">🎮 Preview Game</h2>
                        
                        <div class="game-preview rounded-lg p-6">
                            <div class="flex items-start space-x-4">
                                <div class="w-24 h-24 bg-gradient-to-br from-purple-600 via-blue-600 to-cyan-600 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <span class="text-white font-bold text-sm">Cover</span>
                                </div>
                                <div class="flex-1">
                                    <div class="flex items-center space-x-3 mb-2">
                                        <h3 class="text-xl font-bold text-white">Mystical Forest Adventure</h3>
                                        <span class="status-badge status-pending">Pending Review</span>
                                    </div>
                                    <p class="text-sm text-gray-400 mb-2">An enchanting journey through magical realms</p>
                                    <div class="flex items-center space-x-4 text-sm text-gray-300">
                                        <span>🗡️ RPG</span>
                                        <span>v1.2.3</span>
                                        <span>Mystic Games Studio</span>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="mt-6 pt-4 border-t border-gray-600">
                                <p class="text-gray-300 text-sm leading-relaxed">
                                    Embark on an epic adventure through mystical forests filled with ancient magic, dangerous creatures, and hidden treasures. Solve puzzles, battle monsters, and uncover the secrets of the enchanted realm...
                                </p>
                                
                                <div class="flex flex-wrap gap-2 mt-4">
                                    <span class="px-2 py-1 bg-blue-500/20 text-blue-300 rounded text-xs">fantasy</span>
                                    <span class="px-2 py-1 bg-blue-500/20 text-blue-300 rounded text-xs">adventure</span>
                                    <span class="px-2 py-1 bg-blue-500/20 text-blue-300 rounded text-xs">magic</span>
                                    <span class="px-2 py-1 bg-blue-500/20 text-blue-300 rounded text-xs">singleplayer</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Pre-Publication Checklist -->
                    <div class="details-card rounded-xl p-6">
                        <h2 class="text-xl font-bold text-white mb-6">✅ Checklist Publikasi</h2>
                        
                        <div class="space-y-3">
                            <div class="checklist-item completed">
                                <div class="w-6 h-6 bg-green-500 rounded-full flex items-center justify-center mr-3 flex-shrink-0">
                                    <span class="text-white text-xs">✓</span>
                                </div>
                                <div>
                                    <h3 class="font-medium text-white text-sm">Game File Uploaded</h3>
                                    <p class="text-gray-400 text-xs">File game berhasil diupload dan dapat dijalankan</p>
                                </div>
                            </div>
                            
                            <div class="checklist-item completed">
                                <div class="w-6 h-6 bg-green-500 rounded-full flex items-center justify-center mr-3 flex-shrink-0">
                                    <span class="text-white text-xs">✓</span>
                                </div>
                                <div>
                                    <h3 class="font-medium text-white text-sm">Basic Information Complete</h3>
                                    <p class="text-gray-400 text-xs">Nama, deskripsi, dan informasi dasar lengkap</p>
                                </div>
                            </div>
                            
                            <div class="checklist-item completed">
                                <div class="w-6 h-6 bg-green-500 rounded-full flex items-center justify-center mr-3 flex-shrink-0">
                                    <span class="text-white text-xs">✓</span>
                                </div>
                                <div>
                                    <h3 class="font-medium text-white text-sm">Screenshots Added</h3>
                                    <p class="text-gray-400 text-xs">Minimal 3 screenshot game telah diupload</p>
                                </div>
                            </div>
                            
                            <div class="checklist-item completed">
                                <div class="w-6 h-6 bg-green-500 rounded-full flex items-center justify-center mr-3 flex-shrink-0">
                                    <span class="text-white text-xs">✓</span>
                                </div>
                                <div>
                                    <h3 class="font-medium text-white text-sm">Category & Tags Set</h3>
                                    <p class="text-gray-400 text-xs">Kategori dan tag game telah ditentukan</p>
                                </div>
                            </div>
                            
                            <div class="checklist-item warning">
                                <div class="w-6 h-6 bg-yellow-500 rounded-full flex items-center justify-center mr-3 flex-shrink-0">
                                    <span class="text-white text-xs">!</span>
                                </div>
                                <div>
                                    <h3 class="font-medium text-white text-sm">Trailer Video (Optional)</h3>
                                    <p class="text-gray-400 text-xs">Video trailer belum diupload - tidak wajib tapi direkomendasikan</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Terms & Conditions -->
                    <div class="details-card rounded-xl p-6">
                        <h2 class="text-xl font-bold text-white mb-6">📋 Syarat & Ketentuan</h2>
                        
                        <div class="space-y-4">
                            <div class="bg-gray-800/50 rounded-lg p-4 max-h-40 overflow-y-auto">
                                <div class="text-sm text-gray-300 space-y-2">
                                    <p><strong>1. Konten Game:</strong> Game tidak boleh mengandung konten yang melanggar hukum, pornografi, kekerasan berlebihan, atau mendiskriminasi kelompok tertentu.</p>
                                    <p><strong>2. Hak Cipta:</strong> Developer menjamin bahwa game adalah karya asli atau memiliki lisensi yang sah untuk semua aset yang digunakan.</p>
                                    <p><strong>3. Revenue Share:</strong> Playverse mengambil 30% dari pendapatan game, developer mendapat 70%.</p>
                                    <p><strong>4. Review Process:</strong> Game akan melalui proses review 1-3 hari kerja sebelum dipublikasi.</p>
                                    <p><strong>5. Update Policy:</strong> Developer dapat mengupdate game kapan saja setelah review ulang jika diperlukan.</p>
                                </div>
                            </div>
                            
                            <label class="flex items-start space-x-3">
                                <input type="checkbox" id="terms-checkbox" class="mt-1">
                                <span class="text-sm text-gray-300">Saya telah membaca dan menyetujui <a href="#" class="text-blue-400 hover:underline">Syarat & Ketentuan Playverse</a> serta <a href="#" class="text-blue-400 hover:underline">Kebijakan Privasi</a></span>
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Right Column - Publication Options -->
                <div class="space-y-6">
                    <!-- Publication Status -->
                    <div class="details-card rounded-xl p-6">
                        <h2 class="text-lg font-bold text-white mb-4">📊 Status Publikasi</h2>
                        
                        <div class="text-center">
                            <div class="w-20 h-20 mx-auto mb-4 bg-gradient-to-r from-yellow-500 to-orange-500 rounded-full flex items-center justify-center pulse-animation">
                                <span class="text-2xl">⏳</span>
                            </div>
                            <h3 class="font-bold text-white mb-2">Ready for Review</h3>
                            <p class="text-gray-400 text-sm">Game siap untuk direview oleh tim Playverse</p>
                        </div>
                        
                        <div class="mt-6 pt-4 border-t border-gray-600">
                            <div class="text-xs text-gray-400 space-y-1">
                                <div class="flex justify-between">
                                    <span>Estimasi Review:</span>
                                    <span class="text-white">1-3 hari</span>
                                </div>
                                <div class="flex justify-between">
                                    <span>Auto Publish:</span>
                                    <span class="text-green-400">Aktif</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Publication Settings -->
                    <div class="details-card rounded-xl p-6">
                        <h2 class="text-lg font-bold text-white mb-4">⚙️ Pengaturan Publikasi</h2>
                        
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-300 mb-2">Tanggal Publikasi</label>
                                <select class="w-full px-3 py-2 bg-gray-800 border border-gray-600 rounded-lg text-white text-sm">
                                    <option>Segera setelah disetujui</option>
                                    <option>Jadwalkan tanggal</option>
                                </select>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-300 mb-2">Target Audience</label>
                                <div class="space-y-2">
                                    <label class="flex items-center text-sm">
                                        <input type="radio" name="audience" class="mr-2" checked>
                                        <span>Semua usia (General)</span>
                                    </label>
                                    <label class="flex items-center text-sm">
                                        <input type="radio" name="audience" class="mr-2">
                                        <span>Remaja (13+)</span>
                                    </label>
                                    <label class="flex items-center text-sm">
                                        <input type="radio" name="audience" class="mr-2">
                                        <span>Dewasa (18+)</span>
                                    </label>
                                </div>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-300 mb-2">Wilayah</label>
                                <select class="w-full px-3 py-2 bg-gray-800 border border-gray-600 rounded-lg text-white text-sm">
                                    <option>Global (Semua negara)</option>
                                    <option>Indonesia saja</option>
                                    <option>Asia Tenggara</option>
                                    <option>Custom regions</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Analytics Preview -->
                    <div class="details-card rounded-xl p-6">
                        <h2 class="text-lg font-bold text-white mb-4">📈 Analytics Preview</h2>
                        
                        <div class="text-center text-gray-400">
                            <div class="text-4xl mb-2">📊</div>
                            <p class="text-sm">Analytics akan tersedia setelah game dipublikasi</p>
                            <div class="mt-4 text-xs space-y-1">
                                <div>• Player statistics</div>
                                <div>• Revenue tracking</div>
                                <div>• User engagement</div>
                                <div>• Performance metrics</div>
                            </div>
                        </div>
                    </div>

                    <!-- Quick Actions -->
                    <div class="details-card rounded-xl p-6">
                        <h2 class="text-lg font-bold text-white mb-4">⚡ Quick Actions</h2>
                        
                        <div class="space-y-3">
                            <button class="w-full btn-secondary py-2 rounded-lg text-sm">
                                📝 Edit Game Details
                            </button>
                            <button class="w-full btn-secondary py-2 rounded-lg text-sm">
                                🖼️ Change Screenshots
                            </button>
                            <button class="w-full btn-secondary py-2 rounded-lg text-sm">
                                🎥 Add Trailer
                            </button>
                            <button class="w-full btn-warning py-2 rounded-lg text-sm">
                                💾 Save as Draft
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex items-center justify-center space-x-4 my-12">
                <button class="btn-secondary px-8 py-3 rounded-lg font-medium">
                    ← Previous Step
                </button>
                <button class="btn-warning px-6 py-3 rounded-lg font-medium">
                    Save Draft
                </button>
                <a href="{{ url('/developer') }}">
                <button id="publish-btn" class="btn-success px-8 py-3 rounded-lg font-medium" onclick="publishGame()" >
                    🚀 Publish Game
                </button>
                </a>
            </div>

            <!-- Success Modal (Hidden) -->
            <div id="success-modal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
                <div class="details-card rounded-xl p-8 max-w-md mx-4 celebration-animation">
                    <div class="text-center">
                        <div class="w-20 h-20 mx-auto mb-4 bg-gradient-to-r from-green-500 to-emerald-500 rounded-full flex items-center justify-center">
                            <span class="text-3xl">🎉</span>
                        </div>
                        <h2 class="text-2xl font-bold text-white mb-4">Game Submitted!</h2>
                        <p class="text-gray-300 mb-6">Game Anda telah berhasil disubmit untuk review. Tim kami akan meninjau dalam 1-3 hari kerja.</p>
                        <div class="space-y-3">
                            <button class="w-full btn-neon py-3 rounded-lg font-medium" onclick="goToDashboard()">
                                Dashboard Developer
                            </button>
                            <button class="w-full btn-secondary py-2 rounded-lg text-sm" onclick="closeModal()">
                                Submit Another Game
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
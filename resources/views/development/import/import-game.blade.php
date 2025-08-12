<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Playverse - Import Game</title>
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
        
        .import-card {
            background: linear-gradient(145deg, #1e1e3f 0%, #2a2a5a 100%);
            border: 1px solid rgba(59, 130, 246, 0.2);
            backdrop-filter: blur(10px);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }
        
        .import-card:hover {
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
        
        .upload-zone.dragover {
            border-color: #3b82f6;
            background: rgba(59, 130, 246, 0.15);
            box-shadow: 0 0 20px rgba(59, 130, 246, 0.3);
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
            transition: all 0.3s ease;
        }
        
        .btn-success:hover {
            background: linear-gradient(45deg, #4ade80, #22c55e);
            transform: translateY(-1px);
        }
        
        .gradient-text {
            background: linear-gradient(45deg, #3b82f6, #8b5cf6, #06b6d4);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .progress-bar {
            background: linear-gradient(90deg, #3b82f6, #8b5cf6);
            height: 8px;
            border-radius: 4px;
            transition: width 0.3s ease;
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
        }
        
        .form-input:focus {
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }
        
        .file-preview {
            background: rgba(15, 15, 35, 0.9);
            border: 1px solid rgba(59, 130, 246, 0.2);
            backdrop-filter: blur(10px);
        }
        
        .platform-option {
            background: rgba(30, 30, 63, 0.6);
            border: 1px solid rgba(59, 130, 246, 0.2);
            transition: all 0.3s ease;
            cursor: pointer;
        }
        
        .platform-option:hover {
            border-color: rgba(59, 130, 246, 0.5);
            background: rgba(59, 130, 246, 0.1);
        }
        
        .platform-option.selected {
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
                        <h1 class="text-3xl font-bold gradient-text">Import Game</h1>
                        <p class="text-gray-400 mt-2">Upload dan publikasikan game Anda ke Playverse platform</p>
                    </div>
                    <button class="btn-secondary px-4 py-2 rounded-lg text-sm font-medium">
                        ← Kembali ke Dashboard
                    </button>
                </div>
            </div>

            <!-- Progress Steps -->
            <div class="mb-12">
                <div class="flex items-center justify-center space-x-8">
                    <div class="flex items-center">
                        <div class="step-indicator active w-10 h-10 rounded-full flex items-center justify-center text-sm font-bold">1</div>
                        <span class="ml-2 text-sm font-medium text-white">Upload File</span>
                    </div>
                    <div class="w-16 h-1 bg-gray-600 rounded-full">
                        <div class="w-0 h-full bg-gradient-to-r from-blue-500 to-purple-500 rounded-full transition-all duration-500"></div>
                    </div>
                    <div class="flex items-center">
                        <div class="step-indicator w-10 h-10 rounded-full flex items-center justify-center text-sm font-bold">2</div>
                        <span class="ml-2 text-sm font-medium text-gray-400">Detail Game</span>
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

            <!-- Import Options -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
                <!-- Platform Selection -->
                <div class="import-card rounded-xl p-6">
                    <h2 class="text-xl font-bold text-white mb-4">Pilih Platform</h2>
                    <p class="text-gray-400 text-sm mb-6">Pilih platform tempat game Anda berasal</p>
                    
                    <div class="grid grid-cols-2 gap-4">
                        <div class="platform-option selected rounded-lg p-4 text-center">
                            <div class="text-3xl mb-2">🌐</div>
                            <h3 class="font-bold text-white">Web Build</h3>
                            <p class="text-xs text-gray-400">HTML5/WebGL</p>
                        </div>
                        <div class="platform-option rounded-lg p-4 text-center">
                            <div class="text-3xl mb-2">🎮</div>
                            <h3 class="font-bold text-white">Unity</h3>
                            <p class="text-xs text-gray-400">WebGL Build</p>
                        </div>
                        <div class="platform-option rounded-lg p-4 text-center">
                            <div class="text-3xl mb-2">⚡</div>
                            <h3 class="font-bold text-white">Godot</h3>
                            <p class="text-xs text-gray-400">HTML5 Export</p>
                        </div>
                        <div class="platform-option rounded-lg p-4 text-center">
                            <div class="text-3xl mb-2">🔥</div>
                            <h3 class="font-bold text-white">Construct 3</h3>
                            <p class="text-xs text-gray-400">HTML5 Game</p>
                        </div>
                    </div>
                </div>

                <!-- Upload Zone -->
                <div class="import-card rounded-xl p-6">
                    <h2 class="text-xl font-bold text-white mb-4">Upload Game File</h2>
                    <p class="text-gray-400 text-sm mb-6">Drag & drop file game atau klik untuk browse</p>
                    
                    <div class="upload-zone rounded-xl p-12 text-center">
                        <div class="text-6xl mb-4">📁</div>
                        <h3 class="text-lg font-bold text-white mb-2">Drop files here</h3>
                        <p class="text-gray-400 text-sm mb-4">atau klik untuk memilih file</p>
                        <button class="btn-neon px-6 py-3 rounded-lg font-medium">
                            Browse Files
                        </button>
                        <div class="mt-4 text-xs text-gray-500">
                            Supported: .zip, .rar, .7z (max 500MB)
                        </div>
                    </div>
                </div>
            </div>

            <!-- File Preview (Hidden by default) -->
            <div class="import-card rounded-xl p-6 mb-8" style="display: none;" id="file-preview">
                <h2 class="text-xl font-bold text-white mb-4">File Preview</h2>
                
                <div class="file-preview rounded-lg p-4 mb-4">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-3">
                            <div class="text-2xl">📦</div>
                            <div>
                                <h3 class="font-bold text-white">my-awesome-game.zip</h3>
                                <p class="text-gray-400 text-sm">45.2 MB</p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-2">
                            <div class="w-32 bg-gray-700 rounded-full h-2">
                                <div class="progress-bar w-full"></div>
                            </div>
                            <span class="text-sm text-green-400">✓</span>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
                    <div class="bg-gray-800/50 rounded-lg p-3">
                        <span class="text-gray-400">Detected Files:</span>
                        <span class="text-white ml-2">47 files</span>
                    </div>
                    <div class="bg-gray-800/50 rounded-lg p-3">
                        <span class="text-gray-400">Main File:</span>
                        <span class="text-white ml-2">index.html</span>
                    </div>
                    <div class="bg-gray-800/50 rounded-lg p-3">
                        <span class="text-gray-400">Engine:</span>
                        <span class="text-white ml-2">Unity WebGL</span>
                    </div>
                    <div class="bg-gray-800/50 rounded-lg p-3">
                        <span class="text-gray-400">Resolution:</span>
                        <span class="text-white ml-2">1920x1080</span>
                    </div>
                </div>
            </div>

            <!-- Upload Requirements -->
            <div class="import-card rounded-xl p-6 mb-8">
                <h2 class="text-xl font-bold text-white mb-4">📋 Requirements & Guidelines</h2>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <h3 class="font-bold text-white mb-3">File Requirements:</h3>
                        <ul class="space-y-2 text-sm text-gray-300">
                            <li class="flex items-start">
                                <span class="text-green-400 mr-2">✓</span>
                                Maximum file size: 500MB
                            </li>
                            <li class="flex items-start">
                                <span class="text-green-400 mr-2">✓</span>
                                Supported formats: ZIP, RAR, 7Z
                            </li>
                            <li class="flex items-start">
                                <span class="text-green-400 mr-2">✓</span>
                                Must contain index.html as main file
                            </li>
                            <li class="flex items-start">
                                <span class="text-green-400 mr-2">✓</span>
                                All assets must be included
                            </li>
                        </ul>
                    </div>
                    
                    <div>
                        <h3 class="font-bold text-white mb-3">Content Guidelines:</h3>
                        <ul class="space-y-2 text-sm text-gray-300">
                            <li class="flex items-start">
                                <span class="text-blue-400 mr-2">ℹ</span>
                                No inappropriate content
                            </li>
                            <li class="flex items-start">
                                <span class="text-blue-400 mr-2">ℹ</span>
                                Respect copyright laws
                            </li>
                            <li class="flex items-start">
                                <span class="text-blue-400 mr-2">ℹ</span>
                                Optimize for web performance
                            </li>
                            <li class="flex items-start">
                                <span class="text-blue-400 mr-2">ℹ</span>
                                Test on multiple browsers
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex items-center justify-center space-x-4 mb-12">
                <button class="btn-secondary px-8 py-3 rounded-lg font-medium" disabled>
                    ← Previous Step
                </button>
                <a href="{{ url('/detail-game') }}" class="btn-neon px-8 py-3 rounded-lg font-medium">
                    Next Step →
                </a>
            </div>
        </div>
    </div>
</body>
</html>
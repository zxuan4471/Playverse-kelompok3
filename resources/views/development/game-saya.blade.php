<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GameHub - Game Saya</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
        
        body {
            background: linear-gradient(135deg, #0f0f23 0%, #1a1a2e 50%, #16213e 100%);
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            min-height: 100vh;
        }
        
        .neon-glow {
            box-shadow: 0 0 20px rgba(59, 130, 246, 0.3), 0 0 40px rgba(59, 130, 246, 0.1);
        }
        
        .glass-morphism {
            background: rgba(30, 30, 63, 0.8);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .dev-card {
            background: linear-gradient(145deg, #1e1e3f 0%, #2a2a5a 100%);
            border: 1px solid rgba(59, 130, 246, 0.2);
            backdrop-filter: blur(10px);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        
        .dev-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 15px 30px rgba(59, 130, 246, 0.25), 0 0 25px rgba(59, 130, 246, 0.15);
            border-color: rgba(59, 130, 246, 0.5);
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
        
        .btn-danger {
            background: linear-gradient(45deg, #ef4444, #dc2626);
            transition: all 0.3s ease;
        }
        
        .btn-danger:hover {
            background: linear-gradient(45deg, #f87171, #ef4444);
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
        
        .sidebar-glass {
            background: rgba(15, 15, 35, 0.9);
            backdrop-filter: blur(20px);
            border-right: 1px solid rgba(59, 130, 246, 0.2);
        }
        
        .sidebar-item {
            position: relative;
            overflow: hidden;
        }
        
        .sidebar-item::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            width: 3px;
            background: linear-gradient(to bottom, #3b82f6, #8b5cf6);
            transform: scaleY(0);
            transition: transform 0.3s ease;
        }
        
        .sidebar-item:hover::before {
            transform: scaleY(1);
        }
        
        .sidebar-item:hover {
            background: linear-gradient(90deg, rgba(59, 130, 246, 0.1), rgba(59, 130, 246, 0.2));
            box-shadow: 0 0 15px rgba(59, 130, 246, 0.2);
        }
        
        .sidebar-item.active {
            background: linear-gradient(90deg, rgba(59, 130, 246, 0.2), rgba(59, 130, 246, 0.3));
            color: white;
            font-weight: 600;
        }
        
        .sidebar-item.active::before {
            transform: scaleY(1);
        }
        
        .game-card {
            background: linear-gradient(145deg, #1e1e3f 0%, #2a2a5a 100%);
            border: 1px solid rgba(59, 130, 246, 0.2);
            backdrop-filter: blur(10px);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        
        .game-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 15px 30px rgba(59, 130, 246, 0.25), 0 0 25px rgba(59, 130, 246, 0.15);
            border-color: rgba(59, 130, 246, 0.5);
        }
        
        .game-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #3b82f6, #8b5cf6, #06b6d4);
            transform: scaleX(0);
            transition: transform 0.3s ease;
        }
        
        .game-card:hover::before {
            transform: scaleX(1);
        }
        
        .status-badge {
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 500;
        }
        
        .status-published {
            background: rgba(34, 197, 94, 0.2);
            color: #22c55e;
            border: 1px solid rgba(34, 197, 94, 0.3);
        }
        
        .status-draft {
            background: rgba(245, 158, 11, 0.2);
            color: #f59e0b;
            border: 1px solid rgba(245, 158, 11, 0.3);
        }
        
        .status-archived {
            background: rgba(107, 114, 128, 0.2);
            color: #9ca3af;
            border: 1px solid rgba(107, 114, 128, 0.3);
        }
        
        .filter-chip {
            padding: 6px 16px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: 500;
            background: rgba(59, 130, 246, 0.1);
            border: 1px solid rgba(59, 130, 246, 0.3);
            color: rgba(255, 255, 255, 0.8);
            transition: all 0.3s ease;
            cursor: pointer;
        }
        
        .filter-chip:hover {
            background: rgba(59, 130, 246, 0.2);
            border-color: rgba(59, 130, 246, 0.5);
            color: white;
        }
        
        .filter-chip.active {
            background: linear-gradient(45deg, #3b82f6, #1d4ed8);
            border-color: #3b82f6;
            color: white;
        }
        
        .search-input {
            background: rgba(30, 30, 63, 0.6);
            border: 1px solid rgba(59, 130, 246, 0.3);
            backdrop-filter: blur(10px);
            transition: all 0.3s ease;
        }
        
        .search-input:focus {
            background: rgba(30, 30, 63, 0.8);
            border-color: rgba(59, 130, 246, 0.6);
            box-shadow: 0 0 15px rgba(59, 130, 246, 0.3);
            outline: none;
        }
        
        .progress-bar {
            background: linear-gradient(90deg, #3b82f6, #8b5cf6);
            height: 6px;
            border-radius: 3px;
            transition: width 0.5s ease;
        }
        
        .mobile-menu {
            display: none;
        }
        
        @media (max-width: 768px) {
            .mobile-menu {
                display: block;
            }
            
            .desktop-menu {
                display: none;
            }
            
            .sidebar {
                position: fixed;
                left: -100%;
                top: 0;
                bottom: 0;
                width: 80%;
                z-index: 40;
                transition: left 0.3s ease;
            }
            
            .sidebar.active {
                left: 0;
            }
        }
    </style>
</head>
<body class="text-white min-h-screen">
    <!-- Main Navigation -->
    @include('development.navigasi.navbar-developer')
    
    <!-- Main Content -->
    <div class="pt-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col lg:flex-row gap-8">
                <!-- Sidebar -->
    @include('development.navigasi.sidebar-developer')
                
                <!-- Main Content Area -->
                <main class="flex-1">
                    <!-- Header Section -->
                    <div class="mb-8">
                        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between mb-6">
                            <div>
                                <h1 class="text-3xl font-bold text-white mb-2">Game Saya</h1>
                                <p class="text-gray-400">Kelola semua game yang telah Anda buat</p>
                            </div>
                            <a href="{{ url('/publish-asset') }}" >
                            <button class="btn-neon px-6 py-3 rounded-lg font-medium mt-4 sm:mt-0">
                                <i class="fas fa-plus mr-2"></i> Game Baru
                            </button>
                           </a>
                        </div>
                        
                        <!-- Search and Filter -->
                        <div class="flex flex-col sm:flex-row gap-4">
                            <div class="relative flex-1">
                                <input type="text" placeholder="Cari game..." class="search-input w-full pl-10 pr-4 py-3 rounded-lg text-white">
                                <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                            </div>
                            <div class="flex gap-2 overflow-x-auto pb-2">
                                <button class="filter-chip active">Semua</button>
                                <button class="filter-chip">Diterbitkan</button>
                                <button class="filter-chip">Draft</button>
                                <button class="filter-chip">Diarsipkan</button>
                                <button class="filter-chip">Aksi</button>
                                <button class="filter-chip">Petualangan</button>
                                <button class="filter-chip">RPG</button>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Games Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <!-- Game Card 1 -->
                        <div class="game-card rounded-xl overflow-hidden">
                            <div class="relative">
                                <img src="https://picsum.photos/seed/game1/400/225.jpg" alt="Game Cover" class="w-full h-48 object-cover">
                                <div class="absolute top-3 right-3">
                                    <span class="status-badge status-published">Diterbitkan</span>
                                </div>
                                <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/80 to-transparent p-4">
                                    <h3 class="text-lg font-bold text-white">Mystical Forest Adventure</h3>
                                    <p class="text-sm text-gray-300">Petualangan • RPG</p>
                                </div>
                            </div>
                            <div class="p-4">
                                <div class="flex items-center justify-between mb-3">
                                    <div class="flex items-center space-x-4 text-sm">
                                        <span class="text-gray-400">
                                            <i class="fas fa-download mr-1"></i> 12.5K
                                        </span>
                                        <span class="text-gray-400">
                                            <i class="fas fa-star mr-1"></i> 4.5
                                        </span>
                                        <span class="text-gray-400">
                                            <i class="fas fa-heart mr-1"></i> 3.2K
                                        </span>
                                    </div>
                                </div>
                                <div class="flex items-center justify-between">
                                    <div class="text-sm">
                                        <span class="text-gray-400">Pendapatan:</span>
                                        <span class="text-white font-medium ml-1">$1,245</span>
                                    </div>
                                    <div class="flex space-x-2">
                                        <button class="btn-secondary px-3 py-1 rounded text-sm">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="btn-neon px-3 py-1 rounded text-sm">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Game Card 2 -->
                        <div class="game-card rounded-xl overflow-hidden">
                            <div class="relative">
                                <img src="https://picsum.photos/seed/game2/400/225.jpg" alt="Game Cover" class="w-full h-48 object-cover">
                                <div class="absolute top-3 right-3">
                                    <span class="status-badge status-published">Diterbitkan</span>
                                </div>
                                <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/80 to-transparent p-4">
                                    <h3 class="text-lg font-bold text-white">Neon Runner 2077</h3>
                                    <p class="text-sm text-gray-300">Aksi • Lari</p>
                                </div>
                            </div>
                            <div class="p-4">
                                <div class="flex items-center justify-between mb-3">
                                    <div class="flex items-center space-x-4 text-sm">
                                        <span class="text-gray-400">
                                            <i class="fas fa-download mr-1"></i> 8.7K
                                        </span>
                                        <span class="text-gray-400">
                                            <i class="fas fa-star mr-1"></i> 4.2
                                        </span>
                                        <span class="text-gray-400">
                                            <i class="fas fa-heart mr-1"></i> 2.1K
                                        </span>
                                    </div>
                                </div>
                                <div class="flex items-center justify-between">
                                    <div class="text-sm">
                                        <span class="text-gray-400">Pendapatan:</span>
                                        <span class="text-white font-medium ml-1">$892</span>
                                    </div>
                                    <div class="flex space-x-2">
                                        <button class="btn-secondary px-3 py-1 rounded text-sm">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="btn-neon px-3 py-1 rounded text-sm">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Game Card 3 -->
                        <div class="game-card rounded-xl overflow-hidden">
                            <div class="relative">
                                <img src="https://picsum.photos/seed/game3/400/225.jpg" alt="Game Cover" class="w-full h-48 object-cover">
                                <div class="absolute top-3 right-3">
                                    <span class="status-badge status-draft">Draft</span>
                                </div>
                                <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/80 to-transparent p-4">
                                    <h3 class="text-lg font-bold text-white">Quantum Puzzle Box</h3>
                                    <p class="text-sm text-gray-300">Teka-teki • Simulasi</p>
                                </div>
                            </div>
                            <div class="p-4">
                                <div class="flex items-center justify-between mb-3">
                                    <div class="flex items-center space-x-4 text-sm">
                                        <span class="text-gray-400">
                                            <i class="fas fa-download mr-1"></i> 0
                                        </span>
                                        <span class="text-gray-400">
                                            <i class="fas fa-star mr-1"></i> -
                                        </span>
                                        <span class="text-gray-400">
                                            <i class="fas fa-heart mr-1"></i> 0
                                        </span>
                                    </div>
                                </div>
                                <div class="flex items-center justify-between">
                                    <div class="text-sm">
                                        <span class="text-gray-400">Progress:</span>
                                        <span class="text-white font-medium ml-1">75%</span>
                                    </div>
                                    <div class="flex space-x-2">
                                        <button class="btn-secondary px-3 py-1 rounded text-sm">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="btn-success px-3 py-1 rounded text-sm">
                                            <i class="fas fa-upload"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Game Card 4 -->
                        <div class="game-card rounded-xl overflow-hidden">
                            <div class="relative">
                                <img src="https://picsum.photos/seed/game4/400/225.jpg" alt="Game Cover" class="w-full h-48 object-cover">
                                <div class="absolute top-3 right-3">
                                    <span class="status-badge status-published">Diterbitkan</span>
                                </div>
                                <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/80 to-transparent p-4">
                                    <h3 class="text-lg font-bold text-white">Space Defender</h3>
                                    <p class="text-sm text-gray-300">Shooter • Arkade</p>
                                </div>
                            </div>
                            <div class="p-4">
                                <div class="flex items-center justify-between mb-3">
                                    <div class="flex items-center space-x-4 text-sm">
                                        <span class="text-gray-400">
                                            <i class="fas fa-download mr-1"></i> 15.3K
                                        </span>
                                        <span class="text-gray-400">
                                            <i class="fas fa-star mr-1"></i> 4.7
                                        </span>
                                        <span class="text-gray-400">
                                            <i class="fas fa-heart mr-1"></i> 4.5K
                                        </span>
                                    </div>
                                </div>
                                <div class="flex items-center justify-between">
                                    <div class="text-sm">
                                        <span class="text-gray-400">Pendapatan:</span>
                                        <span class="text-white font-medium ml-1">$1,567</span>
                                    </div>
                                    <div class="flex space-x-2">
                                        <button class="btn-secondary px-3 py-1 rounded text-sm">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="btn-neon px-3 py-1 rounded text-sm">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Game Card 5 -->
                        <div class="game-card rounded-xl overflow-hidden">
                            <div class="relative">
                                <img src="https://picsum.photos/seed/game5/400/225.jpg" alt="Game Cover" class="w-full h-48 object-cover">
                                <div class="absolute top-3 right-3">
                                    <span class="status-badge status-archived">Diarsipkan</span>
                                </div>
                                <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/80 to-transparent p-4">
                                    <h3 class="text-lg font-bold text-white">Retro Racing</h3>
                                    <p class="text-sm text-gray-300">Balapan • Retro</p>
                                </div>
                            </div>
                            <div class="p-4">
                                <div class="flex items-center justify-between mb-3">
                                    <div class="flex items-center space-x-4 text-sm">
                                        <span class="text-gray-400">
                                            <i class="fas fa-download mr-1"></i> 3.2K
                                        </span>
                                        <span class="text-gray-400">
                                            <i class="fas fa-star mr-1"></i> 3.8
                                        </span>
                                        <span class="text-gray-400">
                                            <i class="fas fa-heart mr-1"></i> 890
                                        </span>
                                    </div>
                                </div>
                                <div class="flex items-center justify-between">
                                    <div class="text-sm">
                                        <span class="text-gray-400">Total Pendapatan:</span>
                                        <span class="text-white font-medium ml-1">$456</span>
                                    </div>
                                    <div class="flex space-x-2">
                                        <button class="btn-secondary px-3 py-1 rounded text-sm">
                                            <i class="fas fa-undo"></i>
                                        </button>
                                        <button class="btn-danger px-3 py-1 rounded text-sm">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Game Card 6 -->
                        <div class="game-card rounded-xl overflow-hidden">
                            <div class="relative">
                                <img src="https://picsum.photos/seed/game6/400/225.jpg" alt="Game Cover" class="w-full h-48 object-cover">
                                <div class="absolute top-3 right-3">
                                    <span class="status-badge status-draft">Draft</span>
                                </div>
                                <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/80 to-transparent p-4">
                                    <h3 class="text-lg font-bold text-white">Fantasy Kingdom</h3>
                                    <p class="text-sm text-gray-300">Strategi • Simulasi</p>
                                </div>
                            </div>
                            <div class="p-4">
                                <div class="flex items-center justify-between mb-3">
                                    <div class="flex items-center space-x-4 text-sm">
                                        <span class="text-gray-400">
                                            <i class="fas fa-download mr-1"></i> 0
                                        </span>
                                        <span class="text-gray-400">
                                            <i class="fas fa-star mr-1"></i> -
                                        </span>
                                        <span class="text-gray-400">
                                            <i class="fas fa-heart mr-1"></i> 0
                                        </span>
                                    </div>
                                </div>
                                <div class="flex items-center justify-between">
                                    <div class="text-sm">
                                        <span class="text-gray-400">Progress:</span>
                                        <span class="text-white font-medium ml-1">30%</span>
                                    </div>
                                    <div class="flex space-x-2">
                                        <button class="btn-secondary px-3 py-1 rounded text-sm">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="btn-success px-3 py-1 rounded text-sm">
                                            <i class="fas fa-upload"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Pagination -->
                    <div class="flex items-center justify-between mt-8">
                        <div class="text-sm text-gray-400">
                            Menampilkan 6 dari 12 game
                        </div>
                        <div class="flex items-center space-x-2">
                            <button class="btn-secondary px-4 py-2 rounded-lg text-sm">
                                <i class="fas fa-chevron-left mr-1"></i> Sebelumnya
                            </button>
                            <button class="btn-neon px-4 py-2 rounded-lg text-sm">
                                Selanjutnya <i class="fas fa-chevron-right ml-1"></i>
                            </button>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </div>
    
    <!-- Create Game Modal -->
    <div id="create-game-modal" class="fixed inset-0 bg-black/50 backdrop-blur-sm z-50 hidden">
        <div class="flex items-center justify-center min-h-screen p-4">
            <div class="dev-card rounded-2xl p-8 max-w-md w-full">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-xl font-bold text-white">Buat Game Baru</h3>
                    <button onclick="hideCreateGameModal()" class="text-gray-400 hover:text-white">
                        <i class="fas fa-times text-xl"></i>
                    </button>
                </div>
                
                <form>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-300 mb-2">Nama Game</label>
                            <input type="text" class="search-input w-full px-4 py-3 rounded-lg text-white" placeholder="Masukkan nama game">
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-300 mb-2">Kategori</label>
                            <select class="search-input w-full px-4 py-3 rounded-lg text-white">
                                <option>Pilih kategori</option>
                                <option>Aksi</option>
                                <option>Petualangan</option>
                                <option>RPG</option>
                                <option>Strategi</option>
                                <option>Simulasi</option>
                                <option>Olahraga</option>
                                <option>Balapan</option>
                                <option>Teka-teki</option>
                            </select>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-300 mb-2">Deskripsi Singkat</label>
                            <textarea class="search-input w-full px-4 py-3 rounded-lg text-white h-24 resize-none" placeholder="Deskripsikan game Anda"></textarea>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-300 mb-2">Cover Game</label>
                            <div class="border-2 border-dashed border-gray-600 rounded-lg p-8 text-center cursor-pointer hover:border-blue-500 transition-colors">
                                <i class="fas fa-cloud-upload-alt text-3xl text-gray-400 mb-2"></i>
                                <p class="text-gray-400">Klik untuk upload cover</p>
                                <p class="text-xs text-gray-500 mt-1">PNG, JPG maksimal 5MB</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="flex justify-end space-x-3 mt-6">
                        <button type="button" onclick="hideCreateGameModal()" class="btn-secondary px-6 py-2 rounded-lg">
                            Batal
                        </button>
                        <button type="submit" class="btn-neon px-6 py-2 rounded-lg">
                            Buat Game
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <script>
        // Mobile menu functionality
        function toggleMobileMenu() {
            console.log('Mobile menu toggled');
        }
        
        // Sidebar functionality for mobile
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('active');
        }
        
        // Modal functionality
        function showCreateGameModal() {
            document.getElementById('create-game-modal').classList.remove('hidden');
        }
        
        function hideCreateGameModal() {
            document.getElementById('create-game-modal').classList.add('hidden');
        }
        
        // Filter functionality
        document.querySelectorAll('.filter-chip').forEach(chip => {
            chip.addEventListener('click', function() {
                // Remove active class from all chips
                document.querySelectorAll('.filter-chip').forEach(c => c.classList.remove('active'));
                // Add active class to clicked chip
                this.classList.add('active');
                // Here you would filter the games based on the selected filter
                console.log('Filter:', this.textContent);
            });
        });
        
        // Search functionality
        document.querySelector('.search-input').addEventListener('input', function(e) {
            const searchTerm = e.target.value.toLowerCase();
            // Here you would filter the games based on the search term
            console.log('Search:', searchTerm);
        });
        
        // Close modal when clicking outside
        document.getElementById('create-game-modal').addEventListener('click', function(e) {
            if (e.target === this) {
                hideCreateGameModal();
            }
        });
    </script>
</body>
</html>
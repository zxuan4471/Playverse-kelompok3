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
            background: linear-gradient(145deg, rgba(30, 30, 63, 0.9), rgba(42, 42, 90, 0.9));
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
        
        .status-online {
            color: #22c55e;
        }
        
        .status-offline {
            color: #ef4444;
        }
        
        .status-maintenance {
            color: #f59e0b;
        }
        
        .add-game-fab {
            position: fixed;
            bottom: 2rem;
            right: 2rem;
            width: 60px;
            height: 60px;
            background: linear-gradient(45deg, #3b82f6, #8b5cf6);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 10px 25px rgba(59, 130, 246, 0.4);
            transition: all 0.3s ease;
            z-index: 30;
        }
        
        .add-game-fab:hover {
            transform: scale(1.1) rotate(90deg);
            box-shadow: 0 15px 35px rgba(59, 130, 246, 0.6);
        }
        
        .filter-chip {
            background: rgba(59, 130, 246, 0.1);
            border: 1px solid rgba(59, 130, 246, 0.3);
            transition: all 0.2s ease;
        }
        
        .filter-chip:hover {
            background: rgba(59, 130, 246, 0.2);
            border-color: rgba(59, 130, 246, 0.5);
        }
        
        .filter-chip.active {
            background: rgba(59, 130, 246, 0.3);
            border-color: #3b82f6;
            color: white;
        }
        
        /* Garis pemisah antara navbar dan konten */
        .nav-divider {
            height: 1px;
            background: linear-gradient(90deg, 
                transparent 0%, 
                rgba(255, 255, 255, 0.1) 20%, 
                rgba(255, 255, 255, 0.3) 50%, 
                rgba(255, 255, 255, 0.1) 80%, 
                transparent 100%);
            margin: 1rem 0;
            position: relative;
        }
        
        .nav-divider::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 1px;
            background: linear-gradient(90deg, 
                transparent 0%, 
                rgba(59, 130, 246, 0.2) 20%, 
                rgba(59, 130, 246, 0.5) 50%, 
                rgba(59, 130, 246, 0.2) 80%, 
                transparent 100%);
        }
        
        @media (max-width: 768px) {
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
            
            .add-game-fab {
                bottom: 1rem;
                right: 1rem;
                width: 56px;
                height: 56px;
            }
        }
    </style>
</head>
<body class="text-white min-h-screen">
    <!-- Main Navigation -->
    @include('development.navigasi.navbar-developer')
    
    <!-- Garis Pemisah dengan Jarak -->
    <div class="pt-16"></div>
    <div class="nav-divider"></div>
    
    <!-- Main Content -->
    <div class="pt-8">
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
                            <a href="{{ url('/import-game') }}" class="btn-neon px-6 py-3 rounded-lg text-sm font-medium mt-4 sm:mt-0">
                                <i class="fas fa-plus mr-2"></i> Tambah Game Baru
                            </a>
                        </div>
                        
                        <!-- Stats Overview -->
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-6">
                            <div class="bg-gradient-to-r from-blue-600/20 to-purple-600/20 rounded-xl p-4 border border-blue-500/30">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="text-gray-400 text-sm">Total Game</p>
                                        <p class="text-2xl font-bold text-white">12</p>
                                    </div>
                                    <i class="fas fa-gamepad text-2xl text-blue-400"></i>
                                </div>
                            </div>
                            <div class="bg-gradient-to-r from-green-600/20 to-blue-600/20 rounded-xl p-4 border border-green-500/30">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="text-gray-400 text-sm">Game Aktif</p>
                                        <p class="text-2xl font-bold text-white">8</p>
                                    </div>
                                    <i class="fas fa-check-circle text-2xl text-green-400"></i>
                                </div>
                            </div>
                            <div class="bg-gradient-to-r from-yellow-600/20 to-orange-600/20 rounded-xl p-4 border border-yellow-500/30">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="text-gray-400 text-sm">Total Unduhan</p>
                                        <p class="text-2xl font-bold text-white">45.2K</p>
                                    </div>
                                    <i class="fas fa-download text-2xl text-yellow-400"></i>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Filter and Search -->
                        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 mb-6">
                            <div class="flex flex-wrap gap-2">
                                <button class="filter-chip active px-4 py-2 rounded-lg text-sm">Semua</button>
                                <button class="filter-chip px-4 py-2 rounded-lg text-sm">Online</button>
                                <button class="filter-chip px-4 py-2 rounded-lg text-sm">Offline</button>
                                <button class="filter-chip px-4 py-2 rounded-lg text-sm">Pemeliharaan</button>
                            </div>
                            <div class="relative">
                                <input type="text" placeholder="Cari game..." class="bg-gray-800/50 border border-gray-700/50 rounded-lg px-4 py-2 pr-10 text-sm w-full sm:w-64">
                                <i class="fas fa-search absolute right-3 top-2.5 text-gray-400"></i>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Games Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
                        <!-- Game Card 1 -->
                        <div class="game-card rounded-xl overflow-hidden">
                            <div class="relative">
                                <img src="https://picsum.photos/seed/game1/400/225.jpg" alt="Game Cover" class="w-full h-48 object-cover">
                                <div class="absolute top-3 right-3">
                                    <span class="status-online bg-green-500/20 text-green-400 px-3 py-1 rounded-full text-xs flex items-center">
                                        <i class="fas fa-circle mr-1 text-xs"></i> Online
                                    </span>
                                </div>
                            </div>
                            <div class="p-5">
                                <h3 class="text-lg font-bold text-white mb-2">Misteri Hutan Angker</h3>
                                <p class="text-gray-400 text-sm mb-4">Game petualangan horor dengan grafis memukau dan cerita yang menegangkan.</p>
                                
                                <div class="grid grid-cols-2 gap-4 mb-4 text-sm">
                                    <div>
                                        <p class="text-gray-500">Unduhan</p>
                                        <p class="text-white font-medium">12.5K</p>
                                    </div>
                                    <div>
                                        <p class="text-gray-500">Rating</p>
                                        <p class="text-white font-medium">4.8 ⭐</p>
                                    </div>
                                    <div>
                                        <p class="text-gray-500">Pendapatan</p>
                                        <p class="text-white font-medium">Rp 15.2 Juta</p>
                                    </div>
                                    <div>
                                        <p class="text-gray-500">Terakhir Update</p>
                                        <p class="text-white font-medium">2 jam lalu</p>
                                    </div>
                                </div>
                                
                                <div class="flex gap-2">
                                    <button class="btn-neon flex-1 py-2 rounded text-sm">
                                        <i class="fas fa-edit mr-1"></i> Edit
                                    </button>
                                    <button class="btn-secondary flex-1 py-2 rounded text-sm">
                                        <i class="fas fa-eye mr-1"></i> Lihat
                                    </button>
                                    <button class="btn-danger p-2 rounded text-sm">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Game Card 2 -->
                        <div class="game-card rounded-xl overflow-hidden">
                            <div class="relative">
                                <img src="https://picsum.photos/seed/game2/400/225.jpg" alt="Game Cover" class="w-full h-48 object-cover">
                                <div class="absolute top-3 right-3">
                                    <span class="status-maintenance bg-yellow-500/20 text-yellow-400 px-3 py-1 rounded-full text-xs flex items-center">
                                        <i class="fas fa-circle mr-1 text-xs"></i> Pemeliharaan
                                    </span>
                                </div>
                            </div>
                            <div class="p-5">
                                <h3 class="text-lg font-bold text-white mb-2">Pelari Neon 2077</h3>
                                <p class="text-gray-400 text-sm mb-4">Game lari tak berujung dengan tema cyberpunk dan musik elektronik yang menghentak.</p>
                                
                                <div class="grid grid-cols-2 gap-4 mb-4 text-sm">
                                    <div>
                                        <p class="text-gray-500">Unduhan</p>
                                        <p class="text-white font-medium">18.3K</p>
                                    </div>
                                    <div>
                                        <p class="text-gray-500">Rating</p>
                                        <p class="text-white font-medium">4.6 ⭐</p>
                                    </div>
                                    <div>
                                        <p class="text-gray-500">Pendapatan</p>
                                        <p class="text-white font-medium">Rp 22.1 Juta</p>
                                    </div>
                                    <div>
                                        <p class="text-gray-500">Terakhir Update</p>
                                        <p class="text-white font-medium">1 hari lalu</p>
                                    </div>
                                </div>
                                
                                <div class="flex gap-2">
                                    <button class="btn-neon flex-1 py-2 rounded text-sm">
                                        <i class="fas fa-edit mr-1"></i> Edit
                                    </button>
                                    <button class="btn-secondary flex-1 py-2 rounded text-sm">
                                        <i class="fas fa-eye mr-1"></i> Lihat
                                    </button>
                                    <button class="btn-danger p-2 rounded text-sm">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Game Card 3 -->
                        <div class="game-card rounded-xl overflow-hidden">
                            <div class="relative">
                                <img src="https://picsum.photos/seed/game3/400/225.jpg" alt="Game Cover" class="w-full h-48 object-cover">
                                <div class="absolute top-3 right-3">
                                    <span class="status-offline bg-red-500/20 text-red-400 px-3 py-1 rounded-full text-xs flex items-center">
                                        <i class="fas fa-circle mr-1 text-xs"></i> Offline
                                    </span>
                                </div>
                            </div>
                            <div class="p-5">
                                <h3 class="text-lg font-bold text-white mb-2">Teka-Teki Kuantum</h3>
                                <p class="text-gray-400 text-sm mb-4">Game puzzle sains dengan mekanika unik berdasarkan fisika kuantum.</p>
                                
                                <div class="grid grid-cols-2 gap-4 mb-4 text-sm">
                                    <div>
                                        <p class="text-gray-500">Unduhan</p>
                                        <p class="text-white font-medium">8.7K</p>
                                    </div>
                                    <div>
                                        <p class="text-gray-500">Rating</p>
                                        <p class="text-white font-medium">4.9 ⭐</p>
                                    </div>
                                    <div>
                                        <p class="text-gray-500">Pendapatan</p>
                                        <p class="text-white font-medium">Rp 10.5 Juta</p>
                                    </div>
                                    <div>
                                        <p class="text-gray-500">Terakhir Update</p>
                                        <p class="text-white font-medium">3 hari lalu</p>
                                    </div>
                                </div>
                                
                                <div class="flex gap-2">
                                    <button class="btn-neon flex-1 py-2 rounded text-sm">
                                        <i class="fas fa-edit mr-1"></i> Edit
                                    </button>
                                    <button class="btn-secondary flex-1 py-2 rounded text-sm">
                                        <i class="fas fa-eye mr-1"></i> Lihat
                                    </button>
                                    <button class="btn-danger p-2 rounded text-sm">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Game Card 4 -->
                        <div class="game-card rounded-xl overflow-hidden">
                            <div class="relative">
                                <img src="https://picsum.photos/seed/game4/400/225.jpg" alt="Game Cover" class="w-full h-48 object-cover">
                                <div class="absolute top-3 right-3">
                                    <span class="status-online bg-green-500/20 text-green-400 px-3 py-1 rounded-full text-xs flex items-center">
                                        <i class="fas fa-circle mr-1 text-xs"></i> Online
                                    </span>
                                </div>
                            </div>
                            <div class="p-5">
                                <h3 class="text-lg font-bold text-white mb-2">Pertempuran Galaksi</h3>
                                <p class="text-gray-400 text-sm mb-4">Game strategi ruang angkasa dengan grafis 3D yang memukau.</p>
                                
                                <div class="grid grid-cols-2 gap-4 mb-4 text-sm">
                                    <div>
                                        <p class="text-gray-500">Unduhan</p>
                                        <p class="text-white font-medium">5.9K</p>
                                    </div>
                                    <div>
                                        <p class="text-gray-500">Rating</p>
                                        <p class="text-white font-medium">4.7 ⭐</p>
                                    </div>
                                    <div>
                                        <p class="text-gray-500">Pendapatan</p>
                                        <p class="text-white font-medium">Rp 11.1 Juta</p>
                                    </div>
                                    <div>
                                        <p class="text-gray-500">Terakhir Update</p>
                                        <p class="text-white font-medium">5 jam lalu</p>
                                    </div>
                                </div>
                                
                                <div class="flex gap-2">
                                    <button class="btn-neon flex-1 py-2 rounded text-sm">
                                        <i class="fas fa-edit mr-1"></i> Edit
                                    </button>
                                    <button class="btn-secondary flex-1 py-2 rounded text-sm">
                                        <i class="fas fa-eye mr-1"></i> Lihat
                                    </button>
                                    <button class="btn-danger p-2 rounded text-sm">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Game Card 5 -->
                        <div class="game-card rounded-xl overflow-hidden">
                            <div class="relative">
                                <img src="https://picsum.photos/seed/game5/400/225.jpg" alt="Game Cover" class="w-full h-48 object-cover">
                                <div class="absolute top-3 right-3">
                                    <span class="status-online bg-green-500/20 text-green-400 px-3 py-1 rounded-full text-xs flex items-center">
                                        <i class="fas fa-circle mr-1 text-xs"></i> Online
                                    </span>
                                </div>
                            </div>
                            <div class="p-5">
                                <h3 class="text-lg font-bold text-white mb-2">Koki Nusantara</h3>
                                <p class="text-gray-400 text-sm mb-4">Game memasak dengan berbagai resep masakan Indonesia yang autentik.</p>
                                
                                <div class="grid grid-cols-2 gap-4 mb-4 text-sm">
                                    <div>
                                        <p class="text-gray-500">Unduhan</p>
                                        <p class="text-white font-medium">15.2K</p>
                                    </div>
                                    <div>
                                        <p class="text-gray-500">Rating</p>
                                        <p class="text-white font-medium">4.5 ⭐</p>
                                    </div>
                                    <div>
                                        <p class="text-gray-500">Pendapatan</p>
                                        <p class="text-white font-medium">Rp 18.3 Juta</p>
                                    </div>
                                    <div>
                                        <p class="text-gray-500">Terakhir Update</p>
                                        <p class="text-white font-medium">1 hari lalu</p>
                                    </div>
                                </div>
                                
                                <div class="flex gap-2">
                                    <button class="btn-neon flex-1 py-2 rounded text-sm">
                                        <i class="fas fa-edit mr-1"></i> Edit
                                    </button>
                                    <button class="btn-secondary flex-1 py-2 rounded text-sm">
                                        <i class="fas fa-eye mr-1"></i> Lihat
                                    </button>
                                    <button class="btn-danger p-2 rounded text-sm">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Game Card 6 -->
                        <div class="game-card rounded-xl overflow-hidden">
                            <div class="relative">
                                <img src="https://picsum.photos/seed/game6/400/225.jpg" alt="Game Cover" class="w-full h-48 object-cover">
                                <div class="absolute top-3 right-3">
                                    <span class="status-maintenance bg-yellow-500/20 text-yellow-400 px-3 py-1 rounded-full text-xs flex items-center">
                                        <i class="fas fa-circle mr-1 text-xs"></i> Pemeliharaan
                                    </span>
                                </div>
                            </div>
                            <div class="p-5">
                                <h3 class="text-lg font-bold text-white mb-2">Balapan Liar</h3>
                                <p class="text-gray-400 text-sm mb-4">Game balap mobil dengan berbagai trek dan modifikasi kendaraan.</p>
                                
                                <div class="grid grid-cols-2 gap-4 mb-4 text-sm">
                                    <div>
                                        <p class="text-gray-500">Unduhan</p>
                                        <p class="text-white font-medium">9.8K</p>
                                    </div>
                                    <div>
                                        <p class="text-gray-500">Rating</p>
                                        <p class="text-white font-medium">4.4 ⭐</p>
                                    </div>
                                    <div>
                                        <p class="text-gray-500">Pendapatan</p>
                                        <p class="text-white font-medium">Rp 12.0 Juta</p>
                                    </div>
                                    <div>
                                        <p class="text-gray-500">Terakhir Update</p>
                                        <p class="text-white font-medium">2 hari lalu</p>
                                    </div>
                                </div>
                                
                                <div class="flex gap-2">
                                    <button class="btn-neon flex-1 py-2 rounded text-sm">
                                        <i class="fas fa-edit mr-1"></i> Edit
                                    </button>
                                    <button class="btn-secondary flex-1 py-2 rounded text-sm">
                                        <i class="fas fa-eye mr-1"></i> Lihat
                                    </button>
                                    <button class="btn-danger p-2 rounded text-sm">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Pagination -->
                    <div class="flex justify-center mt-8">
                        <nav class="flex space-x-2">
                            <button class="px-3 py-2 bg-gray-800/50 border border-gray-700/50 rounded-lg text-sm hover:bg-gray-700/50">
                                <i class="fas fa-chevron-left"></i>
                            </button>
                            <button class="px-4 py-2 bg-blue-600 border border-blue-500 rounded-lg text-sm">1</button>
                            <button class="px-4 py-2 bg-gray-800/50 border border-gray-700/50 rounded-lg text-sm hover:bg-gray-700/50">2</button>
                            <button class="px-4 py-2 bg-gray-800/50 border border-gray-700/50 rounded-lg text-sm hover:bg-gray-700/50">3</button>
                            <button class="px-3 py-2 bg-gray-800/50 border border-gray-700/50 rounded-lg text-sm hover:bg-gray-700/50">
                                <i class="fas fa-chevron-right"></i>
                            </button>
                        </nav>
                    </div>
                </main>
            </div>
        </div>
    </div>
    
    <!-- Floating Action Button -->
    <a href="{{ url('/import-game') }}" class="add-game-fab">
        <i class="fas fa-plus text-white text-xl"></i>
    </a>
    
    <script>
        // Sidebar functionality for mobile
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('active');
        }
        
        // Filter functionality
        document.querySelectorAll('.filter-chip').forEach(chip => {
            chip.addEventListener('click', function() {
                document.querySelectorAll('.filter-chip').forEach(c => c.classList.remove('active'));
                this.classList.add('active');
            });
        });
        
        // Simulate real-time data updates
        function updateGameStats() {
            // This would fetch real data in a real application
            console.log('Game stats updated');
        }
        
        // Update stats every 60 seconds
        setInterval(updateGameStats, 60000);
    </script>
</body>
</html>
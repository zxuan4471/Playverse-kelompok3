<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GameHub - Asset Saya</title>
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
        
        .asset-card {
            background: linear-gradient(145deg, rgba(30, 30, 63, 0.9), rgba(42, 42, 90, 0.9));
            border: 1px solid rgba(59, 130, 246, 0.2);
            backdrop-filter: blur(10px);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        
        .asset-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 15px 30px rgba(59, 130, 246, 0.25), 0 0 25px rgba(59, 130, 246, 0.15);
            border-color: rgba(59, 130, 246, 0.5);
        }
        
        .asset-card::before {
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
        
        .asset-card:hover::before {
            transform: scaleX(1);
        }
        
        .status-public {
            color: #22c55e;
        }
        
        .status-private {
            color: #ef4444;
        }
        
        .status-review {
            color: #f59e0b;
        }
        
        .add-asset-fab {
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
        
        .add-asset-fab:hover {
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
        
        .asset-type-badge {
            background: rgba(59, 130, 246, 0.2);
            border: 1px solid rgba(59, 130, 246, 0.4);
            color: #3b82f6;
            padding: 2px 8px;
            border-radius: 12px;
            font-size: 11px;
            font-weight: 500;
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
            
            .add-asset-fab {
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
                    <a href="{{ url('/') }}" class="text-gray-300 hover:text-white px-3 py-2 text-sm font-medium transition-colors">Beranda</a>
                    <a href="{{ url('/developer') }}" class="text-gray-300 hover:text-white px-3 py-2 text-sm font-medium transition-colors">Mode Developer</a>
                    <a href="{{ url('/pendaftaran-developer') }}" class="text-gray-300 hover:text-white px-3 py-2 text-sm font-medium transition-colors">Gabung sebagai Developer</a>
                    <a href="#" class="text-gray-300 hover:text-white px-3 py-2 text-sm font-medium transition-colors">Komunitas</a>
                </div>
                <!-- User Actions -->
                <div class="flex items-center space-x-4">
                    <div class="relative">
                        <button class="bg-gray-800/50 border border-blue-500/30 rounded-lg px-3 py-2 text-sm text-white">
                            <i class="fas fa-bell"></i> <span class="ml-1 bg-red-500 text-xs px-1.5 py-0.5 rounded-full">3</span>
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
    
    <!-- Garis Pemisah dengan Jarak -->
    <div class="pt-16"></div>
    <div class="nav-divider"></div>
    
    <!-- Main Content -->
    <div class="pt-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col lg:flex-row gap-8">
                <!-- Sidebar -->
                <aside class="w-full lg:w-64 sidebar-glass rounded-2xl p-6 h-fit lg:sticky lg:top-32 sidebar" id="sidebar">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-lg font-bold gradient-text">Alat Developer</h2>
                        <button class="lg:hidden text-gray-400 hover:text-white" onclick="toggleSidebar()">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    
                    <nav class="space-y-2">
                        <a href="{{ url('/developer') }}" class="sidebar-item flex items-center px-4 py-3 text-sm text-gray-300 hover:text-white rounded-lg transition-all">
                            <i class="fas fa-chart-line mr-3"></i>
                            Dashboard
                        </a>
                        <a href="{{ url('/game-saya') }}" class="sidebar-item flex items-center px-4 py-3 text-sm text-gray-300 hover:text-white rounded-lg transition-all">
                            <i class="fas fa-gamepad mr-3"></i>
                            Game Saya
                        </a>
                        <a href="{{ url('/asset-saya') }}" class="sidebar-item active flex items-center px-4 py-3 text-sm rounded-lg transition-all">
                            <i class="fas fa-cog mr-3"></i>
                            Assets
                        </a>
                        <a href="{{ url('/penghasilan') }}" class="sidebar-item flex items-center px-4 py-3 text-sm text-gray-300 hover:text-white rounded-lg transition-all">
                            <i class="fas fa-coins mr-3"></i>
                            Pendapatan
                        </a>
                    </nav>
                    
                    <!-- Quick Stats -->
                    <div class="mt-8 p-4 bg-gradient-to-br from-green-600/20 to-blue-600/20 rounded-xl border border-green-500/30">
                        <h3 class="text-sm font-bold text-white mb-2 flex items-center">
                            <i class="fas fa-rocket mr-2"></i> Terbitkan Cepat
                        </h3>
                        <p class="text-xs text-gray-300 mb-3">Terbitkan perubahan terbaru Anda</p>
                        <button class="w-full bg-green-600 hover:bg-green-700 text-white py-2 px-3 rounded-lg text-xs font-medium transition-colors">
                            Terbitkan Sekarang
                        </button>
                    </div>
                    
                    <!-- Storage Info -->
                    <div class="mt-6 p-4 bg-gray-800/50 rounded-xl border border-gray-700/50">
                        <h3 class="text-sm font-bold text-white mb-3 flex items-center">
                            <i class="fas fa-database mr-2"></i> Penyimpanan
                        </h3>
                        <div class="mb-2">
                            <div class="flex justify-between text-xs mb-1">
                                <span class="text-gray-400">Digunakan</span>
                                <span class="text-white">7.2 GB / 10 GB</span>
                            </div>
                            <div class="w-full bg-gray-700 rounded-full h-2">
                                <div class="bg-gradient-to-r from-blue-500 to-purple-500 h-2 rounded-full" style="width: 72%"></div>
                            </div>
                        </div>
                        <button class="text-xs text-blue-400 hover:text-blue-300 mt-2">
                            Tingkatkan Penyimpanan
                        </button>
                    </div>
                </aside>
                
                <!-- Main Content Area -->
                <main class="flex-1">
                    <!-- Header Section -->
                    <div class="mb-8">
                        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between mb-6">
                            <div>
                                <h1 class="text-3xl font-bold text-white mb-2">Asset Saya</h1>
                                <p class="text-gray-400">Kelola semua asset yang telah Anda unggah</p>
                            </div>
                            <a href="{{ url('/upload-asset') }}" class="btn-neon px-6 py-3 rounded-lg text-sm font-medium mt-4 sm:mt-0">
                                <i class="fas fa-plus mr-2"></i> Tambah Asset Baru
                            </a>
                        </div>
                        
                        <!-- Stats Overview -->
                        <div class="grid grid-cols-1 sm:grid-cols-4 gap-4 mb-6">
                            <div class="bg-gradient-to-r from-blue-600/20 to-purple-600/20 rounded-xl p-4 border border-blue-500/30">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="text-gray-400 text-sm">Total Asset</p>
                                        <p class="text-2xl font-bold text-white">156</p>
                                    </div>
                                    <i class="fas fa-folder text-2xl text-blue-400"></i>
                                </div>
                            </div>
                            <div class="bg-gradient-to-r from-green-600/20 to-blue-600/20 rounded-xl p-4 border border-green-500/30">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="text-gray-400 text-sm">Asset Publik</p>
                                        <p class="text-2xl font-bold text-white">89</p>
                                    </div>
                                    <i class="fas fa-globe text-2xl text-green-400"></i>
                                </div>
                            </div>
                            <div class="bg-gradient-to-r from-yellow-600/20 to-orange-600/20 rounded-xl p-4 border border-yellow-500/30">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="text-gray-400 text-sm">Total Unduhan</p>
                                        <p class="text-2xl font-bold text-white">234K</p>
                                    </div>
                                    <i class="fas fa-download text-2xl text-yellow-400"></i>
                                </div>
                            </div>
                            <div class="bg-gradient-to-r from-purple-600/20 to-pink-600/20 rounded-xl p-4 border border-purple-500/30">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="text-gray-400 text-sm">Ukuran Total</p>
                                        <p class="text-2xl font-bold text-white">5.8 GB</p>
                                    </div>
                                    <i class="fas fa-hdd text-2xl text-purple-400"></i>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Filter and Search -->
                        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 mb-6">
                            <div class="flex flex-wrap gap-2">
                                <button class="filter-chip active px-4 py-2 rounded-lg text-sm">Semua</button>
                                <button class="filter-chip px-4 py-2 rounded-lg text-sm">Gambar</button>
                                <button class="filter-chip px-4 py-2 rounded-lg text-sm">Suara</button>
                                <button class="filter-chip px-4 py-2 rounded-lg text-sm">Model 3D</button>
                                <button class="filter-chip px-4 py-2 rounded-lg text-sm">Animasi</button>
                            </div>
                            <div class="relative">
                                <input type="text" placeholder="Cari asset..." class="bg-gray-800/50 border border-gray-700/50 rounded-lg px-4 py-2 pr-10 text-sm w-full sm:w-64">
                                <i class="fas fa-search absolute right-3 top-2.5 text-gray-400"></i>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Assets Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
                        <!-- Asset Card 1 - Image -->
                        <div class="asset-card rounded-xl overflow-hidden">
                            <div class="relative">
                                <img src="https://picsum.photos/seed/asset1/400/300.jpg" alt="Asset Preview" class="w-full h-48 object-cover">
                                <div class="absolute top-3 right-3 flex gap-2">
                                    <span class="asset-type-badge">Gambar</span>
                                    <span class="status-public bg-green-500/20 text-green-400 px-3 py-1 rounded-full text-xs flex items-center">
                                        <i class="fas fa-globe mr-1 text-xs"></i> Publik
                                    </span>
                                </div>
                            </div>
                            <div class="p-5">
                                <h3 class="text-lg font-bold text-white mb-2">Texture Kayu Rustic</h3>
                                <p class="text-gray-400 text-sm mb-4">Texture kayu berkualitas tinggi untuk game dengan tema medieval.</p>
                                
                                <div class="grid grid-cols-2 gap-4 mb-4 text-sm">
                                    <div>
                                        <p class="text-gray-500">Ukuran</p>
                                        <p class="text-white font-medium">2.4 MB</p>
                                    </div>
                                    <div>
                                        <p class="text-gray-500">Resolusi</p>
                                        <p class="text-white font-medium">4K</p>
                                    </div>
                                    <div>
                                        <p class="text-gray-500">Unduhan</p>
                                        <p class="text-white font-medium">8.5K</p>
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
                        
                        <!-- Asset Card 2 - Sound -->
                        <div class="asset-card rounded-xl overflow-hidden">
                            <div class="relative">
                                <div class="w-full h-48 bg-gradient-to-br from-purple-600 to-blue-600 flex items-center justify-center">
                                    <i class="fas fa-music text-6xl text-white/30"></i>
                                </div>
                                <div class="absolute top-3 right-3 flex gap-2">
                                    <span class="asset-type-badge">Suara</span>
                                    <span class="status-public bg-green-500/20 text-green-400 px-3 py-1 rounded-full text-xs flex items-center">
                                        <i class="fas fa-globe mr-1 text-xs"></i> Publik
                                    </span>
                                </div>
                            </div>
                            <div class="p-5">
                                <h3 class="text-lg font-bold text-white mb-2">Efek Suara Pedang</h3>
                                <p class="text-gray-400 text-sm mb-4">Koleksi efek suara pedang untuk game action dan RPG.</p>
                                
                                <div class="grid grid-cols-2 gap-4 mb-4 text-sm">
                                    <div>
                                        <p class="text-gray-500">Ukuran</p>
                                        <p class="text-white font-medium">15.8 MB</p>
                                    </div>
                                    <div>
                                        <p class="text-gray-500">Format</p>
                                        <p class="text-white font-medium">WAV</p>
                                    </div>
                                    <div>
                                        <p class="text-gray-500">Unduhan</p>
                                        <p class="text-white font-medium">12.3K</p>
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
                        
                        <!-- Asset Card 3 - 3D Model -->
                        <div class="asset-card rounded-xl overflow-hidden">
                            <div class="relative">
                                <img src="https://picsum.photos/seed/asset3/400/300.jpg" alt="Asset Preview" class="w-full h-48 object-cover">
                                <div class="absolute top-3 right-3 flex gap-2">
                                    <span class="asset-type-badge">Model 3D</span>
                                    <span class="status-private bg-red-500/20 text-red-400 px-3 py-1 rounded-full text-xs flex items-center">
                                        <i class="fas fa-lock mr-1 text-xs"></i> Privat
                                    </span>
                                </div>
                            </div>
                            <div class="p-5">
                                <h3 class="text-lg font-bold text-white mb-2">Character Knight</h3>
                                <p class="text-gray-400 text-sm mb-4">Model karakter knight dengan armor detail dan animasi dasar.</p>
                                
                                <div class="grid grid-cols-2 gap-4 mb-4 text-sm">
                                    <div>
                                        <p class="text-gray-500">Ukuran</p>
                                        <p class="text-white font-medium">24.5 MB</p>
                                    </div>
                                    <div>
                                        <p class="text-gray-500">Polygon</p>
                                        <p class="text-white font-medium">15K</p>
                                    </div>
                                    <div>
                                        <p class="text-gray-500">Unduhan</p>
                                        <p class="text-white font-medium">3.2K</p>
                                    </div>
                                    <div>
                                        <p class="text-gray-500">Terakhir Update</p>
                                        <p class="text-white font-medium">1 minggu lalu</p>
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
                        
                        <!-- Asset Card 4 - Animation -->
                        <div class="asset-card rounded-xl overflow-hidden">
                            <div class="relative">
                                <div class="w-full h-48 bg-gradient-to-br from-green-600 to-teal-600 flex items-center justify-center">
                                    <i class="fas fa-film text-6xl text-white/30"></i>
                                </div>
                                <div class="absolute top-3 right-3 flex gap-2">
                                    <span class="asset-type-badge">Animasi</span>
                                    <span class="status-review bg-yellow-500/20 text-yellow-400 px-3 py-1 rounded-full text-xs flex items-center">
                                        <i class="fas fa-clock mr-1 text-xs"></i> Review
                                    </span>
                                </div>
                            </div>
                            <div class="p-5">
                                <h3 class="text-lg font-bold text-white mb-2">Animasi Portal</h3>
                                <p class="text-gray-400 text-sm mb-4">Animasi portal sihir dengan efek partikel yang menakjubkan.</p>
                                
                                <div class="grid grid-cols-2 gap-4 mb-4 text-sm">
                                    <div>
                                        <p class="text-gray-500">Ukuran</p>
                                        <p class="text-white font-medium">8.9 MB</p>
                                    </div>
                                    <div>
                                        <p class="text-gray-500">Durasi</p>
                                        <p class="text-white font-medium">5s</p>
                                    </div>
                                    <div>
                                        <p class="text-gray-500">Unduhan</p>
                                        <p class="text-white font-medium">6.7K</p>
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
                        
                        <!-- Asset Card 5 - Image -->
                        <div class="asset-card rounded-xl overflow-hidden">
                            <div class="relative">
                                <img src="https://picsum.photos/seed/asset5/400/300.jpg" alt="Asset Preview" class="w-full h-48 object-cover">
                                <div class="absolute top-3 right-3 flex gap-2">
                                    <span class="asset-type-badge">Gambar</span>
                                    <span class="status-public bg-green-500/20 text-green-400 px-3 py-1 rounded-full text-xs flex items-center">
                                        <i class="fas fa-globe mr-1 text-xs"></i> Publik
                                    </span>
                                </div>
                            </div>
                            <div class="p-5">
                                <h3 class="text-lg font-bold text-white mb-2">Skybox Cyberpunk</h3>
                                <p class="text-gray-400 text-sm mb-4">Skybox untuk scene cyberpunk dengan kota futuristik.</p>
                                
                                <div class="grid grid-cols-2 gap-4 mb-4 text-sm">
                                    <div>
                                        <p class="text-gray-500">Ukuran</p>
                                        <p class="text-white font-medium">18.2 MB</p>
                                    </div>
                                    <div>
                                        <p class="text-gray-500">Resolusi</p>
                                        <p class="text-white font-medium">8K</p>
                                    </div>
                                    <div>
                                        <p class="text-gray-500">Unduhan</p>
                                        <p class="text-white font-medium">15.8K</p>
                                    </div>
                                    <div>
                                        <p class="text-gray-500">Terakhir Update</p>
                                        <p class="text-white font-medium">4 hari lalu</p>
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
                        
                        <!-- Asset Card 6 - Sound -->
                        <div class="asset-card rounded-xl overflow-hidden">
                            <div class="relative">
                                <div class="w-full h-48 bg-gradient-to-br from-orange-600 to-red-600 flex items-center justify-center">
                                    <i class="fas fa-volume-up text-6xl text-white/30"></i>
                                </div>
                                <div class="absolute top-3 right-3 flex gap-2">
                                    <span class="asset-type-badge">Suara</span>
                                    <span class="status-public bg-green-500/20 text-green-400 px-3 py-1 rounded-full text-xs flex items-center">
                                        <i class="fas fa-globe mr-1 text-xs"></i> Publik
                                    </span>
                                </div>
                            </div>
                            <div class="p-5">
                                <h3 class="text-lg font-bold text-white mb-2">Background Music Epic</h3>
                                <p class="text-gray-400 text-sm mb-4">Musik latar epik untuk scene boss battle atau cutscene.</p>
                                
                                <div class="grid grid-cols-2 gap-4 mb-4 text-sm">
                                    <div>
                                        <p class="text-gray-500">Ukuran</p>
                                        <p class="text-white font-medium">12.4 MB</p>
                                    </div>
                                    <div>
                                        <p class="text-gray-500">Durasi</p>
                                        <p class="text-white font-medium">3:45</p>
                                    </div>
                                    <div>
                                        <p class="text-gray-500">Unduhan</p>
                                        <p class="text-white font-medium">9.2K</p>
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
                            <button class="px-4 py-2 bg-gray-800/50 border border-gray-700/50 rounded-lg text-sm hover:bg-gray-700/50">
                                <i class="fas fa-chevron-right"></i>
                            </button>
                        </nav>
                    </div>
                </main>
            </div>
        </div>
    </div>
    
    <!-- Floating Action Button -->
    <a href="{{ url('/upload-asset') }}" class="add-asset-fab">
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
        function updateAssetStats() {
            // This would fetch real data in a real application
            console.log('Asset stats updated');
        }
        
        // Update stats every 60 seconds
        setInterval(updateAssetStats, 60000);
    </script>
</body>
</html>
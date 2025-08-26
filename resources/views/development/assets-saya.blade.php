<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GameHub - Assets Saya</title>
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
        
        .stats-card {
            background: linear-gradient(135deg, rgba(59, 130, 246, 0.1), rgba(139, 92, 246, 0.1));
            border: 1px solid rgba(59, 130, 246, 0.3);
            backdrop-filter: blur(10px);
            transition: all 0.3s ease;
        }
        
        .stats-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 20px rgba(59, 130, 246, 0.2);
        }
        
        .progress-bar {
            background: linear-gradient(90deg, #3b82f6, #8b5cf6);
            height: 8px;
            border-radius: 4px;
            transition: width 0.5s ease;
        }
        
        .nav-tabs {
            background: rgba(15, 15, 35, 0.8);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(59, 130, 246, 0.2);
        }
        
        .nav-tab {
            padding: 12px 24px;
            color: rgba(255, 255, 255, 0.7);
            text-decoration: none;
            transition: all 0.3s ease;
            border-bottom: 2px solid transparent;
        }
        
        .nav-tab:hover {
            color: white;
            background: rgba(59, 130, 246, 0.1);
        }
        
        .nav-tab.active {
            color: white;
            border-bottom-color: #3b82f6;
            background: rgba(59, 130, 246, 0.1);
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
        
        .metric-trend-up {
            color: #22c55e;
        }
        
        .metric-trend-down {
            color: #ef4444;
        }
        
        .notification-badge {
            position: absolute;
            top: -8px;
            right: -8px;
            background: linear-gradient(45deg, #ef4444, #dc2626);
            color: white;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 10px;
            font-weight: bold;
        }
        
        .asset-card {
            background: linear-gradient(145deg, #1e1e3f 0%, #2a2a5a 100%);
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
        
        .status-pending {
            background: rgba(245, 158, 11, 0.2);
            color: #f59e0b;
            border: 1px solid rgba(245, 158, 11, 0.3);
        }
        
        .status-rejected {
            background: rgba(239, 68, 68, 0.2);
            color: #ef4444;
            border: 1px solid rgba(239, 68, 68, 0.3);
        }
        
        .status-draft {
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
        
        /* Modal Styles */
        .modal {
            transition: opacity 0.3s ease;
        }
        
        .modal-content {
            transform: scale(0.9);
            transition: transform 0.3s ease;
        }
        
        .modal.show .modal-content {
            transform: scale(1);
        }
        
        /* Notification Toast */
        .toast {
            position: fixed;
            bottom: 20px;
            right: 20px;
            padding: 16px 24px;
            border-radius: 8px;
            color: white;
            font-weight: 500;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            z-index: 1000;
            transform: translateY(100px);
            opacity: 0;
            transition: all 0.3s ease;
        }
        
        .toast.show {
            transform: translateY(0);
            opacity: 1;
        }
        
        .toast.success {
            background: linear-gradient(45deg, #22c55e, #16a34a);
        }
        
        .toast.error {
            background: linear-gradient(45deg, #ef4444, #dc2626);
        }
        
        .toast.info {
            background: linear-gradient(45deg, #3b82f6, #1d4ed8);
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
                
                <!-- Desktop Navigation Links -->
                <div class="hidden md:flex items-center space-x-8 desktop-menu">
                    <a href="{{ url('/') }}" class="text-gray-300 hover:text-white px-3 py-2 text-sm font-medium transition-colors">Beranda</a>
                    <a href="{{ url('/developer-dashboard') }}" class="text-gray-300 hover:text-white px-3 py-2 text-sm font-medium transition-colors">Dashboard</a>
                    <a href="{{ url('/my-games') }}" class="text-gray-300 hover:text-white px-3 py-2 text-sm font-medium transition-colors">Game Saya</a>
                    <a href="{{ url('/revenue') }}" class="text-gray-300 hover:text-white px-3 py-2 text-sm font-medium transition-colors">Pendapatan</a>
                    <a href="#" class="text-white px-3 py-2 text-sm font-medium transition-colors border-b-2 border-blue-500">Assets</a>
                    <a href="#" class="text-gray-300 hover:text-white px-3 py-2 text-sm font-medium transition-colors">Komunitas</a>
                </div>
                
                <!-- User Actions -->
                <div class="flex items-center space-x-4">
                    <div class="relative">
                        <button class="bg-gray-800/50 border border-blue-500/30 rounded-lg px-3 py-2 text-sm text-white relative">
                            <i class="fas fa-bell"></i>
                            <span class="notification-badge">3</span>
                        </button>
                    </div>
                    <div class="flex items-center space-x-2">
                        <div class="w-8 h-8 bg-gradient-to-r from-purple-500 to-blue-500 rounded-full"></div>
                        <span class="text-sm font-medium hidden sm:block">Developer</span>
                    </div>
                    
                    <!-- Mobile Menu Button -->
                    <button class="md:hidden text-gray-300 hover:text-white mobile-menu" onclick="toggleMobileMenu()">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                </div>
            </div>
        </div>
    </nav>
    
    <!-- Main Content -->
    <div class="pt-16">
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
                        <a href="{{ url('/developer-dashboard') }}" class="sidebar-item flex items-center px-4 py-3 text-sm text-gray-300 hover:text-white rounded-lg transition-all">
                            <i class="fas fa-chart-line mr-3"></i>
                            Dashboard
                        </a>
                        <a href="{{ url('/my-games') }}" class="sidebar-item flex items-center px-4 py-3 text-sm text-gray-300 hover:text-white rounded-lg transition-all">
                            <i class="fas fa-gamepad mr-3"></i>
                            Game Saya
                        </a>
                        <a href="{{ url('/revenue') }}" class="sidebar-item flex items-center px-4 py-3 text-sm text-gray-300 hover:text-white rounded-lg transition-all">
                            <i class="fas fa-coins mr-3"></i>
                            Pendapatan
                        </a>
                        <a href="#" class="sidebar-item active flex items-center px-4 py-3 text-sm rounded-lg transition-all">
                            <i class="fas fa-cog mr-3"></i>
                            Assets
                        </a>
                        <a href="#" class="sidebar-item flex items-center px-4 py-3 text-sm text-gray-300 hover:text-white rounded-lg transition-all">
                            <i class="fas fa-key mr-3"></i>
                            Kunci API
                        </a>
                        <a href="#" class="sidebar-item flex items-center px-4 py-3 text-sm text-gray-300 hover:text-white rounded-lg transition-all">
                            <i class="fas fa-book mr-3"></i>
                            Dokumentasi
                        </a>
                        <a href="#" class="sidebar-item flex items-center px-4 py-3 text-sm text-gray-300 hover:text-white rounded-lg transition-all">
                            <i class="fas fa-cog mr-3"></i>
                            Pengaturan
                        </a>
                    </nav>
                    
                    <!-- Quick Stats -->
                    <div class="mt-8 p-4 bg-gradient-to-br from-green-600/20 to-blue-600/20 rounded-xl border border-green-500/30">
                        <h3 class="text-sm font-bold text-white mb-2 flex items-center">
                            <i class="fas fa-plus mr-2"></i> Unggah Asset Baru
                        </h3>
                        <p class="text-xs text-gray-300 mb-3">Mulai menjual aset karya Anda</p>
                        <button onclick="showUploadAssetModal()" class="w-full bg-green-600 hover:bg-green-700 text-white py-2 px-3 rounded-lg text-xs font-medium transition-colors">
                            Unggah Sekarang
                        </button>
                    </div>
                    
                    <!-- Storage Info -->
                    <div class="mt-6 p-4 bg-gray-800/50 rounded-xl border border-gray-700/50">
                        <h3 class="text-sm font-bold text-white mb-3 flex items-center">
                            <i class="fas fa-database mr-2"></i> Penyimpanan Asset
                        </h3>
                        <div class="mb-2">
                            <div class="flex justify-between text-xs mb-1">
                                <span class="text-gray-400">Digunakan</span>
                                <span class="text-white">4.2 GB / 10 GB</span>
                            </div>
                            <div class="w-full bg-gray-700 rounded-full h-2">
                                <div class="progress-bar w-2/5"></div>
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
                                <h1 class="text-3xl font-bold text-white mb-2">Assets Saya</h1>
                                <p class="text-gray-400">Kelola semua aset yang Anda jual di marketplace</p>
                            </div>
                            <button onclick="showUploadAssetModal()" class="btn-neon px-6 py-3 rounded-lg font-medium mt-4 sm:mt-0">
                                <i class="fas fa-plus mr-2"></i> Asset Baru
                            </button>
                        </div>
                        
                        <!-- Stats Overview -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                            <div class="stats-card rounded-xl p-6">
                                <div class="flex items-center justify-between mb-4">
                                    <div>
                                        <p class="text-gray-400 text-sm">Total Assets</p>
                                        <p class="text-2xl font-bold text-white">24</p>
                                    </div>
                                    <div class="text-3xl">📦</div>
                                </div>
                                <div class="flex items-center text-sm">
                                    <span class="metric-trend-up flex items-center">
                                        <i class="fas fa-arrow-up mr-1"></i> +4
                                    </span>
                                    <span class="text-gray-400 ml-1">bulan ini</span>
                                </div>
                            </div>
                            
                            <div class="stats-card rounded-xl p-6">
                                <div class="flex items-center justify-between mb-4">
                                    <div>
                                        <p class="text-gray-400 text-sm">Total Penjualan</p>
                                        <p class="text-2xl font-bold text-white">1.2K</p>
                                    </div>
                                    <div class="text-3xl">🛒</div>
                                </div>
                                <div class="flex items-center text-sm">
                                    <span class="metric-trend-up flex items-center">
                                        <i class="fas fa-arrow-up mr-1"></i> +18%
                                    </span>
                                    <span class="text-gray-400 ml-1">bulan ini</span>
                                </div>
                            </div>
                            
                            <div class="stats-card rounded-xl p-6">
                                <div class="flex items-center justify-between mb-4">
                                    <div>
                                        <p class="text-gray-400 text-sm">Pendapatan</p>
                                        <p class="text-2xl font-bold text-white">Rp 8.745.000</p>
                                    </div>
                                    <div class="text-3xl">💰</div>
                                </div>
                                <div class="flex items-center text-sm">
                                    <span class="metric-trend-up flex items-center">
                                        <i class="fas fa-arrow-up mr-1"></i> +12%
                                    </span>
                                    <span class="text-gray-400 ml-1">bulan ini</span>
                                </div>
                            </div>
                            
                            <div class="stats-card rounded-xl p-6">
                                <div class="flex items-center justify-between mb-4">
                                    <div>
                                        <p class="text-gray-400 text-sm">Rating Rata-rata</p>
                                        <p class="text-2xl font-bold text-white">4.6</p>
                                    </div>
                                    <div class="text-3xl">⭐</div>
                                </div>
                                <div class="flex items-center text-sm">
                                    <span class="metric-trend-up flex items-center">
                                        <i class="fas fa-arrow-up mr-1"></i> +0.2
                                    </span>
                                    <span class="text-gray-400 ml-1">bulan ini</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Search and Filter -->
                    <div class="flex flex-col sm:flex-row gap-4 mb-8">
                        <div class="relative flex-1">
                            <input type="text" placeholder="Cari asset..." class="search-input w-full pl-10 pr-4 py-3 rounded-lg text-white">
                            <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                        </div>
                        <div class="flex gap-2 overflow-x-auto pb-2">
                            <button class="filter-chip active">Semua</button>
                            <button class="filter-chip">Model 3D</button>
                            <button class="filter-chip">Tekstur</button>
                            <button class="filter-chip">Audio</button>
                            <button class="filter-chip">Script</button>
                            <button class="filter-chip">UI</button>
                            <button class="filter-chip">Efek</button>
                        </div>
                    </div>
                    
                    <!-- Assets Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <!-- Asset Card 1 -->
                        <div class="asset-card rounded-xl overflow-hidden">
                            <div class="relative">
                                <img src="https://picsum.photos/seed/asset1/400/225.jpg" alt="Asset Preview" class="w-full h-48 object-cover">
                                <div class="absolute top-3 right-3">
                                    <span class="status-badge status-published">Diterbitkan</span>
                                </div>
                                <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/80 to-transparent p-4">
                                    <h3 class="text-lg font-bold text-white">Fantasy Character Pack</h3>
                                    <p class="text-sm text-gray-300">Model 3D • Karakter</p>
                                </div>
                            </div>
                            <div class="p-4">
                                <div class="flex items-center justify-between mb-3">
                                    <div class="text-lg font-bold text-white">Rp 150.000</div>
                                    <div class="flex items-center text-sm">
                                        <i class="fas fa-star text-yellow-400 mr-1"></i>
                                        <span>4.8</span>
                                        <span class="text-gray-400 ml-1">(124)</span>
                                    </div>
                                </div>
                                <div class="flex items-center justify-between text-sm text-gray-400 mb-3">
                                    <span><i class="fas fa-download mr-1"></i> 342</span>
                                    <span><i class="fas fa-shopping-cart mr-1"></i> 89</span>
                                </div>
                                <div class="flex items-center justify-between">
                                    <div class="text-sm">
                                        <span class="text-gray-400">Pendapatan:</span>
                                        <span class="text-white font-medium ml-1">Rp 13.350.000</span>
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
                        
                        <!-- Asset Card 2 -->
                        <div class="asset-card rounded-xl overflow-hidden">
                            <div class="relative">
                                <img src="https://picsum.photos/seed/asset2/400/225.jpg" alt="Asset Preview" class="w-full h-48 object-cover">
                                <div class="absolute top-3 right-3">
                                    <span class="status-badge status-published">Diterbitkan</span>
                                </div>
                                <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/80 to-transparent p-4">
                                    <h3 class="text-lg font-bold text-white">Sci-Fi Weapon Pack</h3>
                                    <p class="text-sm text-gray-300">Model 3D • Senjata</p>
                                </div>
                            </div>
                            <div class="p-4">
                                <div class="flex items-center justify-between mb-3">
                                    <div class="text-lg font-bold text-white">Rp 75.000</div>
                                    <div class="flex items-center text-sm">
                                        <i class="fas fa-star text-yellow-400 mr-1"></i>
                                        <span>4.5</span>
                                        <span class="text-gray-400 ml-1">(87)</span>
                                    </div>
                                </div>
                                <div class="flex items-center justify-between text-sm text-gray-400 mb-3">
                                    <span><i class="fas fa-download mr-1"></i> 256</span>
                                    <span><i class="fas fa-shopping-cart mr-1"></i> 64</span>
                                </div>
                                <div class="flex items-center justify-between">
                                    <div class="text-sm">
                                        <span class="text-gray-400">Pendapatan:</span>
                                        <span class="text-white font-medium ml-1">Rp 4.800.000</span>
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
                        
                        <!-- Asset Card 3 -->
                        <div class="asset-card rounded-xl overflow-hidden">
                            <div class="relative">
                                <img src="https://picsum.photos/seed/asset3/400/225.jpg" alt="Asset Preview" class="w-full h-48 object-cover">
                                <div class="absolute top-3 right-3">
                                    <span class="status-badge status-published">Diterbitkan</span>
                                </div>
                                <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/80 to-transparent p-4">
                                    <h3 class="text-lg font-bold text-white">Medieval Environment</h3>
                                    <p class="text-sm text-gray-300">Model 3D • Lingkungan</p>
                                </div>
                            </div>
                            <div class="p-4">
                                <div class="flex items-center justify-between mb-3">
                                    <div class="text-lg font-bold text-white">Rp 200.000</div>
                                    <div class="flex items-center text-sm">
                                        <i class="fas fa-star text-yellow-400 mr-1"></i>
                                        <span>4.9</span>
                                        <span class="text-gray-400 ml-1">(156)</span>
                                    </div>
                                </div>
                                <div class="flex items-center justify-between text-sm text-gray-400 mb-3">
                                    <span><i class="fas fa-download mr-1"></i> 178</span>
                                    <span><i class="fas fa-shopping-cart mr-1"></i> 45</span>
                                </div>
                                <div class="flex items-center justify-between">
                                    <div class="text-sm">
                                        <span class="text-gray-400">Pendapatan:</span>
                                        <span class="text-white font-medium ml-1">Rp 9.000.000</span>
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
                        
                        <!-- Asset Card 4 -->
                        <div class="asset-card rounded-xl overflow-hidden">
                            <div class="relative">
                                <img src="https://picsum.photos/seed/asset4/400/225.jpg" alt="Asset Preview" class="w-full h-48 object-cover">
                                <div class="absolute top-3 right-3">
                                    <span class="status-badge status-published">Diterbitkan</span>
                                </div>
                                <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/80 to-transparent p-4">
                                    <h3 class="text-lg font-bold text-white">RPG Sound Pack</h3>
                                    <p class="text-sm text-gray-300">Audio • Musik & SFX</p>
                                </div>
                            </div>
                            <div class="p-4">
                                <div class="flex items-center justify-between mb-3">
                                    <div class="text-lg font-bold text-white">Rp 50.000</div>
                                    <div class="flex items-center text-sm">
                                        <i class="fas fa-star text-yellow-400 mr-1"></i>
                                        <span>4.7</span>
                                        <span class="text-gray-400 ml-1">(98)</span>
                                    </div>
                                </div>
                                <div class="flex items-center justify-between text-sm text-gray-400 mb-3">
                                    <span><i class="fas fa-download mr-1"></i> 412</span>
                                    <span><i class="fas fa-shopping-cart mr-1"></i> 103</span>
                                </div>
                                <div class="flex items-center justify-between">
                                    <div class="text-sm">
                                        <span class="text-gray-400">Pendapatan:</span>
                                        <span class="text-white font-medium ml-1">Rp 5.150.000</span>
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
                        
                        <!-- Asset Card 5 -->
                        <div class="asset-card rounded-xl overflow-hidden">
                            <div class="relative">
                                <img src="https://picsum.photos/seed/asset5/400/225.jpg" alt="Asset Preview" class="w-full h-48 object-cover">
                                <div class="absolute top-3 right-3">
                                    <span class="status-badge status-pending">Menunggu Review</span>
                                </div>
                                <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/80 to-transparent p-4">
                                    <h3 class="text-lg font-bold text-white">Modern UI Kit</h3>
                                    <p class="text-sm text-gray-300">UI • Interface</p>
                                </div>
                            </div>
                            <div class="p-4">
                                <div class="flex items-center justify-between mb-3">
                                    <div class="text-lg font-bold text-white">Rp 100.000</div>
                                    <div class="flex items-center text-sm">
                                        <i class="fas fa-star text-yellow-400 mr-1"></i>
                                        <span>-</span>
                                        <span class="text-gray-400 ml-1">(0)</span>
                                    </div>
                                </div>
                                <div class="flex items-center justify-between text-sm text-gray-400 mb-3">
                                    <span><i class="fas fa-download mr-1"></i> 0</span>
                                    <span><i class="fas fa-shopping-cart mr-1"></i> 0</span>
                                </div>
                                <div class="flex items-center justify-between">
                                    <div class="text-sm">
                                        <span class="text-gray-400">Status:</span>
                                        <span class="text-yellow-400 font-medium ml-1">Review</span>
                                    </div>
                                    <div class="flex space-x-2">
                                        <button class="btn-secondary px-3 py-1 rounded text-sm">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="btn-danger px-3 py-1 rounded text-sm">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Asset Card 6 -->
                        <div class="asset-card rounded-xl overflow-hidden">
                            <div class="relative">
                                <img src="https://picsum.photos/seed/asset6/400/225.jpg" alt="Asset Preview" class="w-full h-48 object-cover">
                                <div class="absolute top-3 right-3">
                                    <span class="status-badge status-rejected">Ditolak</span>
                                </div>
                                <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/80 to-transparent p-4">
                                    <h3 class="text-lg font-bold text-white">Particle Effects Pack</h3>
                                    <p class="text-sm text-gray-300">Efek • VFX</p>
                                </div>
                            </div>
                            <div class="p-4">
                                <div class="flex items-center justify-between mb-3">
                                    <div class="text-lg font-bold text-white">Rp 125.000</div>
                                    <div class="flex items-center text-sm">
                                        <i class="fas fa-star text-yellow-400 mr-1"></i>
                                        <span>-</span>
                                        <span class="text-gray-400 ml-1">(0)</span>
                                    </div>
                                </div>
                                <div class="flex items-center justify-between text-sm text-gray-400 mb-3">
                                    <span><i class="fas fa-download mr-1"></i> 0</span>
                                    <span><i class="fas fa-shopping-cart mr-1"></i> 0</span>
                                </div>
                                <div class="flex items-center justify-between">
                                    <div class="text-sm">
                                        <span class="text-gray-400">Alasan:</span>
                                        <span class="text-red-400 font-medium ml-1">Kualitas rendah</span>
                                    </div>
                                    <div class="flex space-x-2">
                                        <button class="btn-secondary px-3 py-1 rounded text-sm">
                                            <i class="fas fa-redo"></i>
                                        </button>
                                        <button class="btn-danger px-3 py-1 rounded text-sm">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Pagination -->
                    <div class="flex items-center justify-between mt-8">
                        <div class="text-sm text-gray-400">
                            Menampilkan 6 dari 24 assets
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
    
    <!-- Upload Asset Modal -->
    <div id="upload-asset-modal" class="modal fixed inset-0 bg-black/50 backdrop-blur-sm z-50 hidden">
        <div class="flex items-center justify-center min-h-screen p-4">
            <div class="modal-content dev-card rounded-2xl p-8 max-w-md w-full">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-xl font-bold text-white">Unggah Asset Baru</h3>
                    <button onclick="hideUploadAssetModal()" class="text-gray-400 hover:text-white">
                        <i class="fas fa-times text-xl"></i>
                    </button>
                </div>
                
                <form id="upload-asset-form">
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-300 mb-2">Nama Asset</label>
                            <input type="text" class="search-input w-full px-4 py-3 rounded-lg text-white" placeholder="Masukkan nama asset">
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-300 mb-2">Kategori</label>
                            <select class="search-input w-full px-4 py-3 rounded-lg text-white">
                                <option>Pilih kategori</option>
                                <option>Model 3D</option>
                                <option>Tekstur</option>
                                <option>Audio</option>
                                <option>Script</option>
                                <option>UI</option>
                                <option>Efek</option>
                            </select>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-300 mb-2">Harga (Rp)</label>
                            <div class="relative">
                                <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400">Rp</span>
                                <input type="number" class="search-input w-full pl-12 pr-4 py-3 rounded-lg text-white" placeholder="0" min="0" step="1000">
                            </div>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-300 mb-2">Deskripsi</label>
                            <textarea class="search-input w-full px-4 py-3 rounded-lg text-white h-24 resize-none" placeholder="Deskripsikan asset Anda"></textarea>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-300 mb-2">Preview Asset</label>
                            <div class="border-2 border-dashed border-gray-600 rounded-lg p-8 text-center cursor-pointer hover:border-blue-500 transition-colors">
                                <i class="fas fa-cloud-upload-alt text-3xl text-gray-400 mb-2"></i>
                                <p class="text-gray-400">Klik untuk upload preview</p>
                                <p class="text-xs text-gray-500 mt-1">PNG, JPG, GIF maksimal 5MB</p>
                            </div>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-300 mb-2">File Asset</label>
                            <div class="border-2 border-dashed border-gray-600 rounded-lg p-8 text-center cursor-pointer hover:border-blue-500 transition-colors">
                                <i class="fas fa-file-archive text-3xl text-gray-400 mb-2"></i>
                                <p class="text-gray-400">Klik untuk upload file</p>
                                <p class="text-xs text-gray-500 mt-1">ZIP, RAR maksimal 50MB</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="flex justify-end space-x-3 mt-6">
                        <button type="button" onclick="hideUploadAssetModal()" class="btn-secondary px-6 py-2 rounded-lg">
                            Batal
                        </button>
                        <button type="submit" class="btn-neon px-6 py-2 rounded-lg">
                            Unggah Asset
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
        function showUploadAssetModal() {
            document.getElementById('upload-asset-modal').classList.remove('hidden');
            document.getElementById('upload-asset-modal').classList.add('show');
        }
        
        function hideUploadAssetModal() {
            document.getElementById('upload-asset-modal').classList.add('hidden');
            document.getElementById('upload-asset-modal').classList.remove('show');
        }
        
        // Filter functionality
        document.querySelectorAll('.filter-chip').forEach(chip => {
            chip.addEventListener('click', function() {
                // Remove active class from all chips
                document.querySelectorAll('.filter-chip').forEach(c => c.classList.remove('active'));
                // Add active class to clicked chip
                this.classList.add('active');
                // Here you would filter the assets based on the selected filter
                console.log('Filter:', this.textContent);
            });
        });
        
        // Search functionality
        document.querySelector('.search-input').addEventListener('input', function(e) {
            const searchTerm = e.target.value.toLowerCase();
            // Here you would filter the assets based on the search term
            console.log('Search:', searchTerm);
        });
        
        // Handle upload asset form submission
        document.getElementById('upload-asset-form').addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Here you would handle the asset upload
            console.log('Asset uploaded');
            
            // Close modal and show success message
            hideUploadAssetModal();
            showToast('Asset berhasil diunggah dan menunggu review', 'success');
        });
        
        // Show toast notification
        function showToast(message, type = 'info') {
            const toast = document.createElement('div');
            toast.className = `toast ${type}`;
            toast.textContent = message;
            document.body.appendChild(toast);
            
            // Show toast
            setTimeout(() => {
                toast.classList.add('show');
            }, 10);
            
            // Hide toast after 3 seconds
            setTimeout(() => {
                toast.classList.remove('show');
                setTimeout(() => {
                    document.body.removeChild(toast);
                }, 300);
            }, 3000);
        }
        
        // Close modal when clicking outside
        document.getElementById('upload-asset-modal').addEventListener('click', function(e) {
            if (e.target === this) {
                hideUploadAssetModal();
            }
        });
    </script>
</body>
</html>
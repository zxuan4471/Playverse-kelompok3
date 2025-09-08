<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GameHub - Dashboard Developer</title>
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
        
        .project-card {
            transition: all 0.3s ease;
        }
        
        .project-card:hover {
            background: rgba(59, 130, 246, 0.1);
            border-color: rgba(59, 130, 246, 0.5);
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
    
    <!-- Secondary Navigation (Creator Dashboard Style) -->
    <div class="pt-16 bg-gray-800/50 border-b border-gray-700/50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col sm:flex-row items-center justify-between py-4">
                <h1 class="text-2xl font-bold text-white mb-2 sm:mb-0">Dashboard Kreator</h1>
                <div class="flex flex-col sm:flex-row items-center space-y-2 sm:space-y-0 sm:space-x-4">
                    <span class="text-sm text-gray-400">Terakhir diperbarui: 2 menit yang lalu</span>
                    <button class="btn-neon px-4 py-2 rounded-lg text-sm font-medium">
                        <i class="fas fa-rocket mr-2"></i> Terbitkan
                    </button>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Main Content -->
    <div class="pt-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col lg:flex-row gap-8">
                <!-- Sidebar -->
    @include('development.navigasi.sidebar-developer')
                
                <!-- Main Content Area -->
                <main class="flex-1">
                    <!-- Stats Overview -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                        <div class="stats-card rounded-xl p-6">
                            <div class="flex items-center justify-between mb-4">
                                <div>
                                    <p class="text-gray-400 text-sm">Total Game</p>
                                    <p class="text-2xl font-bold text-white">12</p>
                                </div>
                                <div class="text-3xl">🎮</div>
                            </div>
                            <div class="flex items-center text-sm">
                                <span class="metric-trend-up flex items-center">
                                    <i class="fas fa-arrow-up mr-1"></i> +2
                                </span>
                                <span class="text-gray-400 ml-1">bulan ini</span>
                            </div>
                        </div>
                        
                        <div class="stats-card rounded-xl p-6">
                            <div class="flex items-center justify-between mb-4">
                                <div>
                                    <p class="text-gray-400 text-sm">Unduhan</p>
                                    <p class="text-2xl font-bold text-white">45.2K</p>
                                </div>
                                <div class="text-3xl">📥</div>
                            </div>
                            <div class="flex items-center text-sm">
                                <span class="metric-trend-up flex items-center">
                                    <i class="fas fa-arrow-up mr-1"></i> +12%
                                </span>
                                <span class="text-gray-400 ml-1">vs bulan lalu</span>
                            </div>
                        </div>
                        
                        <div class="stats-card rounded-xl p-6">
                            <div class="flex items-center justify-between mb-4">
                                <div>
                                    <p class="text-gray-400 text-sm">Pendapatan</p>
                                    <p class="text-2xl font-bold text-white">Rp 58.9 Juta</p>
                                </div>
                                <div class="text-3xl">💰</div>
                            </div>
                            <div class="flex items-center text-sm">
                                <span class="metric-trend-up flex items-center">
                                    <i class="fas fa-arrow-up mr-1"></i> +8%
                                </span>
                                <span class="text-gray-400 ml-1">bulan ini</span>
                            </div>
                        </div>
                        
                        <div class="stats-card rounded-xl p-6">
                            <div class="flex items-center justify-between mb-4">
                                <div>
                                    <p class="text-gray-400 text-sm">Panggilan API</p>
                                    <p class="text-2xl font-bold text-white">892K</p>
                                </div>
                                <div class="text-3xl">🔄</div>
                            </div>
                            <div class="flex items-center text-sm">
                                <span class="metric-trend-down flex items-center">
                                    <i class="fas fa-arrow-down mr-1"></i> -3%
                                </span>
                                <span class="text-gray-400 ml-1">hari ini</span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Recent Projects -->
                    <div class="dev-card rounded-xl p-6 mb-8">
                        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between mb-6">
                            <h2 class="text-xl font-bold text-white mb-2 sm:mb-0">Proyek Terbaru</h2>
                            <a href="{{ url('/import-game') }}" class="btn-neon px-4 py-2 rounded-lg text-sm font-medium">
                                <i class="fas fa-plus mr-2"></i> Proyek Baru
                            </a>
                        </div>
                        
                        <div class="space-y-4">
                            <div class="project-card flex flex-col sm:flex-row items-start sm:items-center justify-between p-4 bg-gray-800/50 rounded-lg border border-gray-700/50">
                                <div class="flex items-center space-x-4 mb-3 sm:mb-0">
                                    <div class="w-12 h-12 bg-gradient-to-r from-purple-500 to-blue-500 rounded-lg flex items-center justify-center">
                                        <span class="text-white font-bold">MP</span>
                                    </div>
                                    <div>
                                        <h3 class="font-bold text-white">Misteri Hutan Angker</h3>
                                        <p class="text-gray-400 text-sm">Terakhir diperbarui 2 jam yang lalu</p>
                                    </div>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <span class="status-online flex items-center">
                                        <i class="fas fa-circle mr-1 text-xs"></i> Online
                                    </span>
                                    <button class="btn-secondary px-3 py-1 rounded text-sm">Edit</button>
                                    <button class="btn-neon px-3 py-1 rounded text-sm">Lihat</button>
                                </div>
                            </div>
                            
                            <div class="project-card flex flex-col sm:flex-row items-start sm:items-center justify-between p-4 bg-gray-800/50 rounded-lg border border-gray-700/50">
                                <div class="flex items-center space-x-4 mb-3 sm:mb-0">
                                    <div class="w-12 h-12 bg-gradient-to-r from-cyan-500 to-purple-500 rounded-lg flex items-center justify-center">
                                        <span class="text-white font-bold">PL</span>
                                    </div>
                                    <div>
                                        <h3 class="font-bold text-white">Pelari Neon 2077</h3>
                                        <p class="text-gray-400 text-sm">Terakhir diperbarui 1 hari yang lalu</p>
                                    </div>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <span class="status-maintenance flex items-center">
                                        <i class="fas fa-circle mr-1 text-xs"></i> Pemeliharaan
                                    </span>
                                    <button class="btn-secondary px-3 py-1 rounded text-sm">Edit</button>
                                    <button class="btn-secondary px-3 py-1 rounded text-sm">Lihat</button>
                                </div>
                            </div>
                            
                            <div class="project-card flex flex-col sm:flex-row items-start sm:items-center justify-between p-4 bg-gray-800/50 rounded-lg border border-gray-700/50">
                                <div class="flex items-center space-x-4 mb-3 sm:mb-0">
                                    <div class="w-12 h-12 bg-gradient-to-r from-green-500 to-blue-500 rounded-lg flex items-center justify-center">
                                        <span class="text-white font-bold">TK</span>
                                    </div>
                                    <div>
                                        <h3 class="font-bold text-white">Teka-Teki Kuantum</h3>
                                        <p class="text-gray-400 text-sm">Terakhir diperbarui 3 hari yang lalu</p>
                                    </div>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <span class="status-offline flex items-center">
                                        <i class="fas fa-circle mr-1 text-xs"></i> Offline
                                    </span>
                                    <button class="btn-secondary px-3 py-1 rounded text-sm">Edit</button>
                                    <button class="btn-danger px-3 py-1 rounded text-sm">Debug</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Development Tools -->
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        <!-- API Usage -->
                        <div class="dev-card rounded-xl p-6">
                            <div class="flex items-center justify-between mb-4">
                                <h3 class="text-lg font-bold text-white">Penggunaan API</h3>
                                <button class="text-blue-400 hover:text-blue-300 text-sm">
                                    <i class="fas fa-sync-alt mr-1"></i> Segarkan
                                </button>
                            </div>
                            <div class="space-y-4">
                                <div>
                                    <div class="flex justify-between text-sm mb-2">
                                        <span class="text-gray-400">Batas Harian</span>
                                        <span class="text-white">8.9K / 10K</span>
                                    </div>
                                    <div class="w-full bg-gray-700 rounded-full h-2">
                                        <div class="progress-bar w-4/5"></div>
                                    </div>
                                </div>
                                <div>
                                    <div class="flex justify-between text-sm mb-2">
                                        <span class="text-gray-400">Batas Bulanan</span>
                                        <span class="text-white">245K / 300K</span>
                                    </div>
                                    <div class="w-full bg-gray-700 rounded-full h-2">
                                        <div class="progress-bar w-4/5"></div>
                                    </div>
                                </div>
                                <div class="mt-4 p-3 bg-blue-900/20 rounded-lg border border-blue-700/30">
                                    <p class="text-xs text-blue-300">
                                        <i class="fas fa-info-circle mr-1"></i> 
                                        Anda akan mencapai batas harian dalam 2 jam. Pertimbangkan untuk meningkatkan paket Anda.
                                    </p>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Recent Deployments -->
                        <div class="dev-card rounded-xl p-6">
                            <div class="flex items-center justify-between mb-4">
                                <h3 class="text-lg font-bold text-white">Penerapan Terbaru</h3>
                                <button class="text-blue-400 hover:text-blue-300 text-sm">
                                    Lihat Semua
                                </button>
                            </div>
                            <div class="space-y-3">
                                <div class="flex items-center justify-between text-sm">
                                    <div>
                                        <span class="text-gray-400">v1.2.3 - Misteri Hutan</span>
                                        <p class="text-xs text-gray-500">2 jam yang lalu</p>
                                    </div>
                                    <span class="status-online flex items-center">
                                        <i class="fas fa-check-circle mr-1"></i> Berhasil
                                    </span>
                                </div>
                                <div class="flex items-center justify-between text-sm">
                                    <div>
                                        <span class="text-gray-400">v1.1.8 - Pelari Neon</span>
                                        <p class="text-xs text-gray-500">1 hari yang lalu</p>
                                    </div>
                                    <span class="status-maintenance flex items-center">
                                        <i class="fas fa-exclamation-triangle mr-1"></i> Peringatan
                                    </span>
                                </div>
                                <div class="flex items-center justify-between text-sm">
                                    <div>
                                        <span class="text-gray-400">v2.0.1 - Teka-Teki Kuantum</span>
                                        <p class="text-xs text-gray-500">3 hari yang lalu</p>
                                    </div>
                                    <span class="status-offline flex items-center">
                                        <i class="fas fa-times-circle mr-1"></i> Gagal
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Additional Section: Quick Actions -->
                    <div class="dev-card rounded-xl p-6 mt-8">
                        <h3 class="text-lg font-bold text-white mb-4">Aksi Cepat</h3>
                        <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
                            <button class="flex flex-col items-center justify-center p-4 bg-gray-800/50 rounded-lg border border-gray-700/50 hover:bg-gray-700/50 transition-colors">
                                <i class="fas fa-plus-circle text-2xl text-blue-400 mb-2"></i>
                                <span class="text-sm">Buat Game</span>
                            </button>
                            <button class="flex flex-col items-center justify-center p-4 bg-gray-800/50 rounded-lg border border-gray-700/50 hover:bg-gray-700/50 transition-colors">
                                <i class="fas fa-upload text-2xl text-green-400 mb-2"></i>
                                <span class="text-sm">Unggah Build</span>
                            </button>
                            <button class="flex flex-col items-center justify-center p-4 bg-gray-800/50 rounded-lg border border-gray-700/50 hover:bg-gray-700/50 transition-colors">
                                <i class="fas fa-chart-line text-2xl text-purple-400 mb-2"></i>
                                <span class="text-sm">Lihat Statistik</span>
                            </button>
                            <button class="flex flex-col items-center justify-center p-4 bg-gray-800/50 rounded-lg border border-gray-700/50 hover:bg-gray-700/50 transition-colors">
                                <i class="fas fa-users text-2xl text-yellow-400 mb-2"></i>
                                <span class="text-sm">Komunitas</span>
                            </button>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </div>
    
    <script>
        // Mobile menu functionality
        function toggleMobileMenu() {
            // This would toggle a mobile menu if implemented
            console.log('Mobile menu toggled');
        }
        
        // Sidebar functionality for mobile
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('active');
        }
        
        // Simulate real-time data updates
        function updateStats() {
            // This would fetch real data in a real application
            console.log('Stats updated');
        }
        
        // Update stats every 30 seconds
        setInterval(updateStats, 30000);
    </script>
</body>
</html>
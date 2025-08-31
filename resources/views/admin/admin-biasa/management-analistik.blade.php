<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Analisis Game & Assets - GameHub Admin</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #0a0a0a;
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
        }
        
        .admin-sidebar {
            background: linear-gradient(180deg, #1a1a1a 0%, #0f0f0f 100%);
            border-right: 1px solid #2a2a2a;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.3);
        }
        
        .admin-topbar {
            background: linear-gradient(90deg, #1a1a1a 0%, #121212 100%);
            border-bottom: 1px solid #2a2a2a;
            backdrop-filter: blur(10px);
        }
        
        .admin-card {
            background: linear-gradient(145deg, #1a1a1a 0%, #141414 100%);
            border: 1px solid #2a2a2a;
            transition: all 0.3s ease;
        }
        
        .admin-card:hover {
            border-color: #3b82f6;
            box-shadow: 0 4px 20px rgba(59, 130, 246, 0.1);
        }
        
        .nav-item {
            color: #9ca3af;
            transition: all 0.3s ease;
            border-radius: 8px;
            margin: 2px 0;
        }
        
        .nav-item:hover {
            background: #2a2a2a;
            color: #ffffff;
            padding-left: 20px;
        }
        
        .nav-item.active {
            background: linear-gradient(90deg, #3b82f6, #2563eb);
            color: white;
            font-weight: 600;
            box-shadow: 0 2px 10px rgba(59, 130, 246, 0.3);
        }
        
        .search-box {
            background: #1a1a1a;
            border: 1px solid #2a2a2a;
            color: white;
        }
        
        .search-box:focus {
            border-color: #3b82f6;
            box-shadow: 0 0 10px rgba(59, 130, 246, 0.2);
            outline: none;
        }
        
        .btn-primary {
            background: linear-gradient(45deg, #3b82f6, #2563eb);
            color: white;
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            background: linear-gradient(45deg, #2563eb, #1d4ed8);
            transform: translateY(-1px);
        }
        
        .btn-secondary {
            background: #2a2a2a;
            border: 1px solid #404040;
            color: #ffffff;
            transition: all 0.3s ease;
        }
        
        .btn-secondary:hover {
            background: #404040;
            border-color: #525252;
        }
        
        .notification-dot {
            width: 8px;
            height: 8px;
            background: #ef4444;
            border-radius: 50%;
            position: absolute;
            top: -2px;
            right: -2px;
        }
        
        .game-thumbnail {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 12px;
        }
        
        .chart-container {
            position: relative;
            height: 300px;
        }
        
        .revenue-chart {
            height: 250px;
            background: linear-gradient(180deg, rgba(59, 130, 246, 0.1) 0%, transparent 100%);
            border-radius: 12px;
            position: relative;
            overflow: hidden;
        }
        
        .chart-bar {
            position: absolute;
            bottom: 0;
            background: linear-gradient(180deg, #3b82f6, #2563eb);
            border-radius: 4px 4px 0 0;
            transition: all 0.3s ease;
        }
        
        .chart-bar:hover {
            opacity: 0.8;
            transform: translateY(-2px);
        }
        
        .pie-chart {
            width: 200px;
            height: 200px;
            border-radius: 50%;
            background: conic-gradient(
                #3b82f6 0deg 108deg,
                #8b5cf6 108deg 180deg,
                #ec4899 180deg 252deg,
                #f59e0b 252deg 324deg,
                #10b981 324deg 360deg
            );
            position: relative;
            margin: 0 auto;
        }
        
        .pie-chart::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 120px;
            height: 120px;
            background: #0a0a0a;
            border-radius: 50%;
        }
        
        .asset-icon {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
        }
        
        .progress-bar {
            background: #2a2a2a;
            border-radius: 10px;
            overflow: hidden;
            height: 10px;
        }
        
        .progress-fill {
            height: 100%;
            background: linear-gradient(90deg, #3b82f6, #2563eb);
            transition: width 0.3s ease;
        }
        
        .trend-up {
            color: #22c55e;
        }
        
        .trend-down {
            color: #ef4444;
        }
        
        .category-card {
            background: linear-gradient(145deg, #1a1a1a 0%, #141414 100%);
            border: 1px solid #2a2a2a;
            border-radius: 16px;
            padding: 24px;
            transition: all 0.3s ease;
        }
        
        .category-card:hover {
            border-color: #3b82f6;
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(59, 130, 246, 0.1);
        }
        
        .stat-number {
            font-size: 2.5rem;
            font-weight: 700;
            background: linear-gradient(135deg, #3b82f6, #8b5cf6);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
    </style>
</head>
<body class="bg-black text-white">

@include('admin.layouts.navbar-admin')
@include('admin.layouts.sidebar-admin')    
    <!-- Main Content -->
    <main class="ml-64 mt-16 min-h-screen">
        <div class="p-6">
            <!-- Breadcrumb -->
            <nav class="mb-6">
                <ol class="flex items-center space-x-2 text-sm text-gray-400">
                    <li><a href="#" class="hover:text-white transition-colors">Dashboard</a></li>
                    <li><i class="fas fa-chevron-right text-xs"></i></li>
                    <li class="text-white font-medium">Analisis Game & Assets</li>
                </ol>
            </nav>
            
            <!-- Page Header -->
            <div class="flex items-center justify-between mb-8">
                <div>
                    <h1 class="text-3xl font-bold text-white">Analisis Game & Assets</h1>
                    <p class="text-gray-400 mt-1">Monitor performa game, penggunaan assets, dan statistik platform</p>
                </div>
                <div class="flex items-center space-x-3">
                    <button class="btn-secondary px-4 py-2 rounded-lg text-sm font-medium">
                        <i class="fas fa-download mr-2"></i>Export Report
                    </button>
                    <button class="btn-primary px-4 py-2 rounded-lg text-sm font-medium">
                        <i class="fas fa-sync-alt mr-2"></i>Refresh Data
                    </button>
                </div>
            </div>
            
            <!-- Key Metrics -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                <div class="admin-card rounded-xl p-6">
                    <div class="flex items-center justify-between mb-4">
                        <div class="bg-blue-600 p-3 rounded-full">
                            <i class="fas fa-gamepad text-white text-xl"></i>
                        </div>
                        <span class="trend-up text-sm">
                            <i class="fas fa-arrow-up"></i> 12%
                        </span>
                    </div>
                    <h3 class="text-gray-400 text-sm mb-1">Total Game</h3>
                    <p class="stat-number">87</p>
                    <p class="text-xs text-gray-500 mt-2">9 game baru bulan ini</p>
                </div>
                
                <div class="admin-card rounded-xl p-6">
                    <div class="flex items-center justify-between mb-4">
                        <div class="bg-purple-600 p-3 rounded-full">
                            <i class="fas fa-cube text-white text-xl"></i>
                        </div>
                        <span class="trend-up text-sm">
                            <i class="fas fa-arrow-up"></i> 8%
                        </span>
                    </div>
                    <h3 class="text-gray-400 text-sm mb-1">Total Assets</h3>
                    <p class="stat-number">1,247</p>
                    <p class="text-xs text-gray-500 mt-2">92 assets baru minggu ini</p>
                </div>
                
                <div class="admin-card rounded-xl p-6">
                    <div class="flex items-center justify-between mb-4">
                        <div class="bg-green-600 p-3 rounded-full">
                            <i class="fas fa-download text-white text-xl"></i>
                        </div>
                        <span class="trend-up text-sm">
                            <i class="fas fa-arrow-up"></i> 23%
                        </span>
                    </div>
                    <h3 class="text-gray-400 text-sm mb-1">Total Download</h3>
                    <p class="stat-number">2.4M</p>
                    <p class="text-xs text-gray-500 mt-2">452K download bulan ini</p>
                </div>
                
                <div class="admin-card rounded-xl p-6">
                    <div class="flex items-center justify-between mb-4">
                        <div class="bg-yellow-600 p-3 rounded-full">
                            <i class="fas fa-hdd text-white text-xl"></i>
                        </div>
                        <span class="trend-down text-sm">
                            <i class="fas fa-arrow-up"></i> 5%
                        </span>
                    </div>
                    <h3 class="text-gray-400 text-sm mb-1">Storage Used</h3>
                    <p class="stat-number">10.2GB</p>
                    <p class="text-xs text-gray-500 mt-2">20.4% dari 50GB</p>
                </div>
            </div>
            
            <!-- Charts Section -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
                <!-- Revenue Chart -->
                <div class="admin-card rounded-xl p-6">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-bold text-white">Pendapatan 7 Hari Terakhir</h3>
                        <select class="bg-gray-800 border border-gray-700 rounded-lg px-3 py-1 text-white text-sm">
                            <option>7 Hari</option>
                            <option>30 Hari</option>
                            <option>90 Hari</option>
                        </select>
                    </div>
                    <div class="revenue-chart">
                        <div class="chart-bar" style="left: 5%; width: 10%; height: 60%;"></div>
                        <div class="chart-bar" style="left: 20%; width: 10%; height: 75%;"></div>
                        <div class="chart-bar" style="left: 35%; width: 10%; height: 45%;"></div>
                        <div class="chart-bar" style="left: 50%; width: 10%; height: 85%;"></div>
                        <div class="chart-bar" style="left: 65%; width: 10%; height: 70%;"></div>
                        <div class="chart-bar" style="left: 80%; width: 10%; height: 90%;"></div>
                    </div>
                    <div class="flex justify-between mt-4 text-xs text-gray-400">
                        <span>Sen</span>
                        <span>Sel</span>
                        <span>Rab</span>
                        <span>Kam</span>
                        <span>Jum</span>
                        <span>Sab</span>
                        <span>Min</span>
                    </div>
                </div>
                
                <!-- Game Categories -->
                <div class="admin-card rounded-xl p-6">
                    <h3 class="text-lg font-bold text-white mb-4">Distribusi Game per Kategori</h3>
                    <div class="flex items-center justify-center">
                        <div class="pie-chart"></div>
                    </div>
                    <div class="grid grid-cols-2 gap-4 mt-6">
                        <div class="flex items-center space-x-2">
                            <div class="w-4 h-4 bg-blue-500 rounded"></div>
                            <span class="text-sm text-gray-400">Action (30%)</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <div class="w-4 h-4 bg-purple-500 rounded"></div>
                            <span class="text-sm text-gray-400">RPG (20%)</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <div class="w-4 h-4 bg-pink-500 rounded"></div>
                            <span class="text-sm text-gray-400">Puzzle (20%)</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <div class="w-4 h-4 bg-yellow-500 rounded"></div>
                            <span class="text-sm text-gray-400">Racing (20%)</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <div class="w-4 h-4 bg-green-500 rounded"></div>
                            <span class="text-sm text-gray-400">Lainnya (10%)</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Assets Breakdown -->
            <div class="admin-card rounded-xl p-6 mb-8">
                <h3 class="text-lg font-bold text-white mb-6">Breakdown Assets</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                    <div class="category-card">
                        <div class="flex items-center justify-between mb-4">
                            <div class="asset-icon bg-blue-600">
                                <i class="fas fa-image text-white"></i>
                            </div>
                            <span class="text-2xl font-bold text-white">456</span>
                        </div>
                        <h4 class="text-sm font-medium text-white mb-1">Gambar</h4>
                        <p class="text-xs text-gray-400 mb-3">2.4 GB</p>
                        <div class="progress-bar">
                            <div class="progress-fill" style="width: 48%;"></div>
                        </div>
                        <p class="text-xs text-gray-500 mt-2">48% dari total assets</p>
                    </div>
                    
                    <div class="category-card">
                        <div class="flex items-center justify-between mb-4">
                            <div class="asset-icon bg-purple-600">
                                <i class="fas fa-music text-white"></i>
                            </div>
                            <span class="text-2xl font-bold text-white">324</span>
                        </div>
                        <h4 class="text-sm font-medium text-white mb-1">Audio</h4>
                        <p class="text-xs text-gray-400 mb-3">1.8 GB</p>
                        <div class="progress-bar">
                            <div class="progress-fill" style="width: 26%;"></div>
                        </div>
                        <p class="text-xs text-gray-500 mt-2">26% dari total assets</p>
                    </div>
                    
                    <div class="category-card">
                        <div class="flex items-center justify-between mb-4">
                            <div class="asset-icon bg-green-600">
                                <i class="fas fa-video text-white"></i>
                            </div>
                            <span class="text-2xl font-bold text-white">89</span>
                        </div>
                        <h4 class="text-sm font-medium text-white mb-1">Video</h4>
                        <p class="text-xs text-gray-400 mb-3">5.2 GB</p>
                        <div class="progress-bar">
                            <div class="progress-fill" style="width: 7%;"></div>
                        </div>
                        <p class="text-xs text-gray-500 mt-2">7% dari total assets</p>
                    </div>
                    
                    <div class="category-card">
                        <div class="flex items-center justify-between mb-4">
                            <div class="asset-icon bg-yellow-600">
                                <i class="fas fa-file-code text-white"></i>
                            </div>
                            <span class="text-2xl font-bold text-white">378</span>
                        </div>
                        <h4 class="text-sm font-medium text-white mb-1">Script</h4>
                        <p class="text-xs text-gray-400 mb-3">0.8 GB</p>
                        <div class="progress-bar">
                            <div class="progress-fill" style="width: 19%;"></div>
                        </div>
                        <p class="text-xs text-gray-500 mt-2">19% dari total assets</p>
                    </div>
                </div>
            </div>
            
            <!-- Top Games -->
            <div class="admin-card rounded-xl p-6">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-lg font-bold text-white">Game Terpopuler</h3>
                    <select class="bg-gray-800 border border-gray-700 rounded-lg px-3 py-1 text-white text-sm">
                        <option>7 Hari</option>
                        <option>30 Hari</option>
                        <option>Semua Waktu</option>
                    </select>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="flex items-center space-x-4 p-4 bg-gray-800 rounded-lg">
                        <img src="https://picsum.photos/seed/topgame1/80/80.jpg" alt="Game" class="game-thumbnail">
                        <div class="flex-1">
                            <h4 class="font-medium text-white">Cyber Warriors</h4>
                            <p class="text-sm text-gray-400">Action RPG</p>
                            <div class="flex items-center justify-between mt-2">
                                <span class="text-xs text-gray-500">847K downloads</span>
                                <span class="text-xs text-green-400">
                                    <i class="fas fa-arrow-up"></i> 15%
                                </span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="flex items-center space-x-4 p-4 bg-gray-800 rounded-lg">
                        <img src="https://picsum.photos/seed/topgame2/80/80.jpg" alt="Game" class="game-thumbnail">
                        <div class="flex-1">
                            <h4 class="font-medium text-white">Space Explorer</h4>
                            <p class="text-sm text-gray-400">Simulation</p>
                            <div class="flex items-center justify-between mt-2">
                                <span class="text-xs text-gray-500">623K downloads</span>
                                <span class="text-xs text-green-400">
                                    <i class="fas fa-arrow-up"></i> 12%
                                </span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="flex items-center space-x-4 p-4 bg-gray-800 rounded-lg">
                        <img src="https://picsum.photos/seed/topgame3/80/80.jpg" alt="Game" class="game-thumbnail">
                        <div class="flex-1">
                            <h4 class="font-medium text-white">Racing Thunder</h4>
                            <p class="text-sm text-gray-400">Racing</p>
                            <div class="flex items-center justify-between mt-2">
                                <span class="text-xs text-gray-500">512K downloads</span>
                                <span class="text-xs text-green-400">
                                    <i class="fas fa-arrow-up"></i> 8%
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    
    <script>
        // Search functionality
        document.getElementById('searchInput').addEventListener('input', function(e) {
            const searchTerm = e.target.value.toLowerCase();
            // Implement search logic here
            console.log('Searching for:', searchTerm);
        });
        
        // Simulate real-time data updates
        setInterval(() => {
            // Update chart bars with random heights
            const bars = document.querySelectorAll('.chart-bar');
            bars.forEach(bar => {
                const randomHeight = Math.floor(Math.random() * 40) + 50;
                bar.style.height = randomHeight + '%';
            });
        }, 5000);
    </script>
</body>
</html>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GameHub - Pendapatan</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
        
        .transaction-row {
            transition: all 0.3s ease;
        }
        
        .transaction-row:hover {
            background: rgba(59, 130, 246, 0.1);
        }
        
        .transaction-type-income {
            color: #22c55e;
        }
        
        .transaction-type-withdrawal {
            color: #ef4444;
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
    
    <!-- Secondary Navigation -->
    <div class="bg-gray-800/50 border-b border-gray-700/50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col sm:flex-row items-center justify-between py-4">
                <h1 class="text-2xl font-bold text-white mb-2 sm:mb-0">Pendapatan Saya</h1>
                <div class="flex flex-col sm:flex-row items-center space-y-2 sm:space-y-0 sm:space-x-4">
                    <span class="text-sm text-gray-400">Terakhir diperbarui: 2 menit yang lalu</span>
                    <button onclick="showWithdrawModal()" class="btn-neon px-4 py-2 rounded-lg text-sm font-medium">
                        <i class="fas fa-money-bill-wave mr-2"></i> Tarik Dana
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
                        <a href="{{ url('/game-saya') }}" class="sidebar-item flex items-center px-4 py-3 text-sm text-gray-300 hover:text-white rounded-lg transition-all">
                            <i class="fas fa-gamepad mr-3"></i>
                            Game Saya
                        </a>
                        <a href="{{ url('/asset-saya') }}" class="sidebar-item flex items-center px-4 py-3 text-sm text-gray-300 hover:text-white rounded-lg transition-all">
                            <i class="fas fa-cog mr-3"></i>
                            Assets
                        </a>
                        <a href="{{ url('/penghasilan') }}" class="sidebar-item active flex items-center px-4 py-3 text-sm rounded-lg transition-all">
                            <i class="fas fa-coins mr-3"></i>
                            Pendapatan
                        </a>
                    </nav>
                    
                    <!-- Balance Card -->
                    <div class="mt-8 p-4 bg-gradient-to-br from-green-600/20 to-blue-600/20 rounded-xl border border-green-500/30">
                        <h3 class="text-sm font-bold text-white mb-2 flex items-center">
                            <i class="fas fa-wallet mr-2"></i> Saldo Tersedia
                        </h3>
                        <p class="text-2xl font-bold text-white mb-1" id="available-balance">Rp 38.472.500</p>
                        <p class="text-xs text-gray-300 mb-3">Siap untuk ditarik</p>
                        <button onclick="showWithdrawModal()" class="w-full bg-green-600 hover:bg-green-700 text-white py-2 px-3 rounded-lg text-xs font-medium transition-colors">
                            Tarik Sekarang
                        </button>
                    </div>
                    
                    <!-- Withdrawal Info -->
                    <div class="mt-6 p-4 bg-gray-800/50 rounded-xl border border-gray-700/50">
                        <h3 class="text-sm font-bold text-white mb-3 flex items-center">
                            <i class="fas fa-info-circle mr-2"></i> Info Penarikan
                        </h3>
                        <ul class="text-xs text-gray-300 space-y-2">
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-green-400 mr-2 mt-0.5"></i>
                                <span>Minimum penarikan: Rp 50.000</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-green-400 mr-2 mt-0.5"></i>
                                <span>Proses 2-5 hari kerja</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-green-400 mr-2 mt-0.5"></i>
                                <span>Biaya admin: Rp 2.000 per transaksi</span>
                            </li>
                        </ul>
                    </div>
                </aside>
                
                <!-- Main Content Area -->
                <main class="flex-1">
                    <!-- Stats Overview -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                        <div class="stats-card rounded-xl p-6">
                            <div class="flex items-center justify-between mb-4">
                                <div>
                                    <p class="text-gray-400 text-sm">Total Pendapatan</p>
                                    <p class="text-2xl font-bold text-white">Rp 124.567.800</p>
                                </div>
                                <div class="text-3xl">💰</div>
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
                                    <p class="text-gray-400 text-sm">Pendapatan Bulan Ini</p>
                                    <p class="text-2xl font-bold text-white">Rp 38.472.500</p>
                                </div>
                                <div class="text-3xl">📈</div>
                            </div>
                            <div class="flex items-center text-sm">
                                <span class="metric-trend-up flex items-center">
                                    <i class="fas fa-arrow-up mr-1"></i> +8%
                                </span>
                                <span class="text-gray-400 ml-1">vs bulan lalu</span>
                            </div>
                        </div>
                        
                        <div class="stats-card rounded-xl p-6">
                            <div class="flex items-center justify-between mb-4">
                                <div>
                                    <p class="text-gray-400 text-sm">Total Ditarik</p>
                                    <p class="text-2xl font-bold text-white">Rp 86.095.300</p>
                                </div>
                                <div class="text-3xl">💸</div>
                            </div>
                            <div class="flex items-center text-sm">
                                <span class="metric-trend-up flex items-center">
                                    <i class="fas fa-arrow-up mr-1"></i> +12%
                                </span>
                                <span class="text-gray-400 ml-1">tahun ini</span>
                            </div>
                        </div>
                        
                        <div class="stats-card rounded-xl p-6">
                            <div class="flex items-center justify-between mb-4">
                                <div>
                                    <p class="text-gray-400 text-sm">Rata-rata/Game</p>
                                    <p class="text-2xl font-bold text-white">Rp 3.205.600</p>
                                </div>
                                <div class="text-3xl">🎮</div>
                            </div>
                            <div class="flex items-center text-sm">
                                <span class="metric-trend-up flex items-center">
                                    <i class="fas fa-arrow-up mr-1"></i> +5%
                                </span>
                                <span class="text-gray-400 ml-1">bulan ini</span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Revenue Chart -->
                    <div class="dev-card rounded-xl p-6 mb-8">
                        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between mb-6">
                            <h2 class="text-xl font-bold text-white mb-2 sm:mb-0">Grafik Pendapatan</h2>
                            <div class="flex space-x-2">
                                <button class="btn-secondary px-3 py-1 rounded text-sm active" onclick="updateChart('monthly')">Bulanan</button>
                                <button class="btn-secondary px-3 py-1 rounded text-sm" onclick="updateChart('weekly')">Mingguan</button>
                                <button class="btn-secondary px-3 py-1 rounded text-sm" onclick="updateChart('daily')">Harian</button>
                            </div>
                        </div>
                        <div class="h-80">
                            <canvas id="revenueChart"></canvas>
                        </div>
                    </div>
                    
                    <!-- Recent Transactions -->
                    <div class="dev-card rounded-xl p-6 mb-8">
                        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between mb-6">
                            <h2 class="text-xl font-bold text-white mb-2 sm:mb-0">Transaksi Terbaru</h2>
                            <button class="text-blue-400 hover:text-blue-300 text-sm">
                                Lihat Semua
                            </button>
                        </div>
                        
                        <div class="overflow-x-auto">
                            <table class="w-full">
                                <thead>
                                    <tr class="text-left text-sm text-gray-400 border-b border-gray-700">
                                        <th class="pb-3">ID</th>
                                        <th class="pb-3">Tanggal</th>
                                        <th class="pb-3">Deskripsi</th>
                                        <th class="pb-3">Jenis</th>
                                        <th class="pb-3 text-right">Jumlah</th>
                                        <th class="pb-3 text-right">Status</th>
                                    </tr>
                                </thead>
                                <tbody id="transactions-table">
                                    <tr class="transaction-row border-b border-gray-800">
                                        <td class="py-3 text-sm">#TRX-001245</td>
                                        <td class="py-3 text-sm">12 Jun 2023</td>
                                        <td class="py-3 text-sm">Penjualan - Mystical Forest</td>
                                        <td class="py-3 text-sm transaction-type-income">Pendapatan</td>
                                        <td class="py-3 text-sm text-right font-medium">+Rp 2.450.000</td>
                                        <td class="py-3 text-sm text-right">
                                            <span class="text-green-400">Selesai</span>
                                        </td>
                                    </tr>
                                    <tr class="transaction-row border-b border-gray-800">
                                        <td class="py-3 text-sm">#TRX-001244</td>
                                        <td class="py-3 text-sm">10 Jun 2023</td>
                                        <td class="py-3 text-sm">Penjualan - Neon Runner 2077</td>
                                        <td class="py-3 text-sm transaction-type-income">Pendapatan</td>
                                        <td class="py-3 text-sm text-right font-medium">+Rp 1.895.000</td>
                                        <td class="py-3 text-sm text-right">
                                            <span class="text-green-400">Selesai</span>
                                        </td>
                                    </tr>
                                    <tr class="transaction-row border-b border-gray-800">
                                        <td class="py-3 text-sm">#TRX-001243</td>
                                        <td class="py-3 text-sm">5 Jun 2023</td>
                                        <td class="py-3 text-sm">Penarikan Dana</td>
                                        <td class="py-3 text-sm transaction-type-withdrawal">Penarikan</td>
                                        <td class="py-3 text-sm text-right font-medium">-Rp 5.000.000</td>
                                        <td class="py-3 text-sm text-right">
                                            <span class="text-green-400">Selesai</span>
                                        </td>
                                    </tr>
                                    <tr class="transaction-row border-b border-gray-800">
                                        <td class="py-3 text-sm">#TRX-001242</td>
                                        <td class="py-3 text-sm">3 Jun 2023</td>
                                        <td class="py-3 text-sm">Penjualan - Space Defender</td>
                                        <td class="py-3 text-sm transaction-type-income">Pendapatan</td>
                                        <td class="py-3 text-sm text-right font-medium">+Rp 3.127.500</td>
                                        <td class="py-3 text-sm text-right">
                                            <span class="text-green-400">Selesai</span>
                                        </td>
                                    </tr>
                                    <tr class="transaction-row">
                                        <td class="py-3 text-sm">#TRX-001241</td>
                                        <td class="py-3 text-sm">1 Jun 2023</td>
                                        <td class="py-3 text-sm">Penjualan - Quantum Puzzle Box</td>
                                        <td class="py-3 text-sm transaction-type-income">Pendapatan</td>
                                        <td class="py-3 text-sm text-right font-medium">+Rp 1.562.500</td>
                                        <td class="py-3 text-sm text-right">
                                            <span class="text-green-400">Selesai</span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                    <!-- Game Revenue Breakdown -->
                    <div class="dev-card rounded-xl p-6">
                        <h2 class="text-xl font-bold text-white mb-6">Pendapatan per Game</h2>
                        <div class="space-y-4">
                            <div>
                                <div class="flex justify-between text-sm mb-1">
                                    <span class="text-gray-300">Mystical Forest Adventure</span>
                                    <span class="text-white font-medium">Rp 32.457.500</span>
                                </div>
                                <div class="w-full bg-gray-700 rounded-full h-2">
                                    <div class="progress-bar w-4/5"></div>
                                </div>
                            </div>
                            <div>
                                <div class="flex justify-between text-sm mb-1">
                                    <span class="text-gray-300">Neon Runner 2077</span>
                                    <span class="text-white font-medium">Rp 21.565.000</span>
                                </div>
                                <div class="w-full bg-gray-700 rounded-full h-2">
                                    <div class="progress-bar w-3/5"></div>
                                </div>
                            </div>
                            <div>
                                <div class="flex justify-between text-sm mb-1">
                                    <span class="text-gray-300">Space Defender</span>
                                    <span class="text-white font-medium">Rp 18.752.500</span>
                                </div>
                                <div class="w-full bg-gray-700 rounded-full h-2">
                                    <div class="progress-bar w-2/5"></div>
                                </div>
                            </div>
                            <div>
                                <div class="flex justify-between text-sm mb-1">
                                    <span class="text-gray-300">Quantum Puzzle Box</span>
                                    <span class="text-white font-medium">Rp 12.450.000</span>
                                </div>
                                <div class="w-full bg-gray-700 rounded-full h-2">
                                    <div class="progress-bar w-1/3"></div>
                                </div>
                            </div>
                            <div>
                                <div class="flex justify-between text-sm mb-1">
                                    <span class="text-gray-300">Retro Racing</span>
                                    <span class="text-white font-medium">Rp 8.562.500</span>
                                </div>
                                <div class="w-full bg-gray-700 rounded-full h-2">
                                    <div class="progress-bar w-1/4"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </div>
    
    <!-- Withdraw Modal -->
    <div id="withdraw-modal" class="modal fixed inset-0 bg-black/50 backdrop-blur-sm z-50 hidden">
        <div class="flex items-center justify-center min-h-screen p-4">
            <div class="modal-content dev-card rounded-2xl p-8 max-w-md w-full">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-xl font-bold text-white">Tarik Dana</h3>
                    <button onclick="hideWithdrawModal()" class="text-gray-400 hover:text-white">
                        <i class="fas fa-times text-xl"></i>
                    </button>
                </div>
                
                <form id="withdraw-form">
                    <div class="mb-6">
                        <div class="flex justify-between items-center mb-2">
                            <label class="block text-sm font-medium text-gray-300">Saldo Tersedia</label>
                            <span class="text-lg font-bold text-white" id="modal-balance">Rp 38.472.500</span>
                        </div>
                    </div>
                    
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-300 mb-2">Jumlah Penarikan</label>
                        <div class="relative">
                            <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400">Rp</span>
                            <input type="number" id="withdraw-amount" class="search-input w-full pl-12 pr-4 py-3 rounded-lg text-white" placeholder="0" min="50000" max="38472500" step="1000">
                        </div>
                        <p class="text-xs text-gray-400 mt-1">Minimum penarikan: Rp 50.000</p>
                    </div>
                    
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-300 mb-2">Metode Pembayaran</label>
                        <select class="search-input w-full px-4 py-3 rounded-lg text-white">
                            <option>Transfer Bank</option>
                            <option>OVO</option>
                            <option>Gopay</option>
                            <option>DANA</option>
                            <option>ShopeePay</option>
                        </select>
                    </div>
                    
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-300 mb-2">Catatan (Opsional)</label>
                        <textarea class="search-input w-full px-4 py-3 rounded-lg text-white h-24 resize-none" placeholder="Tambahkan catatan untuk penarikan ini..."></textarea>
                    </div>
                    
                    <div class="bg-gray-800/50 rounded-lg p-4 mb-6">
                        <div class="flex justify-between text-sm mb-1">
                            <span class="text-gray-400">Jumlah Penarikan</span>
                            <span class="text-white" id="withdraw-amount-display">Rp 0</span>
                        </div>
                        <div class="flex justify-between text-sm mb-1">
                            <span class="text-gray-400">Biaya Admin</span>
                            <span class="text-white">Rp 2.000</span>
                        </div>
                        <div class="flex justify-between text-sm font-medium mt-2 pt-2 border-t border-gray-700">
                            <span class="text-gray-300">Total yang Diterima</span>
                            <span class="text-white" id="total-received">Rp 0</span>
                        </div>
                    </div>
                    
                    <div class="flex justify-end space-x-3">
                        <button type="button" onclick="hideWithdrawModal()" class="btn-secondary px-6 py-2 rounded-lg">
                            Batal
                        </button>
                        <button type="submit" class="btn-neon px-6 py-2 rounded-lg">
                            Konfirmasi Penarikan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <!-- Success Withdrawal Modal -->
    <div id="success-modal" class="modal fixed inset-0 bg-black/50 backdrop-blur-sm z-50 hidden">
        <div class="flex items-center justify-center min-h-screen p-4">
            <div class="modal-content dev-card rounded-2xl p-8 max-w-md w-full">
                <div class="text-center">
                    <div class="w-20 h-20 bg-green-500/20 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-check text-4xl text-green-500"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-white mb-2">Penarikan Berhasil!</h3>
                    <p class="text-gray-300 mb-6">Permintaan penarikan Anda telah berhasil diproses. Dana akan masuk ke rekening Anda dalam 2-5 hari kerja.</p>
                    <div class="bg-gray-800/50 rounded-lg p-4 mb-6">
                        <div class="flex justify-between text-sm mb-1">
                            <span class="text-gray-400">ID Transaksi</span>
                            <span class="text-white" id="transaction-id">#TRX-001246</span>
                        </div>
                        <div class="flex justify-between text-sm mb-1">
                            <span class="text-gray-400">Jumlah</span>
                            <span class="text-white" id="withdrawn-amount">Rp 0</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-400">Saldo Tersisa</span>
                            <span class="text-white" id="remaining-balance">Rp 0</span>
                        </div>
                    </div>
                    <button onclick="hideSuccessModal()" class="btn-neon px-6 py-3 rounded-lg font-medium w-full">
                        OK
                    </button>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        // Format currency to Rupiah
        function formatRupiah(amount) {
            return 'Rp ' + parseFloat(amount).toLocaleString('id-ID', {
                minimumFractionDigits: 0,
                maximumFractionDigits: 0
            });
        }
        
        // Parse Rupiah string to number
        function parseRupiah(rupiahString) {
            return parseFloat(rupiahString.replace(/[Rp\s.]/g, '').replace(',', '.'));
        }
        
        // Initialize revenue chart
        const ctx = document.getElementById('revenueChart').getContext('2d');
        let revenueChart;
        
        // Chart data for different periods (in Rupiah)
        const chartData = {
            monthly: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun'],
                datasets: [{
                    label: 'Pendapatan',
                    data: [28500000, 32000000, 31000000, 34000000, 35600000, 38472500],
                    backgroundColor: 'rgba(59, 130, 246, 0.2)',
                    borderColor: 'rgba(59, 130, 246, 1)',
                    borderWidth: 2,
                    tension: 0.4,
                    fill: true
                }]
            },
            weekly: {
                labels: ['Minggu 1', 'Minggu 2', 'Minggu 3', 'Minggu 4'],
                datasets: [{
                    label: 'Pendapatan',
                    data: [9200000, 10500000, 9800000, 8972500],
                    backgroundColor: 'rgba(59, 130, 246, 0.2)',
                    borderColor: 'rgba(59, 130, 246, 1)',
                    borderWidth: 2,
                    tension: 0.4,
                    fill: true
                }]
            },
            daily: {
                labels: ['Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min'],
                datasets: [{
                    label: 'Pendapatan',
                    data: [1250000, 1450000, 1320000, 1550000, 1680000, 1420000, 1782500],
                    backgroundColor: 'rgba(59, 130, 246, 0.2)',
                    borderColor: 'rgba(59, 130, 246, 1)',
                    borderWidth: 2,
                    tension: 0.4,
                    fill: true
                }]
            }
        };
        
        // Initialize chart with monthly data
        function initChart() {
            revenueChart = new Chart(ctx, {
                type: 'line',
                data: chartData.monthly,
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            backgroundColor: 'rgba(30, 30, 63, 0.8)',
                            titleColor: '#fff',
                            bodyColor: '#fff',
                            borderColor: 'rgba(59, 130, 246, 0.5)',
                            borderWidth: 1,
                            padding: 10,
                            displayColors: false,
                            callbacks: {
                                label: function(context) {
                                    return formatRupiah(context.parsed.y);
                                }
                            }
                        }
                    },
                    scales: {
                        x: {
                            grid: {
                                color: 'rgba(255, 255, 255, 0.1)'
                            },
                            ticks: {
                                color: 'rgba(255, 255, 255, 0.7)'
                            }
                        },
                        y: {
                            grid: {
                                color: 'rgba(255, 255, 255, 0.1)'
                            },
                            ticks: {
                                color: 'rgba(255, 255, 255, 0.7)',
                                callback: function(value) {
                                    return formatRupiah(value);
                                }
                            }
                        }
                    }
                }
            });
        }
        
        // Update chart based on period
        function updateChart(period) {
            // Update active button
            document.querySelectorAll('.btn-secondary').forEach(btn => {
                btn.classList.remove('active');
            });
            event.target.classList.add('active');
            
            // Update chart data
            revenueChart.data = chartData[period];
            revenueChart.update();
        }
        
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
        function showWithdrawModal() {
            document.getElementById('withdraw-modal').classList.remove('hidden');
            document.getElementById('withdraw-modal').classList.add('show');
            document.getElementById('withdraw-amount').value = '';
            updateWithdrawDisplay();
        }
        
        function hideWithdrawModal() {
            document.getElementById('withdraw-modal').classList.add('hidden');
            document.getElementById('withdraw-modal').classList.remove('show');
        }
        
        function showSuccessModal() {
            document.getElementById('success-modal').classList.remove('hidden');
            document.getElementById('success-modal').classList.add('show');
        }
        
        function hideSuccessModal() {
            document.getElementById('success-modal').classList.add('hidden');
            document.getElementById('success-modal').classList.remove('show');
        }
        
        // Update withdraw display
        function updateWithdrawDisplay() {
            const amount = parseInt(document.getElementById('withdraw-amount').value) || 0;
            const fee = 2000;
            const total = Math.max(0, amount - fee);
            
            document.getElementById('withdraw-amount-display').textContent = formatRupiah(amount);
            document.getElementById('total-received').textContent = formatRupiah(total);
        }
        
        // Add event listener to withdraw amount input
        document.getElementById('withdraw-amount').addEventListener('input', updateWithdrawDisplay);
        
        // Handle withdraw form submission
        document.getElementById('withdraw-form').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const amount = parseInt(document.getElementById('withdraw-amount').value);
            const currentBalance = parseRupiah(document.getElementById('available-balance').textContent);
            
            // Validate amount
            if (isNaN(amount) || amount < 50000) {
                showToast('Minimum penarikan adalah Rp 50.000', 'error');
                return;
            }
            
            if (amount > currentBalance) {
                showToast('Jumlah penarikan melebihi saldo tersedia', 'error');
                return;
            }
            
            // Process withdrawal
            const fee = 2000;
            const newBalance = currentBalance - amount;
            
            // Update balance display
            document.getElementById('available-balance').textContent = formatRupiah(newBalance);
            document.getElementById('modal-balance').textContent = formatRupiah(newBalance);
            
            // Update success modal
            document.getElementById('withdrawn-amount').textContent = formatRupiah(amount);
            document.getElementById('remaining-balance').textContent = formatRupiah(newBalance);
            
            // Generate transaction ID
            const transactionId = '#TRX-' + String(Math.floor(Math.random() * 1000000)).padStart(6, '0');
            document.getElementById('transaction-id').textContent = transactionId;
            
            // Add transaction to table
            addTransactionToTable(transactionId, amount);
            
            // Hide withdraw modal and show success modal
            hideWithdrawModal();
            showSuccessModal();
            
            // Show success toast
            showToast('Penarikan berhasil diproses', 'success');
        });
        
        // Add transaction to table
        function addTransactionToTable(id, amount) {
            const table = document.getElementById('transactions-table');
            const row = document.createElement('tr');
            row.className = 'transaction-row border-b border-gray-800';
            
            const today = new Date();
            const dateStr = today.toLocaleDateString('id-ID', { day: 'numeric', month: 'short', year: 'numeric' });
            
            row.innerHTML = `
                <td class="py-3 text-sm">${id}</td>
                <td class="py-3 text-sm">${dateStr}</td>
                <td class="py-3 text-sm">Penarikan Dana</td>
                <td class="py-3 text-sm transaction-type-withdrawal">Penarikan</td>
                <td class="py-3 text-sm text-right font-medium">-${formatRupiah(amount)}</td>
                <td class="py-3 text-sm text-right">
                    <span class="text-yellow-400">Diproses</span>
                </td>
            `;
            
            // Insert at the top of the table
            table.insertBefore(row, table.firstChild);
        }
        
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
        document.getElementById('withdraw-modal').addEventListener('click', function(e) {
            if (e.target === this) {
                hideWithdrawModal();
            }
        });
        
        document.getElementById('success-modal').addEventListener('click', function(e) {
            if (e.target === this) {
                hideSuccessModal();
            }
        });
        
        // Initialize chart when page loads
        window.addEventListener('load', function() {
            initChart();
        });
    </script>
</body>
</html>
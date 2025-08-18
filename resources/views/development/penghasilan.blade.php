<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Playverse - Revenue Dashboard</title>
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
        
        .dev-card {
            background: linear-gradient(145deg, #1e1e3f 0%, #2a2a5a 100%);
            border: 1px solid rgba(59, 130, 246, 0.2);
            backdrop-filter: blur(10px);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }
        
        .dev-card:hover {
            transform: translateY(-2px);
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
        
        .btn-success {
            background: linear-gradient(45deg, #22c55e, #16a34a);
            transition: all 0.3s ease;
        }
        
        .btn-success:hover {
            background: linear-gradient(45deg, #4ade80, #22c55e);
            transform: translateY(-1px);
        }
        
        .btn-warning {
            background: linear-gradient(45deg, #f59e0b, #d97706);
            transition: all 0.3s ease;
        }
        
        .btn-warning:hover {
            background: linear-gradient(45deg, #fbbf24, #f59e0b);
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
        
        .sidebar-item:hover {
            background: linear-gradient(90deg, rgba(59, 130, 246, 0.1), rgba(59, 130, 246, 0.2));
            border-left: 3px solid #3b82f6;
            box-shadow: 0 0 15px rgba(59, 130, 246, 0.2);
        }
        
        .sidebar-item.active {
            background: linear-gradient(90deg, rgba(59, 130, 246, 0.2), rgba(59, 130, 246, 0.3));
            border-left: 3px solid #3b82f6;
            color: white;
            font-weight: 600;
        }
        
        .stats-card {
            background: linear-gradient(135deg, rgba(59, 130, 246, 0.1), rgba(139, 92, 246, 0.1));
            border: 1px solid rgba(59, 130, 246, 0.3);
            backdrop-filter: blur(10px);
        }
        
        .revenue-card {
            background: linear-gradient(135deg, rgba(34, 197, 94, 0.1), rgba(59, 130, 246, 0.1));
            border: 1px solid rgba(34, 197, 94, 0.3);
            backdrop-filter: blur(10px);
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
            position: relative;
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
        
        .metric-trend-up {
            color: #22c55e;
        }
        
        .metric-trend-down {
            color: #ef4444;
        }
        
        .withdrawal-status-pending {
            color: #f59e0b;
            background: rgba(245, 158, 11, 0.1);
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }
        
        .withdrawal-status-completed {
            color: #22c55e;
            background: rgba(34, 197, 94, 0.1);
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }
        
        .chart-container {
            background: rgba(30, 30, 63, 0.6);
            border: 1px solid rgba(59, 130, 246, 0.2);
            border-radius: 12px;
            padding: 20px;
        }
        
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            backdrop-filter: blur(5px);
        }
        
        .modal-content {
            background: linear-gradient(145deg, #1e1e3f 0%, #2a2a5a 100%);
            margin: 5% auto;
            padding: 30px;
            border-radius: 20px;
            width: 90%;
            max-width: 500px;
            border: 1px solid rgba(59, 130, 246, 0.3);
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.5);
        }
        
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
            transition: color 0.3s;
        }
        
        .close:hover {
            color: white;
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

    <!-- Secondary Navigation -->
    <div class="pt-16 bg-gray-800/50 border-b border-gray-700/50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between py-4">
                <h1 class="text-2xl font-bold text-white">Revenue Dashboard</h1>
                <div class="flex items-center space-x-4">
                    <span class="text-sm text-gray-400">Balance: <span class="text-green-400 font-bold">$5,284.50</span></span>
                    <button onclick="openWithdrawModal()" class="btn-success px-4 py-2 rounded-lg text-sm font-medium">
                        💰 Withdraw
                    </button>
                </div>
            </div>
            
            <!-- Tab Navigation -->
            <div class="nav-tabs">
                <div class="flex space-x-0">
                    <a href="#" class="nav-tab">Projects</a>
                    <a href="#" class="nav-tab">Analytics</a>
                    <a href="#" class="nav-tab active">Earnings</a>
                    <a href="#" class="nav-tab">Promotions</a>
                    <a href="#" class="nav-tab">Posts</a>
                    <a href="#" class="nav-tab">Game jams</a>
                    <a href="#" class="nav-tab">More</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="pt-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex gap-8">
                <!-- Sidebar -->
                <aside class="w-64 sidebar-glass rounded-2xl p-6 h-fit sticky top-32">
                    <h2 class="text-lg font-bold gradient-text mb-6">Developer Tools</h2>
                    
                    <nav class="space-y-2">
                        <a href="#" class="sidebar-item block px-4 py-3 text-sm text-gray-300 hover:text-white rounded-lg transition-all">
                            📊 Dashboard
                        </a>
                        <a href="#" class="sidebar-item block px-4 py-3 text-sm text-gray-300 hover:text-white rounded-lg transition-all">
                            🎮 My Games
                        </a>
                        <a href="#" class="sidebar-item block px-4 py-3 text-sm text-gray-300 hover:text-white rounded-lg transition-all">
                            📈 Analytics
                        </a>
                        <a href="#" class="sidebar-item active block px-4 py-3 text-sm rounded-lg transition-all">
                            💰 Revenue
                        </a>
                        <a href="#" class="sidebar-item block px-4 py-3 text-sm text-gray-300 hover:text-white rounded-lg transition-all">
                            🔧 API Keys
                        </a>
                        <a href="#" class="sidebar-item block px-4 py-3 text-sm text-gray-300 hover:text-white rounded-lg transition-all">
                            📝 Documentation
                        </a>
                        <a href="#" class="sidebar-item block px-4 py-3 text-sm text-gray-300 hover:text-white rounded-lg transition-all">
                            ⚙️ Settings
                        </a>
                    </nav>

                    <!-- Revenue Summary -->
                    <div class="mt-8 p-4 revenue-card rounded-xl">
                        <h3 class="text-sm font-bold text-white mb-2">💵 This Month</h3>
                        <p class="text-2xl font-bold text-green-400 mb-1">$2,345.60</p>
                        <p class="text-xs text-gray-300">+23% from last month</p>
                    </div>
                </aside>

                <!-- Main Content Area -->
                <main class="flex-1">
                    <!-- Revenue Overview -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                        <div class="revenue-card rounded-xl p-6">
                            <div class="flex items-center justify-between mb-4">
                                <div>
                                    <p class="text-gray-400 text-sm">Total Balance</p>
                                    <p class="text-2xl font-bold text-green-400">$5,284.50</p>
                                </div>
                                <div class="text-3xl">💰</div>
                            </div>
                            <div class="flex items-center text-sm">
                                <span class="metric-trend-up">↗ +15%</span>
                                <span class="text-gray-400 ml-1">this month</span>
                            </div>
                        </div>
                        
                        <div class="stats-card rounded-xl p-6">
                            <div class="flex items-center justify-between mb-4">
                                <div>
                                    <p class="text-gray-400 text-sm">Game Sales</p>
                                    <p class="text-2xl font-bold text-white">$3,850.20</p>
                                </div>
                                <div class="text-3xl">🎮</div>
                            </div>
                            <div class="flex items-center text-sm">
                                <span class="metric-trend-up">↗ +28%</span>
                                <span class="text-gray-400 ml-1">vs last month</span>
                            </div>
                        </div>
                        
                        <div class="stats-card rounded-xl p-6">
                            <div class="flex items-center justify-between mb-4">
                                <div>
                                    <p class="text-gray-400 text-sm">Asset Sales</p>
                                    <p class="text-2xl font-bold text-white">$1,434.30</p>
                                </div>
                                <div class="text-3xl">🎨</div>
                            </div>
                            <div class="flex items-center text-sm">
                                <span class="metric-trend-up">↗ +5%</span>
                                <span class="text-gray-400 ml-1">this month</span>
                            </div>
                        </div>
                        
                        <div class="stats-card rounded-xl p-6">
                            <div class="flex items-center justify-between mb-4">
                                <div>
                                    <p class="text-gray-400 text-sm">Pending</p>
                                    <p class="text-2xl font-bold text-white">$425.80</p>
                                </div>
                                <div class="text-3xl">⏳</div>
                            </div>
                            <div class="flex items-center text-sm">
                                <span class="text-yellow-400">● Processing</span>
                            </div>
                        </div>
                    </div>

                    <!-- Revenue Chart and Recent Sales -->
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
                        <!-- Revenue Chart -->
                        <div class="lg:col-span-2 dev-card rounded-xl p-6">
                            <div class="flex items-center justify-between mb-6">
                                <h2 class="text-xl font-bold text-white">Revenue Trends</h2>
                                <div class="flex space-x-2">
                                    <button class="btn-secondary px-3 py-1 rounded text-sm">7D</button>
                                    <button class="btn-neon px-3 py-1 rounded text-sm">30D</button>
                                    <button class="btn-secondary px-3 py-1 rounded text-sm">90D</button>
                                </div>
                            </div>
                            
                            <!-- Simple Chart Visualization -->
                            <div class="chart-container">
                                <div class="flex items-end justify-between h-48 space-x-2">
                                    <div class="flex flex-col items-center">
                                        <div class="w-8 bg-gradient-to-t from-blue-600 to-blue-400 rounded-t" style="height: 60%"></div>
                                        <span class="text-xs text-gray-400 mt-2">Jan</span>
                                    </div>
                                    <div class="flex flex-col items-center">
                                        <div class="w-8 bg-gradient-to-t from-blue-600 to-blue-400 rounded-t" style="height: 75%"></div>
                                        <span class="text-xs text-gray-400 mt-2">Feb</span>
                                    </div>
                                    <div class="flex flex-col items-center">
                                        <div class="w-8 bg-gradient-to-t from-green-600 to-green-400 rounded-t" style="height: 85%"></div>
                                        <span class="text-xs text-gray-400 mt-2">Mar</span>
                                    </div>
                                    <div class="flex flex-col items-center">
                                        <div class="w-8 bg-gradient-to-t from-green-600 to-green-400 rounded-t" style="height: 95%"></div>
                                        <span class="text-xs text-gray-400 mt-2">Apr</span>
                                    </div>
                                    <div class="flex flex-col items-center">
                                        <div class="w-8 bg-gradient-to-t from-purple-600 to-purple-400 rounded-t" style="height: 100%"></div>
                                        <span class="text-xs text-gray-400 mt-2">May</span>
                                    </div>
                                    <div class="flex flex-col items-center">
                                        <div class="w-8 bg-gradient-to-t from-purple-600 to-purple-400 rounded-t" style="height: 90%"></div>
                                        <span class="text-xs text-gray-400 mt-2">Jun</span>
                                    </div>
                                </div>
                                <div class="flex justify-between mt-4 text-sm">
                                    <span class="text-gray-400">$0</span>
                                    <span class="text-gray-400">$5,000</span>
                                </div>
                            </div>
                        </div>

                        <!-- Top Performing Products -->
                        <div class="dev-card rounded-xl p-6">
                            <h3 class="text-lg font-bold text-white mb-4">Top Performers</h3>
                            <div class="space-y-4">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center space-x-3">
                                        <div class="w-8 h-8 bg-gradient-to-r from-purple-500 to-blue-500 rounded-lg flex items-center justify-center">
                                            <span class="text-white text-xs font-bold">MF</span>
                                        </div>
                                        <div>
                                            <p class="text-white text-sm font-medium">Mystical Forest</p>
                                            <p class="text-gray-400 text-xs">Game</p>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <p class="text-green-400 font-bold text-sm">$1,825</p>
                                        <p class="text-gray-400 text-xs">234 sales</p>
                                    </div>
                                </div>
                                
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center space-x-3">
                                        <div class="w-8 h-8 bg-gradient-to-r from-cyan-500 to-purple-500 rounded-lg flex items-center justify-center">
                                            <span class="text-white text-xs font-bold">FS</span>
                                        </div>
                                        <div>
                                            <p class="text-white text-sm font-medium">Fantasy Sprites</p>
                                            <p class="text-gray-400 text-xs">Asset Pack</p>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <p class="text-green-400 font-bold text-sm">$945</p>
                                        <p class="text-gray-400 text-xs">189 sales</p>
                                    </div>
                                </div>
                                
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center space-x-3">
                                        <div class="w-8 h-8 bg-gradient-to-r from-green-500 to-blue-500 rounded-lg flex items-center justify-center">
                                            <span class="text-white text-xs font-bold">NR</span>
                                        </div>
                                        <div>
                                            <p class="text-white text-sm font-medium">Neon Runner</p>
                                            <p class="text-gray-400 text-xs">Game</p>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <p class="text-green-400 font-bold text-sm">$720</p>
                                        <p class="text-gray-400 text-xs">96 sales</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Recent Transactions and Withdrawal History -->
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        <!-- Recent Transactions -->
                        <div class="dev-card rounded-xl p-6">
                            <div class="flex items-center justify-between mb-6">
                                <h3 class="text-lg font-bold text-white">Recent Transactions</h3>
                                <button class="btn-secondary px-3 py-1 rounded text-sm">View All</button>
                            </div>
                            
                            <div class="space-y-4">
                                <div class="flex items-center justify-between p-3 bg-gray-800/50 rounded-lg">
                                    <div class="flex items-center space-x-3">
                                        <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center">
                                            <span class="text-white text-xs">💰</span>
                                        </div>
                                        <div>
                                            <p class="text-white text-sm font-medium">Mystical Forest Adventure</p>
                                            <p class="text-gray-400 text-xs">2 hours ago</p>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <p class="text-green-400 font-bold">+$19.99</p>
                                        <p class="text-gray-400 text-xs">Game Sale</p>
                                    </div>
                                </div>
                                
                                <div class="flex items-center justify-between p-3 bg-gray-800/50 rounded-lg">
                                    <div class="flex items-center space-x-3">
                                        <div class="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center">
                                            <span class="text-white text-xs">🎨</span>
                                        </div>
                                        <div>
                                            <p class="text-white text-sm font-medium">Fantasy UI Pack</p>
                                            <p class="text-gray-400 text-xs">5 hours ago</p>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <p class="text-green-400 font-bold">+$14.99</p>
                                        <p class="text-gray-400 text-xs">Asset Sale</p>
                                    </div>
                                </div>
                                
                                <div class="flex items-center justify-between p-3 bg-gray-800/50 rounded-lg">
                                    <div class="flex items-center space-x-3">
                                        <div class="w-8 h-8 bg-purple-500 rounded-full flex items-center justify-center">
                                            <span class="text-white text-xs">🎮</span>
                                        </div>
                                        <div>
                                            <p class="text-white text-sm font-medium">Quantum Puzzle Box</p>
                                            <p class="text-gray-400 text-xs">1 day ago</p>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <p class="text-green-400 font-bold">+$24.99</p>
                                        <p class="text-gray-400 text-xs">Game Sale</p>
                                    </div>
                                </div>
                                
                                <div class="flex items-center justify-between p-3 bg-gray-800/50 rounded-lg">
                                    <div class="flex items-center space-x-3">
                                        <div class="w-8 h-8 bg-cyan-500 rounded-full flex items-center justify-center">
                                            <span class="text-white text-xs">🎵</span>
                                        </div>
                                        <div>
                                            <p class="text-white text-sm font-medium">Ambient Music Pack</p>
                                            <p class="text-gray-400 text-xs">2 days ago</p>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <p class="text-green-400 font-bold">+$9.99</p>
                                        <p class="text-gray-400 text-xs">Asset Sale</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Withdrawal History -->
                        <div class="dev-card rounded-xl p-6">
                            <div class="flex items-center justify-between mb-6">
                                <h3 class="text-lg font-bold text-white">Withdrawal History</h3>
                                <button onclick="openWithdrawModal()" class="btn-success px-3 py-1 rounded text-sm">+ New</button>
                            </div>
                            
                            <div class="space-y-4">
                                <div class="flex items-center justify-between p-3 bg-gray-800/50 rounded-lg">
                                    <div>
                                        <p class="text-white text-sm font-medium">Bank Transfer</p>
                                        <p class="text-gray-400 text-xs">May 15, 2024</p>
                                    </div>
                                    <div class="text-right">
                                        <p class="text-white font-bold">$2,500.00</p>
                                        <span class="withdrawal-status-completed">✓ Completed</span>
                                    </div>
                                </div>
                                
                                <div class="flex items-center justify-between p-3 bg-gray-800/50 rounded-lg">
                                    <div>
                                        <p class="text-white text-sm font-medium">PayPal</p>
                                        <p class="text-gray-400 text-xs">May 10, 2024</p>
                                    </div>
                                    <div class="text-right">
                                        <p class="text-white font-bold">$1,250.00</p>
                                        <span class="withdrawal-status-pending">⏳ Pending</span>
                                    </div>
                                </div>
                                
                                <div class="flex items-center justify-between p-3 bg-gray-800/50 rounded-lg">
                                    <div>
                                        <p class="text-white text-sm font-medium">Bank Transfer</p>
                                        <p class="text-gray-400 text-xs">April 28, 2024</p>
                                    </div>
                                    <div class="text-right">
                                        <p class="text-white font-bold">$1,800.00</p>
                                        <span class="withdrawal-status-completed">✓ Completed</span>
                                    </div>
                                </div>
                                
                                <div class="flex items-center justify-between p-3 bg-gray-800/50 rounded-lg">
                                    <div>
                                        <p class="text-white text-sm font-medium">Crypto Wallet</p>
                                        <p class="text-gray-400 text-xs">April 20, 2024</p>
                                    </div>
                                    <div class="text-right">
                                        <p class="text-white font-bold">$950.00</p>
                                        <span class="withdrawal-status-completed">✓ Completed</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </div>

    <!-- Withdrawal Modal -->
    <div id="withdrawModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeWithdrawModal()">&times;</span>
            <h2 class="text-2xl font-bold text-white mb-6">💰 Withdraw Funds</h2>
            
            <form id="withdrawForm">
                <!-- Available Balance -->
                <div class="mb-6 p-4 bg-green-500/10 border border-green-500/30 rounded-lg">
                    <div class="flex justify-between items-center">
                        <span class="text-gray-300">Available Balance:</span>
                        <span class="text-2xl font-bold text-green-400">$5,284.50</span>
                    </div>
                </div>
                
                <!-- Withdrawal Method -->
                <div class="mb-6">
                    <label class="block text-gray-300 text-sm font-bold mb-3">Withdrawal Method</label>
                    <div class="space-y-3">
                        <label class="flex items-center p-3 bg-gray-800/50 rounded-lg border border-gray-700 hover:border-blue-500 cursor-pointer transition-colors">
                            <input type="radio" name="method" value="bank" class="mr-3" checked>
                            <div class="flex items-center space-x-3">
                                <div class="w-8 h-8 bg-blue-500 rounded-lg flex items-center justify-center">
                                    <span class="text-white text-xs">🏦</span>
                                </div>
                                <div>
                                    <p class="text-white font-medium">Bank Transfer</p>
                                    <p class="text-gray-400 text-xs">2-3 business days • Free</p>
                                </div>
                            </div>
                        </label>
                        
                        <label class="flex items-center p-3 bg-gray-800/50 rounded-lg border border-gray-700 hover:border-blue-500 cursor-pointer transition-colors">
                            <input type="radio" name="method" value="paypal" class="mr-3">
                            <div class="flex items-center space-x-3">
                                <div class="w-8 h-8 bg-blue-600 rounded-lg flex items-center justify-center">
                                    <span class="text-white text-xs">💳</span>
                                </div>
                                <div>
                                    <p class="text-white font-medium">PayPal</p>
                                    <p class="text-gray-400 text-xs">Instant • 2.9% fee</p>
                                </div>
                            </div>
                        </label>
                        
                        <label class="flex items-center p-3 bg-gray-800/50 rounded-lg border border-gray-700 hover:border-blue-500 cursor-pointer transition-colors">
                            <input type="radio" name="method" value="crypto" class="mr-3">
                            <div class="flex items-center space-x-3">
                                <div class="w-8 h-8 bg-orange-500 rounded-lg flex items-center justify-center">
                                    <span class="text-white text-xs">₿</span>
                                </div>
                                <div>
                                    <p class="text-white font-medium">Cryptocurrency</p>
                                    <p class="text-gray-400 text-xs">10-30 minutes • 1% fee</p>
                                </div>
                            </div>
                        </label>
                    </div>
                </div>
                
                <!-- Amount -->
                <div class="mb-6">
                    <label class="block text-gray-300 text-sm font-bold mb-2">Withdrawal Amount</label>
                    <div class="relative">
                        <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400">$</span>
                        <input type="number" id="withdrawAmount" class="w-full bg-gray-800 border border-gray-600 rounded-lg pl-8 pr-4 py-3 text-white focus:border-blue-500 focus:outline-none" 
                               placeholder="0.00" min="10" max="5284.50" step="0.01">
                    </div>
                    <div class="flex justify-between mt-2 text-sm">
                        <span class="text-gray-400">Minimum: $10.00</span>
                        <button type="button" onclick="setMaxAmount()" class="text-blue-400 hover:text-blue-300 transition-colors">Use Max</button>
                    </div>
                </div>
                
                <!-- Account Details (shown based on selected method) -->
                <div id="bankDetails" class="withdrawal-details mb-6">
                    <label class="block text-gray-300 text-sm font-bold mb-2">Bank Account</label>
                    <select class="w-full bg-gray-800 border border-gray-600 rounded-lg px-4 py-3 text-white focus:border-blue-500 focus:outline-none">
                        <option>**** **** **** 1234 (Chase Bank)</option>
                        <option>**** **** **** 5678 (Bank of America)</option>
                        <option>+ Add New Account</option>
                    </select>
                </div>
                
                <div id="paypalDetails" class="withdrawal-details mb-6" style="display: none;">
                    <label class="block text-gray-300 text-sm font-bold mb-2">PayPal Email</label>
                    <input type="email" class="w-full bg-gray-800 border border-gray-600 rounded-lg px-4 py-3 text-white focus:border-blue-500 focus:outline-none" 
                           placeholder="your.email@example.com" value="developer@example.com">
                </div>
                
                <div id="cryptoDetails" class="withdrawal-details mb-6" style="display: none;">
                    <label class="block text-gray-300 text-sm font-bold mb-2">Wallet Address</label>
                    <input type="text" class="w-full bg-gray-800 border border-gray-600 rounded-lg px-4 py-3 text-white focus:border-blue-500 focus:outline-none" 
                           placeholder="Enter your wallet address">
                    <div class="mt-2">
                        <label class="block text-gray-300 text-sm font-bold mb-2">Currency</label>
                        <select class="w-full bg-gray-800 border border-gray-600 rounded-lg px-4 py-3 text-white focus:border-blue-500 focus:outline-none">
                            <option>Bitcoin (BTC)</option>
                            <option>Ethereum (ETH)</option>
                            <option>USDC</option>
                        </select>
                    </div>
                </div>
                
                <!-- Summary -->
                <div class="mb-6 p-4 bg-gray-800/50 rounded-lg border border-gray-600">
                    <h4 class="text-white font-bold mb-3">Transaction Summary</h4>
                    <div class="space-y-2 text-sm">
                        <div class="flex justify-between">
                            <span class="text-gray-400">Withdrawal Amount:</span>
                            <span class="text-white" id="summaryAmount">$0.00</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-400">Processing Fee:</span>
                            <span class="text-white" id="summaryFee">$0.00</span>
                        </div>
                        <hr class="border-gray-600">
                        <div class="flex justify-between font-bold">
                            <span class="text-white">You'll Receive:</span>
                            <span class="text-green-400" id="summaryTotal">$0.00</span>
                        </div>
                    </div>
                </div>
                
                <!-- Security Note -->
                <div class="mb-6 p-3 bg-yellow-500/10 border border-yellow-500/30 rounded-lg">
                    <p class="text-yellow-400 text-sm">
                        🔒 For your security, withdrawals are processed within 24 hours during business days.
                    </p>
                </div>
                
                <!-- Action Buttons -->
                <div class="flex space-x-4">
                    <button type="button" onclick="closeWithdrawModal()" class="flex-1 btn-secondary px-6 py-3 rounded-lg font-medium">
                        Cancel
                    </button>
                    <button type="submit" class="flex-1 btn-success px-6 py-3 rounded-lg font-medium">
                        Confirm Withdrawal
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Modal Functions
        function openWithdrawModal() {
            document.getElementById('withdrawModal').style.display = 'block';
            document.body.style.overflow = 'hidden';
        }
        
        function closeWithdrawModal() {
            document.getElementById('withdrawModal').style.display = 'none';
            document.body.style.overflow = 'auto';
        }
        
        // Set maximum withdrawal amount
        function setMaxAmount() {
            document.getElementById('withdrawAmount').value = '5284.50';
            updateSummary();
        }
        
        // Handle withdrawal method changes
        document.querySelectorAll('input[name="method"]').forEach(radio => {
            radio.addEventListener('change', function() {
                // Hide all details
                document.querySelectorAll('.withdrawal-details').forEach(detail => {
                    detail.style.display = 'none';
                });
                
                // Show selected method details
                const method = this.value;
                document.getElementById(method + 'Details').style.display = 'block';
                
                updateSummary();
            });
        });
        
        // Update summary when amount changes
        document.getElementById('withdrawAmount').addEventListener('input', updateSummary);
        
        function updateSummary() {
            const amount = parseFloat(document.getElementById('withdrawAmount').value) || 0;
            const method = document.querySelector('input[name="method"]:checked').value;
            
            let fee = 0;
            switch(method) {
                case 'paypal':
                    fee = amount * 0.029; // 2.9%
                    break;
                case 'crypto':
                    fee = amount * 0.01; // 1%
                    break;
                case 'bank':
                default:
                    fee = 0; // Free
                    break;
            }
            
            const total = amount - fee;
            
            document.getElementById('summaryAmount').textContent = ' + amount.toFixed(2);
            document.getElementById('summaryFee').textContent = ' + fee.toFixed(2);
            document.getElementById('summaryTotal').textContent = ' + Math.max(0, total).toFixed(2);
        }
        
        // Handle form submission
        document.getElementById('withdrawForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const amount = parseFloat(document.getElementById('withdrawAmount').value);
            const method = document.querySelector('input[name="method"]:checked').value;
            
            if (!amount || amount < 10) {
                alert('Please enter a valid amount (minimum $10.00)');
                return;
            }
            
            if (amount > 5284.50) {
                alert('Insufficient balance');
                return;
            }
            
            // Show success message
            alert('Withdrawal request submitted successfully! You will receive a confirmation email shortly.');
            closeWithdrawModal();
            
            // Reset form
            this.reset();
            updateSummary();
        });
        
        // Close modal when clicking outside
        window.onclick = function(event) {
            const modal = document.getElementById('withdrawModal');
            if (event.target == modal) {
                closeWithdrawModal();
            }
        }
        
        // Initialize summary
        updateSummary();
    </script>
</body>
</html>
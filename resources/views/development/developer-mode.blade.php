<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GameHub - Developer Mode Dashboard</title>
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
            transform: translateY(-4px) scale(1.01);
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
        
        .progress-bar {
            background: linear-gradient(90deg, #3b82f6, #8b5cf6);
            height: 8px;
            border-radius: 4px;
            transition: width 0.3s ease;
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
        
        .status-online {
            color: #22c55e;
        }
        
        .status-offline {
            color: #ef4444;
        }
        
        .status-maintenance {
            color: #f59e0b;
        }
        
        .code-block {
            background: #1f2937;
            border: 1px solid rgba(59, 130, 246, 0.3);
            border-radius: 8px;
            padding: 16px;
            font-family: 'Monaco', 'Menlo', monospace;
            font-size: 14px;
            color: #e5e7eb;
        }
        
        .metric-trend-up {
            color: #22c55e;
        }
        
        .metric-trend-down {
            color: #ef4444;
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
                    <a href="{{ url('/') }}" class="text-gray-300 hover:text-white px-3 py-2 text-sm font-medium transition-colors">Home</a>
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

    <!-- Secondary Navigation (Creator Dashboard Style) -->
    <div class="pt-16 bg-gray-800/50 border-b border-gray-700/50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between py-4">
                <h1 class="text-2xl font-bold text-white">Creator Dashboard</h1>
                <div class="flex items-center space-x-4">
                    <span class="text-sm text-gray-400">Last updated: 2 minutes ago</span>
                    <button class="btn-neon px-4 py-2 rounded-lg text-sm font-medium">
                        🚀 Deploy
                    </button>
                </div>
            </div>
            
            <!-- Tab Navigation -->
            <div class="nav-tabs">
                <div class="flex space-x-0">
                    <a href="#" class="nav-tab">Projects</a>
                    <a href="#" class="nav-tab active">Analytics</a>
                    <a href="#" class="nav-tab">Earnings</a>
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
                        <a href="#" class="sidebar-item active block px-4 py-3 text-sm rounded-lg transition-all">
                            📊 Dashboard
                        </a>
                        <a href="#" class="sidebar-item block px-4 py-3 text-sm text-gray-300 hover:text-white rounded-lg transition-all">
                            🎮 My Games
                        </a>
                        <a href="#" class="sidebar-item block px-4 py-3 text-sm text-gray-300 hover:text-white rounded-lg transition-all">
                            📈 Analytics
                        </a>
                        <a href="#" class="sidebar-item block px-4 py-3 text-sm text-gray-300 hover:text-white rounded-lg transition-all">
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

                    <!-- Quick Stats -->
                    <div class="mt-8 p-4 bg-gradient-to-br from-green-600/20 to-blue-600/20 rounded-xl border border-green-500/30">
                        <h3 class="text-sm font-bold text-white mb-2">🚀 Quick Deploy</h3>
                        <p class="text-xs text-gray-300 mb-3">Deploy your latest changes</p>
                        <button class="w-full bg-green-600 hover:bg-green-700 text-white py-2 px-3 rounded-lg text-xs font-medium transition-colors">
                            Deploy Now
                        </button>
                    </div>
                </aside>

                <!-- Main Content Area -->
                <main class="flex-1">
                    <!-- Stats Overview -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                        <div class="stats-card rounded-xl p-6">
                            <div class="flex items-center justify-between mb-4">
                                <div>
                                    <p class="text-gray-400 text-sm">Total Games</p>
                                    <p class="text-2xl font-bold text-white">12</p>
                                </div>
                                <div class="text-3xl">🎮</div>
                            </div>
                            <div class="flex items-center text-sm">
                                <span class="metric-trend-up">↗ +2</span>
                                <span class="text-gray-400 ml-1">this month</span>
                            </div>
                        </div>
                        
                        <div class="stats-card rounded-xl p-6">
                            <div class="flex items-center justify-between mb-4">
                                <div>
                                    <p class="text-gray-400 text-sm">Downloads</p>
                                    <p class="text-2xl font-bold text-white">45.2K</p>
                                </div>
                                <div class="text-3xl">📥</div>
                            </div>
                            <div class="flex items-center text-sm">
                                <span class="metric-trend-up">↗ +12%</span>
                                <span class="text-gray-400 ml-1">vs last month</span>
                            </div>
                        </div>
                        
                        <div class="stats-card rounded-xl p-6">
                            <div class="flex items-center justify-between mb-4">
                                <div>
                                    <p class="text-gray-400 text-sm">Pendapatan</p>
                                    <p class="text-2xl font-bold text-white">$3.8K</p>
                                </div>
                                <div class="text-3xl">💰</div>
                            </div>
                            <div class="flex items-center text-sm">
                                <span class="metric-trend-up">↗ +8%</span>
                                <span class="text-gray-400 ml-1">this month</span>
                            </div>
                        </div>
                        
                        <div class="stats-card rounded-xl p-6">
                            <div class="flex items-center justify-between mb-4">
                                <div>
                                    <p class="text-gray-400 text-sm">API Calls</p>
                                    <p class="text-2xl font-bold text-white">892K</p>
                                </div>
                                <div class="text-3xl">🔄</div>
                            </div>
                            <div class="flex items-center text-sm">
                                <span class="metric-trend-down">↘ -3%</span>
                                <span class="text-gray-400 ml-1">today</span>
                            </div>
                        </div>
                    </div>

                    <!-- Recent Projects -->
                    <div class="dev-card rounded-xl p-6 mb-8">
                        <div class="flex items-center justify-between mb-6">
                            <h2 class="text-xl font-bold text-white">Recent Projects</h2>
                            <a href="{{ url('/import-game') }}" class="btn-neon px-4 py-2 rounded-lg text-sm font-medium">
                                + New Project
                            </a>
                        </div>
                        
                        <div class="space-y-4">
                            <div class="flex items-center justify-between p-4 bg-gray-800/50 rounded-lg border border-gray-700/50">
                                <div class="flex items-center space-x-4">
                                    <div class="w-12 h-12 bg-gradient-to-r from-purple-500 to-blue-500 rounded-lg flex items-center justify-center">
                                        <span class="text-white font-bold">MF</span>
                                    </div>
                                    <div>
                                        <h3 class="font-bold text-white">Mystical Forest Adventure</h3>
                                        <p class="text-gray-400 text-sm">Last updated 2 hours ago</p>
                                    </div>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <span class="status-online">● Online</span>
                                    <button class="btn-secondary px-3 py-1 rounded text-sm">Edit</button>
                                    <button class="btn-neon px-3 py-1 rounded text-sm">View</button>
                                </div>
                            </div>
                            
                            <div class="flex items-center justify-between p-4 bg-gray-800/50 rounded-lg border border-gray-700/50">
                                <div class="flex items-center space-x-4">
                                    <div class="w-12 h-12 bg-gradient-to-r from-cyan-500 to-purple-500 rounded-lg flex items-center justify-center">
                                        <span class="text-white font-bold">NR</span>
                                    </div>
                                    <div>
                                        <h3 class="font-bold text-white">Neon Runner 2077</h3>
                                        <p class="text-gray-400 text-sm">Last updated 1 day ago</p>
                                    </div>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <span class="status-maintenance">● Maintenance</span>
                                    <button class="btn-secondary px-3 py-1 rounded text-sm">Edit</button>
                                    <button class="btn-secondary px-3 py-1 rounded text-sm">View</button>
                                </div>
                            </div>
                            
                            <div class="flex items-center justify-between p-4 bg-gray-800/50 rounded-lg border border-gray-700/50">
                                <div class="flex items-center space-x-4">
                                    <div class="w-12 h-12 bg-gradient-to-r from-green-500 to-blue-500 rounded-lg flex items-center justify-center">
                                        <span class="text-white font-bold">QP</span>
                                    </div>
                                    <div>
                                        <h3 class="font-bold text-white">Quantum Puzzle Box</h3>
                                        <p class="text-gray-400 text-sm">Last updated 3 days ago</p>
                                    </div>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <span class="status-offline">● Offline</span>
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
                            <h3 class="text-lg font-bold text-white mb-4">API Usage</h3>
                            <div class="space-y-4">
                                <div>
                                    <div class="flex justify-between text-sm mb-2">
                                        <span class="text-gray-400">Daily Limit</span>
                                        <span class="text-white">8.9K / 10K</span>
                                    </div>
                                    <div class="w-full bg-gray-700 rounded-full h-2">
                                        <div class="progress-bar w-4/5"></div>
                                    </div>
                                </div>
                                <div>
                                    <div class="flex justify-between text-sm mb-2">
                                        <span class="text-gray-400">Monthly Limit</span>
                                        <span class="text-white">245K / 300K</span>
                                    </div>
                                    <div class="w-full bg-gray-700 rounded-full h-2">
                                        <div class="progress-bar w-4/5"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Recent Deployments -->
                        <div class="dev-card rounded-xl p-6">
                            <h3 class="text-lg font-bold text-white mb-4">Recent Deployments</h3>
                            <div class="space-y-3">
                                <div class="flex items-center justify-between text-sm">
                                    <span class="text-gray-400">v1.2.3 - Mystical Forest</span>
                                    <span class="status-online">✓ Success</span>
                                </div>
                                <div class="flex items-center justify-between text-sm">
                                    <span class="text-gray-400">v1.1.8 - Neon Runner</span>
                                    <span class="status-maintenance">⚠ Warning</span>
                                </div>
                                <div class="flex items-center justify-between text-sm">
                                    <span class="text-gray-400">v2.0.1 - Quantum Puzzle</span>
                                    <span class="status-offline">✗ Failed</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </div>
</body>
</html>
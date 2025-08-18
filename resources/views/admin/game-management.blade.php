<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game Management - GameHub Admin</title>
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
        
        .table-dark {
            background: #1a1a1a;
            border: 1px solid #2a2a2a;
        }
        
        .table-dark th {
            background: #0f0f0f;
            border-bottom: 1px solid #2a2a2a;
            color: #ffffff;
            font-weight: 600;
        }
        
        .table-dark td {
            border-bottom: 1px solid #2a2a2a;
            color: #e5e7eb;
        }
        
        .table-dark tr:hover {
            background: #2a2a2a;
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
        
        .status-badge {
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }
        
        .status-published {
            background: rgba(34, 197, 94, 0.2);
            color: #22c55e;
            border: 1px solid #22c55e;
        }
        
        .status-pending {
            background: rgba(245, 158, 11, 0.2);
            color: #f59e0b;
            border: 1px solid #f59e0b;
        }
        
        .status-rejected {
            background: rgba(239, 68, 68, 0.2);
            color: #ef4444;
            border: 1px solid #ef4444;
        }
        
        .status-draft {
            background: rgba(107, 114, 128, 0.2);
            color: #9ca3af;
            border: 1px solid #6b7280;
        }

        .status-featured {
            background: rgba(168, 85, 247, 0.2);
            color: #a855f7;
            border: 1px solid #a855f7;
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
        
        .btn-danger {
            background: linear-gradient(45deg, #ef4444, #dc2626);
            color: white;
            transition: all 0.3s ease;
        }
        
        .btn-danger:hover {
            background: linear-gradient(45deg, #dc2626, #b91c1c);
        }

        .btn-success {
            background: linear-gradient(45deg, #22c55e, #16a34a);
            color: white;
            transition: all 0.3s ease;
        }
        
        .btn-success:hover {
            background: linear-gradient(45deg, #16a34a, #15803d);
        }
        
        .modal {
            background: rgba(0, 0, 0, 0.8);
            backdrop-filter: blur(5px);
        }
        
        .modal-content {
            background: linear-gradient(145deg, #1a1a1a 0%, #141414 100%);
            border: 1px solid #2a2a2a;
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

        .filter-pills {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
        }

        .filter-pill {
            background: #2a2a2a;
            border: 1px solid #404040;
            color: #9ca3af;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .filter-pill.active {
            background: #3b82f6;
            color: white;
            border-color: #3b82f6;
        }

        .filter-pill:hover {
            background: #404040;
            color: white;
        }

        .hidden {
            display: none;
        }

        .game-thumbnail {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 8px;
        }

        .rating-stars {
            color: #fbbf24;
        }

        .category-tag {
            background: #1e40af;
            color: #dbeafe;
            padding: 2px 8px;
            border-radius: 12px;
            font-size: 10px;
            font-weight: 500;
        }

        .revenue-positive {
            color: #22c55e;
        }

        .revenue-negative {
            color: #ef4444;
        }

        .approval-panel {
            background: linear-gradient(145deg, #1e293b 0%, #0f172a 100%);
            border: 1px solid #334155;
        }

        .game-preview {
            max-width: 400px;
        }

        .screenshot-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 8px;
        }

        .screenshot-item {
            width: 100%;
            height: 80px;
            object-fit: cover;
            border-radius: 6px;
            cursor: pointer;
            transition: transform 0.2s;
        }

        .screenshot-item:hover {
            transform: scale(1.05);
        }

        .tag-cloud {
            display: flex;
            flex-wrap: wrap;
            gap: 6px;
        }

        .tag-item {
            background: #374151;
            color: #d1d5db;
            padding: 2px 8px;
            border-radius: 10px;
            font-size: 10px;
        }

        /* New styles for publisher info */
        .publisher-badge {
            background: rgba(99, 102, 241, 0.2);
            color: #6366f1;
            border: 1px solid #6366f1;
            padding: 2px 8px;
            border-radius: 12px;
            font-size: 10px;
            font-weight: 500;
        }

        .publisher-avatar {
            width: 24px;
            height: 24px;
            border-radius: 50%;
            object-fit: cover;
        }

        .admin-publisher {
            background: rgba(239, 68, 68, 0.2);
            color: #ef4444;
            border: 1px solid #ef4444;
        }

        .developer-publisher {
            background: rgba(34, 197, 94, 0.2);
            color: #22c55e;
            border: 1px solid #22c55e;
        }

        .auto-publisher {
            background: rgba(107, 114, 128, 0.2);
            color: #9ca3af;
            border: 1px solid #6b7280;
        }
    </style>
</head>
<body class="bg-black text-white">

    <!-- Top Navigation Bar -->
    <nav class="admin-topbar fixed top-0 left-0 right-0 z-50 h-16">
        <div class="flex items-center justify-between h-full px-6">
            <div class="flex items-center space-x-4">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-gradient-to-r from-blue-600 to-purple-600 rounded-lg flex items-center justify-center">
                        <i class="fas fa-shield-alt text-white"></i>
                    </div>
                    <div>
                        <h1 class="text-lg font-bold text-white">GameHub Admin</h1>
                        <p class="text-xs text-gray-400">Game Management</p>
                    </div>
                </div>
            </div>

            <div class="flex-1 max-w-md mx-8">
                <div class="relative">
                    <input type="text" placeholder="Search games by title, developer, or category..." 
                           class="search-box w-full pl-10 pr-4 py-2 rounded-lg outline-none" id="searchInput">
                    <i class="fas fa-search absolute left-3 top-2.5 text-gray-400"></i>
                </div>
            </div>

            <div class="flex items-center space-x-4">
                <div class="relative">
                    <button class="p-2 rounded-lg bg-gray-800 hover:bg-gray-700 transition-colors">
                        <i class="fas fa-bell text-gray-400"></i>
                        <div class="notification-dot"></div>
                    </button>
                </div>
                <div class="flex items-center space-x-3 pl-4 border-l border-gray-700">
                    <div class="text-right">
                        <p class="text-sm font-medium text-white">Super Admin</p>
                        <p class="text-xs text-gray-400">Administrator</p>
                    </div>
                    <div class="w-10 h-10 bg-gradient-to-r from-purple-500 to-blue-500 rounded-full flex items-center justify-center">
                        <span class="text-white font-bold text-sm">SA</span>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Sidebar Navigation -->
    <aside class="admin-sidebar fixed left-0 top-16 bottom-0 w-64 z-40 overflow-y-auto">
        <div class="p-6">
            <nav class="space-y-2">
                <div class="mb-6">
                    <h3 class="text-xs font-bold text-gray-500 uppercase tracking-wider mb-3">Main</h3>
                    <a href="#" class="nav-item flex items-center px-4 py-3 text-sm rounded-lg">
                        <i class="fas fa-tachometer-alt w-5"></i>
                        <span class="ml-3">Dashboard</span>
                    </a>
                    <a href="#" class="nav-item flex items-center px-4 py-3 text-sm rounded-lg">
                        <i class="fas fa-users w-5"></i>
                        <span class="ml-3">User Management</span>
                        <span class="ml-auto bg-blue-600 text-xs px-2 py-1 rounded-full">2.1K</span>
                    </a>
                    <a href="#" class="nav-item active flex items-center px-4 py-3 text-sm rounded-lg">
                        <i class="fas fa-gamepad w-5"></i>
                        <span class="ml-3">Game Management</span>
                        <span class="ml-auto bg-green-600 text-xs px-2 py-1 rounded-full">87</span>
                    </a>
                </div>

                <div class="mb-6">
                    <h3 class="text-xs font-bold text-gray-500 uppercase tracking-wider mb-3">Content</h3>
                    <a href="#" class="nav-item flex items-center px-4 py-3 text-sm rounded-lg">
                        <i class="fas fa-flag w-5"></i>
                        <span class="ml-3">Reports</span>
                        <span class="ml-auto bg-red-600 text-xs px-2 py-1 rounded-full">12</span>
                    </a>
                    <a href="#" class="nav-item flex items-center px-4 py-3 text-sm rounded-lg">
                        <i class="fas fa-comments w-5"></i>
                        <span class="ml-3">Reviews</span>
                    </a>
                    <a href="#" class="nav-item flex items-center px-4 py-3 text-sm rounded-lg">
                        <i class="fas fa-chart-line w-5"></i>
                        <span class="ml-3">Analytics</span>
                    </a>
                </div>

                <div class="mb-6">
                    <h3 class="text-xs font-bold text-gray-500 uppercase tracking-wider mb-3">System</h3>
                    <a href="#" class="nav-item flex items-center px-4 py-3 text-sm rounded-lg">
                        <i class="fas fa-server w-5"></i>
                        <span class="ml-3">Server Status</span>
                    </a>
                    <a href="#" class="nav-item flex items-center px-4 py-3 text-sm rounded-lg">
                        <i class="fas fa-database w-5"></i>
                        <span class="ml-3">Database</span>
                    </a>
                    <a href="#" class="nav-item flex items-center px-4 py-3 text-sm rounded-lg">
                        <i class="fas fa-shield-alt w-5"></i>
                        <span class="ml-3">Security</span>
                    </a>
                    <a href="#" class="nav-item flex items-center px-4 py-3 text-sm rounded-lg">
                        <i class="fas fa-cogs w-5"></i>
                        <span class="ml-3">Settings</span>
                    </a>
                </div>
            </nav>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="ml-64 mt-16 min-h-screen">
        <div class="p-6">
            <!-- Breadcrumb -->
            <nav class="mb-6">
                <ol class="flex items-center space-x-2 text-sm text-gray-400">
                    <li><a href="#" class="hover:text-white transition-colors">Dashboard</a></li>
                    <li><i class="fas fa-chevron-right text-xs"></i></li>
                    <li class="text-white font-medium">Game Management</li>
                </ol>
            </nav>

            <!-- Page Header -->
            <div class="flex items-center justify-between mb-8">
                <div>
                    <h1 class="text-3xl font-bold text-white">Game Management</h1>
                    <p class="text-gray-400 mt-1">Monitor and manage all games, approvals, categories, and content moderation</p>
                </div>
                <div class="flex items-center space-x-3">
                    <button class="btn-secondary px-4 py-2 rounded-lg text-sm font-medium">
                        <i class="fas fa-download mr-2"></i>Export Games
                    </button>
                    <button class="btn-secondary px-4 py-2 rounded-lg text-sm font-medium">
                        <i class="fas fa-plus mr-2"></i>Add Category
                    </button>
                    <button class="btn-primary px-4 py-2 rounded-lg text-sm font-medium">
                        <i class="fas fa-eye mr-2"></i>Review Queue
                    </button>
                </div>
            </div>

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-6 gap-6 mb-8">
                <div class="admin-card rounded-xl p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-400 text-sm">Total Games</p>
                            <p class="text-2xl font-bold text-white">8,547</p>
                        </div>
                        <div class="bg-blue-600 p-3 rounded-full">
                            <i class="fas fa-gamepad text-white"></i>
                        </div>
                    </div>
                </div>
                <div class="admin-card rounded-xl p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-400 text-sm">Published</p>
                            <p class="text-2xl font-bold text-white">7,234</p>
                        </div>
                        <div class="bg-green-600 p-3 rounded-full">
                            <i class="fas fa-check-circle text-white"></i>
                        </div>
                    </div>
                </div>
                <div class="admin-card rounded-xl p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-400 text-sm">Pending Review</p>
                            <p class="text-2xl font-bold text-white">87</p>
                        </div>
                        <div class="bg-yellow-600 p-3 rounded-full">
                            <i class="fas fa-clock text-white"></i>
                        </div>
                    </div>
                </div>
                <div class="admin-card rounded-xl p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-400 text-sm">Featured</p>
                            <p class="text-2xl font-bold text-white">156</p>
                        </div>
                        <div class="bg-purple-600 p-3 rounded-full">
                            <i class="fas fa-star text-white"></i>
                        </div>
                    </div>
                </div>
                <div class="admin-card rounded-xl p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-400 text-sm">Revenue Today</p>
                            <p class="text-2xl font-bold text-white">$12.4K</p>
                        </div>
                        <div class="bg-cyan-600 p-3 rounded-full">
                            <i class="fas fa-dollar-sign text-white"></i>
                        </div>
                    </div>
                </div>
                <div class="admin-card rounded-xl p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-400 text-sm">New Uploads</p>
                            <p class="text-2xl font-bold text-white">23</p>
                        </div>
                        <div class="bg-orange-600 p-3 rounded-full">
                            <i class="fas fa-upload text-white"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Filters and Controls -->
            <div class="admin-card rounded-xl p-6 mb-6">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-bold text-white">Filters & Search</h3>
                    <button class="text-blue-400 hover:text-blue-300 text-sm" onclick="resetFilters()">
                        <i class="fas fa-undo mr-1"></i>Reset Filters
                    </button>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-6 gap-4 mb-4">
                    <div>
                        <label class="block text-gray-400 text-sm mb-2">Status</label>
                        <select class="w-full bg-gray-800 border border-gray-700 rounded-lg px-3 py-2 text-white text-sm" id="statusFilter">
                            <option>All Status</option>
                            <option>Published</option>
                            <option>Pending Review</option>
                            <option>Draft</option>
                            <option>Rejected</option>
                            <option>Featured</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-gray-400 text-sm mb-2">Category</label>
                        <select class="w-full bg-gray-800 border border-gray-700 rounded-lg px-3 py-2 text-white text-sm" id="categoryFilter">
                            <option>All Categories</option>
                            <option>Action</option>
                            <option>Adventure</option>
                            <option>Puzzle</option>
                            <option>Strategy</option>
                            <option>Racing</option>
                            <option>RPG</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-gray-400 text-sm mb-2">Developer</label>
                        <select class="w-full bg-gray-800 border border-gray-700 rounded-lg px-3 py-2 text-white text-sm">
                            <option>All Developers</option>
                            <option>Indie Studios</option>
                            <option>AAA Studios</option>
                            <option>Individual</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-gray-400 text-sm mb-2">Published By</label>
                        <select class="w-full bg-gray-800 border border-gray-700 rounded-lg px-3 py-2 text-white text-sm" id="publisherFilter">
                            <option>All Publishers</option>
                            <option>Admin</option>
                            <option>Developer</option>
                            <option>Auto-Publish</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-gray-400 text-sm mb-2">Upload Date</label>
                        <input type="date" class="w-full bg-gray-800 border border-gray-700 rounded-lg px-3 py-2 text-white text-sm">
                    </div>
                    <div>
                        <label class="block text-gray-400 text-sm mb-2">Rating</label>
                        <select class="w-full bg-gray-800 border border-gray-700 rounded-lg px-3 py-2 text-white text-sm">
                            <option>All Ratings</option>
                            <option>5 Stars</option>
                            <option>4+ Stars</option>
                            <option>3+ Stars</option>
                            <option>Below 3 Stars</option>
                        </select>
                    </div>
                </div>

                <!-- Quick Filter Pills -->
                <div class="filter-pills mb-4">
                    <span class="filter-pill active">All Games</span>
                    <span class="filter-pill">Pending Approval</span>
                    <span class="filter-pill">Top Revenue</span>
                    <span class="filter-pill">Recently Updated</span>
                    <span class="filter-pill">Flagged Content</span>
                    <span class="filter-pill">Featured Games</span>
                    <span class="filter-pill">New Releases</span>
                </div>
            </div>

            <!-- Games Table -->
            <div class="admin-card rounded-xl p-6">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-xl font-bold text-white">Games List</h3>
                    <div class="flex items-center space-x-3">
                        <span class="text-gray-400 text-sm">Showing 1-10 of 8,547</span>
                        <div class="flex items-center space-x-1">
                            <button class="p-2 bg-gray-800 rounded hover:bg-gray-700">
                                <i class="fas fa-chevron-left text-gray-400"></i>
                            </button>
                            <span class="px-3 py-1 bg-blue-600 text-white rounded text-sm">1</span>
                            <button class="p-2 bg-gray-800 rounded hover:bg-gray-700">
                                <i class="fas fa-chevron-right text-gray-400"></i>
                            </button>
                        </div>
                    </div>
                </div>
                
                <div class="overflow-x-auto">
                    <table class="table-dark w-full rounded-lg overflow-hidden">
                        <thead>
                            <tr>
                                <th class="px-6 py-4 text-left">
                                    <input type="checkbox" class="rounded bg-gray-700 border-gray-600">
                                </th>
                                <th class="px-6 py-4 text-left cursor-pointer hover:bg-gray-800">
                                    Game <i class="fas fa-sort ml-1 text-gray-500"></i>
                                </th>
                                <th class="px-6 py-4 text-left cursor-pointer hover:bg-gray-800">
                                    Developer <i class="fas fa-sort ml-1 text-gray-500"></i>
                                </th>
                                <th class="px-6 py-4 text-left cursor-pointer hover:bg-gray-800">
                                    Published By <i class="fas fa-sort ml-1 text-gray-500"></i>
                                </th>
                                <th class="px-6 py-4 text-left cursor-pointer hover:bg-gray-800">
                                    Category <i class="fas fa-sort ml-1 text-gray-500"></i>
                                </th>
                                <th class="px-6 py-4 text-left cursor-pointer hover:bg-gray-800">
                                    Status <i class="fas fa-sort ml-1 text-gray-500"></i>
                                </th>
                                <th class="px-6 py-4 text-left cursor-pointer hover:bg-gray-800">
                                    Rating <i class="fas fa-sort ml-1 text-gray-500"></i>
                                </th>
                                <th class="px-6 py-4 text-left cursor-pointer hover:bg-gray-800">
                                    Downloads <i class="fas fa-sort ml-1 text-gray-500"></i>
                                </th>
                                <th class="px-6 py-4 text-left cursor-pointer hover:bg-gray-800">
                                    Revenue <i class="fas fa-sort ml-1 text-gray-500"></i>
                                </th>
                                <th class="px-6 py-4 text-left">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="gameTableBody">
                            <tr class="hover:bg-gray-800">
                                <td class="px-6 py-4">
                                    <input type="checkbox" class="rounded bg-gray-700 border-gray-600">
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center space-x-3">
                                        <img src="https://images.unsplash.com/photo-1552820728-8b83bb6b773f?w=100&h=100&fit=crop" alt="Game" class="game-thumbnail">
                                        <div>
                                            <p class="font-medium text-white">Cyber Runner 2077</p>
                                            <p class="text-sm text-gray-400">Updated 2 days ago</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div>
                                        <p class="font-medium text-white">NeonStudio</p>
                                        <p class="text-sm text-gray-400">Indie Developer</p>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center space-x-2">
                                        <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=40&h=40&fit=crop" alt="Admin" class="publisher-avatar">
                                        <div>
                                            <p class="font-medium text-white text-sm">Suncyan</p>
                                            <span class="publisher-badge admin-publisher">Admin</span>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="category-tag">Action</span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="status-badge status-published">Published</span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center space-x-1">
                                        <span class="rating-stars">★★★★★</span>
                                        <span class="text-sm text-gray-400">(4.8)</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div>
                                        <p class="font-medium text-white">125.4K</p>
                                        <p class="text-sm text-green-400">+2.3K today</p>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div>
                                        <p class="font-medium revenue-positive">$2,847</p>
                                        <p class="text-sm text-gray-400">This month</p>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center space-x-2">
                                        <button class="p-2 bg-blue-600 rounded hover:bg-blue-700 transition-colors" title="View Details">
                                            <i class="fas fa-eye text-white text-sm"></i>
                                        </button>
                                        <button class="p-2 bg-green-600 rounded hover:bg-green-700 transition-colors" title="Edit Game">
                                            <i class="fas fa-edit text-white text-sm"></i>
                                        </button>
                                        <button class="p-2 bg-purple-600 rounded hover:bg-purple-700 transition-colors" title="Feature Game">
                                            <i class="fas fa-star text-white text-sm"></i>
                                        </button>
                                        <button class="p-2 bg-red-600 rounded hover:bg-red-700 transition-colors" title="Remove Game">
                                            <i class="fas fa-trash text-white text-sm"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr class="hover:bg-gray-800">
                                <td class="px-6 py-4">
                                    <input type="checkbox" class="rounded bg-gray-700 border-gray-600">
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center space-x-3">
                                        <img src="https://images.unsplash.com/photo-1493711662062-fa541adb3fc8?w=100&h=100&fit=crop" alt="Game" class="game-thumbnail">
                                        <div>
                                            <p class="font-medium text-white">Fantasy Quest Adventures</p>
                                            <p class="text-sm text-gray-400">Pending review</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div>
                                        <p class="font-medium text-white">PixelCraft Games</p>
                                        <p class="text-sm text-gray-400">Verified Studio</p>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center space-x-2">
                                        <div class="w-6 h-6 bg-gradient-to-r from-green-500 to-blue-500 rounded-full flex items-center justify-center">
                                            <span class="text-white font-bold text-xs">D</span>
                                        </div>
                                        <div>
                                            <p class="font-medium text-white text-sm">Developer</p>
                                            <span class="publisher-badge developer-publisher">Self-Published</span>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="category-tag bg-purple-600 text-purple-100">RPG</span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="status-badge status-pending">Pending</span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center space-x-1">
                                        <span class="text-gray-400">Not rated</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div>
                                        <p class="font-medium text-white">-</p>
                                        <p class="text-sm text-gray-400">Not published</p>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div>
                                        <p class="font-medium text-gray-400">$0</p>
                                        <p class="text-sm text-gray-400">Not published</p>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center space-x-2">
                                        <button class="btn-success p-2 rounded text-sm" onclick="openApprovalModal('Fantasy Quest Adventures')" title="Review & Approve">
                                            <i class="fas fa-check text-white"></i>
                                        </button>
                                        <button class="p-2 bg-blue-600 rounded hover:bg-blue-700 transition-colors" title="View Details">
                                            <i class="fas fa-eye text-white text-sm"></i>
                                        </button>
                                        <button class="btn-danger p-2 rounded text-sm" title="Reject">
                                            <i class="fas fa-times text-white"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr class="hover:bg-gray-800">
                                <td class="px-6 py-4">
                                    <input type="checkbox" class="rounded bg-gray-700 border-gray-600">
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center space-x-3">
                                        <img src="https://images.unsplash.com/photo-1614680376739-414d95ff43df?w=100&h=100&fit=crop" alt="Game" class="game-thumbnail">
                                        <div>
                                            <p class="font-medium text-white">Puzzle Master Pro</p>
                                            <p class="text-sm text-gray-400">Featured game</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div>
                                        <p class="font-medium text-white">BrainBox Studios</p>
                                        <p class="text-sm text-gray-400">Premium Studio</p>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center space-x-2">
                                        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=40&h=40&fit=crop" alt="Admin" class="publisher-avatar">
                                        <div>
                                            <p class="font-medium text-white text-sm">Alex Chen</p>
                                            <span class="publisher-badge admin-publisher">Admin</span>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="category-tag bg-orange-600 text-orange-100">Puzzle</span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="status-badge status-featured">Featured</span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center space-x-1">
                                        <span class="rating-stars">★★★★☆</span>
                                        <span class="text-sm text-gray-400">(4.6)</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div>
                                        <p class="font-medium text-white">89.2K</p>
                                        <p class="text-sm text-green-400">+1.8K today</p>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div>
                                        <p class="font-medium revenue-positive">$5,234</p>
                                        <p class="text-sm text-gray-400">This month</p>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center space-x-2">
                                        <button class="p-2 bg-blue-600 rounded hover:bg-blue-700 transition-colors" title="View Details">
                                            <i class="fas fa-eye text-white text-sm"></i>
                                        </button>
                                        <button class="p-2 bg-green-600 rounded hover:bg-green-700 transition-colors" title="Edit Game">
                                            <i class="fas fa-edit text-white text-sm"></i>
                                        </button>
                                        <button class="p-2 bg-gray-600 rounded hover:bg-gray-700 transition-colors" title="Unfeature">
                                            <i class="fas fa-star-half-alt text-white text-sm"></i>
                                        </button>
                                        <button class="p-2 bg-red-600 rounded hover:bg-red-700 transition-colors" title="Remove Game">
                                            <i class="fas fa-trash text-white text-sm"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr class="hover:bg-gray-800">
                                <td class="px-6 py-4">
                                    <input type="checkbox" class="rounded bg-gray-700 border-gray-600">
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center space-x-3">
                                        <img src="https://images.unsplash.com/photo-1542751371-adc38448a05e?w=100&h=100&fit=crop" alt="Game" class="game-thumbnail">
                                        <div>
                                            <p class="font-medium text-white">Speed Racer Elite</p>
                                            <p class="text-sm text-gray-400">Updated 5 hours ago</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div>
                                        <p class="font-medium text-white">Velocity Games</p>
                                        <p class="text-sm text-gray-400">AAA Studio</p>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center space-x-2">
                                        <div class="w-6 h-6 bg-gradient-to-r from-gray-500 to-gray-600 rounded-full flex items-center justify-center">
                                            <i class="fas fa-robot text-white text-xs"></i>
                                        </div>
                                        <div>
                                            <p class="font-medium text-white text-sm">Auto-System</p>
                                            <span class="publisher-badge auto-publisher">Auto-Publish</span>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="category-tag bg-red-600 text-red-100">Racing</span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="status-badge status-published">Published</span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center space-x-1">
                                        <span class="rating-stars">★★★★★</span>
                                        <span class="text-sm text-gray-400">(4.9)</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div>
                                        <p class="font-medium text-white">234.7K</p>
                                        <p class="text-sm text-green-400">+5.1K today</p>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div>
                                        <p class="font-medium revenue-positive">$8,932</p>
                                        <p class="text-sm text-gray-400">This month</p>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center space-x-2">
                                        <button class="p-2 bg-blue-600 rounded hover:bg-blue-700 transition-colors" title="View Details">
                                            <i class="fas fa-eye text-white text-sm"></i>
                                        </button>
                                        <button class="p-2 bg-green-600 rounded hover:bg-green-700 transition-colors" title="Edit Game">
                                            <i class="fas fa-edit text-white text-sm"></i>
                                        </button>
                                        <button class="p-2 bg-purple-600 rounded hover:bg-purple-700 transition-colors" title="Feature Game">
                                            <i class="fas fa-star text-white text-sm"></i>
                                        </button>
                                        <button class="p-2 bg-red-600 rounded hover:bg-red-700 transition-colors" title="Remove Game">
                                            <i class="fas fa-trash text-white text-sm"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr class="hover:bg-gray-800">
                                <td class="px-6 py-4">
                                    <input type="checkbox" class="rounded bg-gray-700 border-gray-600">
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center space-x-3">
                                        <img src="https://images.unsplash.com/photo-1511512578047-dfb367046420?w=100&h=100&fit=crop" alt="Game" class="game-thumbnail">
                                        <div>
                                            <p class="font-medium text-white">Medieval Warriors</p>
                                            <p class="text-sm text-gray-400">New release</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div>
                                        <p class="font-medium text-white">KnightForge Studio</p>
                                        <p class="text-sm text-gray-400">Indie Developer</p>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center space-x-2">
                                        <img src="https://images.unsplash.com/photo-1494790108755-2616b612b1c7?w=40&h=40&fit=crop" alt="Admin" class="publisher-avatar">
                                        <div>
                                            <p class="font-medium text-white text-sm">Sarah Kim</p>
                                            <span class="publisher-badge admin-publisher">Admin</span>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="category-tag bg-yellow-600 text-yellow-100">Strategy</span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="status-badge status-published">Published</span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center space-x-1">
                                        <span class="rating-stars">★★★★☆</span>
                                        <span class="text-sm text-gray-400">(4.2)</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div>
                                        <p class="font-medium text-white">45.8K</p>
                                        <p class="text-sm text-green-400">+892 today</p>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div>
                                        <p class="font-medium revenue-positive">$1,256</p>
                                        <p class="text-sm text-gray-400">This month</p>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center space-x-2">
                                        <button class="p-2 bg-blue-600 rounded hover:bg-blue-700 transition-colors" title="View Details">
                                            <i class="fas fa-eye text-white text-sm"></i>
                                        </button>
                                        <button class="p-2 bg-green-600 rounded hover:bg-green-700 transition-colors" title="Edit Game">
                                            <i class="fas fa-edit text-white text-sm"></i>
                                        </button>
                                        <button class="p-2 bg-purple-600 rounded hover:bg-purple-700 transition-colors" title="Feature Game">
                                            <i class="fas fa-star text-white text-sm"></i>
                                        </button>
                                        <button class="p-2 bg-red-600 rounded hover:bg-red-700 transition-colors" title="Remove Game">
                                            <i class="fas fa-trash text-white text-sm"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

    <!-- Game Approval Modal -->
    <div id="approvalModal" class="modal fixed inset-0 z-50 hidden">
        <div class="flex items-center justify-center min-h-screen px-4">
            <div class="modal-content rounded-xl p-0 w-full max-w-4xl max-h-screen overflow-y-auto">
                <!-- Modal Header -->
                <div class="p-6 border-b border-gray-700">
                    <div class="flex items-center justify-between">
                        <h3 class="text-xl font-bold text-white">Game Review & Approval</h3>
                        <button onclick="closeApprovalModal()" class="text-gray-400 hover:text-white">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 p-6">
                    <!-- Game Details -->
                    <div class="space-y-6">
                        <div class="approval-panel rounded-lg p-4">
                            <h4 class="text-lg font-bold text-white mb-4">Game Information</h4>
                            <div class="space-y-3">
                                <div class="flex items-start space-x-3">
                                    <img src="https://images.unsplash.com/photo-1493711662062-fa541adb3fc8?w=120&h=120&fit=crop" alt="Game" class="w-20 h-20 rounded-lg object-cover">
                                    <div>
                                        <h5 class="font-bold text-white text-lg">Fantasy Quest Adventures</h5>
                                        <p class="text-gray-400">by PixelCraft Games</p>
                                        <div class="tag-cloud mt-2">
                                            <span class="tag-item">RPG</span>
                                            <span class="tag-item">Adventure</span>
                                            <span class="tag-item">Single Player</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="grid grid-cols-2 gap-4 text-sm">
                                    <div>
                                        <p class="text-gray-400">File Size</p>
                                        <p class="text-white font-medium">245 MB</p>
                                    </div>
                                    <div>
                                        <p class="text-gray-400">Version</p>
                                        <p class="text-white font-medium">1.0.2</p>
                                    </div>
                                    <div>
                                        <p class="text-gray-400">Upload Date</p>
                                        <p class="text-white font-medium">Dec 15, 2024</p>
                                    </div>
                                    <div>
                                        <p class="text-gray-400">Platform</p>
                                        <p class="text-white font-medium">Web, Mobile</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="approval-panel rounded-lg p-4">
                            <h4 class="text-lg font-bold text-white mb-4">Description</h4>
                            <p class="text-gray-300 text-sm leading-relaxed">
                                Embark on an epic fantasy adventure in a world filled with magic, monsters, and mysterious quests. 
                                Fantasy Quest Adventures combines classic RPG elements with modern gameplay mechanics to deliver 
                                an unforgettable gaming experience. Explore vast landscapes, battle fierce creatures, and uncover 
                                ancient secrets as you progress through your heroic journey.
                            </p>
                        </div>

                        <div class="approval-panel rounded-lg p-4">
                            <h4 class="text-lg font-bold text-white mb-4">Publisher Information</h4>
                            <div class="flex items-center space-x-3">
                                <div class="w-12 h-12 bg-gradient-to-r from-green-500 to-blue-500 rounded-full flex items-center justify-center">
                                    <span class="text-white font-bold">D</span>
                                </div>
                                <div>
                                    <p class="font-medium text-white">Self-Published by Developer</p>
                                    <p class="text-sm text-gray-400">PixelCraft Games - Verified Studio</p>
                                    <span class="publisher-badge developer-publisher mt-1">Developer Published</span>
                                </div>
                            </div>
                        </div>

                        <div class="approval-panel rounded-lg p-4">
                            <h4 class="text-lg font-bold text-white mb-4">Content Guidelines Check</h4>
                            <div class="space-y-3">
                                <div class="flex items-center justify-between">
                                    <span class="text-gray-300">Age-appropriate content</span>
                                    <i class="fas fa-check-circle text-green-400"></i>
                                </div>
                                <div class="flex items-center justify-between">
                                    <span class="text-gray-300">No offensive language</span>
                                    <i class="fas fa-check-circle text-green-400"></i>
                                </div>
                                <div class="flex items-center justify-between">
                                    <span class="text-gray-300">Original content</span>
                                    <i class="fas fa-check-circle text-green-400"></i>
                                </div>
                                <div class="flex items-center justify-between">
                                    <span class="text-gray-300">Technical requirements</span>
                                    <i class="fas fa-check-circle text-green-400"></i>
                                </div>
                                <div class="flex items-center justify-between">
                                    <span class="text-gray-300">Privacy compliance</span>
                                    <i class="fas fa-exclamation-triangle text-yellow-400"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Screenshots & Actions -->
                    <div class="space-y-6">
                        <div class="approval-panel rounded-lg p-4">
                            <h4 class="text-lg font-bold text-white mb-4">Screenshots</h4>
                            <div class="screenshot-grid">
                                <img src="https://images.unsplash.com/photo-1493711662062-fa541adb3fc8?w=200&h=150&fit=crop" alt="Screenshot 1" class="screenshot-item">
                                <img src="https://images.unsplash.com/photo-1542751371-adc38448a05e?w=200&h=150&fit=crop" alt="Screenshot 2" class="screenshot-item">
                                <img src="https://images.unsplash.com/photo-1614680376739-414d95ff43df?w=200&h=150&fit=crop" alt="Screenshot 3" class="screenshot-item">
                                <img src="https://images.unsplash.com/photo-1552820728-8b83bb6b773f?w=200&h=150&fit=crop" alt="Screenshot 4" class="screenshot-item">
                            </div>
                        </div>

                        <div class="approval-panel rounded-lg p-4">
                            <h4 class="text-lg font-bold text-white mb-4">Review Notes</h4>
                            <textarea class="w-full bg-gray-800 border border-gray-700 rounded-lg px-3 py-2 text-white text-sm h-24 resize-none" 
                                      placeholder="Add your review notes here..."></textarea>
                        </div>

                        <div class="approval-panel rounded-lg p-4">
                            <h4 class="text-lg font-bold text-white mb-4">Publishing Options</h4>
                            <div class="space-y-3">
                                <div>
                                    <label class="block text-gray-400 text-sm mb-2">Publish as</label>
                                    <select class="w-full bg-gray-800 border border-gray-700 rounded-lg px-3 py-2 text-white text-sm">
                                        <option>Developer (Self-Published)</option>
                                        <option>Admin Override</option>
                                        <option>System Auto-Publish</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-gray-400 text-sm mb-2">Primary Category</label>
                                    <select class="w-full bg-gray-800 border border-gray-700 rounded-lg px-3 py-2 text-white text-sm">
                                        <option>RPG</option>
                                        <option>Action</option>
                                        <option>Adventure</option>
                                        <option>Puzzle</option>
                                        <option>Strategy</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-gray-400 text-sm mb-2">Age Rating</label>
                                    <select class="w-full bg-gray-800 border border-gray-700 rounded-lg px-3 py-2 text-white text-sm">
                                        <option>Everyone</option>
                                        <option>Everyone 10+</option>
                                        <option>Teen</option>
                                        <option>Mature 17+</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal Footer -->
                <div class="p-6 border-t border-gray-700">
                    <div class="flex justify-end space-x-3">
                        <button onclick="closeApprovalModal()" class="btn-secondary px-6 py-2 rounded-lg">
                            Cancel
                        </button>
                        <button class="btn-danger px-6 py-2 rounded-lg">
                            <i class="fas fa-times mr-2"></i>Reject
                        </button>
                        <button class="bg-yellow-600 hover:bg-yellow-700 text-white px-6 py-2 rounded-lg transition-colors">
                            <i class="fas fa-clock mr-2"></i>Request Changes
                        </button>
                        <button class="btn-success px-6 py-2 rounded-lg">
                            <i class="fas fa-check mr-2"></i>Approve & Publish
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script>
        // Sample data for demonstration
        const games = [
            {
                id: 1,
                title: "Cyber Runner 2077",
                developer: "NeonStudio",
                publishedBy: { name: "Suncyan", role: "Admin", avatar: "https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=40&h=40&fit=crop" },
                category: "Action",
                status: "Published",
                rating: 4.8,
                downloads: "125.4K",
                revenue: "$2,847",
                thumbnail: "https://images.unsplash.com/photo-1552820728-8b83bb6b773f?w=100&h=100&fit=crop"
            },
            {
                id: 2,
                title: "Fantasy Quest Adventures",
                developer: "PixelCraft Games",
                publishedBy: { name: "Developer", role: "Self-Published", avatar: null },
                category: "RPG",
                status: "Pending",
                rating: null,
                downloads: "-",
                revenue: "$0",
                thumbnail: "https://images.unsplash.com/photo-1493711662062-fa541adb3fc8?w=100&h=100&fit=crop"
            }
        ];

        // Modal functions
        function openApprovalModal(gameTitle) {
            document.getElementById('approvalModal').classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closeApprovalModal() {
            document.getElementById('approvalModal').classList.add('hidden');
            document.body.style.overflow = 'auto';
        }

        // Filter functions
        function resetFilters() {
            document.getElementById('statusFilter').value = 'All Status';
            document.getElementById('categoryFilter').value = 'All Categories';
            document.getElementById('publisherFilter').value = 'All Publishers';
            
            // Reset filter pills
            document.querySelectorAll('.filter-pill').forEach(pill => {
                pill.classList.remove('active');
            });
            document.querySelector('.filter-pill').classList.add('active');
        }

        // Search functionality
        document.getElementById('searchInput').addEventListener('input', function(e) {
            const searchTerm = e.target.value.toLowerCase();
            console.log('Searching for:', searchTerm);
            // Add search logic here
        });

        // Filter pills interaction
        document.querySelectorAll('.filter-pill').forEach(pill => {
            pill.addEventListener('click', function() {
                document.querySelectorAll('.filter-pill').forEach(p => p.classList.remove('active'));
                this.classList.add('active');
            });
        });

        // Close modal when clicking outside
        document.getElementById('approvalModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeApprovalModal();
            }
        });

        // Keyboard shortcuts
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeApprovalModal();
            }
        });

        // Table sorting functionality
        document.querySelectorAll('th[class*="cursor-pointer"]').forEach(header => {
            header.addEventListener('click', function() {
                console.log('Sorting by:', this.textContent.trim());
                // Add sorting logic here
            });
        });

        // Bulk actions
        function toggleSelectAll() {
            const selectAll = document.querySelector('thead input[type="checkbox"]');
            const checkboxes = document.querySelectorAll('tbody input[type="checkbox"]');
            
            checkboxes.forEach(checkbox => {
                checkbox.checked = selectAll.checked;
            });
        }

        // Add event listener to select all checkbox
        document.querySelector('thead input[type="checkbox"]').addEventListener('change', toggleSelectAll);

        // Initialize tooltips and other interactive elements
        document.addEventListener('DOMContentLoaded', function() {
            console.log('Game Management Dashboard Loaded');
            
            // Add hover effects for action buttons
            document.querySelectorAll('button[title]').forEach(button => {
                button.addEventListener('mouseenter', function() {
                    // Could add custom tooltip logic here
                });
            });
        });

        // Publisher type detection and badge styling
        function updatePublisherBadges() {
            document.querySelectorAll('.publisher-badge').forEach(badge => {
                const text = badge.textContent.toLowerCase();
                badge.classList.remove('admin-publisher', 'developer-publisher', 'auto-publisher');
                
                if (text.includes('admin')) {
                    badge.classList.add('admin-publisher');
                } else if (text.includes('self') || text.includes('developer')) {
                    badge.classList.add('developer-publisher');
                } else if (text.includes('auto')) {
                    badge.classList.add('auto-publisher');
                }
            });
        }

        // Call on load
        updatePublisherBadges();

        // Revenue formatting
        function formatRevenue(amount) {
            if (amount === 0 || amount === '$0') return '<span class="text-gray-400">$0</span>';
            return `<span class="revenue-positive">${amount}</span>`;
        }

        // Download count formatting
        function formatDownloads(count) {
            if (count === '-' || count === 0) return '<span class="text-gray-400">-</span>';
            return `<span class="text-white font-medium">${count}</span>`;
        }

        // Status badge updates
        function updateGameStatus(gameId, newStatus) {
            console.log(`Updating game ${gameId} status to: ${newStatus}`);
            // Add API call logic here
        }

        // Quick actions
        function featureGame(gameId) {
            console.log(`Featuring game: ${gameId}`);
            // Add feature logic here
        }

        function removeGame(gameId) {
            if (confirm('Are you sure you want to remove this game?')) {
                console.log(`Removing game: ${gameId}`);
                // Add removal logic here
            }
        }

        function editGame(gameId) {
            console.log(`Editing game: ${gameId}`);
            // Add edit logic here
        }

        function viewGameDetails(gameId) {
            console.log(`Viewing details for game: ${gameId}`);
            // Add view details logic here
        }

        // Export functionality
        function exportGames() {
            console.log('Exporting games data...');
            // Add export logic here
        }

        // Notification system
        function showNotification(message, type = 'info') {
            console.log(`${type.toUpperCase()}: ${message}`);
            // Add notification display logic here
        }
    </script>
</body>
</html>
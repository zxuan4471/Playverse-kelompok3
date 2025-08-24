<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reviews Management - GameHub Admin</title>
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

        .rating-stars {
            color: #fbbf24;
        }

        .rating-stars.red {
            color: #ef4444;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            object-fit: cover;
            border-radius: 50%;
        }

        .game-thumbnail {
            width: 50px;
            height: 50px;
            object-fit: cover;
            border-radius: 8px;
        }

        .review-status {
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

        .status-approved {
            background: rgba(34, 197, 94, 0.2);
            color: #22c55e;
            border: 1px solid #22c55e;
        }

        .status-pending {
            background: rgba(245, 158, 11, 0.2);
            color: #f59e0b;
            border: 1px solid #f59e0b;
        }

        .status-flagged {
            background: rgba(239, 68, 68, 0.2);
            color: #ef4444;
            border: 1px solid #ef4444;
        }

        .status-rejected {
            background: rgba(107, 114, 128, 0.2);
            color: #9ca3af;
            border: 1px solid #6b7280;
        }

        .review-text {
            max-width: 300px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .review-text:hover {
            white-space: normal;
            overflow: visible;
        }

        .modal {
            background: rgba(0, 0, 0, 0.8);
            backdrop-filter: blur(5px);
        }
        
        .modal-content {
            background: linear-gradient(145deg, #1a1a1a 0%, #141414 100%);
            border: 1px solid #2a2a2a;
        }

        .sentiment-positive {
            color: #22c55e;
        }

        .sentiment-negative {
            color: #ef4444;
        }

        .sentiment-neutral {
            color: #9ca3af;
        }

        .response-panel {
            background: linear-gradient(145deg, #1e293b 0%, #0f172a 100%);
            border: 1px solid #334155;
        }

        .tag-spam {
            background: rgba(239, 68, 68, 0.2);
            color: #ef4444;
            padding: 2px 6px;
            border-radius: 10px;
            font-size: 10px;
        }

        .tag-helpful {
            background: rgba(34, 197, 94, 0.2);
            color: #22c55e;
            padding: 2px 6px;
            border-radius: 10px;
            font-size: 10px;
        }

        .tag-verified {
            background: rgba(99, 102, 241, 0.2);
            color: #6366f1;
            padding: 2px 6px;
            border-radius: 10px;
            font-size: 10px;
        }

        .likes-count {
            color: #22c55e;
        }

        .dislikes-count {
            color: #ef4444;
        }

        .reports-count {
            color: #f59e0b;
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
                        <p class="text-xs text-gray-400">Reviews Management</p>
                    </div>
                </div>
            </div>

            <div class="flex-1 max-w-md mx-8">
                <div class="relative">
                    <input type="text" placeholder="Search reviews by game, user, or content..." 
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
                    <a href="#" class="nav-item flex items-center px-4 py-3 text-sm rounded-lg">
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
                    <a href="#" class="nav-item active flex items-center px-4 py-3 text-sm rounded-lg">
                        <i class="fas fa-comments w-5"></i>
                        <span class="ml-3">Reviews</span>
                        <span class="ml-auto bg-yellow-600 text-xs px-2 py-1 rounded-full">347</span>
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
                    <li class="text-white font-medium">Reviews Management</li>
                </ol>
            </nav>

            <!-- Page Header -->
            <div class="flex items-center justify-between mb-8">
                <div>
                    <h1 class="text-3xl font-bold text-white">Reviews Management</h1>
                    <p class="text-gray-400 mt-1">Monitor, moderate, and respond to user reviews across all games</p>
                </div>
                <div class="flex items-center space-x-3">
                    <button class="btn-secondary px-4 py-2 rounded-lg text-sm font-medium">
                        <i class="fas fa-download mr-2"></i>Export Reviews
                    </button>
                    <button class="btn-secondary px-4 py-2 rounded-lg text-sm font-medium">
                        <i class="fas fa-chart-bar mr-2"></i>Analytics
                    </button>
                    <button class="btn-primary px-4 py-2 rounded-lg text-sm font-medium">
                        <i class="fas fa-flag mr-2"></i>Flagged Reviews
                    </button>
                </div>
            </div>

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-6 gap-6 mb-8">
                <div class="admin-card rounded-xl p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-400 text-sm">Total Reviews</p>
                            <p class="text-2xl font-bold text-white">24,847</p>
                        </div>
                        <div class="bg-blue-600 p-3 rounded-full">
                            <i class="fas fa-comments text-white"></i>
                        </div>
                    </div>
                </div>
                <div class="admin-card rounded-xl p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-400 text-sm">Approved</p>
                            <p class="text-2xl font-bold text-white">22,134</p>
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
                            <p class="text-2xl font-bold text-white">347</p>
                        </div>
                        <div class="bg-yellow-600 p-3 rounded-full">
                            <i class="fas fa-clock text-white"></i>
                        </div>
                    </div>
                </div>
                <div class="admin-card rounded-xl p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-400 text-sm">Flagged</p>
                            <p class="text-2xl font-bold text-white">89</p>
                        </div>
                        <div class="bg-red-600 p-3 rounded-full">
                            <i class="fas fa-flag text-white"></i>
                        </div>
                    </div>
                </div>
                <div class="admin-card rounded-xl p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-400 text-sm">Avg Rating</p>
                            <p class="text-2xl font-bold text-white">4.2</p>
                        </div>
                        <div class="bg-purple-600 p-3 rounded-full">
                            <i class="fas fa-star text-white"></i>
                        </div>
                    </div>
                </div>
                <div class="admin-card rounded-xl p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-400 text-sm">Today</p>
                            <p class="text-2xl font-bold text-white">156</p>
                        </div>
                        <div class="bg-cyan-600 p-3 rounded-full">
                            <i class="fas fa-calendar-day text-white"></i>
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
                            <option>Approved</option>
                            <option>Pending</option>
                            <option>Flagged</option>
                            <option>Rejected</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-gray-400 text-sm mb-2">Rating</label>
                        <select class="w-full bg-gray-800 border border-gray-700 rounded-lg px-3 py-2 text-white text-sm" id="ratingFilter">
                            <option>All Ratings</option>
                            <option>5 Stars</option>
                            <option>4 Stars</option>
                            <option>3 Stars</option>
                            <option>2 Stars</option>
                            <option>1 Star</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-gray-400 text-sm mb-2">Game Category</label>
                        <select class="w-full bg-gray-800 border border-gray-700 rounded-lg px-3 py-2 text-white text-sm">
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
                        <label class="block text-gray-400 text-sm mb-2">Sentiment</label>
                        <select class="w-full bg-gray-800 border border-gray-700 rounded-lg px-3 py-2 text-white text-sm" id="sentimentFilter">
                            <option>All Sentiment</option>
                            <option>Positive</option>
                            <option>Neutral</option>
                            <option>Negative</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-gray-400 text-sm mb-2">Date Range</label>
                        <input type="date" class="w-full bg-gray-800 border border-gray-700 rounded-lg px-3 py-2 text-white text-sm">
                    </div>
                    <div>
                        <label class="block text-gray-400 text-sm mb-2">User Type</label>
                        <select class="w-full bg-gray-800 border border-gray-700 rounded-lg px-3 py-2 text-white text-sm">
                            <option>All Users</option>
                            <option>Verified</option>
                            <option>Regular</option>
                            <option>Premium</option>
                            <option>New Users</option>
                        </select>
                    </div>
                </div>

                <!-- Quick Filter Pills -->
                <div class="filter-pills mb-4">
                    <span class="filter-pill active">All Reviews</span>
                    <span class="filter-pill">Needs Moderation</span>
                    <span class="filter-pill">High Priority</span>
                    <span class="filter-pill">Spam Reports</span>
                    <span class="filter-pill">Featured Reviews</span>
                    <span class="filter-pill">Recent Reviews</span>
                    <span class="filter-pill">Negative Feedback</span>
                </div>
            </div>

            <!-- Reviews Table -->
            <div class="admin-card rounded-xl p-6">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-xl font-bold text-white">Reviews List</h3>
                    <div class="flex items-center space-x-3">
                        <span class="text-gray-400 text-sm">Showing 1-10 of 24,847</span>
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
                                    User <i class="fas fa-sort ml-1 text-gray-500"></i>
                                </th>
                                <th class="px-6 py-4 text-left cursor-pointer hover:bg-gray-800">
                                    Game <i class="fas fa-sort ml-1 text-gray-500"></i>
                                </th>
                                <th class="px-6 py-4 text-left cursor-pointer hover:bg-gray-800">
                                    Rating <i class="fas fa-sort ml-1 text-gray-500"></i>
                                </th>
                                <th class="px-6 py-4 text-left cursor-pointer hover:bg-gray-800">
                                    Review Content <i class="fas fa-sort ml-1 text-gray-500"></i>
                                </th>
                                <th class="px-6 py-4 text-left cursor-pointer hover:bg-gray-800">
                                    Sentiment <i class="fas fa-sort ml-1 text-gray-500"></i>
                                </th>
                                <th class="px-6 py-4 text-left cursor-pointer hover:bg-gray-800">
                                    Engagement <i class="fas fa-sort ml-1 text-gray-500"></i>
                                </th>
                                <th class="px-6 py-4 text-left cursor-pointer hover:bg-gray-800">
                                    Status <i class="fas fa-sort ml-1 text-gray-500"></i>
                                </th>
                                <th class="px-6 py-4 text-left cursor-pointer hover:bg-gray-800">
                                    Date <i class="fas fa-sort ml-1 text-gray-500"></i>
                                </th>
                                <th class="px-6 py-4 text-left">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="reviewsTableBody">
                            <tr class="hover:bg-gray-800">
                                <td class="px-6 py-4">
                                    <input type="checkbox" class="rounded bg-gray-700 border-gray-600">
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center space-x-3">
                                        <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=40&h=40&fit=crop" alt="User" class="user-avatar">
                                        <div>
                                            <p class="font-medium text-white">Alex Johnson</p>
                                            <p class="text-sm text-gray-400">Premium User</p>
                                            <span class="tag-verified">Verified</span>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center space-x-3">
                                        <img src="https://images.unsplash.com/photo-1552820728-8b83bb6b773f?w=50&h=50&fit=crop" alt="Game" class="game-thumbnail">
                                        <div>
                                            <p class="font-medium text-white">Cyber Runner 2077</p>
                                            <p class="text-sm text-gray-400">Action</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center space-x-1">
                                        <span class="rating-stars">★★★★★</span>
                                        <span class="text-sm text-gray-400">(5.0)</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="review-text">
                                        <p class="text-white">"Amazing graphics and gameplay! The cyberpunk atmosphere is perfectly captured..."</p>
                                        <div class="flex items-center space-x-2 mt-1">
                                            <span class="tag-helpful">Helpful</span>
                                            <span class="text-xs text-gray-400">245 chars</span>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center space-x-2">
                                        <i class="fas fa-thumbs-up sentiment-positive"></i>
                                        <span class="sentiment-positive font-medium">Positive</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm">
                                        <div class="flex items-center space-x-3">
                                            <span class="likes-count"><i class="fas fa-thumbs-up mr-1"></i>124</span>
                                            <span class="dislikes-count"><i class="fas fa-thumbs-down mr-1"></i>3</span>
                                            <span class="reports-count"><i class="fas fa-flag mr-1"></i>0</span>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="review-status status-approved">Approved</span>
                                </td>
                                <td class="px-6 py-4">
                                    <div>
                                        <p class="text-white font-medium">Dec 15, 2024</p>
                                        <p class="text-sm text-gray-400">2 days ago</p>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center space-x-2">
                                        <button class="p-2 bg-blue-600 rounded hover:bg-blue-700 transition-colors" title="View Details" onclick="openReviewModal('alex-review-1')">
                                            <i class="fas fa-eye text-white text-sm"></i>
                                        </button>
                                        <button class="p-2 bg-green-600 rounded hover:bg-green-700 transition-colors" title="Respond">
                                            <i class="fas fa-reply text-white text-sm"></i>
                                        </button>
                                        <button class="p-2 bg-yellow-600 rounded hover:bg-yellow-700 transition-colors" title="Flag">
                                            <i class="fas fa-flag text-white text-sm"></i>
                                        </button>
                                        <button class="p-2 bg-red-600 rounded hover:bg-red-700 transition-colors" title="Delete">
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
                                        <img src="https://images.unsplash.com/photo-1494790108755-2616b612b1c7?w=40&h=40&fit=crop" alt="User" class="user-avatar">
                                        <div>
                                            <p class="font-medium text-white">Sarah Chen</p>
                                            <p class="text-sm text-gray-400">Regular User</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center space-x-3">
                                        <img src="https://images.unsplash.com/photo-1614680376739-414d95ff43df?w=50&h=50&fit=crop" alt="Game" class="game-thumbnail">
                                        <div>
                                            <p class="font-medium text-white">Puzzle Master Pro</p>
                                            <p class="text-sm text-gray-400">Puzzle</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center space-x-1">
                                        <span class="rating-stars red">★★☆☆☆</span>
                                        <span class="text-sm text-gray-400">(2.0)</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="review-text">
                                        <p class="text-white">"Too many ads and crashes frequently. Not worth the download..."</p>
                                        <div class="flex items-center space-x-2 mt-1">
                                            <span class="tag-spam">Flagged</span>
                                            <span class="text-xs text-gray-400">158 chars</span>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center space-x-2">
                                        <i class="fas fa-thumbs-down sentiment-negative"></i>
                                        <span class="sentiment-negative font-medium">Negative</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm">
                                        <div class="flex items-center space-x-3">
                                            <span class="likes-count"><i class="fas fa-thumbs-up mr-1"></i>23</span>
                                            <span class="dislikes-count"><i class="fas fa-thumbs-down mr-1"></i>45</span>
                                            <span class="reports-count"><i class="fas fa-flag mr-1"></i>8</span>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="review-status status-flagged">Flagged</span>
                                </td>
                                <td class="px-6 py-4">
                                    <div>
                                        <p class="text-white font-medium">Dec 14, 2024</p>
                                        <p class="text-sm text-gray-400">3 days ago</p>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center space-x-2">
                                        <button class="p-2 bg-blue-600 rounded hover:bg-blue-700 transition-colors" title="View Details" onclick="openReviewModal('sarah-review-1')">
                                            <i class="fas fa-eye text-white text-sm"></i>
                                        </button>
                                        <button class="btn-success p-2 rounded text-sm" title="Approve">
                                            <i class="fas fa-check text-white"></i>
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
                                        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=40&h=40&fit=crop" alt="User" class="user-avatar">
                                        <div>
                                            <p class="font-medium text-white">Mike Wilson</p>
                                            <p class="text-sm text-gray-400">New User</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center space-x-3">
                                        <img src="https://images.unsplash.com/photo-1542751371-adc38448a05e?w=50&h=50&fit=crop" alt="Game" class="game-thumbnail">
                                        <div>
                                            <p class="font-medium text-white">Speed Racer Elite</p>
                                            <p class="text-sm text-gray-400">Racing</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center space-x-1">
                                        <span class="rating-stars">★★★★☆</span>
                                        <span class="text-sm text-gray-400">(4.0)</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="review-text">
                                        <p class="text-white">"Great racing game with realistic physics. Controls could be better..."</p>
                                        <div class="flex items-center space-x-2 mt-1">
                                            <span class="text-xs text-gray-400">189 chars</span>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center space-x-2">
                                        <i class="fas fa-minus sentiment-neutral"></i>
                                        <span class="sentiment-neutral font-medium">Neutral</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm">
                                        <div class="flex items-center space-x-3">
                                            <span class="likes-count"><i class="fas fa-thumbs-up mr-1"></i>67</span>
                                            <span class="dislikes-count"><i class="fas fa-thumbs-down mr-1"></i>12</span>
                                            <span class="reports-count"><i class="fas fa-flag mr-1"></i>1</span>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="review-status status-pending">Pending</span>
                                </td>
                                <td class="px-6 py-4">
                                    <div>
                                        <p class="text-white font-medium">Dec 13, 2024</p>
                                        <p class="text-sm text-gray-400">4 days ago</p>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center space-x-2">
                                        <button class="p-2 bg-blue-600 rounded hover:bg-blue-700 transition-colors" title="View Details" onclick="openReviewModal('mike-review-1')">
                                            <i class="fas fa-eye text-white text-sm"></i>
                                        </button>
                                        <button class="btn-success p-2 rounded text-sm" title="Approve">
                                            <i class="fas fa-check text-white"></i>
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
                                        <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=40&h=40&fit=crop" alt="User" class="user-avatar">
                                        <div>
                                            <p class="font-medium text-white">Emma Davis</p>
                                            <p class="text-sm text-gray-400">Premium User</p>
                                            <span class="tag-verified">Verified</span>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center space-x-3">
                                        <img src="https://images.unsplash.com/photo-1511512578047-dfb367046420?w=50&h=50&fit=crop" alt="Game" class="game-thumbnail">
                                        <div>
                                            <p class="font-medium text-white">Medieval Warriors</p>
                                            <p class="text-sm text-gray-400">Strategy</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center space-x-1">
                                        <span class="rating-stars">★★★★★</span>
                                        <span class="text-sm text-gray-400">(5.0)</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="review-text">
                                        <p class="text-white">"Incredible strategy game! Love the medieval setting and tactical gameplay..."</p>
                                        <div class="flex items-center space-x-2 mt-1">
                                            <span class="tag-helpful">Featured</span>
                                            <span class="text-xs text-gray-400">298 chars</span>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center space-x-2">
                                        <i class="fas fa-thumbs-up sentiment-positive"></i>
                                        <span class="sentiment-positive font-medium">Positive</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm">
                                        <div class="flex items-center space-x-3">
                                            <span class="likes-count"><i class="fas fa-thumbs-up mr-1"></i>189</span>
                                            <span class="dislikes-count"><i class="fas fa-thumbs-down mr-1"></i>5</span>
                                            <span class="reports-count"><i class="fas fa-flag mr-1"></i>0</span>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="review-status status-approved">Approved</span>
                                </td>
                                <td class="px-6 py-4">
                                    <div>
                                        <p class="text-white font-medium">Dec 12, 2024</p>
                                        <p class="text-sm text-gray-400">5 days ago</p>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center space-x-2">
                                        <button class="p-2 bg-blue-600 rounded hover:bg-blue-700 transition-colors" title="View Details" onclick="openReviewModal('emma-review-1')">
                                            <i class="fas fa-eye text-white text-sm"></i>
                                        </button>
                                        <button class="p-2 bg-green-600 rounded hover:bg-green-700 transition-colors" title="Respond">
                                            <i class="fas fa-reply text-white text-sm"></i>
                                        </button>
                                        <button class="p-2 bg-purple-600 rounded hover:bg-purple-700 transition-colors" title="Feature">
                                            <i class="fas fa-star text-white text-sm"></i>
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

    <!-- Review Detail Modal -->
    <div id="reviewModal" class="modal fixed inset-0 z-50 hidden">
        <div class="flex items-center justify-center min-h-screen px-4">
            <div class="modal-content rounded-xl p-0 w-full max-w-4xl max-h-screen overflow-y-auto">
                <!-- Modal Header -->
                <div class="p-6 border-b border-gray-700">
                    <div class="flex items-center justify-between">
                        <h3 class="text-xl font-bold text-white">Review Details & Moderation</h3>
                        <button onclick="closeReviewModal()" class="text-gray-400 hover:text-white">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 p-6">
                    <!-- Review Details -->
                    <div class="space-y-6">
                        <div class="response-panel rounded-lg p-4">
                            <h4 class="text-lg font-bold text-white mb-4">Review Information</h4>
                            <div class="space-y-4">
                                <div class="flex items-start space-x-4">
                                    <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=60&h=60&fit=crop" alt="User" class="w-15 h-15 rounded-full object-cover">
                                    <div class="flex-1">
                                        <div class="flex items-center space-x-2 mb-2">
                                            <h5 class="font-bold text-white">Alex Johnson</h5>
                                            <span class="tag-verified">Verified</span>
                                        </div>
                                        <p class="text-gray-400 text-sm">Premium User • Member since 2023</p>
                                        <div class="flex items-center space-x-1 mt-2">
                                            <span class="rating-stars">★★★★★</span>
                                            <span class="text-sm text-gray-400">(5.0)</span>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="bg-gray-800 rounded-lg p-4">
                                    <p class="text-white leading-relaxed">
                                        "Amazing graphics and gameplay! The cyberpunk atmosphere is perfectly captured with stunning visual effects and an immersive soundtrack. The story is engaging and the character development is top-notch. I've been playing for hours and I'm completely hooked. Definitely recommend this to anyone who loves action games with a great narrative."
                                    </p>
                                </div>

                                <div class="grid grid-cols-2 gap-4 text-sm">
                                    <div>
                                        <p class="text-gray-400">Game</p>
                                        <p class="text-white font-medium">Cyber Runner 2077</p>
                                    </div>
                                    <div>
                                        <p class="text-gray-400">Category</p>
                                        <p class="text-white font-medium">Action</p>
                                    </div>
                                    <div>
                                        <p class="text-gray-400">Review Date</p>
                                        <p class="text-white font-medium">Dec 15, 2024</p>
                                    </div>
                                    <div>
                                        <p class="text-gray-400">Play Time</p>
                                        <p class="text-white font-medium">12.5 hours</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="response-panel rounded-lg p-4">
                            <h4 class="text-lg font-bold text-white mb-4">Engagement Metrics</h4>
                            <div class="grid grid-cols-3 gap-4">
                                <div class="text-center">
                                    <p class="text-2xl font-bold likes-count">124</p>
                                    <p class="text-sm text-gray-400">Likes</p>
                                </div>
                                <div class="text-center">
                                    <p class="text-2xl font-bold dislikes-count">3</p>
                                    <p class="text-sm text-gray-400">Dislikes</p>
                                </div>
                                <div class="text-center">
                                    <p class="text-2xl font-bold reports-count">0</p>
                                    <p class="text-sm text-gray-400">Reports</p>
                                </div>
                            </div>
                        </div>

                        <div class="response-panel rounded-lg p-4">
                            <h4 class="text-lg font-bold text-white mb-4">Content Analysis</h4>
                            <div class="space-y-3">
                                <div class="flex items-center justify-between">
                                    <span class="text-gray-300">Sentiment Analysis</span>
                                    <div class="flex items-center space-x-2">
                                        <i class="fas fa-thumbs-up sentiment-positive"></i>
                                        <span class="sentiment-positive font-medium">Positive (92%)</span>
                                    </div>
                                </div>
                                <div class="flex items-center justify-between">
                                    <span class="text-gray-300">Language Detection</span>
                                    <i class="fas fa-check-circle text-green-400"></i>
                                </div>
                                <div class="flex items-center justify-between">
                                    <span class="text-gray-300">Spam Detection</span>
                                    <i class="fas fa-check-circle text-green-400"></i>
                                </div>
                                <div class="flex items-center justify-between">
                                    <span class="text-gray-300">Content Quality</span>
                                    <span class="text-yellow-400 font-medium">High Quality</span>
                                </div>
                                <div class="flex items-center justify-between">
                                    <span class="text-gray-300">Helpfulness Score</span>
                                    <span class="text-green-400 font-medium">8.5/10</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Moderation Actions -->
                    <div class="space-y-6">
                        <div class="response-panel rounded-lg p-4">
                            <h4 class="text-lg font-bold text-white mb-4">Game Information</h4>
                            <div class="flex items-start space-x-3">
                                <img src="https://images.unsplash.com/photo-1552820728-8b83bb6b773f?w=80&h=80&fit=crop" alt="Game" class="w-20 h-20 rounded-lg object-cover">
                                <div>
                                    <h5 class="font-bold text-white text-lg">Cyber Runner 2077</h5>
                                    <p class="text-gray-400">by NeonStudio</p>
                                    <div class="flex items-center space-x-1 mt-1">
                                        <span class="rating-stars">★★★★★</span>
                                        <span class="text-sm text-gray-400">(4.8)</span>
                                    </div>
                                    <p class="text-sm text-gray-400 mt-1">125.4K downloads</p>
                                </div>
                            </div>
                        </div>

                        <div class="response-panel rounded-lg p-4">
                            <h4 class="text-lg font-bold text-white mb-4">Moderation Notes</h4>
                            <textarea class="w-full bg-gray-800 border border-gray-700 rounded-lg px-3 py-2 text-white text-sm h-32 resize-none" 
                                      placeholder="Add your moderation notes here..."></textarea>
                        </div>

                        <div class="response-panel rounded-lg p-4">
                            <h4 class="text-lg font-bold text-white mb-4">Admin Response</h4>
                            <textarea class="w-full bg-gray-800 border border-gray-700 rounded-lg px-3 py-2 text-white text-sm h-24 resize-none" 
                                      placeholder="Write a response to this review (optional)..."></textarea>
                            <div class="flex items-center justify-between mt-3">
                                <div class="flex items-center space-x-2">
                                    <input type="checkbox" id="publicResponse" class="rounded bg-gray-700 border-gray-600">
                                    <label for="publicResponse" class="text-sm text-gray-400">Make response public</label>
                                </div>
                                <button class="btn-secondary px-3 py-1 rounded text-sm">
                                    <i class="fas fa-paper-plane mr-1"></i>Send Response
                                </button>
                            </div>
                        </div>

                        <div class="response-panel rounded-lg p-4">
                            <h4 class="text-lg font-bold text-white mb-4">Review History</h4>
                            <div class="space-y-3 text-sm">
                                <div class="flex items-center justify-between py-2 border-b border-gray-700">
                                    <span class="text-gray-300">Review submitted</span>
                                    <span class="text-gray-400">Dec 15, 2024 14:30</span>
                                </div>
                                <div class="flex items-center justify-between py-2 border-b border-gray-700">
                                    <span class="text-gray-300">Auto-approved</span>
                                    <span class="text-gray-400">Dec 15, 2024 14:31</span>
                                </div>
                                <div class="flex items-center justify-between py-2">
                                    <span class="text-gray-300">Featured by Admin</span>
                                    <span class="text-gray-400">Dec 15, 2024 16:45</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal Footer -->
                <div class="p-6 border-t border-gray-700">
                    <div class="flex justify-between">
                        <div class="flex items-center space-x-3">
                            <button class="btn-secondary px-4 py-2 rounded-lg">
                                <i class="fas fa-user-times mr-2"></i>Contact User
                            </button>
                            <button class="btn-secondary px-4 py-2 rounded-lg">
                                <i class="fas fa-history mr-2"></i>User History
                            </button>
                        </div>
                        <div class="flex items-center space-x-3">
                            <button onclick="closeReviewModal()" class="btn-secondary px-6 py-2 rounded-lg">
                                Cancel
                            </button>
                            <button class="btn-danger px-4 py-2 rounded-lg">
                                <i class="fas fa-ban mr-2"></i>Reject
                            </button>
                            <button class="bg-yellow-600 hover:bg-yellow-700 text-white px-4 py-2 rounded-lg transition-colors">
                                <i class="fas fa-flag mr-2"></i>Flag
                            </button>
                            <button class="bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded-lg transition-colors">
                                <i class="fas fa-star mr-2"></i>Feature
                            </button>
                            <button class="btn-success px-4 py-2 rounded-lg">
                                <i class="fas fa-check mr-2"></i>Approve
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </body>
    </html>
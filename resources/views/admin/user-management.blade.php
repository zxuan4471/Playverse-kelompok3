<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management - GameHub Admin</title>
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
        
        .status-active {
            background: rgba(34, 197, 94, 0.2);
            color: #22c55e;
            border: 1px solid #22c55e;
        }
        
        .status-inactive {
            background: rgba(107, 114, 128, 0.2);
            color: #9ca3af;
            border: 1px solid #6b7280;
        }
        
        .status-suspended {
            background: rgba(239, 68, 68, 0.2);
            color: #ef4444;
            border: 1px solid #ef4444;
        }
        
        .status-pending {
            background: rgba(245, 158, 11, 0.2);
            color: #f59e0b;
            border: 1px solid #f59e0b;
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
    </style>
</head>
<body class="bg-black text-white">

    <!-- Top Navigation Bar -->
    <nav class="admin-topbar fixed top-0 left-0 right-0 z-50 h-16">
        <div class="flex items-center justify-between h-full px-6">
            <!-- Left Section -->
            <div class="flex items-center space-x-4">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-gradient-to-r from-blue-600 to-purple-600 rounded-lg flex items-center justify-center">
                        <i class="fas fa-shield-alt text-white"></i>
                    </div>
                    <div>
                        <h1 class="text-lg font-bold text-white">GameHub Admin</h1>
                        <p class="text-xs text-gray-400">User Management</p>
                    </div>
                </div>
            </div>

            <!-- Center Section -->
            <div class="flex-1 max-w-md mx-8">
                <div class="relative">
                    <input type="text" placeholder="Search users by name, email, or ID..." 
                           class="search-box w-full pl-10 pr-4 py-2 rounded-lg outline-none">
                    <i class="fas fa-search absolute left-3 top-2.5 text-gray-400"></i>
                </div>
            </div>

            <!-- Right Section -->
            <div class="flex items-center space-x-4">
                <div class="relative">
                    <button class="p-2 rounded-lg bg-gray-800 hover:bg-gray-700 transition-colors">
                        <i class="fas fa-bell text-gray-400"></i>
                        <div class="notification-dot"></div>
                    </button>
                </div>
                <div class="flex items-center space-x-3 pl-4 border-l border-gray-700">
                    <div class="text-right">
                        <p class="text-sm font-medium text-white">Admin User</p>
                        <p class="text-xs text-gray-400">Super Admin</p>
                    </div>
                    <div class="w-10 h-10 bg-gradient-to-r from-purple-500 to-blue-500 rounded-full flex items-center justify-center">
                        <span class="text-white font-bold text-sm">AU</span>
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
                    <a href="#" class="nav-item active flex items-center px-4 py-3 text-sm rounded-lg">
                        <i class="fas fa-users w-5"></i>
                        <span class="ml-3">User Management</span>
                        <span class="ml-auto bg-blue-600 text-xs px-2 py-1 rounded-full">1.2K</span>
                    </a>
                    <a href="#" class="nav-item flex items-center px-4 py-3 text-sm rounded-lg">
                        <i class="fas fa-gamepad w-5"></i>
                        <span class="ml-3">Game Management</span>
                        <span class="ml-auto bg-green-600 text-xs px-2 py-1 rounded-full">45</span>
                    </a>
                </div>

                <div class="mb-6">
                    <h3 class="text-xs font-bold text-gray-500 uppercase tracking-wider mb-3">Content</h3>
                    <a href="#" class="nav-item flex items-center px-4 py-3 text-sm rounded-lg">
                        <i class="fas fa-flag w-5"></i>
                        <span class="ml-3">Reports</span>
                        <span class="ml-auto bg-red-600 text-xs px-2 py-1 rounded-full">8</span>
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
                    <li class="text-white font-medium">User Management</li>
                </ol>
            </nav>

            <!-- Page Header -->
            <div class="flex items-center justify-between mb-8">
                <div>
                    <h1 class="text-3xl font-bold text-white">User Management</h1>
                    <p class="text-gray-400 mt-1">Manage all platform users, permissions, and access controls</p>
                </div>
                <div class="flex items-center space-x-3">
                    <button class="btn-secondary px-4 py-2 rounded-lg text-sm font-medium">
                        <i class="fas fa-download mr-2"></i>Export Users
                    </button>
                    <button class="btn-secondary px-4 py-2 rounded-lg text-sm font-medium">
                        <i class="fas fa-upload mr-2"></i>Import Users
                    </button>
                    <button class="btn-primary px-4 py-2 rounded-lg text-sm font-medium" onclick="openAddUserModal()">
                        <i class="fas fa-user-plus mr-2"></i>Add New User
                    </button>
                </div>
            </div>

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                <div class="admin-card rounded-xl p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-400 text-sm">Total Users</p>
                            <p class="text-2xl font-bold text-white">24,531</p>
                        </div>
                        <div class="bg-blue-600 p-3 rounded-full">
                            <i class="fas fa-users text-white"></i>
                        </div>
                    </div>
                </div>
                <div class="admin-card rounded-xl p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-400 text-sm">Active Users</p>
                            <p class="text-2xl font-bold text-white">18,432</p>
                        </div>
                        <div class="bg-green-600 p-3 rounded-full">
                            <i class="fas fa-user-check text-white"></i>
                        </div>
                    </div>
                </div>
                <div class="admin-card rounded-xl p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-400 text-sm">Suspended</p>
                            <p class="text-2xl font-bold text-white">1,178</p>
                        </div>
                        <div class="bg-red-600 p-3 rounded-full">
                            <i class="fas fa-user-slash text-white"></i>
                        </div>
                    </div>
                </div>
                <div class="admin-card rounded-xl p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-400 text-sm">New Today</p>
                            <p class="text-2xl font-bold text-white">47</p>
                        </div>
                        <div class="bg-purple-600 p-3 rounded-full">
                            <i class="fas fa-user-plus text-white"></i>
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
                
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-4">
                    <div>
                        <label class="block text-gray-400 text-sm mb-2">Status</label>
                        <select class="w-full bg-gray-800 border border-gray-700 rounded-lg px-3 py-2 text-white text-sm">
                            <option>All Status</option>
                            <option>Active</option>
                            <option>Inactive</option>
                            <option>Suspended</option>
                            <option>Pending</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-gray-400 text-sm mb-2">Role</label>
                        <select class="w-full bg-gray-800 border border-gray-700 rounded-lg px-3 py-2 text-white text-sm">
                            <option>All Roles</option>
                            <option>User</option>
                            <option>Developer</option>
                            <option>Moderator</option>
                            <option>Admin</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-gray-400 text-sm mb-2">Registration Date</label>
                        <input type="date" class="w-full bg-gray-800 border border-gray-700 rounded-lg px-3 py-2 text-white text-sm">
                    </div>
                    <div>
                        <label class="block text-gray-400 text-sm mb-2">Last Active</label>
                        <select class="w-full bg-gray-800 border border-gray-700 rounded-lg px-3 py-2 text-white text-sm">
                            <option>Any Time</option>
                            <option>Last 24 hours</option>
                            <option>Last 7 days</option>
                            <option>Last 30 days</option>
                            <option>Last 90 days</option>
                        </select>
                    </div>
                </div>

                <!-- Quick Filter Pills -->
                <div class="filter-pills mb-4">
                    <span class="filter-pill active">All Users</span>
                    <span class="filter-pill">Active Today</span>
                    <span class="filter-pill">Developers</span>
                    <span class="filter-pill">Flagged Users</span>
                    <span class="filter-pill">High Revenue</span>
                    <span class="filter-pill">Recent Signups</span>
                </div>
            </div>

            <!-- Users Table -->
            <div class="admin-card rounded-xl p-6">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-xl font-bold text-white">Users List</h3>
                    <div class="flex items-center space-x-3">
                        <span class="text-gray-400 text-sm">Showing 1-10 of 24,531</span>
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
                                    Role <i class="fas fa-sort ml-1 text-gray-500"></i>
                                </th>
                                <th class="px-6 py-4 text-left cursor-pointer hover:bg-gray-800">
                                    Status <i class="fas fa-sort ml-1 text-gray-500"></i>
                                </th>
                                <th class="px-6 py-4 text-left cursor-pointer hover:bg-gray-800">
                                    Games <i class="fas fa-sort ml-1 text-gray-500"></i>
                                </th>
                                <th class="px-6 py-4 text-left cursor-pointer hover:bg-gray-800">
                                    Revenue <i class="fas fa-sort ml-1 text-gray-500"></i>
                                </th>
                                <th class="px-6 py-4 text-left cursor-pointer hover:bg-gray-800">
                                    Last Active <i class="fas fa-sort ml-1 text-gray-500"></i>
                                </th>
                                <th class="px-6 py-4 text-left">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="hover:bg-gray-900 cursor-pointer">
                                <td class="px-6 py-4">
                                    <input type="checkbox" class="rounded bg-gray-700 border-gray-600">
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center space-x-3">
                                        <div class="w-10 h-10 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full flex items-center justify-center">
                                            <span class="text-white font-bold text-sm">JD</span>
                                        </div>
                                        <div>
                                            <p class="font-medium text-white">John Doe</p>
                                            <p class="text-gray-400 text-sm">john.doe@email.com</p>
                                            <p class="text-gray-500 text-xs">ID: #12345</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="bg-purple-600 text-white px-2 py-1 rounded text-xs">Developer</span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="status-badge status-active">Active</span>
                                </td>
                                <td class="px-6 py-4 text-white">3</td>
                                <td class="px-6 py-4 text-white">$2,450</td>
                                <td class="px-6 py-4 text-gray-400">2 hours ago</td>
                                <td class="px-6 py-4">
                                    <div class="flex space-x-1">
                                        <button class="bg-blue-600 hover:bg-blue-700 px-2 py-1 rounded text-xs" title="View Details">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="bg-gray-600 hover:bg-gray-700 px-2 py-1 rounded text-xs" title="Edit User">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="bg-yellow-600 hover:bg-yellow-700 px-2 py-1 rounded text-xs" title="Send Message">
                                            <i class="fas fa-envelope"></i>
                                        </button>
                                        <button class="bg-red-600 hover:bg-red-700 px-2 py-1 rounded text-xs" title="Suspend User">
                                            <i class="fas fa-ban"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr class="hover:bg-gray-900 cursor-pointer">
                                <td class="px-6 py-4">
                                    <input type="checkbox" class="rounded bg-gray-700 border-gray-600">
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center space-x-3">
                                        <div class="w-10 h-10 bg-gradient-to-r from-blue-500 to-cyan-500 rounded-full flex items-center justify-center">
                                            <span class="text-white font-bold text-sm">AS</span>
                                        </div>
                                        <div>
                                            <p class="font-medium text-white">Alice Smith</p>
                                            <p class="text-gray-400 text-sm">alice.smith@email.com</p>
                                            <p class="text-gray-500 text-xs">ID: #12346</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="bg-green-600 text-white px-2 py-1 rounded text-xs">User</span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="status-badge status-active">Active</span>
                                </td>
                                <td class="px-6 py-4 text-white">0</td>
                                <td class="px-6 py-4 text-white">$0</td>
                                <td class="px-6 py-4 text-gray-400">5 minutes ago</td>
                                <td class="px-6 py-4">
                                    <div class="flex space-x-1">
                                        <button class="bg-blue-600 hover:bg-blue-700 px-2 py-1 rounded text-xs">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="bg-gray-600 hover:bg-gray-700 px-2 py-1 rounded text-xs">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="bg-yellow-600 hover:bg-yellow-700 px-2 py-1 rounded text-xs">
                                            <i class="fas fa-envelope"></i>
                                        </button>
                                        <button class="bg-red-600 hover:bg-red-700 px-2 py-1 rounded text-xs">
                                            <i class="fas fa-ban"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr class="hover:bg-gray-900 cursor-pointer">
                                <td class="px-6 py-4">
                                    <input type="checkbox" class="rounded bg-gray-700 border-gray-600">
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center space-x-3">
                                        <div class="w-10 h-10 bg-gradient-to-r from-red-500 to-orange-500 rounded-full flex items-center justify-center">
                                            <span class="text-white font-bold text-sm">BJ</span>
                                        </div>
                                        <div>
                                            <p class="font-medium text-white">Bob Johnson</p>
                                            <p class="text-gray-400 text-sm">bob.johnson@email.com</p>
                                            <p class="text-gray-500 text-xs">ID: #12347</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="bg-orange-600 text-white px-2 py-1 rounded text-xs">Moderator</span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="status-badge status-suspended">Suspended</span>
                                </td>
                                <td class="px-6 py-4 text-white">1</td>
                                <td class="px-6 py-4 text-white">$340</td>
                                <td class="px-6 py-4 text-gray-400">2 days ago</td>
                                <td class="px-6 py-4">
                                    <div class="flex space-x-1">
                                        <button class="bg-blue-600 hover:bg-blue-700 px-2 py-1 rounded text-xs">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="bg-green-600 hover:bg-green-700 px-2 py-1 rounded text-xs" title="Unsuspend">
                                            <i class="fas fa-user-check"></i>
                                        </button>
                                        <button class="bg-yellow-600 hover:bg-yellow-700 px-2 py-1 rounded text-xs">
                                            <i class="fas fa-envelope"></i>
                                        </button>
                                        <button class="bg-red-600 hover:bg-red-700 px-2 py-1 rounded text-xs" title="Permanent Ban">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr class="hover:bg-gray-900 cursor-pointer">
                                <td class="px-6 py-4">
                                    <input type="checkbox" class="rounded bg-gray-700 border-gray-600">
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center space-x-3">
                                        <div class="w-10 h-10 bg-gradient-to-r from-green-500 to-teal-500 rounded-full flex items-center justify-center">
                                            <span class="text-white font-bold text-sm">MK</span>
                                        </div>
                                        <div>
                                            <p class="font-medium text-white">Mike Chen</p>
                                            <p class="text-gray-400 text-sm">mike.chen@email.com</p>
                                            <p class="text-gray-500 text-xs">ID: #12348</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="bg-purple-600 text-white px-2 py-1 rounded text-xs">Developer</span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="status-badge status-active">Active</span>
                                </td>
                                <td class="px-6 py-4 text-white">7</td>
                                <td class="px-6 py-4 text-white">$5,670</td>
                                <td class="px-6 py-4 text-gray-400">1 hour ago</td>
                                <td class="px-6 py-4">
                                    <div class="flex space-x-1">
                                        <button class="bg-blue-600 hover:bg-blue-700 px-2 py-1 rounded text-xs">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="bg-gray-600 hover:bg-gray-700 px-2 py-1 rounded text-xs">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="bg-yellow-600 hover:bg-yellow-700 px-2 py-1 rounded text-xs">
                                            <i class="fas fa-envelope"></i>
                                        </button>
                                        <button class="bg-red-600 hover:bg-red-700 px-2 py-1 rounded text-xs">
                                            <i class="fas fa-ban"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr class="hover:bg-gray-900 cursor-pointer">
                                <td class="px-6 py-4">
                                    <input type="checkbox" class="rounded bg-gray-700 border-gray-600">
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center space-x-3">
                                        <div class="w-10 h-10 bg-gradient-to-r from-yellow-500 to-orange-500 rounded-full flex items-center justify-center">
                                            <span class="text-white font-bold text-sm">SK</span>
                                        </div>
                                        <div>
                                            <p class="font-medium text-white">Sarah Kim</p>
                                            <p class="text-gray-400 text-sm">sarah.kim@email.com</p>
                                            <p class="text-gray-500 text-xs">ID: #12349</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="bg-green-600 text-white px-2 py-1 rounded text-xs">User</span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="status-badge status-pending">Pending Verification</span>
                                </td>
                                <td class="px-6 py-4 text-white">0</td>
                                <td class="px-6 py-4 text-white">$0</td>
                                <td class="px-6 py-4 text-gray-400">1 day ago</td>
                                <td class="px-6 py-4">
                                    <div class="flex space-x-1">
                                        <button class="bg-blue-600 hover:bg-blue-700 px-2 py-1 rounded text-xs">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="bg-green-600 hover:bg-green-700 px-2 py-1 rounded text-xs" title="Verify">
                                            <i class="fas fa-check"></i>
                                        </button>
                                        <button class="bg-yellow-600 hover:bg-yellow-700 px-2 py-1 rounded text-xs">
                                            <i class="fas fa-envelope"></i>
                                        </button>
                                        <button class="bg-red-600 hover:bg-red-700 px-2 py-1 rounded text-xs">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Bulk Actions -->
                <div class="mt-6 p-4 bg-gray-900 rounded-lg border border-gray-800">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-4">
                            <span class="text-gray-400 text-sm">Bulk Actions:</span>
                            <select class="bg-gray-800 border border-gray-700 rounded px-3 py-1 text-white text-sm">
                                <option>Choose Action</option>
                                <option>Activate Selected</option>
                                <option>Suspend Selected</option>
                                <option>Delete Selected</option>
                                <option>Change Role</option>
                                <option>Send Message</option>
                            </select>
                            <button class="btn-primary px-4 py-1 rounded text-sm">Apply</button>
                        </div>
                        <span class="text-gray-400 text-sm">0 users selected</span>
                    </div>
                </div>
            </div>

            <!-- Recent User Activity -->
            <div class="admin-card rounded-xl p-6 mt-6">
                <h3 class="text-xl font-bold text-white mb-6">Recent User Activity</h3>
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <div>
                        <h4 class="font-medium text-white mb-4">Latest Registrations</h4>
                        <div class="space-y-3">
                            <div class="flex items-center justify-between p-3 bg-gray-900 rounded-lg">
                                <div class="flex items-center space-x-3">
                                    <div class="w-8 h-8 bg-gradient-to-r from-pink-500 to-purple-500 rounded-full flex items-center justify-center">
                                        <i class="fas fa-user text-white text-xs"></i>
                                    </div>
                                    <div>
                                        <p class="text-white text-sm font-medium">Emma Wilson</p>
                                        <p class="text-gray-400 text-xs">emma.wilson@email.com</p>
                                    </div>
                                </div>
                                <span class="text-gray-400 text-xs">5 min ago</span>
                            </div>
                            <div class="flex items-center justify-between p-3 bg-gray-900 rounded-lg">
                                <div class="flex items-center space-x-3">
                                    <div class="w-8 h-8 bg-gradient-to-r from-cyan-500 to-blue-500 rounded-full flex items-center justify-center">
                                        <i class="fas fa-user text-white text-xs"></i>
                                    </div>
                                    <div>
                                        <p class="text-white text-sm font-medium">David Park</p>
                                        <p class="text-gray-400 text-xs">david.park@email.com</p>
                                    </div>
                                </div>
                                <span class="text-gray-400 text-xs">12 min ago</span>
                            </div>
                        </div>
                    </div>
                    
                    <div>
                        <h4 class="font-medium text-white mb-4">Flagged Activities</h4>
                        <div class="space-y-3">
                            <div class="flex items-center justify-between p-3 bg-gray-900 rounded-lg border-l-4 border-red-500">
                                <div>
                                    <p class="text-white text-sm font-medium">Multiple Account Creation</p>
                                    <p class="text-gray-400 text-xs">User: spam_user_123</p>
                                </div>
                                <button class="bg-red-600 hover:bg-red-700 px-3 py-1 rounded text-xs">
                                    Review
                                </button>
                            </div>
                            <div class="flex items-center justify-between p-3 bg-gray-900 rounded-lg border-l-4 border-yellow-500">
                                <div>
                                    <p class="text-white text-sm font-medium">Unusual Login Pattern</p>
                                    <p class="text-gray-400 text-xs">User: mike.chen@email.com</p>
                                </div>
                                <button class="bg-yellow-600 hover:bg-yellow-700 px-3 py-1 rounded text-xs">
                                    Check
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Add User Modal -->
    <div id="addUserModal" class="modal fixed inset-0 z-50 hidden">
        <div class="flex items-center justify-center min-h-screen p-4">
            <div class="modal-content rounded-xl p-6 w-full max-w-md">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-xl font-bold text-white">Add New User</h3>
                    <button onclick="closeAddUserModal()" class="text-gray-400 hover:text-white">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                
                <form class="space-y-4">
                    <div>
                        <label class="block text-gray-400 text-sm mb-2">Full Name</label>
                        <input type="text" class="w-full bg-gray-800 border border-gray-700 rounded-lg px-3 py-2 text-white">
                    </div>
                    <div>
                        <label class="block text-gray-400 text-sm mb-2">Email Address</label>
                        <input type="email" class="w-full bg-gray-800 border border-gray-700 rounded-lg px-3 py-2 text-white">
                    </div>
                    <div>
                        <label class="block text-gray-400 text-sm mb-2">Role</label>
                        <select class="w-full bg-gray-800 border border-gray-700 rounded-lg px-3 py-2 text-white">
                            <option>User</option>
                            <option>Developer</option>
                            <option>Moderator</option>
                            <option>Admin</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-gray-400 text-sm mb-2">Initial Status</label>
                        <select class="w-full bg-gray-800 border border-gray-700 rounded-lg px-3 py-2 text-white">
                            <option>Active</option>
                            <option>Pending Verification</option>
                            <option>Inactive</option>
                        </select>
                    </div>
                    
                    <div class="flex space-x-3 mt-6">
                        <button type="button" onclick="closeAddUserModal()" class="btn-secondary flex-1 py-2 px-4 rounded-lg">
                            Cancel
                        </button>
                        <button type="submit" class="btn-primary flex-1 py-2 px-4 rounded-lg">
                            Add User
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Modal functionality
        function openAddUserModal() {
            document.getElementById('addUserModal').classList.remove('hidden');
        }
        
        function closeAddUserModal() {
            document.getElementById('addUserModal').classList.add('hidden');
        }
        
        function resetFilters() {
            // Reset all filter controls
            document.querySelectorAll('select').forEach(select => {
                select.selectedIndex = 0;
            });
            document.querySelectorAll('input[type="date"]').forEach(input => {
                input.value = '';
            });
            document.querySelectorAll('.filter-pill').forEach(pill => {
                pill.classList.remove('active');
            });
            document.querySelector('.filter-pill').classList.add('active');
        }

        // Interactive functionality
        document.addEventListener('DOMContentLoaded', function() {
            // Sidebar navigation
            const navItems = document.querySelectorAll('.nav-item');
            navItems.forEach(item => {
                item.addEventListener('click', function(e) {
                    e.preventDefault();
                    navItems.forEach(nav => nav.classList.remove('active'));
                    this.classList.add('active');
                });
            });

            // Filter pills
            const filterPills = document.querySelectorAll('.filter-pill');
            filterPills.forEach(pill => {
                pill.addEventListener('click', function() {
                    filterPills.forEach(p => p.classList.remove('active'));
                    this.classList.add('active');
                });
            });

            // Table row selection
            const checkboxes = document.querySelectorAll('tbody input[type="checkbox"]');
            const selectAllCheckbox = document.querySelector('thead input[type="checkbox"]');
            
            selectAllCheckbox.addEventListener('change', function() {
                checkboxes.forEach(checkbox => {
                    checkbox.checked = this.checked;
                });
                updateBulkActionsCounter();
            });

            checkboxes.forEach(checkbox => {
                checkbox.addEventListener('change', updateBulkActionsCounter);
            });

            function updateBulkActionsCounter() {
                const selectedCount = document.querySelectorAll('tbody input[type="checkbox"]:checked').length;
                const counterElement = document.querySelector('.admin-card:last-child span');
                if (counterElement) {
                    counterElement.textContent = `${selectedCount} users selected`;
                }
            }

            // Search functionality
            const searchInput = document.querySelector('.search-box');
            let searchTimeout;
            searchInput.addEventListener('input', function() {
                clearTimeout(searchTimeout);
                searchTimeout = setTimeout(() => {
                    console.log('Searching for:', this.value);
                    // Add actual search logic here
                }, 500);
            });

            // Table sorting
            const sortableHeaders = document.querySelectorAll('th[class*="cursor-pointer"]');
            sortableHeaders.forEach(header => {
                header.addEventListener('click', function() {
                    const icon = this.querySelector('i');
                    // Reset all other sort icons
                    sortableHeaders.forEach(h => {
                        const otherIcon = h.querySelector('i');
                        otherIcon.className = 'fas fa-sort ml-1 text-gray-500';
                    });
                    
                    // Toggle current sort
                    if (icon.classList.contains('fa-sort')) {
                        icon.className = 'fas fa-sort-up ml-1 text-blue-400';
                    } else if (icon.classList.contains('fa-sort-up')) {
                        icon.className = 'fas fa-sort-down ml-1 text-blue-400';
                    } else {
                        icon.className = 'fas fa-sort-up ml-1 text-blue-400';
                    }
                });
            });
        });
    </script>
</body>
</html>
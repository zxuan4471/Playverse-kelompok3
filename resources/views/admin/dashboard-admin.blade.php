<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GameHub - Admin Dashboard</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style-admin.css') }}">
</head>
@include('admin.layouts.navbar-admin')
@include('admin.layouts.sidebar-admin')
<body class="bg-black text-white">
    <!-- Main Content -->
    <main class="ml-64 mt-16 min-h-screen">
        <div class="p-6">
            <!-- Page Header -->
            <div class="flex items-center justify-between mb-8">
                <div>
                    <h1 class="text-3xl font-bold text-white">Admin Dashboard</h1>
                    <p class="text-gray-400 mt-1">Welcome back, manage your platform from here</p>
                </div>
                <div class="flex items-center space-x-3">
                    <button class="btn-secondary px-4 py-2 rounded-lg text-sm font-medium">
                        <i class="fas fa-download mr-2"></i>Export Data
                    </button>
                    <button class="btn-primary px-4 py-2 rounded-lg text-sm font-medium text-white">
                        <i class="fas fa-plus mr-2"></i>Add New
                    </button>
                </div>
            </div>

            <!-- Stats Overview -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <div class="stat-card p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-400 text-sm font-medium">Total Users</p>
                            <p class="text-3xl font-bold text-white mt-2">24,531</p>
                            <div class="flex items-center mt-2 text-sm">
                                <span class="text-green-400">+12.5%</span>
                                <span class="text-gray-500 ml-1">vs last month</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="stat-card p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-400 text-sm font-medium">Active Games</p>
                            <p class="text-3xl font-bold text-white mt-2">1,247</p>
                            <div class="flex items-center mt-2 text-sm">
                                <span class="text-green-400">+8.2%</span>
                                <span class="text-gray-500 ml-1">vs last month</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="stat-card p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-400 text-sm font-medium">Revenue</p>
                            <p class="text-3xl font-bold text-white mt-2">$89,247</p>
                            <div class="flex items-center mt-2 text-sm">
                                <span class="text-red-400">-2.1%</span>
                                <span class="text-gray-500 ml-1">vs last month</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="stat-card p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-400 text-sm font-medium">Pending Reports</p>
                            <p class="text-3xl font-bold text-white mt-2">23</p>
                            <div class="flex items-center mt-2 text-sm">
                                <span class="text-red-400">+15</span>
                                <span class="text-gray-500 ml-1">today</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Actions & Recent Activity -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
                <!-- Quick Actions -->
                <div class="admin-card rounded-xl p-6">
                    <h3 class="text-lg font-bold text-white mb-4">Quick Actions</h3>
                    <div class="space-y-3">
                        <button class="w-full btn-primary py-2 px-4 rounded-lg text-left">
                            <i class="fas fa-user-plus mr-3"></i>Add New User
                        </button>
                        <button class="w-full btn-secondary py-2 px-4 rounded-lg text-left">
                            <i class="fas fa-gamepad mr-3"></i>Review Game Submission
                        </button>
                        <button class="w-full btn-secondary py-2 px-4 rounded-lg text-left">
                            <i class="fas fa-chart-bar mr-3"></i>Generate Report
                        </button>
                        <button class="w-full btn-danger py-2 px-4 rounded-lg text-left">
                            <i class="fas fa-ban mr-3"></i>Emergency Ban
                        </button>
                    </div>
                </div>

                <!-- System Health -->
                <div class="admin-card rounded-xl p-6">
                    <h3 class="text-lg font-bold text-white mb-4">System Health</h3>
                    <div class="space-y-4">
                        <div>
                            <div class="flex justify-between text-sm mb-1">
                                <span class="text-gray-400">CPU Usage</span>
                                <span class="text-white">45%</span>
                            </div>
                            <div class="w-full bg-gray-700 rounded-full h-2">
                                <div class="bg-blue-500 h-2 rounded-full" style="width: 45%"></div>
                            </div>
                        </div>
                        <div>
                            <div class="flex justify-between text-sm mb-1">
                                <span class="text-gray-400">Memory</span>
                                <span class="text-white">72%</span>
                            </div>
                            <div class="w-full bg-gray-700 rounded-full h-2">
                                <div class="bg-green-500 h-2 rounded-full" style="width: 72%"></div>
                            </div>
                        </div>
                        <div>
                            <div class="flex justify-between text-sm mb-1">
                                <span class="text-gray-400">Storage</span>
                                <span class="text-white">89%</span>
                            </div>
                            <div class="w-full bg-gray-700 rounded-full h-2">
                                <div class="bg-yellow-500 h-2 rounded-full" style="width: 89%"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recent Activity -->
                <div class="admin-card rounded-xl p-6">
                    <h3 class="text-lg font-bold text-white mb-4">Recent Activity</h3>
                    <div class="space-y-3">
                        <div class="flex items-center space-x-3 text-sm">
                            <div class="w-2 h-2 bg-green-400 rounded-full"></div>
                            <span class="text-gray-300">New user registered</span>
                            <span class="text-gray-500 text-xs ml-auto">2m ago</span>
                        </div>
                        <div class="flex items-center space-x-3 text-sm">
                            <div class="w-2 h-2 bg-blue-400 rounded-full"></div>
                            <span class="text-gray-300">Game approved</span>
                            <span class="text-gray-500 text-xs ml-auto">5m ago</span>
                        </div>
                        <div class="flex items-center space-x-3 text-sm">
                            <div class="w-2 h-2 bg-red-400 rounded-full"></div>
                            <span class="text-gray-300">Report submitted</span>
                            <span class="text-gray-500 text-xs ml-auto">8m ago</span>
                        </div>
                        <div class="flex items-center space-x-3 text-sm">
                            <div class="w-2 h-2 bg-yellow-400 rounded-full"></div>
                            <span class="text-gray-300">Payment processed</span>
                            <span class="text-gray-500 text-xs ml-auto">12m ago</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Data Tables -->
            <div class="grid grid-cols-1 xl:grid-cols-2 gap-6">
                <!-- Recent Users -->
                <div class="admin-card rounded-xl p-6">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-bold text-white">Recent Users</h3>
                        <button class="text-blue-400 hover:text-blue-300 text-sm">View All</button>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="table-dark w-full rounded-lg overflow-hidden">
                            <thead>
                                <tr>
                                    <th class="px-4 py-3 text-left">User</th>
                                    <th class="px-4 py-3 text-left">Status</th>
                                    <th class="px-4 py-3 text-left">Joined</th>
                                    <th class="px-4 py-3 text-left">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="px-4 py-3">
                                        <div class="flex items-center space-x-3">
                                            <div class="w-8 h-8 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full flex items-center justify-center">
                                                <span class="text-white text-xs font-bold">JD</span>
                                            </div>
                                            <div>
                                                <p class="font-medium">John Doe</p>
                                                <p class="text-gray-400 text-xs">john@example.com</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-4 py-3">
                                        <span class="status-badge status-active">Active</span>
                                    </td>
                                    <td class="px-4 py-3 text-gray-400">Today</td>
                                    <td class="px-4 py-3">
                                        <button class="text-blue-400 hover:text-blue-300 text-sm">View</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-4 py-3">
                                        <div class="flex items-center space-x-3">
                                            <div class="w-8 h-8 bg-gradient-to-r from-blue-500 to-cyan-500 rounded-full flex items-center justify-center">
                                                <span class="text-white text-xs font-bold">AS</span>
                                            </div>
                                            <div>
                                                <p class="font-medium">Alice Smith</p>
                                                <p class="text-gray-400 text-xs">alice@example.com</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-4 py-3">
                                        <span class="status-badge status-pending">Pending</span>
                                    </td>
                                    <td class="px-4 py-3 text-gray-400">Yesterday</td>
                                    <td class="px-4 py-3">
                                        <button class="text-blue-400 hover:text-blue-300 text-sm">View</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-4 py-3">
                                        <div class="flex items-center space-x-3">
                                            <div class="w-8 h-8 bg-gradient-to-r from-green-500 to-teal-500 rounded-full flex items-center justify-center">
                                                <span class="text-white text-xs font-bold">BJ</span>
                                            </div>
                                            <div>
                                                <p class="font-medium">Bob Johnson</p>
                                                <p class="text-gray-400 text-xs">bob@example.com</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-4 py-3">
                                        <span class="status-badge status-inactive">Suspended</span>
                                    </td>
                                    <td class="px-4 py-3 text-gray-400">2 days ago</td>
                                    <td class="px-4 py-3">
                                        <button class="text-blue-400 hover:text-blue-300 text-sm">View</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Recent Reports -->
                <div class="admin-card rounded-xl p-6">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-bold text-white">Pending Reports</h3>
                        <button class="text-blue-400 hover:text-blue-300 text-sm">View All</button>
                    </div>
                    <div class="space-y-4">
                        <div class="flex items-center justify-between p-3 bg-gray-900 rounded-lg border border-gray-800">
                            <div>
                                <p class="font-medium text-white">Inappropriate Content</p>
                                <p class="text-gray-400 text-sm">Game: "Space Shooter Pro"</p>
                                <p class="text-gray-500 text-xs">Reported 2 hours ago</p>
                            </div>
                            <div class="flex space-x-2">
                                <button class="bg-red-600 hover:bg-red-700 px-3 py-1 rounded text-xs">
                                    <i class="fas fa-times mr-1"></i>Reject
                                </button>
                                <button class="bg-green-600 hover:bg-green-700 px-3 py-1 rounded text-xs">
                                    <i class="fas fa-check mr-1"></i>Review
                                </button>
                            </div>
                        </div>

                        <div class="flex items-center justify-between p-3 bg-gray-900 rounded-lg border border-gray-800">
                            <div>
                                <p class="font-medium text-white">Spam Activity</p>
                                <p class="text-gray-400 text-sm">User: "spammer123"</p>
                                <p class="text-gray-500 text-xs">Reported 4 hours ago</p>
                            </div>
                            <div class="flex space-x-2">
                                <button class="bg-red-600 hover:bg-red-700 px-3 py-1 rounded text-xs">
                                    <i class="fas fa-ban mr-1"></i>Ban
                                </button>
                                <button class="bg-yellow-600 hover:bg-yellow-700 px-3 py-1 rounded text-xs">
                                    <i class="fas fa-eye mr-1"></i>Investigate
                                </button>
                            </div>
                        </div>

                        <div class="flex items-center justify-between p-3 bg-gray-900 rounded-lg border border-gray-800">
                            <div>
                                <p class="font-medium text-white">Copyright Violation</p>
                                <p class="text-gray-400 text-sm">Game: "Clone Adventure"</p>
                                <p class="text-gray-500 text-xs">Reported 6 hours ago</p>
                            </div>
                            <div class="flex space-x-2">
                                <button class="bg-red-600 hover:bg-red-700 px-3 py-1 rounded text-xs">
                                    <i class="fas fa-trash mr-1"></i>Remove
                                </button>
                                <button class="bg-blue-600 hover:bg-blue-700 px-3 py-1 rounded text-xs">
                                    <i class="fas fa-gavel mr-1"></i>Review
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Management Tables -->
            <div class="space-y-6">
                <!-- Game Management -->
                <div class="admin-card rounded-xl p-6">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-xl font-bold text-white">Game Management</h3>
                        <div class="flex items-center space-x-3">
                            <select class="bg-gray-800 border border-gray-700 rounded-lg px-3 py-2 text-sm text-white">
                                <option>All Status</option>
                                <option>Active</option>
                                <option>Pending</option>
                                <option>Rejected</option>
                            </select>
                            <button class="btn-primary px-4 py-2 rounded-lg text-sm">
                                <i class="fas fa-filter mr-2"></i>Filter
                            </button>
                        </div>
                    </div>
                    
                    <div class="overflow-x-auto">
                        <table class="table-dark w-full rounded-lg overflow-hidden">
                            <thead>
                                <tr>
                                    <th class="px-6 py-4 text-left">Game</th>
                                    <th class="px-6 py-4 text-left">Developer</th>
                                    <th class="px-6 py-4 text-left">Status</th>
                                    <th class="px-6 py-4 text-left">Downloads</th>
                                    <th class="px-6 py-4 text-left">Revenue</th>
                                    <th class="px-6 py-4 text-left">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center space-x-3">
                                            <div class="w-12 h-12 bg-gradient-to-r from-purple-500 to-pink-500 rounded-lg flex items-center justify-center">
                                                <i class="fas fa-rocket text-white"></i>
                                            </div>
                                            <div>
                                                <p class="font-medium text-white">Space Odyssey</p>
                                                <p class="text-gray-400 text-sm">Action • Adventure</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <p class="text-white">StarDev Studio</p>
                                        <p class="text-gray-400 text-sm">Verified</p>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="status-badge status-active">Published</span>
                                    </td>
                                    <td class="px-6 py-4 text-white">12.5K</td>
                                    <td class="px-6 py-4 text-white">$2,340</td>
                                    <td class="px-6 py-4">
                                        <div class="flex space-x-2">
                                            <button class="bg-blue-600 hover:bg-blue-700 px-3 py-1 rounded text-xs">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="bg-gray-600 hover:bg-gray-700 px-3 py-1 rounded text-xs">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="bg-red-600 hover:bg-red-700 px-3 py-1 rounded text-xs">
                                                <i class="fas fa-ban"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center space-x-3">
                                            <div class="w-12 h-12 bg-gradient-to-r from-green-500 to-teal-500 rounded-lg flex items-center justify-center">
                                                <i class="fas fa-leaf text-white"></i>
                                            </div>
                                            <div>
                                                <p class="font-medium text-white">Forest Guardian</p>
                                                <p class="text-gray-400 text-sm">RPG • Indie</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <p class="text-white">Nature Games</p>
                                        <p class="text-gray-400 text-sm">New Developer</p>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="status-badge status-pending">Under Review</span>
                                    </td>
                                    <td class="px-6 py-4 text-white">-</td>
                                    <td class="px-6 py-4 text-white">-</td>
                                    <td class="px-6 py-4">
                                        <div class="flex space-x-2">
                                            <button class="bg-green-600 hover:bg-green-700 px-3 py-1 rounded text-xs">
                                                <i class="fas fa-check"></i>
                                            </button>
                                            <button class="bg-red-600 hover:bg-red-700 px-3 py-1 rounded text-xs">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center space-x-3">
                                            <div class="w-12 h-12 bg-gradient-to-r from-red-500 to-orange-500 rounded-lg flex items-center justify-center">
                                                <i class="fas fa-fire text-white"></i>
                                            </div>
                                            <div>
                                                <p class="font-medium text-white">Inferno Quest</p>
                                                <p class="text-gray-400 text-sm">Action • Platformer</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <p class="text-white">Fire Studios</p>
                                        <p class="text-gray-400 text-sm">Verified</p>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="status-badge status-inactive">Suspended</span>
                                    </td>
                                    <td class="px-6 py-4 text-white">8.7K</td>
                                    <td class="px-6 py-4 text-white">$1,520</td>
                                    <td class="px-6 py-4">
                                        <div class="flex space-x-2">
                                            <button class="bg-yellow-600 hover:bg-yellow-700 px-3 py-1 rounded text-xs">
                                                <i class="fas fa-play"></i>
                                            </button>
                                            <button class="bg-blue-600 hover:bg-blue-700 px-3 py-1 rounded text-xs">
                                                <i class="fas fa-info"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- User Analytics -->
                <div class="admin-card rounded-xl p-6">
                    <h3 class="text-lg font-bold text-white mb-4">User Analytics</h3>
                    <div class="space-y-6">
                        <!-- User Growth Chart Placeholder -->
                        <div class="bg-gray-900 rounded-lg p-4 border border-gray-800">
                            <div class="flex items-center justify-between mb-3">
                                <h4 class="font-medium text-white">User Growth (30 days)</h4>
                                <span class="text-green-400 text-sm">+15.3%</span>
                            </div>
                            <div class="h-32 flex items-end justify-between space-x-1">
                                <div class="bg-blue-500 w-6 rounded-t" style="height: 40%"></div>
                                <div class="bg-blue-500 w-6 rounded-t" style="height: 60%"></div>
                                <div class="bg-blue-500 w-6 rounded-t" style="height: 45%"></div>
                                <div class="bg-blue-500 w-6 rounded-t" style="height: 80%"></div>
                                <div class="bg-blue-500 w-6 rounded-t" style="height: 70%"></div>
                                <div class="bg-blue-500 w-6 rounded-t" style="height: 90%"></div>
                                <div class="bg-blue-500 w-6 rounded-t" style="height: 100%"></div>
                            </div>
                        </div>

                        <!-- User Distribution -->
                        <div class="space-y-3">
                            <h4 class="font-medium text-white">User Distribution</h4>
                            <div class="space-y-2">
                                <div class="flex items-center justify-between">
                                    <span class="text-gray-400 text-sm">Active Users</span>
                                    <span class="text-white">18,432 (75%)</span>
                                </div>
                                <div class="w-full bg-gray-700 rounded-full h-2">
                                    <div class="bg-green-500 h-2 rounded-full" style="width: 75%"></div>
                                </div>
                            </div>
                            <div class="space-y-2">
                                <div class="flex items-center justify-between">
                                    <span class="text-gray-400 text-sm">Inactive Users</span>
                                    <span class="text-white">4,921 (20%)</span>
                                </div>
                                <div class="w-full bg-gray-700 rounded-full h-2">
                                    <div class="bg-yellow-500 h-2 rounded-full" style="width: 20%"></div>
                                </div>
                            </div>
                            <div class="space-y-2">
                                <div class="flex items-center justify-between">
                                    <span class="text-gray-400 text-sm">Suspended Users</span>
                                    <span class="text-white">1,178 (5%)</span>
                                </div>
                                <div class="w-full bg-gray-700 rounded-full h-2">
                                    <div class="bg-red-500 h-2 rounded-full" style="width: 5%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Admin Actions Panel -->
            <div class="admin-card rounded-xl p-6 mt-6">
                <h3 class="text-xl font-bold text-white mb-6">Administrative Actions</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- System Maintenance -->
                    <div class="bg-gray-900 rounded-lg p-4 border border-gray-800">
                        <h4 class="font-medium text-white mb-3">System Maintenance</h4>
                        <div class="space-y-2">
                            <button class="w-full bg-yellow-600 hover:bg-yellow-700 text-white py-2 px-3 rounded text-sm">
                                <i class="fas fa-tools mr-2"></i>Schedule Maintenance
                            </button>
                            <button class="w-full bg-gray-600 hover:bg-gray-700 text-white py-2 px-3 rounded text-sm">
                                <i class="fas fa-database mr-2"></i>Backup Database
                            </button>
                            <button class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 px-3 rounded text-sm">
                                <i class="fas fa-sync mr-2"></i>Clear Cache
                            </button>
                        </div>
                    </div>

                    <!-- User Management -->
                    <div class="bg-gray-900 rounded-lg p-4 border border-gray-800">
                        <h4 class="font-medium text-white mb-3">User Management</h4>
                        <div class="space-y-2">
                            <button class="w-full bg-green-600 hover:bg-green-700 text-white py-2 px-3 rounded text-sm">
                                <i class="fas fa-user-plus mr-2"></i>Bulk Import Users
                            </button>
                            <button class="w-full bg-red-600 hover:bg-red-700 text-white py-2 px-3 rounded text-sm">
                                <i class="fas fa-user-slash mr-2"></i>Mass Suspension
                            </button>
                            <button class="w-full bg-purple-600 hover:bg-purple-700 text-white py-2 px-3 rounded text-sm">
                                <i class="fas fa-mail-bulk mr-2"></i>Send Announcement
                            </button>
                        </div>
                    </div>

                    <!-- Content Moderation -->
                    <div class="bg-gray-900 rounded-lg p-4 border border-gray-800">
                        <h4 class="font-medium text-white mb-3">Content Moderation</h4>
                        <div class="space-y-2">
                            <button class="w-full bg-orange-600 hover:bg-orange-700 text-white py-2 px-3 rounded text-sm">
                                <i class="fas fa-search mr-2"></i>Auto Scan Content
                            </button>
                            <button class="w-full bg-red-600 hover:bg-red-700 text-white py-2 px-3 rounded text-sm">
                                <i class="fas fa-exclamation-triangle mr-2"></i>Review Flagged
                            </button>
                            <button class="w-full bg-gray-600 hover:bg-gray-700 text-white py-2 px-3 rounded text-sm">
                                <i class="fas fa-shield-alt mr-2"></i>Update Filters
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Admin Logs -->
            <div class="admin-card rounded-xl p-6 mt-6">
                <h3 class="text-xl font-bold text-white mb-6">Admin Activity Log</h3>
                <div class="space-y-3">
                    <div class="flex items-center justify-between p-3 bg-gray-900 rounded-lg border border-gray-800">
                        <div class="flex items-center space-x-3">
                            <div class="w-8 h-8 bg-blue-600 rounded-full flex items-center justify-center">
                                <i class="fas fa-user text-white text-xs"></i>
                            </div>
                            <div>
                                <p class="text-white text-sm">User "john_doe" was suspended</p>
                                <p class="text-gray-400 text-xs">By Admin • 15 minutes ago</p>
                            </div>
                        </div>
                        <span class="text-red-400 text-xs">HIGH</span>
                    </div>

                    <div class="flex items-center justify-between p-3 bg-gray-900 rounded-lg border border-gray-800">
                        <div class="flex items-center space-x-3">
                            <div class="w-8 h-8 bg-green-600 rounded-full flex items-center justify-center">
                                <i class="fas fa-gamepad text-white text-xs"></i>
                            </div>
                            <div>
                                <p class="text-white text-sm">Game "Pixel Wars" approved for publication</p>
                                <p class="text-gray-400 text-xs">By Admin • 1 hour ago</p>
                            </div>
                        </div>
                        <span class="text-green-400 text-xs">LOW</span>
                    </div>

                    <div class="flex items-center justify-between p-3 bg-gray-900 rounded-lg border border-gray-800">
                        <div class="flex items-center space-x-3">
                            <div class="w-8 h-8 bg-yellow-600 rounded-full flex items-center justify-center">
                                <i class="fas fa-database text-white text-xs"></i>
                            </div>
                            <div>
                                <p class="text-white text-sm">Database backup completed successfully</p>
                                <p class="text-gray-400 text-xs">System • 2 hours ago</p>
                            </div>
                        </div>
                        <span class="text-blue-400 text-xs">INFO</span>
                    </div>

                    <div class="flex items-center justify-between p-3 bg-gray-900 rounded-lg border border-gray-800">
                        <div class="flex items-center space-x-3">
                            <div class="w-8 h-8 bg-red-600 rounded-full flex items-center justify-center">
                                <i class="fas fa-exclamation-triangle text-white text-xs"></i>
                            </div>
                            <div>
                                <p class="text-white text-sm">Security alert: Multiple failed login attempts</p>
                                <p class="text-gray-400 text-xs">Security System • 3 hours ago</p>
                            </div>
                        </div>
                        <span class="text-red-400 text-xs">CRITICAL</span>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
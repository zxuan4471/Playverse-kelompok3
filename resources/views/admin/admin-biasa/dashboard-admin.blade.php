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
    </main>
</body>
</html>
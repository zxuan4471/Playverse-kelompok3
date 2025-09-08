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

                <!-- Recent Reports -->

            <!-- Management Tables -->
            <div class="space-y-6">
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
    </main>
</body>
</html>
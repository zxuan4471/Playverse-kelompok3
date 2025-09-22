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
    </main>
</body>
</html>
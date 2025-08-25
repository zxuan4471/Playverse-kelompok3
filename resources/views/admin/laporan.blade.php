<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan - GameHub Admin</title>
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
        
        .report-badge {
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }
        
        .report-pending {
            background: rgba(245, 158, 11, 0.2);
            color: #f59e0b;
            border: 1px solid #f59e0b;
        }
        
        .report-investigating {
            background: rgba(59, 130, 246, 0.2);
            color: #3b82f6;
            border: 1px solid #3b82f6;
        }
        
        .report-resolved {
            background: rgba(34, 197, 94, 0.2);
            color: #22c55e;
            border: 1px solid #22c55e;
        }
        
        .report-rejected {
            background: rgba(239, 68, 68, 0.2);
            color: #ef4444;
            border: 1px solid #ef4444;
        }
        
        .report-closed {
            background: rgba(107, 114, 128, 0.2);
            color: #9ca3af;
            border: 1px solid #6b7280;
        }
        
        .priority-high {
            background: rgba(239, 68, 68, 0.2);
            color: #ef4444;
            border: 1px solid #ef4444;
        }
        
        .priority-medium {
            background: rgba(245, 158, 11, 0.2);
            color: #f59e0b;
            border: 1px solid #f59e0b;
        }
        
        .priority-low {
            background: rgba(34, 197, 94, 0.2);
            color: #22c55e;
            border: 1px solid #22c55e;
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
        
        .chart-container {
            position: relative;
            height: 300px;
            background: #1a1a1a;
            border: 1px solid #2a2a2a;
            border-radius: 8px;
            padding: 20px;
        }
        
        .report-type-card {
            background: #1a1a1a;
            border: 1px solid #2a2a2a;
            border-radius: 8px;
            padding: 20px;
            transition: all 0.3s ease;
            cursor: pointer;
        }
        
        .report-type-card:hover {
            border-color: #3b82f6;
            transform: translateY(-2px);
        }
        
        .report-type-card.active {
            border-color: #3b82f6;
            background: rgba(59, 130, 246, 0.1);
        }
        
        .timeline-item {
            position: relative;
            padding-left: 30px;
            padding-bottom: 20px;
        }
        
        .timeline-item::before {
            content: '';
            position: absolute;
            left: 8px;
            top: 0;
            bottom: -20px;
            width: 2px;
            background: #2a2a2a;
        }
        
        .timeline-item:last-child::before {
            display: none;
        }
        
        .timeline-dot {
            position: absolute;
            left: 0;
            top: 5px;
            width: 18px;
            height: 18px;
            border-radius: 50%;
            border: 2px solid #2a2a2a;
        }
        
        .hidden {
            display: none;
        }
        
        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
        }
        
        .game-thumbnail {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 8px;
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
                        <p class="text-xs text-gray-400">Manajemen Laporan</p>
                    </div>
                </div>
            </div>
            <div class="flex-1 max-w-md mx-8">
                <div class="relative">
                    <input type="text" placeholder="Cari laporan berdasarkan ID, judul, atau pengguna..." 
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
                    <h3 class="text-xs font-bold text-gray-500 uppercase tracking-wider mb-3">Utama</h3>
                    <a href="#" class="nav-item flex items-center px-4 py-3 text-sm rounded-lg">
                        <i class="fas fa-tachometer-alt w-5"></i>
                        <span class="ml-3">Dashboard</span>
                    </a>
                    <a href="#" class="nav-item flex items-center px-4 py-3 text-sm rounded-lg">
                        <i class="fas fa-users w-5"></i>
                        <span class="ml-3">Manajemen Pengguna</span>
                        <span class="ml-auto bg-blue-600 text-xs px-2 py-1 rounded-full">2.1K</span>
                    </a>
                    <a href="#" class="nav-item flex items-center px-4 py-3 text-sm rounded-lg">
                        <i class="fas fa-gamepad w-5"></i>
                        <span class="ml-3">Manajemen Game</span>
                        <span class="ml-auto bg-green-600 text-xs px-2 py-1 rounded-full">87</span>
                    </a>
                </div>
                <div class="mb-6">
                    <h3 class="text-xs font-bold text-gray-500 uppercase tracking-wider mb-3">Konten</h3>
                    <a href="#" class="nav-item active flex items-center px-4 py-3 text-sm rounded-lg">
                        <i class="fas fa-flag w-5"></i>
                        <span class="ml-3">Laporan</span>
                        <span class="ml-auto bg-red-600 text-xs px-2 py-1 rounded-full">12</span>
                    </a>
                    <a href="#" class="nav-item flex items-center px-4 py-3 text-sm rounded-lg">
                        <i class="fas fa-comments w-5"></i>
                        <span class="ml-3">Ulasan</span>
                    </a>
                    <a href="#" class="nav-item flex items-center px-4 py-3 text-sm rounded-lg">
                        <i class="fas fa-chart-line w-5"></i>
                        <span class="ml-3">Analitik</span>
                    </a>
                </div>
                <div class="mb-6">
                    <h3 class="text-xs font-bold text-gray-500 uppercase tracking-wider mb-3">Sistem</h3>
                    <a href="#" class="nav-item flex items-center px-4 py-3 text-sm rounded-lg">
                        <i class="fas fa-server w-5"></i>
                        <span class="ml-3">Status Server</span>
                    </a>
                    <a href="#" class="nav-item flex items-center px-4 py-3 text-sm rounded-lg">
                        <i class="fas fa-database w-5"></i>
                        <span class="ml-3">Database</span>
                    </a>
                    <a href="#" class="nav-item flex items-center px-4 py-3 text-sm rounded-lg">
                        <i class="fas fa-shield-alt w-5"></i>
                        <span class="ml-3">Keamanan</span>
                    </a>
                    <a href="#" class="nav-item flex items-center px-4 py-3 text-sm rounded-lg">
                        <i class="fas fa-cogs w-5"></i>
                        <span class="ml-3">Pengaturan</span>
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
                    <li class="text-white font-medium">Laporan</li>
                </ol>
            </nav>
            
            <!-- Page Header -->
            <div class="flex items-center justify-between mb-8">
                <div>
                    <h1 class="text-3xl font-bold text-white">Manajemen Laporan</h1>
                    <p class="text-gray-400 mt-1">Kelola laporan pengguna, pelanggaran konten, dan masalah keamanan</p>
                </div>
                <div class="flex items-center space-x-3">
                    <button class="btn-secondary px-4 py-2 rounded-lg text-sm font-medium">
                        <i class="fas fa-download mr-2"></i>Ekspor Laporan
                    </button>
                    <button class="btn-primary px-4 py-2 rounded-lg text-sm font-medium" onclick="openNewReportModal()">
                        <i class="fas fa-plus mr-2"></i>Buat Laporan Baru
                    </button>
                </div>
            </div>
            
            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                <div class="admin-card rounded-xl p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-400 text-sm">Total Laporan</p>
                            <p class="text-2xl font-bold text-white">1.247</p>
                            <p class="text-xs text-green-400 mt-1">↗ +12% bulan ini</p>
                        </div>
                        <div class="bg-blue-600 p-3 rounded-full">
                            <i class="fas fa-flag text-white"></i>
                        </div>
                    </div>
                </div>
                <div class="admin-card rounded-xl p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-400 text-sm">Menunggu</p>
                            <p class="text-2xl font-bold text-white">89</p>
                            <p class="text-xs text-yellow-400 mt-1">Perlu ditinjau</p>
                        </div>
                        <div class="bg-yellow-600 p-3 rounded-full">
                            <i class="fas fa-clock text-white"></i>
                        </div>
                    </div>
                </div>
                <div class="admin-card rounded-xl p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-400 text-sm">Dalam Proses</p>
                            <p class="text-2xl font-bold text-white">156</p>
                            <p class="text-xs text-blue-400 mt-1">Sedang diselidiki</p>
                        </div>
                        <div class="bg-blue-600 p-3 rounded-full">
                            <i class="fas fa-search text-white"></i>
                        </div>
                    </div>
                </div>
                <div class="admin-card rounded-xl p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-400 text-sm">Selesai</p>
                            <p class="text-2xl font-bold text-white">1.002</p>
                            <p class="text-xs text-green-400 mt-1">Ditangani</p>
                        </div>
                        <div class="bg-green-600 p-3 rounded-full">
                            <i class="fas fa-check text-white"></i>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Report Types -->
            <div class="admin-card rounded-xl p-6 mb-6">
                <h3 class="text-lg font-bold text-white mb-4">Jenis Laporan</h3>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    <div class="report-type-card active" onclick="filterByType('all')">
                        <div class="text-center">
                            <i class="fas fa-list text-3xl text-blue-400 mb-2"></i>
                            <p class="font-medium">Semua</p>
                            <p class="text-sm text-gray-400">1.247 laporan</p>
                        </div>
                    </div>
                    <div class="report-type-card" onclick="filterByType('content')">
                        <div class="text-center">
                            <i class="fas fa-exclamation-triangle text-3xl text-yellow-400 mb-2"></i>
                            <p class="font-medium">Konten</p>
                            <p class="text-sm text-gray-400">423 laporan</p>
                        </div>
                    </div>
                    <div class="report-type-card" onclick="filterByType('user')">
                        <div class="text-center">
                            <i class="fas fa-user-slash text-3xl text-red-400 mb-2"></i>
                            <p class="font-medium">Pengguna</p>
                            <p class="text-sm text-gray-400">389 laporan</p>
                        </div>
                    </div>
                    <div class="report-type-card" onclick="filterByType('technical')">
                        <div class="text-center">
                            <i class="fas fa-bug text-3xl text-purple-400 mb-2"></i>
                            <p class="font-medium">Teknis</p>
                            <p class="text-sm text-gray-400">435 laporan</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Filters and Controls -->
            <div class="admin-card rounded-xl p-6 mb-6">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-bold text-white">Filter & Pencarian</h3>
                    <button class="text-blue-400 hover:text-blue-300 text-sm" onclick="resetFilters()">
                        <i class="fas fa-undo mr-1"></i>Reset Filter
                    </button>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <div>
                        <label class="block text-gray-400 text-sm mb-2">Status</label>
                        <select class="w-full bg-gray-800 border border-gray-700 rounded-lg px-3 py-2 text-white text-sm" id="statusFilter">
                            <option>Semua Status</option>
                            <option>Menunggu</option>
                            <option>Dalam Penyelidikan</option>
                            <option>Selesai</option>
                            <option>Ditolak</option>
                            <option>Ditutup</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-gray-400 text-sm mb-2">Prioritas</label>
                        <select class="w-full bg-gray-800 border border-gray-700 rounded-lg px-3 py-2 text-white text-sm" id="priorityFilter">
                            <option>Semua Prioritas</option>
                            <option>Tinggi</option>
                            <option>Sedang</option>
                            <option>Rendah</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-gray-400 text-sm mb-2">Tanggal</label>
                        <input type="date" class="w-full bg-gray-800 border border-gray-700 rounded-lg px-3 py-2 text-white text-sm">
                    </div>
                    <div>
                        <label class="block text-gray-400 text-sm mb-2">Pelapor</label>
                        <input type="text" placeholder="Nama pengguna..." class="w-full bg-gray-800 border border-gray-700 rounded-lg px-3 py-2 text-white text-sm">
                    </div>
                </div>
            </div>
            
            <!-- Reports Table -->
            <div class="admin-card rounded-xl p-6">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-xl font-bold text-white">Daftar Laporan</h3>
                    <div class="flex items-center space-x-3">
                        <span class="text-gray-400 text-sm">Menampilkan 1-10 dari 1.247</span>
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
                                    ID <i class="fas fa-sort ml-1 text-gray-500"></i>
                                </th>
                                <th class="px-6 py-4 text-left cursor-pointer hover:bg-gray-800">
                                    Judul <i class="fas fa-sort ml-1 text-gray-500"></i>
                                </th>
                                <th class="px-6 py-4 text-left cursor-pointer hover:bg-gray-800">
                                    Jenis <i class="fas fa-sort ml-1 text-gray-500"></i>
                                </th>
                                <th class="px-6 py-4 text-left cursor-pointer hover:bg-gray-800">
                                    Pelapor <i class="fas fa-sort ml-1 text-gray-500"></i>
                                </th>
                                <th class="px-6 py-4 text-left cursor-pointer hover:bg-gray-800">
                                    Status <i class="fas fa-sort ml-1 text-gray-500"></i>
                                </th>
                                <th class="px-6 py-4 text-left cursor-pointer hover:bg-gray-800">
                                    Prioritas <i class="fas fa-sort ml-1 text-gray-500"></i>
                                </th>
                                <th class="px-6 py-4 text-left cursor-pointer hover:bg-gray-800">
                                    Dibuat <i class="fas fa-sort ml-1 text-gray-500"></i>
                                </th>
                                <th class="px-6 py-4 text-left">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="reportsTableBody">
                            <tr>
                                <td class="px-6 py-4">
                                    <input type="checkbox" class="rounded bg-gray-700 border-gray-600">
                                </td>
                                <td class="px-6 py-4 font-mono text-sm">#REP-2024-0892</td>
                                <td class="px-6 py-4">
                                    <div>
                                        <p class="font-medium text-white">Konten tidak pantas di game Neon Runner</p>
                                        <p class="text-sm text-gray-400">Game mengandung kekerasan berlebihan</p>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="text-yellow-400"><i class="fas fa-exclamation-triangle mr-1"></i> Konten</span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center space-x-2">
                                        <img src="https://picsum.photos/seed/reporter1/40/40.jpg" alt="Avatar" class="user-avatar">
                                        <span>Ahmad Wijaya</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="report-badge report-investigating">Dalam Penyelidikan</span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="priority-high">Tinggi</span>
                                </td>
                                <td class="px-6 py-4">2 jam yang lalu</td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center space-x-2">
                                        <button class="text-blue-400 hover:text-blue-300" title="Lihat Detail" onclick="viewReportDetail('REP-2024-0892')">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="text-green-400 hover:text-green-300" title="Selesaikan">
                                            <i class="fas fa-check"></i>
                                        </button>
                                        <button class="text-red-400 hover:text-red-300" title="Tolak">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4">
                                    <input type="checkbox" class="rounded bg-gray-700 border-gray-600">
                                </td>
                                <td class="px-6 py-4 font-mono text-sm">#REP-2024-0891</td>
                                <td class="px-6 py-4">
                                    <div>
                                        <p class="font-medium text-white">Pengguna melakukan spam di komentar</p>
                                        <p class="text-sm text-gray-400">Pengguna @spammer123 mengirim komentar berulang</p>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="text-red-400"><i class="fas fa-user-slash mr-1"></i> Pengguna</span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center space-x-2">
                                        <img src="https://picsum.photos/seed/reporter2/40/40.jpg" alt="Avatar" class="user-avatar">
                                        <span>Siti Nurhaliza</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="report-badge report-pending">Menunggu</span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="priority-medium">Sedang</span>
                                </td>
                                <td class="px-6 py-4">5 jam yang lalu</td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center space-x-2">
                                        <button class="text-blue-400 hover:text-blue-300" title="Lihat Detail" onclick="viewReportDetail('REP-2024-0891')">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="text-blue-400 hover:text-blue-300" title="Selidiki">
                                            <i class="fas fa-search"></i>
                                        </button>
                                        <button class="text-red-400 hover:text-red-300" title="Tolak">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4">
                                    <input type="checkbox" class="rounded bg-gray-700 border-gray-600">
                                </td>
                                <td class="px-6 py-4 font-mono text-sm">#REP-2024-0890</td>
                                <td class="px-6 py-4">
                                    <div>
                                        <p class="font-medium text-white">Bug crash saat loading game</p>
                                        <p class="text-sm text-gray-400">Quantum Puzzle Box crash di level 5</p>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="text-purple-400"><i class="fas fa-bug mr-1"></i> Teknis</span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center space-x-2">
                                        <img src="https://picsum.photos/seed/reporter3/40/40.jpg" alt="Avatar" class="user-avatar">
                                        <span>Budi Santoso</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="report-badge report-resolved">Selesai</span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="priority-low">Rendah</span>
                                </td>
                                <td class="px-6 py-4">1 hari yang lalu</td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center space-x-2">
                                        <button class="text-blue-400 hover:text-blue-300" title="Lihat Detail" onclick="viewReportDetail('REP-2024-0890')">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="text-gray-400 hover:text-gray-300" title="Ditutup">
                                            <i class="fas fa-lock"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4">
                                    <input type="checkbox" class="rounded bg-gray-700 border-gray-600">
                                </td>
                                <td class="px-6 py-4 font-mono text-sm">#REP-2024-0889</td>
                                <td class="px-6 py-4">
                                    <div>
                                        <p class="font-medium text-white">Pelanggaran hak cipta game</p>
                                        <p class="text-sm text-gray-400">Game Space Explorer mirip dengan game lain</p>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="text-yellow-400"><i class="fas fa-exclamation-triangle mr-1"></i> Konten</span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center space-x-2">
                                        <img src="https://picsum.photos/seed/reporter4/40/40.jpg" alt="Avatar" class="user-avatar">
                                        <span>Maya Putri</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="report-badge report-investigating">Dalam Penyelidikan</span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="priority-high">Tinggi</span>
                                </td>
                                <td class="px-6 py-4">1 hari yang lalu</td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center space-x-2">
                                        <button class="text-blue-400 hover:text-blue-300" title="Lihat Detail" onclick="viewReportDetail('REP-2024-0889')">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="text-green-400 hover:text-green-300" title="Selesaikan">
                                            <i class="fas fa-check"></i>
                                        </button>
                                        <button class="text-red-400 hover:text-red-300" title="Tolak">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4">
                                    <input type="checkbox" class="rounded bg-gray-700 border-gray-600">
                                </td>
                                <td class="px-6 py-4 font-mono text-sm">#REP-2024-0888</td>
                                <td class="px-6 py-4">
                                    <div>
                                        <p class="font-medium text-white">Koneksi server terputus</p>
                                        <p class="text-sm text-gray-400">Tidak dapat terhubung ke server multiplayer</p>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="text-purple-400"><i class="fas fa-bug mr-1"></i> Teknis</span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center space-x-2">
                                        <img src="https://picsum.photos/seed/reporter5/40/40.jpg" alt="Avatar" class="user-avatar">
                                        <span>Rizki Pratama</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="report-badge report-pending">Menunggu</span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="priority-medium">Sedang</span>
                                </td>
                                <td class="px-6 py-4">2 hari yang lalu</td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center space-x-2">
                                        <button class="text-blue-400 hover:text-blue-300" title="Lihat Detail" onclick="viewReportDetail('REP-2024-0888')">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="text-blue-400 hover:text-blue-300" title="Selidiki">
                                            <i class="fas fa-search"></i>
                                        </button>
                                        <button class="text-red-400 hover:text-red-300" title="Tolak">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4">
                                    <input type="checkbox" class="rounded bg-gray-700 border-gray-600">
                                </td>
                                <td class="px-6 py-4 font-mono text-sm">#REP-2024-0887</td>
                                <td class="px-6 py-4">
                                    <div>
                                        <p class="font-medium text-white">Ujaran kebencian di chat</p>
                                        <p class="text-sm text-gray-400">Pengguna menggunakan kata-kata kasar</p>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="text-red-400"><i class="fas fa-user-slash mr-1"></i> Pengguna</span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center space-x-2">
                                        <img src="https://picsum.photos/seed/reporter6/40/40.jpg" alt="Avatar" class="user-avatar">
                                        <span>Dewi Lestari</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="report-badge report-resolved">Selesai</span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="priority-high">Tinggi</span>
                                </td>
                                <td class="px-6 py-4">3 hari yang lalu</td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center space-x-2">
                                        <button class="text-blue-400 hover:text-blue-300" title="Lihat Detail" onclick="viewReportDetail('REP-2024-0887')">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="text-gray-400 hover:text-gray-300" title="Ditutup">
                                            <i class="fas fa-lock"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4">
                                    <input type="checkbox" class="rounded bg-gray-700 border-gray-600">
                                </td>
                                <td class="px-6 py-4 font-mono text-sm">#REP-2024-0886</td>
                                <td class="px-6 py-4">
                                    <div>
                                        <p class="font-medium text-white">Game tidak bisa diunduh</p>
                                        <p class="text-sm text-gray-400">Error 404 saat mengunduh Zombie Survival</p>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="text-purple-400"><i class="fas fa-bug mr-1"></i> Teknis</span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center space-x-2">
                                        <img src="https://picsum.photos/seed/reporter7/40/40.jpg" alt="Avatar" class="user-avatar">
                                        <span>Faisal Rahman</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="report-badge report-rejected">Ditolak</span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="priority-low">Rendah</span>
                                </td>
                                <td class="px-6 py-4">4 hari yang lalu</td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center space-x-2">
                                        <button class="text-blue-400 hover:text-blue-300" title="Lihat Detail" onclick="viewReportDetail('REP-2024-0886')">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="text-gray-400 hover:text-gray-300" title="Ditutup">
                                            <i class="fas fa-lock"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4">
                                    <input type="checkbox" class="rounded bg-gray-700 border-gray-600">
                                </td>
                                <td class="px-6 py-4 font-mono text-sm">#REP-2024-0885</td>
                                <td class="px-6 py-4">
                                    <div>
                                        <p class="font-medium text-white">Konten dewasa tanpa rating</p>
                                        <p class="text-sm text-gray-400">Game mengandung konten dewasa tanpa peringatan</p>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="text-yellow-400"><i class="fas fa-exclamation-triangle mr-1"></i> Konten</span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center space-x-2">
                                        <img src="https://picsum.photos/seed/reporter8/40/40.jpg" alt="Avatar" class="user-avatar">
                                        <span>Intan Permata</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="report-badge report-investigating">Dalam Penyelidikan</span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="priority-high">Tinggi</span>
                                </td>
                                <td class="px-6 py-4">5 hari yang lalu</td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center space-x-2">
                                        <button class="text-blue-400 hover:text-blue-300" title="Lihat Detail" onclick="viewReportDetail('REP-2024-0885')">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="text-green-400 hover:text-green-300" title="Selesaikan">
                                            <i class="fas fa-check"></i>
                                        </button>
                                        <button class="text-red-400 hover:text-red-300" title="Tolak">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4">
                                    <input type="checkbox" class="rounded bg-gray-700 border-gray-600">
                                </td>
                                <td class="px-6 py-4 font-mono text-sm">#REP-2024-0884</td>
                                <td class="px-6 py-4">
                                    <div>
                                        <p class="font-medium text-white">Akun palsu mengirim DM spam</p>
                                        <p class="text-sm text-gray-400">Menerima pesan spam dari akun mencurigakan</p>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="text-red-400"><i class="fas fa-user-slash mr-1"></i> Pengguna</span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center space-x-2">
                                        <img src="https://picsum.photos/seed/reporter9/40/40.jpg" alt="Avatar" class="user-avatar">
                                        <span>Hendra Gunawan</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="report-badge report-closed">Ditutup</span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="priority-medium">Sedang</span>
                                </td>
                                <td class="px-6 py-4">1 minggu yang lalu</td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center space-x-2">
                                        <button class="text-blue-400 hover:text-blue-300" title="Lihat Detail" onclick="viewReportDetail('REP-2024-0884')">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="text-gray-400 hover:text-gray-300" title="Ditutup">
                                            <i class="fas fa-lock"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4">
                                    <input type="checkbox" class="rounded bg-gray-700 border-gray-600">
                                </td>
                                <td class="px-6 py-4 font-mono text-sm">#REP-2024-0883</td>
                                <td class="px-6 py-4">
                                    <div>
                                        <p class="font-medium text-white">Lag parah saat multiplayer</p>
                                        <p class="text-sm text-gray-400">FPS drop drastis saat bermain multiplayer</p>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="text-purple-400"><i class="fas fa-bug mr-1"></i> Teknis</span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center space-x-2">
                                        <img src="https://picsum.photos/seed/reporter10/40/40.jpg" alt="Avatar" class="user-avatar">
                                        <span>Yulia Anggraini</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="report-badge report-resolved">Selesai</span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="priority-medium">Sedang</span>
                                </td>
                                <td class="px-6 py-4">1 minggu yang lalu</td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center space-x-2">
                                        <button class="text-blue-400 hover:text-blue-300" title="Lihat Detail" onclick="viewReportDetail('REP-2024-0883')">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="text-gray-400 hover:text-gray-300" title="Ditutup">
                                            <i class="fas fa-lock"></i>
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
    
    <!-- Report Detail Modal -->
    <div id="reportDetailModal" class="modal fixed inset-0 z-50 hidden">
        <div class="flex items-center justify-center min-h-screen px-4">
            <div class="modal-content rounded-xl p-6 w-full max-w-4xl max-h-[90vh] overflow-y-auto">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-xl font-bold text-white">Detail Laporan</h3>
                    <button onclick="closeReportDetailModal()" class="text-gray-400 hover:text-white">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <!-- Report Info -->
                    <div class="md:col-span-2 space-y-6">
                        <div class="admin-card rounded-lg p-4">
                            <h4 class="font-bold text-white mb-3">Informasi Laporan</h4>
                            <div class="space-y-3">
                                <div class="flex justify-between">
                                    <span class="text-gray-400">ID Laporan:</span>
                                    <span class="font-mono text-sm" id="reportId">#REP-2024-0892</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-400">Judul:</span>
                                    <span id="reportTitle">Konten tidak pantas di game Neon Runner</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-400">Jenis:</span>
                                    <span id="reportType">Konten</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-400">Status:</span>
                                    <span id="reportStatus" class="report-badge report-investigating">Dalam Penyelidikan</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-400">Prioritas:</span>
                                    <span id="reportPriority" class="priority-high">Tinggi</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-400">Dibuat:</span>
                                    <span id="reportDate">2 jam yang lalu</span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="admin-card rounded-lg p-4">
                            <h4 class="font-bold text-white mb-3">Deskripsi Laporan</h4>
                            <p class="text-gray-300" id="reportDescription">
                                Game Neon Runner mengandung kekerasan berlebihan yang tidak sesuai dengan rating yang diberikan. Terdapat adegan darah dan kekerasan grafis yang seharusnya hanya untuk dewasa, namun game ini memiliki rating remaja. Mohon segera ditindaklanjuti.
                            </p>
                        </div>
                        
                        <div class="admin-card rounded-lg p-4">
                            <h4 class="font-bold text-white mb-3">Bukti</h4>
                            <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                                <img src="https://picsum.photos/seed/evidence1/200/150.jpg" alt="Bukti 1" class="rounded-lg cursor-pointer hover:opacity-80">
                                <img src="https://picsum.photos/seed/evidence2/200/150.jpg" alt="Bukti 2" class="rounded-lg cursor-pointer hover:opacity-80">
                                <img src="https://picsum.photos/seed/evidence3/200/150.jpg" alt="Bukti 3" class="rounded-lg cursor-pointer hover:opacity-80">
                                <div class="rounded-lg bg-gray-800 flex items-center justify-center cursor-pointer hover:bg-gray-700">
                                    <i class="fas fa-plus text-gray-400"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Timeline and Actions -->
                    <div class="space-y-6">
                        <div class="admin-card rounded-lg p-4">
                            <h4 class="font-bold text-white mb-3">Pelapor</h4>
                            <div class="flex items-center space-x-3">
                                <img src="https://picsum.photos/seed/reporter1/60/60.jpg" alt="Avatar" class="user-avatar">
                                <div>
                                    <p class="font-medium text-white" id="reporterName">Ahmad Wijaya</p>
                                    <p class="text-sm text-gray-400" id="reporterEmail">ahmad.wijaya@email.com</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="admin-card rounded-lg p-4">
                            <h4 class="font-bold text-white mb-3">Timeline</h4>
                            <div class="space-y-4">
                                <div class="timeline-item">
                                    <div class="timeline-dot bg-yellow-500"></div>
                                    <div>
                                        <p class="text-sm font-medium text-white">Laporan dibuat</p>
                                        <p class="text-xs text-gray-400">2 jam yang lalu</p>
                                    </div>
                                </div>
                                <div class="timeline-item">
                                    <div class="timeline-dot bg-blue-500"></div>
                                    <div>
                                        <p class="text-sm font-medium text-white">Ditinjau oleh moderator</p>
                                        <p class="text-xs text-gray-400">1 jam yang lalu</p>
                                    </div>
                                </div>
                                <div class="timeline-item">
                                    <div class="timeline-dot bg-blue-500"></div>
                                    <div>
                                        <p class="text-sm font-medium text-white">Dalam penyelidikan</p>
                                        <p class="text-xs text-gray-400">Sedang berlangsung</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="admin-card rounded-lg p-4">
                            <h4 class="font-bold text-white mb-3">Tindakan</h4>
                            <div class="space-y-3">
                                <button class="btn-primary w-full py-2 rounded-lg">
                                    <i class="fas fa-check mr-2"></i>Selesaikan Laporan
                                </button>
                                <button class="btn-danger w-full py-2 rounded-lg">
                                    <i class="fas fa-times mr-2"></i>Tolak Laporan
                                </button>
                                <button class="btn-secondary w-full py-2 rounded-lg">
                                    <i class="fas fa-user-slash mr-2"></i>Suspend Pengguna
                                </button>
                                <button class="btn-secondary w-full py-2 rounded-lg">
                                    <i class="fas fa-gamepad mr-2"></i>Hapus Game
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- New Report Modal -->
    <div id="newReportModal" class="modal fixed inset-0 z-50 hidden">
        <div class="flex items-center justify-center min-h-screen px-4">
            <div class="modal-content rounded-xl p-6 w-full max-w-2xl">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-xl font-bold text-white">Buat Laporan Baru</h3>
                    <button onclick="closeNewReportModal()" class="text-gray-400 hover:text-white">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                
                <form class="space-y-4">
                    <div>
                        <label class="block text-gray-400 text-sm mb-2">Jenis Laporan</label>
                        <select class="w-full bg-gray-800 border border-gray-700 rounded-lg px-3 py-2 text-white">
                            <option>Pelanggaran Konten</option>
                            <option>Pelanggaran Pengguna</option>
                            <option>Masalah Teknis</option>
                            <option>Lainnya</option>
                        </select>
                    </div>
                    
                    <div>
                        <label class="block text-gray-400 text-sm mb-2">Judul Laporan</label>
                        <input type="text" class="w-full bg-gray-800 border border-gray-700 rounded-lg px-3 py-2 text-white" placeholder="Masukkan judul laporan">
                    </div>
                    
                    <div>
                        <label class="block text-gray-400 text-sm mb-2">Deskripsi</label>
                        <textarea class="w-full bg-gray-800 border border-gray-700 rounded-lg px-3 py-2 text-white h-32 resize-none" placeholder="Jelaskan detail laporan"></textarea>
                    </div>
                    
                    <div>
                        <label class="block text-gray-400 text-sm mb-2">Target Laporan</label>
                        <select class="w-full bg-gray-800 border border-gray-700 rounded-lg px-3 py-2 text-white">
                            <option>Pilih target...</option>
                            <option>Pengguna</option>
                            <option>Game</option>
                            <option>Komentar</option>
                            <option>Ulasan</option>
                        </select>
                    </div>
                    
                    <div>
                        <label class="block text-gray-400 text-sm mb-2">Prioritas</label>
                        <select class="w-full bg-gray-800 border border-gray-700 rounded-lg px-3 py-2 text-white">
                            <option>Rendah</option>
                            <option>Sedang</option>
                            <option>Tinggi</option>
                        </select>
                    </div>
                    
                    <div>
                        <label class="block text-gray-400 text-sm mb-2">Unggah Bukti</label>
                        <div class="border-2 border-dashed border-gray-600 rounded-lg p-6 text-center hover:border-gray-500 transition-colors cursor-pointer">
                            <i class="fas fa-cloud-upload-alt text-3xl text-gray-400 mb-2"></i>
                            <p class="text-gray-400">Klik atau drag file untuk upload</p>
                            <p class="text-xs text-gray-500 mt-1">PNG, JPG, PDF maksimal 10MB</p>
                        </div>
                    </div>
                    
                    <div class="flex justify-end space-x-3 pt-4">
                        <button type="button" onclick="closeNewReportModal()" class="btn-secondary px-4 py-2 rounded-lg">Batal</button>
                        <button type="submit" class="btn-primary px-4 py-2 rounded-lg">Kirim Laporan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
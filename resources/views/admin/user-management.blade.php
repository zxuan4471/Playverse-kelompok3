<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Pengguna - GameHub Admin</title>
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
        
        .status-aktif {
            background: rgba(34, 197, 94, 0.2);
            color: #22c55e;
            border: 1px solid #22c55e;
        }
        
        .status-nonaktif {
            background: rgba(107, 114, 128, 0.2);
            color: #9ca3af;
            border: 1px solid #6b7280;
        }
        
        .status-ditangguhkan {
            background: rgba(239, 68, 68, 0.2);
            color: #ef4444;
            border: 1px solid #ef4444;
        }
        
        .status-menunggu {
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
        
        .hidden {
            display: none;
        }
        
        .game-thumbnail {
            width: 50px;
            height: 50px;
            object-fit: cover;
            border-radius: 8px;
        }
        
        .role-admin { background: #dc2626; }
        .role-developer { background: #7c3aed; }
        .role-moderator { background: #ea580c; }
        .role-user { background: #059669; }
        .role-publisher { background: #0891b2; }
        
        .permission-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 16px;
        }
        
        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
        }
    </style>
</head>
<body class="bg-black text-white">

@include('admin.layouts.navbar-admin')
@include('admin.layouts.sidebar-admin')  
    <!-- Main Content -->
    <main class="ml-64 mt-16 min-h-screen">
        <div class="p-6">
            <!-- Breadcrumb -->
            <nav class="mb-6">
                <ol class="flex items-center space-x-2 text-sm text-gray-400">
                    <li><a href="#" class="hover:text-white transition-colors">Dashboard</a></li>
                    <li><i class="fas fa-chevron-right text-xs"></i></li>
                    <li class="text-white font-medium">Manajemen Pengguna</li>
                </ol>
            </nav>
            
            <!-- Page Header -->
            <div class="flex items-center justify-between mb-8">
                <div>
                    <h1 class="text-3xl font-bold text-white">Manajemen Pengguna</h1>
                    <p class="text-gray-400 mt-1">Kelola pengguna platform, peran, izin, dan akses penerbitan game</p>
                </div>
                <div class="flex items-center space-x-3">
                    <button class="btn-secondary px-4 py-2 rounded-lg text-sm font-medium">
                        <i class="fas fa-download mr-2"></i>Ekspor Pengguna
                    </button>
                    <button class="btn-secondary px-4 py-2 rounded-lg text-sm font-medium">
                        <i class="fas fa-upload mr-2"></i>Impor Pengguna
                    </button>
                    <button class="btn-primary px-4 py-2 rounded-lg text-sm font-medium" onclick="openAddUserModal()">
                        <i class="fas fa-user-plus mr-2"></i>Tambah Pengguna Baru
                    </button>
                </div>
            </div>
            
            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-5 gap-6 mb-8">
                <div class="admin-card rounded-xl p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-400 text-sm">Total Pengguna</p>
                            <p class="text-2xl font-bold text-white">28.641</p>
                        </div>
                        <div class="bg-blue-600 p-3 rounded-full">
                            <i class="fas fa-users text-white"></i>
                        </div>
                    </div>
                </div>
                <div class="admin-card rounded-xl p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-400 text-sm">Penerbit Game</p>
                            <p class="text-2xl font-bold text-white">1.247</p>
                        </div>
                        <div class="bg-cyan-600 p-3 rounded-full">
                            <i class="fas fa-upload text-white"></i>
                        </div>
                    </div>
                </div>
                <div class="admin-card rounded-xl p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-400 text-sm">Pengguna Aktif</p>
                            <p class="text-2xl font-bold text-white">21.432</p>
                        </div>
                        <div class="bg-green-600 p-3 rounded-full">
                            <i class="fas fa-user-check text-white"></i>
                        </div>
                    </div>
                </div>
                <div class="admin-card rounded-xl p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-400 text-sm">Ditangguhkan</p>
                            <p class="text-2xl font-bold text-white">1.284</p>
                        </div>
                        <div class="bg-red-600 p-3 rounded-full">
                            <i class="fas fa-user-slash text-white"></i>
                        </div>
                    </div>
                </div>
                <div class="admin-card rounded-xl p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-400 text-sm">Baru Hari Ini</p>
                            <p class="text-2xl font-bold text-white">73</p>
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
                    <h3 class="text-lg font-bold text-white">Filter & Pencarian</h3>
                    <button class="text-blue-400 hover:text-blue-300 text-sm" onclick="resetFilters()">
                        <i class="fas fa-undo mr-1"></i>Reset Filter
                    </button>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-4">
                    <div>
                        <label class="block text-gray-400 text-sm mb-2">Status</label>
                        <select class="w-full bg-gray-800 border border-gray-700 rounded-lg px-3 py-2 text-white text-sm" id="statusFilter">
                            <option>Semua Status</option>
                            <option>Aktif</option>
                            <option>Nonaktif</option>
                            <option>Ditangguhkan</option>
                            <option>Menunggu</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-gray-400 text-sm mb-2">Peran</label>
                        <select class="w-full bg-gray-800 border border-gray-700 rounded-lg px-3 py-2 text-white text-sm" id="roleFilter">
                            <option>Semua Peran</option>
                            <option>Pengguna</option>
                            <option>Penerbit</option>
                            <option>Developer</option>
                            <option>Moderator</option>
                            <option>Admin</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-gray-400 text-sm mb-2">Tanggal Pendaftaran</label>
                        <input type="date" class="w-full bg-gray-800 border border-gray-700 rounded-lg px-3 py-2 text-white text-sm">
                    </div>
                    <div>
                        <label class="block text-gray-400 text-sm mb-2">Penerbitan Game</label>
                        <select class="w-full bg-gray-800 border border-gray-700 rounded-lg px-3 py-2 text-white text-sm">
                            <option>Semua Pengguna</option>
                            <option>Bisa Menerbitkan</option>
                            <option>Tidak Bisa Menerbitkan</option>
                            <option>Menunggu Persetujuan</option>
                        </select>
                    </div>
                </div>
                
                <!-- Quick Filter Pills -->
                <div class="filter-pills mb-4">
                    <span class="filter-pill active">Semua Pengguna</span>
                    <span class="filter-pill">Penerbit Game</span>
                    <span class="filter-pill">Developer Aktif</span>
                    <span class="filter-pill">Penghasil Pendapatan</span>
                    <span class="filter-pill">Pengguna Ditandai</span>
                    <span class="filter-pill">Pendaftar Baru</span>
                </div>
            </div>
            
            <!-- Users Table -->
            <div class="admin-card rounded-xl p-6">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-xl font-bold text-white">Daftar Pengguna</h3>
                    <div class="flex items-center space-x-3">
                        <span class="text-gray-400 text-sm">Menampilkan 1-10 dari 28.641</span>
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
                                    Pengguna <i class="fas fa-sort ml-1 text-gray-500"></i>
                                </th>
                                <th class="px-6 py-4 text-left cursor-pointer hover:bg-gray-800">
                                    Peran <i class="fas fa-sort ml-1 text-gray-500"></i>
                                </th>
                                <th class="px-6 py-4 text-left cursor-pointer hover:bg-gray-800">
                                    Status <i class="fas fa-sort ml-1 text-gray-500"></i>
                                </th>
                                <th class="px-6 py-4 text-left cursor-pointer hover:bg-gray-800">
                                    Game Diterbitkan <i class="fas fa-sort ml-1 text-gray-500"></i>
                                </th>
                                <th class="px-6 py-4 text-left cursor-pointer hover:bg-gray-800">
                                    Pendapatan <i class="fas fa-sort ml-1 text-gray-500"></i>
                                </th>
                                <th class="px-6 py-4 text-left cursor-pointer hover:bg-gray-800">
                                    Terakhir Aktif <i class="fas fa-sort ml-1 text-gray-500"></i>
                                </th>
                                <th class="px-6 py-4 text-left">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="userTableBody">
                            <tr>
                                <td class="px-6 py-4">
                                    <input type="checkbox" class="rounded bg-gray-700 border-gray-600">
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center space-x-3">
                                        <img src="https://picsum.photos/seed/user1/40/40.jpg" alt="Avatar" class="user-avatar">
                                        <div>
                                            <p class="font-medium text-white">Ahmad Wijaya</p>
                                            <p class="text-sm text-gray-400">ahmad.wijaya@email.com</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="px-3 py-1 rounded-full text-xs text-white role-developer">Developer</span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="status-badge status-aktif">Aktif</span>
                                </td>
                                <td class="px-6 py-4">12</td>
                                <td class="px-6 py-4">Rp 45.2Jt</td>
                                <td class="px-6 py-4">2 jam yang lalu</td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center space-x-2">
                                        <button class="text-blue-400 hover:text-blue-300" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="text-yellow-400 hover:text-yellow-300" title="Tangguhkan">
                                            <i class="fas fa-pause"></i>
                                        </button>
                                        <button class="text-red-400 hover:text-red-300" title="Hapus">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4">
                                    <input type="checkbox" class="rounded bg-gray-700 border-gray-600">
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center space-x-3">
                                        <img src="https://picsum.photos/seed/user2/40/40.jpg" alt="Avatar" class="user-avatar">
                                        <div>
                                            <p class="font-medium text-white">Siti Nurhaliza</p>
                                            <p class="text-sm text-gray-400">siti.nurhaliza@email.com</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="px-3 py-1 rounded-full text-xs text-white role-publisher">Penerbit</span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="status-badge status-aktif">Aktif</span>
                                </td>
                                <td class="px-6 py-4">8</td>
                                <td class="px-6 py-4">Rp 32.1Jt</td>
                                <td class="px-6 py-4">5 jam yang lalu</td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center space-x-2">
                                        <button class="text-blue-400 hover:text-blue-300" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="text-yellow-400 hover:text-yellow-300" title="Tangguhkan">
                                            <i class="fas fa-pause"></i>
                                        </button>
                                        <button class="text-red-400 hover:text-red-300" title="Hapus">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4">
                                    <input type="checkbox" class="rounded bg-gray-700 border-gray-600">
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center space-x-3">
                                        <img src="https://picsum.photos/seed/user3/40/40.jpg" alt="Avatar" class="user-avatar">
                                        <div>
                                            <p class="font-medium text-white">Budi Santoso</p>
                                            <p class="text-sm text-gray-400">budi.santoso@email.com</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="px-3 py-1 rounded-full text-xs text-white role-user">Pengguna</span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="status-badge status-aktif">Aktif</span>
                                </td>
                                <td class="px-6 py-4">0</td>
                                <td class="px-6 py-4">Rp 0</td>
                                <td class="px-6 py-4">1 hari yang lalu</td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center space-x-2">
                                        <button class="text-blue-400 hover:text-blue-300" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="text-yellow-400 hover:text-yellow-300" title="Tangguhkan">
                                            <i class="fas fa-pause"></i>
                                        </button>
                                        <button class="text-red-400 hover:text-red-300" title="Hapus">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4">
                                    <input type="checkbox" class="rounded bg-gray-700 border-gray-600">
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center space-x-3">
                                        <img src="https://picsum.photos/seed/user4/40/40.jpg" alt="Avatar" class="user-avatar">
                                        <div>
                                            <p class="font-medium text-white">Maya Putri</p>
                                            <p class="text-sm text-gray-400">maya.putri@email.com</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="px-3 py-1 rounded-full text-xs text-white role-moderator">Moderator</span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="status-badge status-aktif">Aktif</span>
                                </td>
                                <td class="px-6 py-4">3</td>
                                <td class="px-6 py-4">Rp 5.2Jt</td>
                                <td class="px-6 py-4">3 jam yang lalu</td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center space-x-2">
                                        <button class="text-blue-400 hover:text-blue-300" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="text-yellow-400 hover:text-yellow-300" title="Tangguhkan">
                                            <i class="fas fa-pause"></i>
                                        </button>
                                        <button class="text-red-400 hover:text-red-300" title="Hapus">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4">
                                    <input type="checkbox" class="rounded bg-gray-700 border-gray-600">
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center space-x-3">
                                        <img src="https://picsum.photos/seed/user5/40/40.jpg" alt="Avatar" class="user-avatar">
                                        <div>
                                            <p class="font-medium text-white">Rizki Pratama</p>
                                            <p class="text-sm text-gray-400">rizki.pratama@email.com</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="px-3 py-1 rounded-full text-xs text-white role-developer">Developer</span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="status-badge status-ditangguhkan">Ditangguhkan</span>
                                </td>
                                <td class="px-6 py-4">5</td>
                                <td class="px-6 py-4">Rp 18.7Jt</td>
                                <td class="px-6 py-4">2 minggu yang lalu</td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center space-x-2">
                                        <button class="text-blue-400 hover:text-blue-300" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="text-green-400 hover:text-green-300" title="Aktifkan">
                                            <i class="fas fa-play"></i>
                                        </button>
                                        <button class="text-red-400 hover:text-red-300" title="Hapus">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4">
                                    <input type="checkbox" class="rounded bg-gray-700 border-gray-600">
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center space-x-3">
                                        <img src="https://picsum.photos/seed/user6/40/40.jpg" alt="Avatar" class="user-avatar">
                                        <div>
                                            <p class="font-medium text-white">Dewi Lestari</p>
                                            <p class="text-sm text-gray-400">dewi.lestari@email.com</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="px-3 py-1 rounded-full text-xs text-white role-publisher">Penerbit</span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="status-badge status-menunggu">Menunggu</span>
                                </td>
                                <td class="px-6 py-4">0</td>
                                <td class="px-6 py-4">Rp 0</td>
                                <td class="px-6 py-4">Baru saja</td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center space-x-2">
                                        <button class="text-blue-400 hover:text-blue-300" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="text-green-400 hover:text-green-300" title="Setujui">
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
                                <td class="px-6 py-4">
                                    <div class="flex items-center space-x-3">
                                        <img src="https://picsum.photos/seed/user7/40/40.jpg" alt="Avatar" class="user-avatar">
                                        <div>
                                            <p class="font-medium text-white">Faisal Rahman</p>
                                            <p class="text-sm text-gray-400">faisal.rahman@email.com</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="px-3 py-1 rounded-full text-xs text-white role-admin">Admin</span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="status-badge status-aktif">Aktif</span>
                                </td>
                                <td class="px-6 py-4">15</td>
                                <td class="px-6 py-4">Rp 67.3Jt</td>
                                <td class="px-6 py-4">30 menit yang lalu</td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center space-x-2">
                                        <button class="text-blue-400 hover:text-blue-300" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="text-yellow-400 hover:text-yellow-300" title="Tangguhkan">
                                            <i class="fas fa-pause"></i>
                                        </button>
                                        <button class="text-red-400 hover:text-red-300" title="Hapus">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4">
                                    <input type="checkbox" class="rounded bg-gray-700 border-gray-600">
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center space-x-3">
                                        <img src="https://picsum.photos/seed/user8/40/40.jpg" alt="Avatar" class="user-avatar">
                                        <div>
                                            <p class="font-medium text-white">Intan Permata</p>
                                            <p class="text-sm text-gray-400">intan.permata@email.com</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="px-3 py-1 rounded-full text-xs text-white role-developer">Developer</span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="status-badge status-aktif">Aktif</span>
                                </td>
                                <td class="px-6 py-4">7</td>
                                <td class="px-6 py-4">Rp 28.9Jt</td>
                                <td class="px-6 py-4">4 jam yang lalu</td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center space-x-2">
                                        <button class="text-blue-400 hover:text-blue-300" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="text-yellow-400 hover:text-yellow-300" title="Tangguhkan">
                                            <i class="fas fa-pause"></i>
                                        </button>
                                        <button class="text-red-400 hover:text-red-300" title="Hapus">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4">
                                    <input type="checkbox" class="rounded bg-gray-700 border-gray-600">
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center space-x-3">
                                        <img src="https://picsum.photos/seed/user9/40/40.jpg" alt="Avatar" class="user-avatar">
                                        <div>
                                            <p class="font-medium text-white">Hendra Gunawan</p>
                                            <p class="text-sm text-gray-400">hendra.gunawan@email.com</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="px-3 py-1 rounded-full text-xs text-white role-user">Pengguna</span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="status-badge status-nonaktif">Nonaktif</span>
                                </td>
                                <td class="px-6 py-4">0</td>
                                <td class="px-6 py-4">Rp 0</td>
                                <td class="px-6 py-4">1 bulan yang lalu</td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center space-x-2">
                                        <button class="text-blue-400 hover:text-blue-300" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="text-green-400 hover:text-green-300" title="Aktifkan">
                                            <i class="fas fa-play"></i>
                                        </button>
                                        <button class="text-red-400 hover:text-red-300" title="Hapus">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4">
                                    <input type="checkbox" class="rounded bg-gray-700 border-gray-600">
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center space-x-3">
                                        <img src="https://picsum.photos/seed/user10/40/40.jpg" alt="Avatar" class="user-avatar">
                                        <div>
                                            <p class="font-medium text-white">Yulia Anggraini</p>
                                            <p class="text-sm text-gray-400">yulia.anggraini@email.com</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="px-3 py-1 rounded-full text-xs text-white role-publisher">Penerbit</span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="status-badge status-aktif">Aktif</span>
                                </td>
                                <td class="px-6 py-4">11</td>
                                <td class="px-6 py-4">Rp 41.8Jt</td>
                                <td class="px-6 py-4">6 jam yang lalu</td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center space-x-2">
                                        <button class="text-blue-400 hover:text-blue-300" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="text-yellow-400 hover:text-yellow-300" title="Tangguhkan">
                                            <i class="fas fa-pause"></i>
                                        </button>
                                        <button class="text-red-400 hover:text-red-300" title="Hapus">
                                            <i class="fas fa-trash"></i>
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
    
    <!-- Add User Modal -->
    <div id="addUserModal" class="modal fixed inset-0 z-50 hidden">
        <div class="flex items-center justify-center min-h-screen px-4">
            <div class="modal-content rounded-xl p-6 w-full max-w-2xl">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-xl font-bold text-white">Tambah Pengguna Baru</h3>
                    <button onclick="closeAddUserModal()" class="text-gray-400 hover:text-white">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                
                <form class="space-y-4">
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-gray-400 text-sm mb-2">Nama Lengkap</label>
                            <input type="text" class="w-full bg-gray-800 border border-gray-700 rounded-lg px-3 py-2 text-white">
                        </div>
                        <div>
                            <label class="block text-gray-400 text-sm mb-2">Email</label>
                            <input type="email" class="w-full bg-gray-800 border border-gray-700 rounded-lg px-3 py-2 text-white">
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-gray-400 text-sm mb-2">Peran</label>
                            <select class="w-full bg-gray-800 border border-gray-700 rounded-lg px-3 py-2 text-white">
                                <option>Pengguna</option>
                                <option>Penerbit</option>
                                <option>Developer</option>
                                <option>Moderator</option>
                                <option>Admin</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-gray-400 text-sm mb-2">Status</label>
                            <select class="w-full bg-gray-800 border border-gray-700 rounded-lg px-3 py-2 text-white">
                                <option>Aktif</option>
                                <option>Menunggu</option>
                                <option>Ditangguhkan</option>
                            </select>
                        </div>
                    </div>
                    
                    <div>
                        <label class="block text-gray-400 text-sm mb-2">Izin</label>
                        <div class="permission-grid">
                            <label class="flex items-center space-x-2 text-gray-300">
                                <input type="checkbox" class="rounded bg-gray-700 border-gray-600">
                                <span>Unggah Game</span>
                            </label>
                            <label class="flex items-center space-x-2 text-gray-300">
                                <input type="checkbox" class="rounded bg-gray-700 border-gray-600">
                                <span>Terbitkan Game</span>
                            </label>
                            <label class="flex items-center space-x-2 text-gray-300">
                                <input type="checkbox" class="rounded bg-gray-700 border-gray-600">
                                <span>Moderasi Konten</span>
                            </label>
                            <label class="flex items-center space-x-2 text-gray-300">
                                <input type="checkbox" class="rounded bg-gray-700 border-gray-600">
                                <span>Akses Analitik</span>
                            </label>
                        </div>
                    </div>
                    
                    <div class="flex justify-end space-x-3 pt-4">
                        <button type="button" onclick="closeAddUserModal()" class="btn-secondary px-4 py-2 rounded-lg">Batal</button>
                        <button type="submit" class="btn-primary px-4 py-2 rounded-lg">Buat Pengguna</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <script>
        function openAddUserModal() {
            document.getElementById('addUserModal').classList.remove('hidden');
        }
        
        function closeAddUserModal() {
            document.getElementById('addUserModal').classList.add('hidden');
        }
        
        function resetFilters() {
            document.getElementById('statusFilter').selectedIndex = 0;
            document.getElementById('roleFilter').selectedIndex = 0;
            document.querySelectorAll('.filter-pill').forEach(pill => {
                pill.classList.remove('active');
            });
            document.querySelector('.filter-pill').classList.add('active');
        }
        
        // Filter pill click handler
        document.querySelectorAll('.filter-pill').forEach(pill => {
            pill.addEventListener('click', function() {
                document.querySelectorAll('.filter-pill').forEach(p => p.classList.remove('active'));
                this.classList.add('active');
            });
        });
        
        // Search functionality
        document.getElementById('searchInput').addEventListener('input', function(e) {
            const searchTerm = e.target.value.toLowerCase();
            const rows = document.querySelectorAll('#userTableBody tr');
            
            rows.forEach(row => {
                const text = row.textContent.toLowerCase();
                row.style.display = text.includes(searchTerm) ? '' : 'none';
            });
        });
        
        // Status filter
        document.getElementById('statusFilter').addEventListener('change', function(e) {
            const status = e.target.value.toLowerCase();
            const rows = document.querySelectorAll('#userTableBody tr');
            
            rows.forEach(row => {
                const statusCell = row.querySelector('.status-badge');
                if (status === 'semua status' || !status) {
                    row.style.display = '';
                } else {
                    const statusText = statusCell.textContent.toLowerCase();
                    row.style.display = statusText.includes(status) ? '' : 'none';
                }
            });
        });
        
        // Role filter
        document.getElementById('roleFilter').addEventListener('change', function(e) {
            const role = e.target.value.toLowerCase();
            const rows = document.querySelectorAll('#userTableBody tr');
            
            rows.forEach(row => {
                const roleCell = row.querySelector('.role-admin, .role-developer, .role-moderator, .role-user, .role-publisher');
                if (role === 'semua peran' || !role) {
                    row.style.display = '';
                } else {
                    const roleText = roleCell.textContent.toLowerCase();
                    row.style.display = roleText.includes(role) ? '' : 'none';
                }
            });
        });
    </script>
</body>
</html>
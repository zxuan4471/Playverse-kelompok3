<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penarikan Dana - GameHub Admin</title>
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
        
        .btn-success {
            background: linear-gradient(45deg, #22c55e, #16a34a);
            color: white;
            transition: all 0.3s ease;
        }
        
        .btn-success:hover {
            background: linear-gradient(45deg, #16a34a, #15803d);
        }
        
        .btn-warning {
            background: linear-gradient(45deg, #f59e0b, #d97706);
            color: white;
            transition: all 0.3s ease;
        }
        
        .btn-warning:hover {
            background: linear-gradient(45deg, #d97706, #b45309);
        }
        
        .btn-danger {
            background: linear-gradient(45deg, #ef4444, #dc2626);
            color: white;
            transition: all 0.3s ease;
        }
        
        .btn-danger:hover {
            background: linear-gradient(45deg, #dc2626, #b91c1c);
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
        
        .withdrawal-item {
            border-left: 4px solid transparent;
            transition: all 0.3s ease;
        }
        
        .withdrawal-item:hover {
            border-left-color: #3b82f6;
            background: rgba(59, 130, 246, 0.05);
        }
        
        .withdrawal-item.pending {
            border-left-color: #f59e0b;
        }
        
        .withdrawal-item.processing {
            border-left-color: #3b82f6;
        }
        
        .withdrawal-item.completed {
            border-left-color: #22c55e;
        }
        
        .withdrawal-item.rejected {
            border-left-color: #ef4444;
        }
        
        .status-badge {
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }
        
        .status-pending {
            background: rgba(245, 158, 11, 0.2);
            color: #f59e0b;
            border: 1px solid #f59e0b;
        }
        
        .status-processing {
            background: rgba(59, 130, 246, 0.2);
            color: #3b82f6;
            border: 1px solid #3b82f6;
        }
        
        .status-completed {
            background: rgba(34, 197, 94, 0.2);
            color: #22c55e;
            border: 1px solid #22c55e;
        }
        
        .status-rejected {
            background: rgba(239, 68, 68, 0.2);
            color: #ef4444;
            border: 1px solid #ef4444;
        }
        
        .balance-card {
            background: linear-gradient(135deg, #1e293b 0%, #0f172a 100%);
            border: 1px solid #2a2a2a;
            border-radius: 16px;
            padding: 24px;
            position: relative;
            overflow: hidden;
        }
        
        .balance-card::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(59, 130, 246, 0.1) 0%, transparent 70%);
            animation: pulse 4s ease-in-out infinite;
        }
        
        @keyframes pulse {
            0%, 100% { transform: scale(1); opacity: 0.5; }
            50% { transform: scale(1.1); opacity: 0.8; }
        }
        
        .transaction-history {
            max-height: 400px;
            overflow-y: auto;
        }
        
        .transaction-history::-webkit-scrollbar {
            width: 6px;
        }
        
        .transaction-history::-webkit-scrollbar-track {
            background: #1a1a1a;
        }
        
        .transaction-history::-webkit-scrollbar-thumb {
            background: #4a5568;
            border-radius: 3px;
        }
        
        .transaction-history::-webkit-scrollbar-thumb:hover {
            background: #718096;
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
        
        .amount-display {
            font-size: 2.5rem;
            font-weight: 700;
            background: linear-gradient(135deg, #3b82f6, #8b5cf6);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
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
                    <li class="text-white font-medium">Penarikan Dana</li>
                </ol>
            </nav>
            
            <!-- Page Header -->
            <div class="flex items-center justify-between mb-8">
                <div>
                    <h1 class="text-3xl font-bold text-white">Penarikan Dana</h1>
                    <p class="text-gray-400 mt-1">Kelola permintaan penarikan dana dari developer</p>
                </div>
                <div class="flex items-center space-x-3">
                    <button class="btn-secondary px-4 py-2 rounded-lg text-sm font-medium">
                        <i class="fas fa-download mr-2"></i>Export Report
                    </button>
                    <button class="btn-primary px-4 py-2 rounded-lg text-sm font-medium" onclick="openBulkProcessModal()">
                        <i class="fas fa-tasks mr-2"></i>Proses Massal
                    </button>
                </div>
            </div>
            
            <!-- Balance Overview -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="balance-card">
                    <div class="relative z-10">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-gray-400 text-sm">Saldo Platform</h3>
                            <div class="bg-green-600 p-2 rounded-full">
                                <i class="fas fa-wallet text-white text-sm"></i>
                            </div>
                        </div>
                        <p class="amount-display">Rp 524Jt</p>
                        <p class="text-sm text-gray-400 mt-2">Tersedia untuk penarikan</p>
                    </div>
                </div>
                
                <div class="admin-card rounded-xl p-6">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-gray-400 text-sm">Total Penarikan Bulan Ini</h3>
                        <div class="bg-blue-600 p-2 rounded-full">
                            <i class="fas fa-chart-line text-white text-sm"></i>
                        </div>
                    </div>
                    <p class="text-2xl font-bold text-white">Rp 187Jt</p>
                    <p class="text-sm text-green-400 mt-2">
                        <i class="fas fa-arrow-up"></i> 23% dari bulan lalu
                    </p>
                </div>
                
                <div class="admin-card rounded-xl p-6">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-gray-400 text-sm">Penarikan Pending</h3>
                        <div class="bg-yellow-600 p-2 rounded-full">
                            <i class="fas fa-hourglass-half text-white text-sm"></i>
                        </div>
                    </div>
                    <p class="text-2xl font-bold text-white">5</p>
                    <p class="text-sm text-yellow-400 mt-2">Menunggu proses</p>
                </div>
            </div>
            
            <!-- Filters -->
            <div class="admin-card rounded-xl p-6 mb-6">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-bold text-white">Filter Penarikan</h3>
                    <button class="text-blue-400 hover:text-blue-300 text-sm" onclick="resetFilters()">
                        <i class="fas fa-undo mr-1"></i>Reset Filter
                    </button>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <div>
                        <label class="block text-gray-400 text-sm mb-2">Status</label>
                        <select class="w-full bg-gray-800 border border-gray-700 rounded-lg px-3 py-2 text-white text-sm" id="statusFilter">
                            <option>Semua Status</option>
                            <option>Pending</option>
                            <option>Processing</option>
                            <option>Completed</option>
                            <option>Rejected</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-gray-400 text-sm mb-2">Tanggal</label>
                        <input type="date" class="w-full bg-gray-800 border border-gray-700 rounded-lg px-3 py-2 text-white text-sm">
                    </div>
                    <div>
                        <label class="block text-gray-400 text-sm mb-2">Jumlah Minimum</label>
                        <input type="number" placeholder="Rp 0" class="w-full bg-gray-800 border border-gray-700 rounded-lg px-3 py-2 text-white text-sm">
                    </div>
                    <div>
                        <label class="block text-gray-400 text-sm mb-2">Metode Pembayaran</label>
                        <select class="w-full bg-gray-800 border border-gray-700 rounded-lg px-3 py-2 text-white text-sm">
                            <option>Semua Metode</option>
                            <option>Transfer Bank</option>
                            <option>E-Wallet</option>
                        </select>
                    </div>
                </div>
            </div>
            
            <!-- Withdrawals Table -->
            <div class="admin-card rounded-xl p-6">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-xl font-bold text-white">Daftar Penarikan</h3>
                    <div class="flex items-center space-x-3">
                        <span class="text-gray-400 text-sm">Menampilkan 1-10 dari 127</span>
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
                    <table class="w-full">
                        <thead>
                            <tr class="border-b border-gray-700">
                                <th class="px-4 py-3 text-left">
                                    <input type="checkbox" class="rounded bg-gray-700 border-gray-600">
                                </th>
                                <th class="px-4 py-3 text-left text-gray-400 text-sm font-medium">Developer</th>
                                <th class="px-4 py-3 text-left text-gray-400 text-sm font-medium">Game</th>
                                <th class="px-4 py-3 text-left text-gray-400 text-sm font-medium">Jumlah</th>
                                <th class="px-4 py-3 text-left text-gray-400 text-sm font-medium">Metode</th>
                                <th class="px-4 py-3 text-left text-gray-400 text-sm font-medium">Status</th>
                                <th class="px-4 py-3 text-left text-gray-400 text-sm font-medium">Waktu</th>
                                <th class="px-4 py-3 text-center text-gray-400 text-sm font-medium">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="withdrawalTableBody">
                            <tr class="withdrawal-item pending border-b border-gray-800">
                                <td class="px-4 py-3">
                                    <input type="checkbox" class="rounded bg-gray-700 border-gray-600">
                                </td>
                                <td class="px-4 py-3">
                                    <div class="flex items-center space-x-3">
                                        <img src="https://picsum.photos/seed/dev1/40/40.jpg" alt="Developer" class="user-avatar">
                                        <div>
                                            <p class="font-medium text-white">Ahmad Wijaya</p>
                                            <p class="text-xs text-gray-400">ahmad.wijaya@email.com</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-4 py-3">
                                    <p class="text-sm">Cyber Warriors</p>
                                </td>
                                <td class="px-4 py-3">
                                    <p class="font-bold text-yellow-400">Rp 12.5Jt</p>
                                </td>
                                <td class="px-4 py-3">
                                    <p class="text-sm">BCA Transfer</p>
                                </td>
                                <td class="px-4 py-3">
                                    <span class="status-badge status-pending">Pending</span>
                                </td>
                                <td class="px-4 py-3">
                                    <p class="text-sm text-gray-400">2 jam yang lalu</p>
                                </td>
                                <td class="px-4 py-3 text-center">
                                    <div class="flex items-center justify-center space-x-2">
                                        <button class="text-blue-400 hover:text-blue-300" onclick="processWithdrawal('Ahmad Wijaya', 'Rp 12.5Jt')">
                                            <i class="fas fa-check"></i>
                                        </button>
                                        <button class="text-red-400 hover:text-red-300" onclick="rejectWithdrawal('Ahmad Wijaya', 'Rp 12.5Jt')">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            
                            <tr class="withdrawal-item pending border-b border-gray-800">
                                <td class="px-4 py-3">
                                    <input type="checkbox" class="rounded bg-gray-700 border-gray-600">
                                </td>
                                <td class="px-4 py-3">
                                    <div class="flex items-center space-x-3">
                                        <img src="https://picsum.photos/seed/dev2/40/40.jpg" alt="Developer" class="user-avatar">
                                        <div>
                                            <p class="font-medium text-white">Siti Nurhaliza</p>
                                            <p class="text-xs text-gray-400">siti.nurhaliza@email.com</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-4 py-3">
                                    <p class="text-sm">Space Explorer</p>
                                </td>
                                <td class="px-4 py-3">
                                    <p class="font-bold text-yellow-400">Rp 8.3Jt</p>
                                </td>
                                <td class="px-4 py-3">
                                    <p class="text-sm">Mandiri Transfer</p>
                                </td>
                                <td class="px-4 py-3">
                                    <span class="status-badge status-pending">Pending</span>
                                </td>
                                <td class="px-4 py-3">
                                    <p class="text-sm text-gray-400">5 jam yang lalu</p>
                                </td>
                                <td class="px-4 py-3 text-center">
                                    <div class="flex items-center justify-center space-x-2">
                                        <button class="text-blue-400 hover:text-blue-300" onclick="processWithdrawal('Siti Nurhaliza', 'Rp 8.3Jt')">
                                            <i class="fas fa-check"></i>
                                        </button>
                                        <button class="text-red-400 hover:text-red-300" onclick="rejectWithdrawal('Siti Nurhaliza', 'Rp 8.3Jt')">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            
                            <tr class="withdrawal-item processing border-b border-gray-800">
                                <td class="px-4 py-3">
                                    <input type="checkbox" class="rounded bg-gray-700 border-gray-600">
                                </td>
                                <td class="px-4 py-3">
                                    <div class="flex items-center space-x-3">
                                        <img src="https://picsum.photos/seed/dev3/40/40.jpg" alt="Developer" class="user-avatar">
                                        <div>
                                            <p class="font-medium text-white">Faisal Rahman</p>
                                            <p class="text-xs text-gray-400">faisal.rahman@email.com</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-4 py-3">
                                    <p class="text-sm">Racing Thunder</p>
                                </td>
                                <td class="px-4 py-3">
                                    <p class="font-bold text-blue-400">Rp 15.7Jt</p>
                                </td>
                                <td class="px-4 py-3">
                                    <p class="text-sm">BNI Transfer</p>
                                </td>
                                <td class="px-4 py-3">
                                    <span class="status-badge status-processing">Processing</span>
                                </td>
                                <td class="px-4 py-3">
                                    <p class="text-sm text-gray-400">1 hari yang lalu</p>
                                </td>
                                <td class="px-4 py-3 text-center">
                                    <div class="flex items-center justify-center space-x-2">
                                        <button class="text-gray-400" title="Sedang diproses">
                                            <i class="fas fa-spinner fa-spin"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            
                            <tr class="withdrawal-item completed border-b border-gray-800">
                                <td class="px-4 py-3">
                                    <input type="checkbox" class="rounded bg-gray-700 border-gray-600">
                                </td>
                                <td class="px-4 py-3">
                                    <div class="flex items-center space-x-3">
                                        <img src="https://picsum.photos/seed/dev4/40/40.jpg" alt="Developer" class="user-avatar">
                                        <div>
                                            <p class="font-medium text-white">Maya Putri</p>
                                            <p class="text-xs text-gray-400">maya.putri@email.com</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-4 py-3">
                                    <p class="text-sm">Mystic Quest</p>
                                </td>
                                <td class="px-4 py-3">
                                    <p class="font-bold text-green-400">Rp 5.2Jt</p>
                                </td>
                                <td class="px-4 py-3">
                                    <p class="text-sm">OVO</p>
                                </td>
                                <td class="px-4 py-3">
                                    <span class="status-badge status-completed">Completed</span>
                                </td>
                                <td class="px-4 py-3">
                                    <p class="text-sm text-gray-400">2 hari yang lalu</p>
                                </td>
                                <td class="px-4 py-3 text-center">
                                    <div class="flex items-center justify-center space-x-2">
                                        <button class="text-gray-400" title="Selesai">
                                            <i class="fas fa-check-circle"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            
                            <tr class="withdrawal-item rejected border-b border-gray-800">
                                <td class="px-4 py-3">
                                    <input type="checkbox" class="rounded bg-gray-700 border-gray-600">
                                </td>
                                <td class="px-4 py-3">
                                    <div class="flex items-center space-x-3">
                                        <img src="https://picsum.photos/seed/dev5/40/40.jpg" alt="Developer" class="user-avatar">
                                        <div>
                                            <p class="font-medium text-white">Rizki Pratama</p>
                                            <p class="text-xs text-gray-400">rizki.pratama@email.com</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-4 py-3">
                                    <p class="text-sm">Puzzle Master</p>
                                </td>
                                <td class="px-4 py-3">
                                    <p class="font-bold text-red-400">Rp 3.8Jt</p>
                                </td>
                                <td class="px-4 py-3">
                                    <p class="text-sm">GoPay</p>
                                </td>
                                <td class="px-4 py-3">
                                    <span class="status-badge status-rejected">Rejected</span>
                                </td>
                                <td class="px-4 py-3">
                                    <p class="text-sm text-gray-400">3 hari yang lalu</p>
                                </td>
                                <td class="px-4 py-3 text-center">
                                    <div class="flex items-center justify-center space-x-2">
                                        <button class="text-gray-400" title="Ditolak">
                                            <i class="fas fa-times-circle"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            
            <!-- Transaction History -->
            <div class="admin-card rounded-xl p-6 mt-6">
                <h3 class="text-lg font-bold text-white mb-4">Riwayat Transaksi Terkini</h3>
                <div class="transaction-history">
                    <div class="space-y-3">
                        <div class="flex items-center justify-between p-3 bg-gray-800 rounded-lg">
                            <div class="flex items-center space-x-3">
                                <div class="bg-green-600 p-2 rounded-full">
                                    <i class="fas fa-check text-white text-sm"></i>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-white">Penarikan berhasil - Maya Putri</p>
                                    <p class="text-xs text-gray-400">Mystic Quest • Rp 5.2Jt</p>
                                </div>
                            </div>
                            <span class="text-xs text-gray-400">2 jam yang lalu</span>
                        </div>
                        
                        <div class="flex items-center justify-between p-3 bg-gray-800 rounded-lg">
                            <div class="flex items-center space-x-3">
                                <div class="bg-blue-600 p-2 rounded-full">
                                    <i class="fas fa-spinner fa-spin text-white text-sm"></i>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-white">Memproses penarikan - Faisal Rahman</p>
                                    <p class="text-xs text-gray-400">Racing Thunder • Rp 15.7Jt</p>
                                </div>
                            </div>
                            <span class="text-xs text-gray-400">5 jam yang lalu</span>
                        </div>
                        
                        <div class="flex items-center justify-between p-3 bg-gray-800 rounded-lg">
                            <div class="flex items-center space-x-3">
                                <div class="bg-red-600 p-2 rounded-full">
                                    <i class="fas fa-times text-white text-sm"></i>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-white">Penarikan ditolak - Rizki Pratama</p>
                                    <p class="text-xs text-gray-400">Puzzle Master • Rp 3.8Jt</p>
                                </div>
                            </div>
                            <span class="text-xs text-gray-400">1 hari yang lalu</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    
    <!-- Process Withdrawal Modal -->
    <div id="processModal" class="modal fixed inset-0 z-50 hidden">
        <div class="flex items-center justify-center min-h-screen px-4">
            <div class="modal-content rounded-xl p-6 w-full max-w-md">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-xl font-bold text-white">Proses Penarikan</h3>
                    <button onclick="closeProcessModal()" class="text-gray-400 hover:text-white">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                
                <div class="space-y-4">
                    <div class="bg-gray-800 rounded-lg p-4">
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-gray-400">Developer</span>
                            <span class="font-medium text-white" id="processDeveloper">-</span>
                        </div>
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-gray-400">Game</span>
                            <span class="font-medium text-white" id="processGame">-</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-gray-400">Jumlah</span>
                            <span class="font-bold text-yellow-400" id="processAmount">-</span>
                        </div>
                    </div>
                    
                    <div>
                        <label class="block text-gray-400 text-sm mb-2">Metode Pembayaran</label>
                        <select class="w-full bg-gray-800 border border-gray-700 rounded-lg px-3 py-2 text-white">
                            <option>Transfer Bank (BCA)</option>
                            <option>Transfer Bank (Mandiri)</option>
                            <option>Transfer Bank (BNI)</option>
                            <option>E-Wallet (OVO)</option>
                            <option>E-Wallet (GoPay)</option>
                            <option>E-Wallet (DANA)</option>
                        </select>
                    </div>
                    
                    <div>
                        <label class="block text-gray-400 text-sm mb-2">Catatan (Opsional)</label>
                        <textarea class="w-full bg-gray-800 border border-gray-700 rounded-lg px-3 py-2 text-white" rows="3" placeholder="Tambahkan catatan..."></textarea>
                    </div>
                    
                    <div class="flex justify-end space-x-3 pt-4">
                        <button onclick="closeProcessModal()" class="btn-secondary px-4 py-2 rounded-lg">Batal</button>
                        <button onclick="confirmProcess()" class="btn-success px-4 py-2 rounded-lg">
                            <i class="fas fa-check mr-2"></i>Konfirmasi
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Reject Withdrawal Modal -->
    <div id="rejectModal" class="modal fixed inset-0 z-50 hidden">
        <div class="flex items-center justify-center min-h-screen px-4">
            <div class="modal-content rounded-xl p-6 w-full max-w-md">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-xl font-bold text-white">Tolak Penarikan</h3>
                    <button onclick="closeRejectModal()" class="text-gray-400 hover:text-white">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                
                <div class="space-y-4">
                    <div class="bg-gray-800 rounded-lg p-4">
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-gray-400">Developer</span>
                            <span class="font-medium text-white" id="rejectDeveloper">-</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-gray-400">Jumlah</span>
                            <span class="font-bold text-yellow-400" id="rejectAmount">-</span>
                        </div>
                    </div>
                    
                    <div>
                        <label class="block text-gray-400 text-sm mb-2">Alasan Penolakan *</label>
                        <textarea class="w-full bg-gray-800 border border-gray-700 rounded-lg px-3 py-2 text-white" rows="3" placeholder="Harap berikan alasan penolakan..." required></textarea>
                    </div>
                    
                    <div class="bg-red-900 border border-red-700 rounded-lg p-3">
                        <p class="text-sm text-red-400">
                            <i class="fas fa-exclamation-triangle mr-2"></i>
                            Developer akan menerima notifikasi penolakan dengan alasan yang diberikan.
                        </p>
                    </div>
                    
                    <div class="flex justify-end space-x-3 pt-4">
                        <button onclick="closeRejectModal()" class="btn-secondary px-4 py-2 rounded-lg">Batal</button>
                        <button onclick="confirmReject()" class="btn-danger px-4 py-2 rounded-lg">
                            <i class="fas fa-times mr-2"></i>Tolak Penarikan
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Bulk Process Modal -->
    <div id="bulkModal" class="modal fixed inset-0 z-50 hidden">
        <div class="flex items-center justify-center min-h-screen px-4">
            <div class="modal-content rounded-xl p-6 w-full max-w-lg">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-xl font-bold text-white">Proses Penarikan Massal</h3>
                    <button onclick="closeBulkModal()" class="text-gray-400 hover:text-white">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                
                <div class="space-y-4">
                    <div class="bg-gray-800 rounded-lg p-4">
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-gray-400">Total Penarikan</span>
                            <span class="font-bold text-yellow-400">5</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-gray-400">Total Jumlah</span>
                            <span class="font-bold text-white">Rp 45.5Jt</span>
                        </div>
                    </div>
                    
                    <div class="space-y-2">
                        <h4 class="text-sm font-medium text-white">Daftar Penarikan:</h4>
                        <div class="space-y-2 max-h-40 overflow-y-auto">
                            <div class="flex items-center justify-between p-2 bg-gray-700 rounded">
                                <span class="text-sm">Ahmad Wijaya</span>
                                <span class="text-sm text-yellow-400">Rp 12.5Jt</span>
                            </div>
                            <div class="flex items-center justify-between p-2 bg-gray-700 rounded">
                                <span class="text-sm">Siti Nurhaliza</span>
                                <span class="text-sm text-yellow-400">Rp 8.3Jt</span>
                            </div>
                            <div class="flex items-center justify-between p-2 bg-gray-700 rounded">
                                <span class="text-sm">Faisal Rahman</span>
                                <span class="text-sm text-yellow-400">Rp 15.7Jt</span>
                            </div>
                        </div>
                    </div>
                    
                    <div>
                        <label class="block text-gray-400 text-sm mb-2">Metode Pembayaran</label>
                        <select class="w-full bg-gray-800 border border-gray-700 rounded-lg px-3 py-2 text-white">
                            <option>Gunakan metode masing-masing</option>
                            <option>Transfer Bank (BCA)</option>
                            <option>Transfer Bank (Mandiri)</option>
                            <option>Transfer Bank (BNI)</option>
                        </select>
                    </div>
                    
                    <div class="bg-yellow-900 border border-yellow-700 rounded-lg p-3">
                        <p class="text-sm text-yellow-400">
                            <i class="fas fa-exclamation-triangle mr-2"></i>
                            Pastikan saldo platform mencukupi sebelum memproses penarikan massal.
                        </p>
                    </div>
                    
                    <div class="flex justify-end space-x-3 pt-4">
                        <button onclick="closeBulkModal()" class="btn-secondary px-4 py-2 rounded-lg">Batal</button>
                        <button onclick="confirmBulk()" class="btn-success px-4 py-2 rounded-lg">
                            <i class="fas fa-check mr-2"></i>Proses Semua
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        function openProcessModal() {
            document.getElementById('processModal').classList.remove('hidden');
        }
        
        function closeProcessModal() {
            document.getElementById('processModal').classList.add('hidden');
        }
        
        function openRejectModal() {
            document.getElementById('rejectModal').classList.remove('hidden');
        }
        
        function closeRejectModal() {
            document.getElementById('rejectModal').classList.add('hidden');
        }
        
        function openBulkProcessModal() {
            document.getElementById('bulkModal').classList.remove('hidden');
        }
        
        function closeBulkModal() {
            document.getElementById('bulkModal').classList.add('hidden');
        }
        
        function processWithdrawal(developer, amount) {
            document.getElementById('processDeveloper').textContent = developer;
            document.getElementById('processAmount').textContent = amount;
            
            // Set game name based on developer
            const gameMap = {
                'Ahmad Wijaya': 'Cyber Warriors',
                'Siti Nurhaliza': 'Space Explorer',
                'Faisal Rahman': 'Racing Thunder'
            };
            document.getElementById('processGame').textContent = gameMap[developer] || '-';
            
            openProcessModal();
        }
        
        function rejectWithdrawal(developer, amount) {
            document.getElementById('rejectDeveloper').textContent = developer;
            document.getElementById('rejectAmount').textContent = amount;
            openRejectModal();
        }
        
        function confirmProcess() {
            alert('Penarikan sedang diproses. Developer akan menerima notifikasi.');
            closeProcessModal();
        }
        
        function confirmReject() {
            alert('Penarikan telah ditolak. Developer akan menerima notifikasi.');
            closeRejectModal();
        }
        
        function confirmBulk() {
            alert('Semua penarikan sedang diproses. Developer akan menerima notifikasi.');
            closeBulkModal();
        }
        
        function resetFilters() {
            document.getElementById('statusFilter').selectedIndex = 0;
            // Reset other filters here
        }
        
        // Search functionality
        document.getElementById('searchInput').addEventListener('input', function(e) {
            const searchTerm = e.target.value.toLowerCase();
            const rows = document.querySelectorAll('#withdrawalTableBody tr');
            
            rows.forEach(row => {
                const text = row.textContent.toLowerCase();
                row.style.display = text.includes(searchTerm) ? '' : 'none';
            });
        });
        
        // Status filter
        document.getElementById('statusFilter').addEventListener('change', function(e) {
            const status = e.target.value.toLowerCase();
            const rows = document.querySelectorAll('#withdrawalTableBody tr');
            
            rows.forEach(row => {
                if (status === 'semua status' || !status) {
                    row.style.display = '';
                } else {
                    const statusCell = row.querySelector('.status-badge');
                    const statusText = statusCell.textContent.toLowerCase();
                    row.style.display = statusText.includes(status) ? '' : 'none';
                }
            });
        });
    </script>
</body>
</html>
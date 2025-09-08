<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asset Management - GameHub Admin</title>
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
        
        .status-rejected {
            background: rgba(239, 68, 68, 0.2);
            color: #ef4444;
            border: 1px solid #ef4444;
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
        
        .asset-thumbnail {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 8px;
        }
        
        .user-avatar {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            object-fit: cover;
        }
        
        .asset-icon {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
        }
        
        .asset-preview {
            max-width: 100%;
            max-height: 400px;
            object-fit: contain;
            border-radius: 8px;
        }
        
        .asset-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
            gap: 16px;
        }
        
        .asset-grid-item {
            background: #1a1a1a;
            border: 1px solid #2a2a2a;
            border-radius: 8px;
            overflow: hidden;
            transition: all 0.3s ease;
            cursor: pointer;
        }
        
        .asset-grid-item:hover {
            border-color: #3b82f6;
            transform: translateY(-2px);
        }
        
        .asset-grid-item img {
            width: 100%;
            height: 120px;
            object-fit: cover;
        }
        
        .asset-grid-item-info {
            padding: 8px;
        }
        
        .asset-grid-item-title {
            font-size: 12px;
            font-weight: 600;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        
        .asset-grid-item-meta {
            font-size: 10px;
            color: #9ca3af;
            display: flex;
            justify-content: space-between;
            margin-top: 4px;
        }
        
        .progress-bar {
            background: #2a2a2a;
            border-radius: 10px;
            overflow: hidden;
            height: 8px;
        }
        
        .progress-fill {
            height: 100%;
            background: linear-gradient(90deg, #3b82f6, #2563eb);
            transition: width 0.3s ease;
        }
        
        .type-badge {
            padding: 2px 8px;
            border-radius: 12px;
            font-size: 10px;
            font-weight: 500;
        }
        
        .type-image {
            background: rgba(59, 130, 246, 0.2);
            color: #3b82f6;
            border: 1px solid #3b82f6;
        }
        
        .type-audio {
            background: rgba(168, 85, 247, 0.2);
            color: #a855f7;
            border: 1px solid #a855f7;
        }
        
        .type-video {
            background: rgba(236, 72, 153, 0.2);
            color: #ec4899;
            border: 1px solid #ec4899;
        }
        
        .type-model {
            background: rgba(34, 197, 94, 0.2);
            color: #22c55e;
            border: 1px solid #22c55e;
        }
        
        .type-other {
            background: rgba(107, 114, 128, 0.2);
            color: #9ca3af;
            border: 1px solid #6b7280;
        }
        
        .uploader-badge {
            background: rgba(99, 102, 241, 0.2);
            color: #6366f1;
            border: 1px solid #6366f1;
            padding: 2px 8px;
            border-radius: 12px;
            font-size: 10px;
            font-weight: 500;
        }
        
        .admin-uploader {
            background: rgba(239, 68, 68, 0.2);
            color: #ef4444;
            border: 1px solid #ef4444;
        }
        
        .developer-uploader {
            background: rgba(34, 197, 94, 0.2);
            color: #22c55e;
            border: 1px solid #22c55e;
        }
        
        .moderator-uploader {
            background: rgba(245, 158, 11, 0.2);
            color: #f59e0b;
            border: 1px solid #f59e0b;
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
                    <li class="text-white font-medium">Asset Management</li>
                </ol>
            </nav>
            
            <!-- Page Header -->
            <div class="flex items-center justify-between mb-8">
                <div>
                    <h1 class="text-3xl font-bold text-white">Asset Management</h1>
                    <p class="text-gray-400 mt-1">Kelola semua asset yang diupload oleh developer dan moderator</p>
                </div>
                <div class="flex items-center space-x-3">
                    <button class="btn-secondary px-4 py-2 rounded-lg text-sm font-medium">
                        <i class="fas fa-download mr-2"></i>Export Assets
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
                            <p class="text-gray-400 text-sm">Total Assets</p>
                            <p class="text-2xl font-bold text-white">1,247</p>
                        </div>
                    </div>
                </div>
                <div class="admin-card rounded-xl p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-400 text-sm">Approved</p>
                            <p class="text-2xl font-bold text-white">987</p>
                        </div>
                    </div>
                </div>
                <div class="admin-card rounded-xl p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-400 text-sm">Pending Review</p>
                            <p class="text-2xl font-bold text-white">87</p>
                        </div>
                    </div>
                </div>
                <div class="admin-card rounded-xl p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-400 text-sm">Rejected</p>
                            <p class="text-2xl font-bold text-white">42</p>
                        </div>
                    </div>
                </div>
                <div class="admin-card rounded-xl p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-400 text-sm">New Uploads</p>
                            <p class="text-2xl font-bold text-white">23</p>
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
                
                <div class="grid grid-cols-1 md:grid-cols-5 gap-4 mb-4">
                    <div>
                        <label class="block text-gray-400 text-sm mb-2">Status</label>
                        <select class="w-full bg-gray-800 border border-gray-700 rounded-lg px-3 py-2 text-white text-sm" id="statusFilter">
                            <option>All Status</option>
                            <option>Approved</option>
                            <option>Pending Review</option>
                            <option>Rejected</option>
                            <option>Featured</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-gray-400 text-sm mb-2">Asset Type</label>
                        <select class="w-full bg-gray-800 border border-gray-700 rounded-lg px-3 py-2 text-white text-sm" id="typeFilter">
                            <option>All Types</option>
                            <option>Images</option>
                            <option>Audio</option>
                            <option>Video</option>
                            <option>3D Models</option>
                            <option>Other</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-gray-400 text-sm mb-2">Uploader</label>
                        <select class="w-full bg-gray-800 border border-gray-700 rounded-lg px-3 py-2 text-white text-sm" id="uploaderFilter">
                            <option>All Uploaders</option>
                            <option>Admin</option>
                            <option>Developer</option>
                            <option>Moderator</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-gray-400 text-sm mb-2">Upload Date</label>
                        <input type="date" class="w-full bg-gray-800 border border-gray-700 rounded-lg px-3 py-2 text-white text-sm">
                    </div>
                    <div>
                        <label class="block text-gray-400 text-sm mb-2">File Size</label>
                        <select class="w-full bg-gray-800 border border-gray-700 rounded-lg px-3 py-2 text-white text-sm">
                            <option>All Sizes</option>
                            <option>Small (&lt; 1MB)</option>
                            <option>Medium (1-10MB)</option>
                            <option>Large (10-50MB)</option>
                            <option>Very Large (&gt; 50MB)</option>
                        </select>
                    </div>
                </div>
                
                <!-- Quick Filter Pills -->
                <div class="filter-pills mb-4">
                    <span class="filter-pill active">All Assets</span>
                    <span class="filter-pill">Pending Approval</span>
                    <span class="filter-pill">Featured Assets</span>
                    <span class="filter-pill">Recently Uploaded</span>
                    <span class="filter-pill">Flagged Content</span>
                    <span class="filter-pill">Large Files</span>
                    <span class="filter-pill">Developer Uploads</span>
                </div>
            </div>
            
            <!-- Assets Table -->
            <div class="admin-card rounded-xl p-6">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-xl font-bold text-white">Assets List</h3>
                    <div class="flex items-center space-x-3">
                        <span class="text-gray-400 text-sm">Showing 1-10 of 1,247</span>
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
                                    Asset <i class="fas fa-sort ml-1 text-gray-500"></i>
                                </th>
                                <th class="px-6 py-4 text-left cursor-pointer hover:bg-gray-800">
                                    Type <i class="fas fa-sort ml-1 text-gray-500"></i>
                                </th>
                                <th class="px-6 py-4 text-left cursor-pointer hover:bg-gray-800">
                                    Size <i class="fas fa-sort ml-1 text-gray-500"></i>
                                </th>
                                <th class="px-6 py-4 text-left cursor-pointer hover:bg-gray-800">
                                    Uploader <i class="fas fa-sort ml-1 text-gray-500"></i>
                                </th>
                                <th class="px-6 py-4 text-left cursor-pointer hover:bg-gray-800">
                                    Upload Date <i class="fas fa-sort ml-1 text-gray-500"></i>
                                </th>
                                <th class="px-6 py-4 text-left cursor-pointer hover:bg-gray-800">
                                    Status <i class="fas fa-sort ml-1 text-gray-500"></i>
                                </th>
                                <th class="px-6 py-4 text-left">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="assetTableBody">
                            <tr class="hover:bg-gray-800">
                                <td class="px-6 py-4">
                                    <input type="checkbox" class="rounded bg-gray-700 border-gray-600">
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center space-x-3">
                                        <img src="https://images.unsplash.com/photo-1552820728-8b83bb6b773f?w=100&h=100&fit=crop" alt="Asset" class="asset-thumbnail">
                                        <div>
                                            <p class="font-medium text-white">cyber_runner_character.png</p>
                                            <p class="text-sm text-gray-400">Character sprite</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="type-badge type-image">Image</span>
                                </td>
                                <td class="px-6 py-4">
                                    <p class="text-sm">2.4 MB</p>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center space-x-2">
                                        <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=40&h=40&fit=crop" alt="Uploader" class="user-avatar">
                                        <div>
                                            <p class="font-medium text-white text-sm">Suncyan</p>
                                            <span class="uploader-badge admin-uploader">Admin</span>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <p class="text-sm">Dec 15, 2024</p>
                                    <p class="text-xs text-gray-400">10:30 AM</p>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="status-badge status-approved">Approved</span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center space-x-2">
                                        <button class="p-2 bg-blue-600 rounded hover:bg-blue-700 transition-colors" title="View Details" onclick="openAssetModal('cyber_runner_character.png')">
                                            <i class="fas fa-eye text-white text-sm"></i>
                                        </button>
                                        <button class="p-2 bg-green-600 rounded hover:bg-green-700 transition-colors" title="Download">
                                            <i class="fas fa-download text-white text-sm"></i>
                                        </button>
                                        <button class="p-2 bg-purple-600 rounded hover:bg-purple-700 transition-colors" title="Feature">
                                            <i class="fas fa-star text-white text-sm"></i>
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
                                        <div class="asset-icon bg-purple-600">
                                            <i class="fas fa-music text-white"></i>
                                        </div>
                                        <div>
                                            <p class="font-medium text-white">fantasy_background_music.mp3</p>
                                            <p class="text-sm text-gray-400">Background music</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="type-badge type-audio">Audio</span>
                                </td>
                                <td class="px-6 py-4">
                                    <p class="text-sm">5.8 MB</p>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center space-x-2">
                                        <img src="https://images.unsplash.com/photo-1494790108755-2616b612b1c7?w=40&h=40&fit=crop" alt="Uploader" class="user-avatar">
                                        <div>
                                            <p class="font-medium text-white text-sm">Sarah Kim</p>
                                            <span class="uploader-badge developer-uploader">Developer</span>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <p class="text-sm">Dec 14, 2024</p>
                                    <p class="text-xs text-gray-400">3:45 PM</p>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="status-badge status-pending">Pending</span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center space-x-2">
                                        <button class="btn-success p-2 rounded text-sm" onclick="openAssetModal('fantasy_background_music.mp3')" title="Review & Approve">
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
                                        <div class="asset-icon bg-pink-600">
                                            <i class="fas fa-video text-white"></i>
                                        </div>
                                        <div>
                                            <p class="font-medium text-white">gameplay_trailer.mp4</p>
                                            <p class="text-sm text-gray-400">Promotional video</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="type-badge type-video">Video</span>
                                </td>
                                <td class="px-6 py-4">
                                    <p class="text-sm">24.7 MB</p>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center space-x-2">
                                        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=40&h=40&fit=crop" alt="Uploader" class="user-avatar">
                                        <div>
                                            <p class="font-medium text-white text-sm">Alex Chen</p>
                                            <span class="uploader-badge admin-uploader">Admin</span>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <p class="text-sm">Dec 13, 2024</p>
                                    <p class="text-xs text-gray-400">9:15 AM</p>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="status-badge status-featured">Featured</span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center space-x-2">
                                        <button class="p-2 bg-blue-600 rounded hover:bg-blue-700 transition-colors" title="View Details" onclick="openAssetModal('gameplay_trailer.mp4')">
                                            <i class="fas fa-eye text-white text-sm"></i>
                                        </button>
                                        <button class="p-2 bg-green-600 rounded hover:bg-green-700 transition-colors" title="Download">
                                            <i class="fas fa-download text-white text-sm"></i>
                                        </button>
                                        <button class="p-2 bg-gray-600 rounded hover:bg-gray-700 transition-colors" title="Unfeature">
                                            <i class="fas fa-star-half-alt text-white text-sm"></i>
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
                                        <div class="asset-icon bg-green-600">
                                            <i class="fas fa-cube text-white"></i>
                                        </div>
                                        <div>
                                            <p class="font-medium text-white">race_car_model.fbx</p>
                                            <p class="text-sm text-gray-400">3D vehicle model</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="type-badge type-model">3D Model</span>
                                </td>
                                <td class="px-6 py-4">
                                    <p class="text-sm">12.3 MB</p>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center space-x-2">
                                        <img src="https://images.unsplash.com/photo-1517841905240-472988babdf9?w=40&h=40&fit=crop" alt="Uploader" class="user-avatar">
                                        <div>
                                            <p class="font-medium text-white text-sm">Michael Wong</p>
                                            <span class="uploader-badge developer-uploader">Developer</span>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <p class="text-sm">Dec 12, 2024</p>
                                    <p class="text-xs text-gray-400">2:30 PM</p>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="status-badge status-approved">Approved</span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center space-x-2">
                                        <button class="p-2 bg-blue-600 rounded hover:bg-blue-700 transition-colors" title="View Details" onclick="openAssetModal('race_car_model.fbx')">
                                            <i class="fas fa-eye text-white text-sm"></i>
                                        </button>
                                        <button class="p-2 bg-green-600 rounded hover:bg-green-700 transition-colors" title="Download">
                                            <i class="fas fa-download text-white text-sm"></i>
                                        </button>
                                        <button class="p-2 bg-purple-600 rounded hover:bg-purple-700 transition-colors" title="Feature">
                                            <i class="fas fa-star text-white text-sm"></i>
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
                                        <img src="https://images.unsplash.com/photo-1558591710-4b4a1ae0f04d?w=100&h=100&fit=crop" alt="Asset" class="asset-thumbnail">
                                        <div>
                                            <p class="font-medium text-white">ui_button_set.png</p>
                                            <p class="text-sm text-gray-400">UI elements pack</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="type-badge type-image">Image</span>
                                </td>
                                <td class="px-6 py-4">
                                    <p class="text-sm">3.1 MB</p>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center space-x-2">
                                        <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=40&h=40&fit=crop" alt="Uploader" class="user-avatar">
                                        <div>
                                            <p class="font-medium text-white text-sm">Emma Johnson</p>
                                            <span class="uploader-badge moderator-uploader">Moderator</span>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <p class="text-sm">Dec 11, 2024</p>
                                    <p class="text-xs text-gray-400">11:20 AM</p>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="status-badge status-approved">Approved</span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center space-x-2">
                                        <button class="p-2 bg-blue-600 rounded hover:bg-blue-700 transition-colors" title="View Details" onclick="openAssetModal('ui_button_set.png')">
                                            <i class="fas fa-eye text-white text-sm"></i>
                                        </button>
                                        <button class="p-2 bg-green-600 rounded hover:bg-green-700 transition-colors" title="Download">
                                            <i class="fas fa-download text-white text-sm"></i>
                                        </button>
                                        <button class="p-2 bg-purple-600 rounded hover:bg-purple-700 transition-colors" title="Feature">
                                            <i class="fas fa-star text-white text-sm"></i>
                                        </button>
                                        <button class="p-2 bg-red-600 rounded hover:bg-red-700 transition-colors" title="Delete">
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
    
    <!-- Asset Detail Modal -->
    <div id="assetModal" class="modal fixed inset-0 z-50 hidden">
        <div class="flex items-center justify-center min-h-screen px-4">
            <div class="modal-content rounded-xl p-0 w-full max-w-4xl max-h-screen overflow-y-auto">
                <!-- Modal Header -->
                <div class="p-6 border-b border-gray-700">
                    <div class="flex items-center justify-between">
                        <h3 class="text-xl font-bold text-white">Asset Details</h3>
                        <button onclick="closeAssetModal()" class="text-gray-400 hover:text-white">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 p-6">
                    <!-- Asset Preview -->
                    <div class="space-y-6">
                        <div class="admin-card rounded-lg p-4">
                            <h4 class="text-lg font-bold text-white mb-4">Preview</h4>
                            <div class="flex justify-center">
                                <img src="https://images.unsplash.com/photo-1552820728-8b83bb6b773f?w=400&h=300&fit=crop" alt="Asset Preview" class="asset-preview">
                            </div>
                        </div>
                        <div class="admin-card rounded-lg p-4">
                            <h4 class="text-lg font-bold text-white mb-4">Asset Information</h4>
                            <div class="space-y-3">
                                <div class="grid grid-cols-2 gap-4 text-sm">
                                    <div>
                                        <p class="text-gray-400">File Name</p>
                                        <p class="text-white font-medium" id="assetFileName">cyber_runner_character.png</p>
                                    </div>
                                    <div>
                                        <p class="text-gray-400">File Type</p>
                                        <p class="text-white font-medium">PNG Image</p>
                                    </div>
                                    <div>
                                        <p class="text-gray-400">File Size</p>
                                        <p class="text-white font-medium">2.4 MB</p>
                                    </div>
                                    <div>
                                        <p class="text-gray-400">Dimensions</p>
                                        <p class="text-white font-medium">1024 x 1024 px</p>
                                    </div>
                                    <div>
                                        <p class="text-gray-400">Upload Date</p>
                                        <p class="text-white font-medium">Dec 15, 2024</p>
                                    </div>
                                    <div>
                                        <p class="text-gray-400">Last Modified</p>
                                        <p class="text-white font-medium">Dec 15, 2024</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Uploader & Actions -->
                    <div class="space-y-6">
                        <div class="admin-card rounded-lg p-4">
                            <h4 class="text-lg font-bold text-white mb-4">Uploader Information</h4>
                            <div class="flex items-center space-x-4">
                                <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=80&h=80&fit=crop" alt="Uploader" class="w-16 h-16 rounded-full object-cover">
                                <div>
                                    <p class="font-bold text-white text-lg">Suncyan</p>
                                    <p class="text-gray-400">Administrator</p>
                                    <p class="text-gray-400 text-sm">suncyan@gamehub.com</p>
                                    <span class="uploader-badge admin-uploader mt-1">Admin</span>
                                </div>
                            </div>
                            <div class="mt-4 pt-4 border-t border-gray-700">
                                <h5 class="text-white font-medium mb-2">Upload Statistics</h5>
                                <div class="grid grid-cols-3 gap-2 text-sm">
                                    <div class="bg-gray-800 p-2 rounded text-center">
                                        <p class="text-gray-400">Total Uploads</p>
                                        <p class="text-white font-bold">142</p>
                                    </div>
                                    <div class="bg-gray-800 p-2 rounded text-center">
                                        <p class="text-gray-400">Approved</p>
                                        <p class="text-green-400 font-bold">128</p>
                                    </div>
                                    <div class="bg-gray-800 p-2 rounded text-center">
                                        <p class="text-gray-400">Rejected</p>
                                        <p class="text-red-400 font-bold">14</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="admin-card rounded-lg p-4">
                            <h4 class="text-lg font-bold text-white mb-4">Usage Information</h4>
                            <div class="space-y-3">
                                <div>
                                    <div class="flex justify-between mb-1">
                                        <span class="text-gray-400">Downloads</span>
                                        <span class="text-white">1,247</span>
                                    </div>
                                    <div class="progress-bar">
                                        <div class="progress-fill" style="width: 75%;"></div>
                                    </div>
                                </div>
                                <div>
                                    <div class="flex justify-between mb-1">
                                        <span class="text-gray-400">Views</span>
                                        <span class="text-white">3,892</span>
                                    </div>
                                    <div class="progress-bar">
                                        <div class="progress-fill" style="width: 90%;"></div>
                                    </div>
                                </div>
                                <div>
                                    <div class="flex justify-between mb-1">
                                        <span class="text-gray-400">Used in Games</span>
                                        <span class="text-white">12</span>
                                    </div>
                                    <div class="progress-bar">
                                        <div class="progress-fill" style="width: 30%;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="admin-card rounded-lg p-4">
                            <h4 class="text-lg font-bold text-white mb-4">Related Assets</h4>
                            <div class="asset-grid">
                                <div class="asset-grid-item">
                                    <img src="https://images.unsplash.com/photo-1552820728-8b83bb6b773f?w=150&h=120&fit=crop" alt="Related Asset">
                                    <div class="asset-grid-item-info">
                                        <div class="asset-grid-item-title">character_idle.png</div>
                                        <div class="asset-grid-item-meta">
                                            <span>Image</span>
                                            <span>1.8MB</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="asset-grid-item">
                                    <img src="https://images.unsplash.com/photo-1542751371-adc38448a05e?w=150&h=120&fit=crop" alt="Related Asset">
                                    <div class="asset-grid-item-info">
                                        <div class="asset-grid-item-title">character_run.png</div>
                                        <div class="asset-grid-item-meta">
                                            <span>Image</span>
                                            <span>2.1MB</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="asset-grid-item">
                                    <img src="https://images.unsplash.com/photo-1614680376739-414d95ff43df?w=150&h=120&fit=crop" alt="Related Asset">
                                    <div class="asset-grid-item-info">
                                        <div class="asset-grid-item-title">character_jump.png</div>
                                        <div class="asset-grid-item-meta">
                                            <span>Image</span>
                                            <span>1.9MB</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal Footer -->
                <div class="p-6 border-t border-gray-700">
                    <div class="flex justify-end space-x-3">
                        <button onclick="closeAssetModal()" class="btn-secondary px-6 py-2 rounded-lg">
                            Close
                        </button>
                        <button class="btn-danger px-6 py-2 rounded-lg">
                            <i class="fas fa-trash mr-2"></i>Delete Asset
                        </button>
                        <button class="btn-success px-6 py-2 rounded-lg">
                            <i class="fas fa-check mr-2"></i>Approve Asset
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        // Modal functions
        function openAssetModal(assetName) {
            document.getElementById('assetModal').classList.remove('hidden');
            document.getElementById('assetFileName').textContent = assetName;
            document.body.style.overflow = 'hidden';
        }
        
        function closeAssetModal() {
            document.getElementById('assetModal').classList.add('hidden');
            document.body.style.overflow = 'auto';
        }
        
        // Filter functions
        function resetFilters() {
            document.getElementById('statusFilter').value = 'All Status';
            document.getElementById('typeFilter').value = 'All Types';
            document.getElementById('uploaderFilter').value = 'All Uploaders';
            
            // Reset filter pills
            document.querySelectorAll('.filter-pill').forEach(pill => {
                pill.classList.remove('active');
            });
            document.querySelector('.filter-pill').classList.add('active');
        }
        
        // Search functionality
        document.getElementById('searchInput').addEventListener('input', function(e) {
            const searchTerm = e.target.value.toLowerCase();
            const rows = document.querySelectorAll('#assetTableBody tr');
            
            rows.forEach(row => {
                const text = row.textContent.toLowerCase();
                row.style.display = text.includes(searchTerm) ? '' : 'none';
            });
        });
        
        // Status filter
        document.getElementById('statusFilter').addEventListener('change', function(e) {
            const status = e.target.value.toLowerCase();
            const rows = document.querySelectorAll('#assetTableBody tr');
            
            rows.forEach(row => {
                if (status === 'all status' || !status) {
                    row.style.display = '';
                } else {
                    const statusCell = row.querySelector('.status-badge');
                    const statusText = statusCell.textContent.toLowerCase();
                    row.style.display = statusText.includes(status) ? '' : 'none';
                }
            });
        });
        
        // Type filter
        document.getElementById('typeFilter').addEventListener('change', function(e) {
            const type = e.target.value.toLowerCase();
            const rows = document.querySelectorAll('#assetTableBody tr');
            
            rows.forEach(row => {
                if (type === 'all types' || !type) {
                    row.style.display = '';
                } else {
                    const typeCell = row.querySelector('.type-badge');
                    const typeText = typeCell.textContent.toLowerCase();
                    row.style.display = typeText.includes(type) ? '' : 'none';
                }
            });
        });
        
        // Uploader filter
        document.getElementById('uploaderFilter').addEventListener('change', function(e) {
            const uploader = e.target.value.toLowerCase();
            const rows = document.querySelectorAll('#assetTableBody tr');
            
            rows.forEach(row => {
                if (uploader === 'all uploaders' || !uploader) {
                    row.style.display = '';
                } else {
                    const uploaderCell = row.querySelector('.uploader-badge');
                    const uploaderText = uploaderCell.textContent.toLowerCase();
                    row.style.display = uploaderText.includes(uploader) ? '' : 'none';
                }
            });
        });
        
        // Filter pills interaction
        document.querySelectorAll('.filter-pill').forEach(pill => {
            pill.addEventListener('click', function() {
                document.querySelectorAll('.filter-pill').forEach(p => p.classList.remove('active'));
                this.classList.add('active');
            });
        });
        
        // Close modal when clicking outside
        document.getElementById('assetModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeAssetModal();
            }
        });
        
        // Keyboard shortcuts
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeAssetModal();
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
            console.log('Asset Management Dashboard Loaded');
            
            // Add hover effects for action buttons
            document.querySelectorAll('button[title]').forEach(button => {
                button.addEventListener('mouseenter', function() {
                    // Could add custom tooltip logic here
                });
            });
        });
    </script>
</body>
</html>
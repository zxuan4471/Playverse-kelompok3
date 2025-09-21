<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GameHub - Pengaturan</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #0f0f23 0%, #1a1a2e 50%, #16213e 100%);
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
        }
        
        .neon-glow {
            box-shadow: 0 0 20px rgba(59, 130, 246, 0.3), 0 0 40px rgba(59, 130, 246, 0.1);
        }
        
        .glass-morphism {
            background: rgba(30, 30, 63, 0.8);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .settings-card {
            background: linear-gradient(145deg, #1e1e3f 0%, #2a2a5a 100%);
            border: 1px solid rgba(59, 130, 246, 0.2);
            backdrop-filter: blur(10px);
            transition: all 0.3s ease;
        }
        
        .settings-card:hover {
            box-shadow: 0 15px 30px rgba(59, 130, 246, 0.25), 0 0 25px rgba(59, 130, 246, 0.15);
            border-color: rgba(59, 130, 246, 0.5);
        }
        
        .sidebar-item {
            background: transparent;
            border: none;
            color: rgba(255, 255, 255, 0.7);
            padding: 12px 20px;
            width: 100%;
            text-align: left;
            font-size: 15px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            border-radius: 8px;
            display: flex;
            align-items: center;
            gap: 12px;
        }
        
        .sidebar-item:hover {
            background: rgba(59, 130, 246, 0.1);
            color: white;
        }
        
        .sidebar-item.active {
            background: linear-gradient(90deg, rgba(59, 130, 246, 0.2), rgba(59, 130, 246, 0.05));
            color: white;
            border-left: 3px solid #3b82f6;
        }
        
        .btn-neon {
            background: linear-gradient(45deg, #3b82f6, #1d4ed8);
            box-shadow: 0 0 15px rgba(59, 130, 246, 0.4);
            transition: all 0.3s ease;
        }
        
        .btn-neon:hover {
            box-shadow: 0 0 25px rgba(59, 130, 246, 0.6), 0 0 35px rgba(59, 130, 246, 0.3);
            transform: translateY(-2px);
        }
        
        .btn-secondary {
            background: linear-gradient(45deg, #6b7280, #4b5563);
            transition: all 0.3s ease;
        }
        
        .btn-secondary:hover {
            background: linear-gradient(45deg, #9ca3af, #6b7280);
            transform: translateY(-1px);
        }
        
        .gradient-text {
            background: linear-gradient(45deg, #3b82f6, #8b5cf6, #06b6d4);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .form-input {
            background: rgba(30, 30, 63, 0.6);
            border: 1px solid rgba(59, 130, 246, 0.3);
            backdrop-filter: blur(10px);
            transition: all 0.3s ease;
        }
        
        .form-input:focus {
            background: rgba(30, 30, 63, 0.8);
            border-color: rgba(59, 130, 246, 0.6);
            box-shadow: 0 0 15px rgba(59, 130, 246, 0.3);
            outline: none;
        }
        
        .form-label {
            color: rgba(255, 255, 255, 0.9);
            font-weight: 500;
        }
        
        .payment-method {
            background: rgba(30, 30, 63, 0.4);
            border: 1px solid rgba(59, 130, 246, 0.2);
            border-radius: 12px;
            padding: 16px;
            transition: all 0.3s ease;
            cursor: pointer;
        }
        
        .payment-method:hover {
            background: rgba(59, 130, 246, 0.1);
            border-color: rgba(59, 130, 246, 0.4);
        }
        
        .payment-method.selected {
            background: rgba(59, 130, 246, 0.2);
            border-color: #3b82f6;
        }
        
        .notification-badge {
            background: linear-gradient(45deg, #ef4444, #dc2626);
            color: white;
            font-size: 11px;
            padding: 2px 6px;
            border-radius: 10px;
            margin-left: auto;
        }
        
        .profile-avatar {
            width: 80px;
            height: 80px;
            background: linear-gradient(45deg, #3b82f6, #8b5cf6);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 32px;
            font-weight: bold;
            position: relative;
            overflow: hidden;
        }
        
        .profile-avatar::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(45deg, transparent, rgba(255,255,255,0.3), transparent);
            transform: rotate(45deg);
            transition: all 0.6s;
        }
        
        .profile-avatar:hover::before {
            animation: shine 0.6s ease-in-out;
        }
        
        @keyframes shine {
            0% { transform: translateX(-100%) translateY(-100%) rotate(45deg); }
            100% { transform: translateX(100%) translateY(100%) rotate(45deg); }
        }
        
        .tab-content {
            display: none;
        }
        
        .tab-content.active {
            display: block;
            animation: fadeIn 0.3s ease-in-out;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body class="text-white min-h-screen">
    <!-- Main Navigation -->
    <nav class="glass-morphism fixed top-0 left-0 right-0 z-50 border-b border-blue-500/20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <!-- Logo -->
                <div class="flex items-center">
                    <div class="flex-shrink-0 flex items-center">
                        <div class="w-10 h-10 bg-gradient-to-r from-blue-500 via-purple-500 to-cyan-500 rounded-lg flex items-center justify-center neon-glow">
                            <span class="text-white font-bold text-lg">G</span>
                        </div>
                        <span class="ml-3 text-xl font-bold gradient-text">Playverse</span>
                    </div>
                </div>
                <!-- Navigation Links -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="#" class="text-gray-300 hover:text-white px-3 py-2 text-sm font-medium transition-colors">Beranda</a>
                    <a href="#" class="text-gray-300 hover:text-white px-3 py-2 text-sm font-medium transition-colors">Mode Pengembang</a>
                    <a href="#" class="text-gray-300 hover:text-white px-3 py-2 text-sm font-medium transition-colors">Game Saya</a>
                    <a href="#" class="text-gray-300 hover:text-white px-3 py-2 text-sm font-medium transition-colors">Gabung sebagai Pengembang</a>
                    <a href="#" class="text-gray-300 hover:text-white px-3 py-2 text-sm font-medium transition-colors">Komunitas</a>
                </div>
                <!-- User Actions -->
                <div class="flex items-center space-x-4">
                    <div class="flex items-center space-x-2">
                        <button class="text-gray-300 hover:text-white px-3 py-2 text-sm font-medium transition-colors">
                            <i class="fas fa-bell mr-1"></i>
                            <span class="notification-badge">3</span>
                        </button>
                        <div class="relative">
                            <img src="https://picsum.photos/seed/user123/32/32.jpg" alt="Profil" class="w-8 h-8 rounded-full cursor-pointer">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    
    <!-- Main Content -->
    <div class="pt-16 min-h-screen flex">
        <!-- Sidebar -->
        <div class="w-64 glass-morphism border-r border-blue-500/20 p-6">
            <!-- Profile Section -->
            <div class="text-center mb-8">
                <div class="profile-avatar mx-auto mb-3">
                    JD
                </div>
                <h3 class="text-lg font-semibold">John Doe</h3>
                <p class="text-sm text-gray-400">Anggota Premium</p>
            </div>
            
            <!-- Settings Menu -->
            <div class="space-y-2">
                <button class="sidebar-item active" onclick="showTab('profile')">
                    <i class="fas fa-user w-5"></i>
                    <span>Profil</span>
                </button>
                <button class="sidebar-item" onclick="showTab('payment')">
                    <i class="fas fa-credit-card w-5"></i>
                    <span>Metode Pembayaran</span>
                </button>
                <button class="sidebar-item" onclick="showTab('security')">
                    <i class="fas fa-shield-alt w-5"></i>
                    <span>Keamanan</span>
                </button>
                <button class="sidebar-item" onclick="showTab('privacy')">
                    <i class="fas fa-lock w-5"></i>
                    <span>Privasi</span>
                </button>
            </div>
            
            <!-- Logout Button -->
            <div class="mt-8 pt-8 border-t border-gray-700">
                <button class="sidebar-item text-red-400 hover:text-red-300">
                    <i class="fas fa-sign-out-alt w-5"></i>
                    <span>Keluar</span>
                </button>
            </div>
        </div>
        
        <!-- Content Area -->
        <div class="flex-1 p-8">
            <!-- Profile Tab -->
            <div id="profile-tab" class="tab-content active">
                <div class="max-w-2xl">
                    <h1 class="text-3xl font-bold mb-2">Pengaturan Profil</h1>
                    <p class="text-gray-400 mb-8">Kelola informasi akun dan preferensi Anda</p>
                    
                    <div class="settings-card rounded-2xl p-8 mb-6">
                        <h2 class="text-xl font-semibold mb-6">Informasi Pribadi</h2>
                        
                        <form class="space-y-6">
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="form-label block mb-2">Nama Depan</label>
                                    <input type="text" class="form-input w-full px-4 py-3 rounded-lg text-white" value="John">
                                </div>
                                <div>
                                    <label class="form-label block mb-2">Username</label>
                                    <input type="text" class="form-input w-full px-4 py-3 rounded-lg text-white" value="Doe">
                                </div>
                            </div>
                            
                            <div>
                                <label class="form-label block mb-2">Email</label>
                                <input type="email" class="form-input w-full px-4 py-3 rounded-lg text-white" value="john.doe@example.com">
                            </div>
                            
                            <div class="flex justify-end gap-4">
                                <button type="button" class="btn-secondary px-6 py-3 rounded-lg font-medium">
                                    Batal
                                </button>
                                <button type="submit" class="btn-neon px-6 py-3 rounded-lg font-medium">
                                    Simpan Perubahan
                                </button>
                            </div>
                        </form>
                    </div>
                    
                    <div class="settings-card rounded-2xl p-8">
                        <h2 class="text-xl font-semibold mb-6">Avatar</h2>
                        
                        <div class="flex items-center gap-6">
                            <div class="profile-avatar">
                                JD
                            </div>
                            <div class="flex-1">
                                <p class="text-gray-300 mb-4">Unggah avatar baru. Ukuran maks: 2MB. Format: JPG, PNG.</p>
                                <div class="flex gap-3">
                                    <button class="btn-neon px-4 py-2 rounded-lg text-sm font-medium">
                                        <i class="fas fa-upload mr-2"></i>Unggah Baru
                                    </button>
                                    <button class="btn-secondary px-4 py-2 rounded-lg text-sm font-medium">
                                        Hapus
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Payment Tab -->
            <div id="payment-tab" class="tab-content">
                <div class="max-w-3xl">
                    <h1 class="text-3xl font-bold mb-2">Metode Pembayaran</h1>
                    <p class="text-gray-400 mb-8">Kelola opsi pembayaran dan informasi penagihan Anda</p>
                    
                    <div class="settings-card rounded-2xl p-8 mb-6">
                        <div class="flex justify-between items-center mb-6">
                            <h2 class="text-xl font-semibold">Metode Pembayaran Tersimpan</h2>
                            <button class="btn-neon px-4 py-2 rounded-lg text-sm font-medium">
                                <i class="fas fa-plus mr-2"></i>Tambah Baru
                            </button>
                        </div>
                        
                        <div class="space-y-4">
                            <!-- Credit Card -->
                            <div class="payment-method selected">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center gap-4">
                                        <div class="w-12 h-8 bg-gradient-to-r from-blue-600 to-blue-800 rounded flex items-center justify-center">
                                            <i class="fab fa-cc-visa text-white"></i>
                                        </div>
                                        <div>
                                            <p class="font-medium">Visa berakhiran 4242</p>
                                            <p class="text-sm text-gray-400">Kadaluarsa 12/25</p>
                                        </div>
                                    </div>
                                    <div class="flex items-center gap-3">
                                        <span class="text-xs bg-green-500/20 text-green-400 px-2 py-1 rounded">Utama</span>
                                        <button class="text-gray-400 hover:text-white">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- PayPal -->
                            <div class="payment-method">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center gap-4">
                                        <div class="w-12 h-8 bg-gradient-to-r from-blue-500 to-blue-700 rounded flex items-center justify-center">
                                            <i class="fab fa-paypal text-white"></i>
                                        </div>
                                        <div>
                                            <p class="font-medium">PayPal</p>
                                            <p class="text-sm text-gray-400">john.doe@example.com</p>
                                        </div>
                                    </div>
                                    <button class="text-gray-400 hover:text-white">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </button>
                                </div>
                            </div>
                            
                            <!-- Bank Transfer -->
                            <div class="payment-method">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center gap-4">
                                        <div class="w-12 h-8 bg-gradient-to-r from-gray-600 to-gray-800 rounded flex items-center justify-center">
                                            <i class="fas fa-university text-white"></i>
                                        </div>
                                        <div>
                                            <p class="font-medium">Transfer Bank</p>
                                            <p class="text-sm text-gray-400">BCA • ****1234</p>
                                        </div>
                                    </div>
                                    <button class="text-gray-400 hover:text-white">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="settings-card rounded-2xl p-8">
                        <h2 class="text-xl font-semibold mb-6">Alamat Penagihan</h2>
                        
                        <form class="space-y-4">
                            <div>
                                <label class="form-label block mb-2">Nama Lengkap</label>
                                <input type="text" class="form-input w-full px-4 py-3 rounded-lg text-white" value="John Doe">
                            </div>
                            
                            <div>
                                <label class="form-label block mb-2">Alamat</label>
                                <input type="text" class="form-input w-full px-4 py-3 rounded-lg text-white" value="Jl. Sudirman No. 123">
                            </div>
                            
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="form-label block mb-2">Kota</label>
                                    <input type="text" class="form-input w-full px-4 py-3 rounded-lg text-white" value="Jakarta">
                                </div>
                                <div>
                                    <label class="form-label block mb-2">Kode Pos</label>
                                    <input type="text" class="form-input w-full px-4 py-3 rounded-lg text-white" value="12345">
                                </div>
                            </div>
                            
                            <div>
                                <label class="form-label block mb-2">Negara</label>
                                <select class="form-input w-full px-4 py-3 rounded-lg text-white">
                                    <option>Indonesia</option>
                                    <option>Amerika Serikat</option>
                                    <option>Inggris</option>
                                </select>
                            </div>
                            
                            <div class="flex justify-end gap-4">
                                <button type="button" class="btn-secondary px-6 py-3 rounded-lg font-medium">
                                    Batal
                                </button>
                                <button type="submit" class="btn-neon px-6 py-3 rounded-lg font-medium">
                                    Simpan Alamat
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
            <!-- Security Tab -->
            <div id="security-tab" class="tab-content">
                <div class="max-w-2xl">
                    <h1 class="text-3xl font-bold mb-2">Keamanan</h1>
                    <p class="text-gray-400 mb-8">Kelola pengaturan keamanan akun Anda</p>
                    
                    <div class="settings-card rounded-2xl p-8 mb-6">
                        <h2 class="text-xl font-semibold mb-6">Kata Sandi</h2>
                        
                        <form class="space-y-4">
                            <div>
                                <label class="form-label block mb-2">Kata Sandi Saat Ini</label>
                                <input type="password" class="form-input w-full px-4 py-3 rounded-lg text-white" placeholder="Masukkan kata sandi saat ini">
                            </div>
                            
                            <div>
                                <label class="form-label block mb-2">Kata Sandi Baru</label>
                                <input type="password" class="form-input w-full px-4 py-3 rounded-lg text-white" placeholder="Masukkan kata sandi baru">
                            </div>
                            
                            <div>
                                <label class="form-label block mb-2">Konfirmasi Kata Sandi Baru</label>
                                <input type="password" class="form-input w-full px-4 py-3 rounded-lg text-white" placeholder="Konfirmasi kata sandi baru">
                            </div>
                            
                            <button type="submit" class="btn-neon px-6 py-3 rounded-lg font-medium">
                                Perbarui Kata Sandi
                            </button>
                        </form>
                    </div>
                    
                    <div class="settings-card rounded-2xl p-8">
                        <h2 class="text-xl font-semibold mb-6">Autentikasi Dua Faktor</h2>
                        
                        <div class="space-y-4">
                            <div class="flex items-center justify-between p-4 bg-gray-800/50 rounded-lg">
                                <div>
                                    <p class="font-medium">Autentikasi SMS</p>
                                    <p class="text-sm text-gray-400">Terima kode keamanan melalui SMS</p>
                                </div>
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" class="sr-only peer" checked>
                                    <div class="w-11 h-6 bg-gray-700 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                                </label>
                            </div>
                            
                            <div class="flex items-center justify-between p-4 bg-gray-800/50 rounded-lg">
                                <div>
                                    <p class="font-medium">Aplikasi Autentikator</p>
                                    <p class="text-sm text-gray-400">Gunakan Google Authenticator atau aplikasi serupa</p>
                                </div>
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" class="sr-only peer">
                                    <div class="w-11 h-6 bg-gray-700 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Privacy Tab -->
            <div id="privacy-tab" class="tab-content">
                <div class="max-w-2xl">
                    <h1 class="text-3xl font-bold mb-2">Privasi</h1>
                    <p class="text-gray-400 mb-8">Kelola pengaturan privasi Anda</p>
                    
                    <div class="settings-card rounded-2xl p-8">
                        <h2 class="text-xl font-semibold mb-6">Visibilitas Profil</h2>
                        
                        <div class="space-y-4">
                            <div>
                                <label class="form-label block mb-2">Status Profil</label>
                                <select class="form-input w-full px-4 py-3 rounded-lg text-white">
                                    <option>Publik - Siapa pun dapat melihat profil Anda</option>
                                    <option>Hanya Teman - Hanya teman yang dapat melihat profil Anda</option>
                                    <option>Pribadi - Hanya Anda yang dapat melihat profil Anda</option>
                                </select>
                            </div>
                            
                            <div>
                                <label class="form-label block mb-2">Tampilkan Status Online</label>
                                <select class="form-input w-full px-4 py-3 rounded-lg text-white">
                                    <option>Semua Orang</option>
                                    <option>Hanya Teman</option>
                                    <option>Tidak Ada</option>
                                </select>
                            </div>
                            
                            <div>
                                <label class="form-label block mb-2">Aktivitas Game</label>
                                <select class="form-input w-full px-4 py-3 rounded-lg text-white">
                                    <option>Tampilkan game saat ini ke semua orang</option>
                                    <option>Tampilkan game saat ini hanya ke teman</option>
                                    <option>Sembunyikan aktivitas game</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="mt-8 pt-8 border-t border-gray-700">
                            <h3 class="text-lg font-semibold mb-4">Data & Privasi</h3>
                            <div class="space-y-3">
                                <button class="w-full text-left p-4 bg-gray-800/50 rounded-lg hover:bg-gray-800/70 transition-colors">
                                    <div class="flex items-center justify-between">
                                        <div>
                                            <p class="font-medium">Unduh Data Saya</p>
                                            <p class="text-sm text-gray-400">Dapatkan salinan semua data Anda</p>
                                        </div>
                                        <i class="fas fa-download text-gray-400"></i>
                                    </div>
                                </button>
                                
                                <button class="w-full text-left p-4 bg-gray-800/50 rounded-lg hover:bg-gray-800/70 transition-colors">
                                    <div class="flex items-center justify-between">
                                        <div>
                                            <p class="font-medium">Hapus Akun</p>
                                            <p class="text-sm text-gray-400">Hapus akun Anda secara permanen</p>
                                        </div>
                                        <i class="fas fa-trash text-red-400"></i>
                                    </div>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        function showTab(tabName) {
            // Hide all tab contents
            const tabContents = document.querySelectorAll('.tab-content');
            tabContents.forEach(tab => {
                tab.classList.remove('active');
            });
            
            // Remove active class from all sidebar items
            const sidebarItems = document.querySelectorAll('.sidebar-item');
            sidebarItems.forEach(item => {
                item.classList.remove('active');
            });
            
            // Show selected tab
            document.getElementById(tabName + '-tab').classList.add('active');
            
            // Add active class to clicked sidebar item
            event.target.closest('.sidebar-item').classList.add('active');
        }
        
        // Payment method selection
        document.querySelectorAll('.payment-method').forEach(method => {
            method.addEventListener('click', function() {
                document.querySelectorAll('.payment-method').forEach(m => {
                    m.classList.remove('selected');
                });
                this.classList.add('selected');
            });
        });
        
        // Form submissions (prevent default for demo)
        document.querySelectorAll('form').forEach(form => {
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                // Show success message or handle form submission
                alert('Pengaturan berhasil disimpan!');
            });
        });
        
        // Toggle switches
        document.querySelectorAll('input[type="checkbox"]').forEach(toggle => {
            toggle.addEventListener('change', function() {
                // Handle toggle change
                console.log('Toggle changed:', this.checked);
            });
        });
    </script>
</body>
</html>
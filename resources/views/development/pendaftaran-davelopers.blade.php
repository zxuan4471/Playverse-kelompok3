<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GameHub - Pendaftaran Developer</title>
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
        
        .dev-card {
            background: linear-gradient(145deg, #1e1e3f 0%, #2a2a5a 100%);
            border: 1px solid rgba(59, 130, 246, 0.2);
            backdrop-filter: blur(10px);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }
        
        .dev-card:hover {
            transform: translateY(-4px) scale(1.01);
            box-shadow: 0 15px 30px rgba(59, 130, 246, 0.25), 0 0 25px rgba(59, 130, 246, 0.15);
            border-color: rgba(59, 130, 246, 0.5);
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
        
        .form-checkbox {
            width: 20px;
            height: 20px;
            background: rgba(30, 30, 63, 0.6);
            border: 1px solid rgba(59, 130, 246, 0.3);
            border-radius: 4px;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .form-checkbox:checked {
            background: linear-gradient(45deg, #3b82f6, #1d4ed8);
            border-color: #3b82f6;
        }
        
        .error-message {
            color: #ef4444;
            font-size: 0.875rem;
            margin-top: 0.25rem;
            display: none;
        }
        
        .upload-area {
            border: 2px dashed rgba(59, 130, 246, 0.3);
            transition: all 0.3s ease;
        }
        
        .upload-area:hover {
            border-color: rgba(59, 130, 246, 0.6);
            background: rgba(59, 130, 246, 0.05);
        }
        
        .section-title {
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 1.5rem;
            padding-bottom: 0.75rem;
            border-bottom: 1px solid rgba(59, 130, 246, 0.3);
        }
    </style>
</head>
<body class="text-white min-h-screen">
    <!-- Main Navigation -->

    
    <!-- Main Content -->
    <div class="pt-24 pb-12">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="text-center mb-8">
                <h1 class="text-4xl md:text-5xl font-bold gradient-text mb-4">Join as Developer</h1>
                <p class="text-xl text-gray-300">
                    Bergabunglah dengan komunitas developer terbesar dan publikasikan game Anda
                </p>
            </div>
            <div class="mb-6">
    <button onclick="history.back()" 
        class="flex items-center gap-2 px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
        <i class="fas fa-arrow-left"></i> Kembali
    </button>
</div>

            <!-- Registration Form -->
            <div class="dev-card rounded-2xl p-8">
                <form id="registration-form">
                    <!-- Personal Information Section -->
                    <div class="mb-10">
                        <h2 class="section-title">Informasi Pribadi</h2>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            
                            <div class="md:col-span-2">
                                <label class="form-label block mb-2">Email *</label>
                                <input type="email" name="email" class="form-input w-full px-4 py-3 rounded-lg text-white" placeholder="john.doe@example.com" required>
                                <span class="error-message">Email tidak valid</span>
                            </div>
                            
                            <div>
                                <label class="form-label block mb-2">Password *</label>
                                <input type="password" id="password" name="password" class="form-input w-full px-4 py-3 rounded-lg text-white" placeholder="••••••••" required>
                                <span class="error-message">Password minimal 8 karakter</span>
                            </div>
                            
                            <div>
                                <label class="form-label block mb-2">Konfirmasi Password *</label>
                                <input type="password" id="confirm-password" name="confirm_password" class="form-input w-full px-4 py-3 rounded-lg text-white" placeholder="••••••••" required>
                                <span class="error-message">Password tidak cocok</span>
                            </div>
                            
                            <div class="md:col-span-2">
                                <label class="form-label block mb-2">Nomor Telepon</label>
                                <input type="tel" name="phone" class="form-input w-full px-4 py-3 rounded-lg text-white" placeholder="+62 812 3456 7890">
                            </div>
                        </div>
                    </div>
                    
                    <!-- Developer Information Section -->
                    <div class="mb-10">
                        <h2 class="section-title">Informasi Developer</h2>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="md:col-span-2">
                                <label class="form-label block mb-2">Nama Studio/Developer *</label>
                                <input type="text" name="studio_name" class="form-input w-full px-4 py-3 rounded-lg text-white" placeholder="Awesome Game Studio" required>
                                <span class="error-message">Nama studio harus diisi</span>
                            </div>
                            
                            <div class="md:col-span-2">
                                <label class="form-label block mb-2">Deskripsi Studio</label>
                                <textarea name="studio_description" class="form-input w-full px-4 py-3 rounded-lg text-white h-24 resize-none" placeholder="Ceritakan tentang studio Anda..."></textarea>
                            </div>
                            
                            <div>
                                <label class="form-label block mb-2">Website</label>
                                <input type="url" name="website" class="form-input w-full px-4 py-3 rounded-lg text-white" placeholder="https://yourstudio.com">
                            </div>
                            
                            <div>
                                <label class="form-label block mb-2">Twitter/X</label>
                                <input type="text" name="twitter" class="form-input w-full px-4 py-3 rounded-lg text-white" placeholder="@yourstudio">
                            </div>
                            
                            <div class="md:col-span-2">
                                <label class="form-label block mb-2">Kategori Game Utama *</label>
                                <select name="game_category" class="form-input w-full px-4 py-3 rounded-lg text-white" required>
                                    <option value="">Pilih kategori</option>
                                    <option value="action">Action</option>
                                    <option value="adventure">Adventure</option>
                                    <option value="rpg">RPG</option>
                                    <option value="strategy">Strategy</option>
                                    <option value="simulation">Simulation</option>
                                    <option value="sports">Sports</option>
                                    <option value="racing">Racing</option>
                                    <option value="puzzle">Puzzle</option>
                                    <option value="horror">Horror</option>
                                    <option value="other">Other</option>
                                </select>
                                <span class="error-message">Pilih kategori game</span>
                            </div>
                            
                            <div class="md:col-span-2">
                                <label class="form-label block mb-2">Logo Studio</label>
                                <div class="upload-area rounded-lg p-8 text-center cursor-pointer">
                                    <i class="fas fa-cloud-upload-alt text-4xl text-gray-400 mb-2"></i>
                                    <p class="text-gray-400">Klik untuk upload logo</p>
                                    <p class="text-xs text-gray-500 mt-1">PNG, JPG maksimal 2MB</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Terms & Conditions Section -->
                    <div class="mb-8">
                        <h2 class="section-title">Syarat & Ketentuan</h2>
                        
                        <div class="bg-gray-800/50 rounded-lg p-6 mb-6 max-h-64 overflow-y-auto">
                            <h3 class="font-bold mb-3">1. Persyaratan Developer</h3>
                            <p class="text-sm text-gray-300 mb-4">
                                Dengan mendaftar sebagai developer di Playverse, Anda setuju untuk mematuhi semua persyaratan dan ketentuan yang berlaku. Anda harus memiliki hak penuh atas konten yang Anda unggah dan bertanggung jawab atas semua game yang Anda publikasikan.
                            </p>
                            
                            <h3 class="font-bold mb-3">2. Kebijakan Konten</h3>
                            <p class="text-sm text-gray-300 mb-4">
                                Semua game yang dipublikasikan harus mematuhi kebijakan konten Playverse. Konten yang melanggar hukum, mengandung kekerasan berlebihan, atau materi dewasa tanpa peringatan yang tepat akan ditolak.
                            </p>
                            
                            <h3 class="font-bold mb-3">3. Pembagian Pendapatan</h3>
                            <p class="text-sm text-gray-300 mb-4">
                                Playverse mengambil komisi 30% dari semua penjualan game. Pembayaran akan dilakukan setiap bulan setelah mencapai minimum payout $100.
                            </p>
                            
                            <h3 class="font-bold mb-3">4. Hak Kekayaan Intelektual</h3>
                            <p class="text-sm text-gray-300">
                                Anda mempertahankan semua hak kekayaan intelektual atas game Anda. Dengan mempublikasikan di Playverse, Anda memberikan kami lisensi untuk mendistribusikan game Anda.
                            </p>
                        </div>
                        
                        <div class="space-y-3 mb-6">
                            <label class="flex items-start">
                                <input type="checkbox" name="terms" class="form-checkbox mt-1 mr-3" required>
                                <span class="text-sm text-gray-300">
                                    Saya telah membaca dan menyetujui <a href="#" class="text-blue-400 hover:text-blue-300">Syarat & Ketentuan</a>
                                </span>
                            </label>
                            
                            <label class="flex items-start">
                                <input type="checkbox" name="privacy" class="form-checkbox mt-1 mr-3" required>
                                <span class="text-sm text-gray-300">
                                    Saya menyetujui <a href="#" class="text-blue-400 hover:text-blue-300">Kebijakan Privasi</a>
                                </span>
                            </label>
                            
                            <label class="flex items-start">
                                <input type="checkbox" name="newsletter" class="form-checkbox mt-1 mr-3">
                                <span class="text-sm text-gray-300">
                                    Saya ingin menerima newsletter dan update terbaru dari Playverse
                                </span>
                            </label>
                        </div>
                    </div>
                    
                    <div class="flex justify-center">
                        <button type="submit" class="btn-neon px-8 py-3 rounded-lg font-medium">
                            Daftar Sekarang <i class="fas fa-check ml-2"></i>
                        </button>
                    </div>
                </form>
            </div>
            
            <!-- Quick Benefits -->
            <div class="mt-8 text-center">
                <p class="text-gray-400 mb-4">Bergabung dengan 10,000+ developer yang sudah mempercayai Playverse</p>
                <div class="flex justify-center items-center space-x-8 text-sm">
                    <div class="flex items-center">
                        <i class="fas fa-globe text-blue-400 mr-2"></i>
                        <span>Jangkauan Global</span>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-percentage text-green-400 mr-2"></i>
                        <span>70% Revenue Share</span>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-chart-line text-purple-400 mr-2"></i>
                        <span>Analitik Lengkap</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Success Modal -->
    <div id="success-modal" class="fixed inset-0 bg-black/50 backdrop-blur-sm z-50 hidden">
        <div class="flex items-center justify-center min-h-screen p-4">
            <div class="dev-card rounded-2xl p-8 max-w-md w-full">
                <div class="text-center">
                    <div class="w-20 h-20 bg-green-500/20 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-check text-4xl text-green-500"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-white mb-2">Pendaftaran Berhasil!</h3>
                    <p class="text-gray-300 mb-6">Selamat! Anda telah berhasil mendaftar sebagai developer di Playverse. Silakan cek email Anda untuk verifikasi.</p>
                    <button onclick="closeModal()" class="btn-neon px-6 py-3 rounded-lg font-medium">
                        Lanjut ke Dashboard
                    </button>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        document.getElementById('registration-form').addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Validate form
            let isValid = true;
            const inputs = this.querySelectorAll('input[required], select[required]');
            
            inputs.forEach(input => {
                const errorMsg = input.parentElement.querySelector('.error-message');
                
                if (!input.value.trim()) {
                    errorMsg.style.display = 'block';
                    isValid = false;
                } else if (input.type === 'email' && !isValidEmail(input.value)) {
                    errorMsg.style.display = 'block';
                    isValid = false;
                } else if (input.type === 'password' && input.value.length < 8) {
                    errorMsg.style.display = 'block';
                    isValid = false;
                } else if (input.id === 'confirm-password' && input.value !== document.getElementById('password').value) {
                    errorMsg.style.display = 'block';
                    isValid = false;
                } else {
                    errorMsg.style.display = 'none';
                }
            });
            
            // Check required checkboxes
            const termsCheckbox = this.querySelector('input[name="terms"]');
            const privacyCheckbox = this.querySelector('input[name="privacy"]');
            
            if (!termsCheckbox.checked || !privacyCheckbox.checked) {
                isValid = false;
                alert('Harap menyetujui syarat dan ketentuan untuk melanjutkan');
            }
            
            if (isValid) {
                // Show success modal
                document.getElementById('success-modal').classList.remove('hidden');
            }
        });
        
        function isValidEmail(email) {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return emailRegex.test(email);
        }
        
        function closeModal() {
            document.getElementById('success-modal').classList.add('hidden');
            // Redirect to dashboard
            window.location.href = '{{ url("/developer-dashboard") }}';
        }
        
        // Add real-time validation
        document.querySelectorAll('input, select').forEach(input => {
            input.addEventListener('blur', function() {
                const errorMsg = this.parentElement.querySelector('.error-message');
                
                if (this.hasAttribute('required') && !this.value.trim()) {
                    errorMsg.style.display = 'block';
                } else if (this.type === 'email' && !isValidEmail(this.value)) {
                    errorMsg.style.display = 'block';
                } else if (this.type === 'password' && this.value.length < 8) {
                    errorMsg.style.display = 'block';
                } else {
                    errorMsg.style.display = 'none';
                }
            });
        });
    </script>
</body>
</html>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GameHub - Upload Asset Baru</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
        
        body {
            background: linear-gradient(135deg, #0f0f23 0%, #1a1a2e 50%, #16213e 100%);
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            min-height: 100vh;
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
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        
        .dev-card:hover {
            transform: translateY(-4px);
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
        
        .sidebar-glass {
            background: rgba(15, 15, 35, 0.9);
            backdrop-filter: blur(20px);
            border-right: 1px solid rgba(59, 130, 246, 0.2);
        }
        
        .sidebar-item {
            position: relative;
            overflow: hidden;
        }
        
        .sidebar-item::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            width: 3px;
            background: linear-gradient(to bottom, #3b82f6, #8b5cf6);
            transform: scaleY(0);
            transition: transform 0.3s ease;
        }
        
        .sidebar-item:hover::before {
            transform: scaleY(1);
        }
        
        .sidebar-item:hover {
            background: linear-gradient(90deg, rgba(59, 130, 246, 0.1), rgba(59, 130, 246, 0.2));
            box-shadow: 0 0 15px rgba(59, 130, 246, 0.2);
        }
        
        .sidebar-item.active {
            background: linear-gradient(90deg, rgba(59, 130, 246, 0.2), rgba(59, 130, 246, 0.3));
            color: white;
            font-weight: 600;
        }
        
        .sidebar-item.active::before {
            transform: scaleY(1);
        }
        
        .search-input {
            background: rgba(30, 30, 63, 0.6);
            border: 1px solid rgba(59, 130, 246, 0.3);
            backdrop-filter: blur(10px);
            transition: all 0.3s ease;
        }
        
        .search-input:focus {
            background: rgba(30, 30, 63, 0.8);
            border-color: rgba(59, 130, 246, 0.6);
            box-shadow: 0 0 15px rgba(59, 130, 246, 0.3);
            outline: none;
        }
        
        .mobile-menu {
            display: none;
        }
        
        @media (max-width: 768px) {
            .mobile-menu {
                display: block;
            }
            
            .desktop-menu {
                display: none;
            }
            
            .sidebar {
                position: fixed;
                left: -100%;
                top: 0;
                bottom: 0;
                width: 80%;
                z-index: 40;
                transition: left 0.3s ease;
            }
            
            .sidebar.active {
                left: 0;
            }
        }
        
        .upload-area {
            border: 2px dashed rgba(59, 130, 246, 0.5);
            background: rgba(30, 30, 63, 0.3);
            transition: all 0.3s ease;
        }
        
        .upload-area:hover {
            border-color: rgba(59, 130, 246, 0.8);
            background: rgba(30, 30, 63, 0.5);
        }
        
        .upload-area.dragover {
            border-color: #3b82f6;
            background: rgba(59, 130, 246, 0.1);
        }
        
        .tag-input {
            background: rgba(30, 30, 63, 0.6);
            border: 1px solid rgba(59, 130, 246, 0.3);
            backdrop-filter: blur(10px);
            transition: all 0.3s ease;
        }
        
        .tag-input:focus {
            background: rgba(30, 30, 63, 0.8);
            border-color: rgba(59, 130, 246, 0.6);
            box-shadow: 0 0 15px rgba(59, 130, 246, 0.3);
            outline: none;
        }
        
        .tag {
            background: rgba(59, 130, 246, 0.2);
            border: 1px solid rgba(59, 130, 246, 0.4);
            color: white;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 14px;
            display: inline-flex;
            align-items: center;
            margin-right: 8px;
            margin-bottom: 8px;
        }
        
        .tag .remove-tag {
            margin-left: 6px;
            cursor: pointer;
            color: rgba(255, 255, 255, 0.7);
        }
        
        .tag .remove-tag:hover {
            color: white;
        }
        
        .preview-container {
            background: rgba(30, 30, 63, 0.3);
            border: 1px solid rgba(59, 130, 246, 0.3);
            border-radius: 8px;
            overflow: hidden;
            position: relative;
        }
        
        .preview-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
        
        .preview-remove {
            position: absolute;
            top: 8px;
            right: 8px;
            background: rgba(239, 68, 68, 0.8);
            color: white;
            width: 28px;
            height: 28px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .preview-remove:hover {
            background: rgba(239, 68, 68, 1);
            transform: scale(1.1);
        }
        
        .file-item {
            background: rgba(30, 30, 63, 0.5);
            border: 1px solid rgba(59, 130, 246, 0.3);
            border-radius: 8px;
            padding: 12px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 8px;
        }
        
        .file-info {
            display: flex;
            align-items: center;
        }
        
        .file-icon {
            width: 40px;
            height: 40px;
            background: rgba(59, 130, 246, 0.2);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 12px;
        }
        
        .file-details {
            display: flex;
            flex-direction: column;
        }
        
        .file-name {
            font-weight: 500;
            color: white;
        }
        
        .file-size {
            font-size: 12px;
            color: rgba(255, 255, 255, 0.6);
        }
        
        .file-remove {
            color: rgba(239, 68, 68, 0.8);
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .file-remove:hover {
            color: rgba(239, 68, 68, 1);
        }
        
        .progress-bar {
            background: linear-gradient(90deg, #3b82f6, #8b5cf6);
            height: 8px;
            border-radius: 4px;
            transition: width 0.5s ease;
        }
        
        /* Toast Notification */
        .toast {
            position: fixed;
            bottom: 20px;
            right: 20px;
            padding: 16px 24px;
            border-radius: 8px;
            color: white;
            font-weight: 500;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            z-index: 1000;
            transform: translateY(100px);
            opacity: 0;
            transition: all 0.3s ease;
        }
        
        .toast.show {
            transform: translateY(0);
            opacity: 1;
        }
        
        .toast.success {
            background: linear-gradient(45deg, #22c55e, #16a34a);
        }
        
        .toast.error {
            background: linear-gradient(45deg, #ef4444, #dc2626);
        }
        
        .toast.info {
            background: linear-gradient(45deg, #3b82f6, #1d4ed8);
        }
    </style>
</head>
<body class="text-white min-h-screen">
    <!-- Main Navigation -->
    
    <!-- Main Content -->
    <div class="pt-9">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col lg:flex-row gap-8">
                <!-- Main Content Area -->
                <main class="flex-1">
                    <!-- Header Section -->
                    <div class="mb-8">
                        <div class="flex items-center mb-6">
                            <button onclick="window.location.href='{{ url('/asset-saya') }}'" class="mr-4 text-gray-400 hover:text-white">
                                <i class="fas fa-arrow-left text-xl"></i>
                            </button>
                            <div>
                                <h1 class="text-3xl font-bold text-white mb-2">Upload Asset Baru</h1>
                                <p class="text-gray-400">Unggah asset Anda ke marketplace untuk dijual ke developer lain</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Upload Form -->
                    <div class="dev-card rounded-2xl p-8">
                        <form id="upload-asset-form">
                            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                                <!-- Left Column -->
                                <div class="space-y-6">
                                    <!-- Asset Name -->
                                    <div>
                                        <label class="block text-sm font-medium text-gray-300 mb-2">Nama Asset <span class="text-red-500">*</span></label>
                                        <input type="text" id="asset-name" class="search-input w-full px-4 py-3 rounded-lg text-white" placeholder="Masukkan nama asset" required>
                                    </div>
                                    
                                    <!-- Category -->
                                    <div>
                                        <label class="block text-sm font-medium text-gray-300 mb-2">Kategori <span class="text-red-500">*</span></label>
                                        <select id="asset-category" class="search-input w-full px-4 py-3 rounded-lg text-white" required>
                                            <option value="">Pilih kategori</option>
                                            <option value="3d-model">Model 3D</option>
                                            <option value="texture">Tekstur</option>
                                            <option value="audio">Audio</option>
                                            <option value="script">Script</option>
                                            <option value="ui">UI</option>
                                            <option value="effect">Efek</option>
                                            <option value="other">Lainnya</option>
                                        </select>
                                    </div>
                                    
                                    <!-- Subcategory -->
                                    <div>
                                        <label class="block text-sm font-medium text-gray-300 mb-2">Subkategori</label>
                                        <select id="asset-subcategory" class="search-input w-full px-4 py-3 rounded-lg text-white">
                                            <option value="">Pilih subkategori</option>
                                        </select>
                                    </div>
                                    
                                    <!-- Price -->
                                    <div>
                                        <label class="block text-sm font-medium text-gray-300 mb-2">Harga (Rp) <span class="text-red-500">*</span></label>
                                        <div class="relative">
                                            <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400">Rp</span>
                                            <input type="number" id="asset-price" class="search-input w-full pl-12 pr-4 py-3 rounded-lg text-white" placeholder="0" min="0" step="1000" required>
                                        </div>
                                        <div class="flex items-center mt-2">
                                            <input type="checkbox" id="free-asset" class="mr-2">
                                            <label for="free-asset" class="text-sm text-gray-400">Asset gratis</label>
                                        </div>
                                    </div>
                                    
                                    <!-- Tags -->
                                    <div>
                                        <label class="block text-sm font-medium text-gray-300 mb-2">Tag</label>
                                        <div class="tag-input w-full px-4 py-3 rounded-lg min-h-[100px] flex flex-wrap" id="tags-container">
                                            <input type="text" id="tag-input" class="bg-transparent border-none outline-none flex-grow text-white" placeholder="Tambahkan tag...">
                                        </div>
                                        <p class="text-xs text-gray-500 mt-1">Tekan Enter untuk menambahkan tag</p>
                                    </div>
                                </div>
                                
                                <!-- Right Column -->
                                <div class="space-y-6">
                                    <!-- Preview Images -->
                                    <div>
                                        <label class="block text-sm font-medium text-gray-300 mb-2">Preview Asset <span class="text-red-500">*</span></label>
                                        <div class="upload-area rounded-lg p-8 text-center cursor-pointer mb-4" id="preview-upload">
                                            <i class="fas fa-cloud-upload-alt text-3xl text-gray-400 mb-2"></i>
                                            <p class="text-gray-400">Klik untuk upload preview</p>
                                            <p class="text-xs text-gray-500 mt-1">PNG, JPG, GIF maksimal 5MB</p>
                                            <input type="file" id="preview-input" class="hidden" accept="image/*" multiple>
                                        </div>
                                        <div id="preview-container" class="grid grid-cols-3 gap-4">
                                            <!-- Preview images will be added here -->
                                        </div>
                                    </div>
                                    
                                    <!-- Asset Files -->
                                    <div>
                                        <label class="block text-sm font-medium text-gray-300 mb-2">File Asset <span class="text-red-500">*</span></label>
                                        <div class="upload-area rounded-lg p-8 text-center cursor-pointer mb-4" id="file-upload">
                                            <i class="fas fa-file-archive text-3xl text-gray-400 mb-2"></i>
                                            <p class="text-gray-400">Klik untuk upload file</p>
                                            <p class="text-xs text-gray-500 mt-1">ZIP, RAR maksimal 50MB</p>
                                            <input type="file" id="file-input" class="hidden" multiple>
                                        </div>
                                        <div id="file-container">
                                            <!-- Uploaded files will be listed here -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Description -->
                            <div class="mt-6">
                                <label class="block text-sm font-medium text-gray-300 mb-2">Deskripsi <span class="text-red-500">*</span></label>
                                <textarea id="asset-description" class="search-input w-full px-4 py-3 rounded-lg text-white h-32 resize-none" placeholder="Deskripsikan asset Anda secara detail" required></textarea>
                            </div>
                            
                            <!-- License -->
                            <div class="mt-6">
                                <label class="block text-sm font-medium text-gray-300 mb-2">Lisensi <span class="text-red-500">*</span></label>
                                <select id="asset-license" class="search-input w-full px-4 py-3 rounded-lg text-white" required>
                                    <option value="">Pilih lisensi</option>
                                    <option value="standard">Standard License</option>
                                    <option value="extended">Extended License</option>
                                    <option value="exclusive">Exclusive License</option>
                                </select>
                                <p class="text-xs text-gray-500 mt-1">Pilih lisensi yang sesuai untuk asset Anda</p>
                            </div>
                            
                            <!-- Terms and Conditions -->
                            <div class="mt-6">
                                <div class="flex items-start">
                                    <input type="checkbox" id="terms" class="mt-1 mr-2" required>
                                    <label for="terms" class="text-sm text-gray-300">
                                        Saya menyetujui <a href="#" class="text-blue-400 hover:text-blue-300">Syarat dan Ketentuan</a> serta <a href="#" class="text-blue-400 hover:text-blue-300">Kebijakan Konten</a> dari Playverse
                                    </label>
                                </div>
                            </div>
                            
                            <!-- Submit Buttons -->
                            <div class="flex justify-end space-x-3 mt-8">
                                <button type="button" onclick="window.location.href='{{ url('/my-assets') }}'" class="btn-secondary px-6 py-3 rounded-lg">
                                    Batal
                                </button>
                                <button type="submit" class="btn-neon px-6 py-3 rounded-lg">
                                    <i class="fas fa-upload mr-2"></i> Unggah Asset
                                </button>
                            </div>
                        </form>
                    </div>
                </main>
            </div>
        </div>
    </div>
    
    <script>
        // Mobile menu functionality
        function toggleMobileMenu() {
            console.log('Mobile menu toggled');
        }
        
        // Sidebar functionality for mobile
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('active');
        }
        
        // Category and subcategory handling
        const categorySelect = document.getElementById('asset-category');
        const subcategorySelect = document.getElementById('asset-subcategory');
        
        const subcategories = {
            '3d-model': ['Karakter', 'Senjata', 'Kendaraan', 'Lingkungan', 'Properti', 'Arsitektur'],
            'texture': ['Material', 'Alam', 'Dinding', 'Lantai', 'Logam', 'Kayu'],
            'audio': ['Musik', 'Sound Effect', 'Voice Over', 'Ambient'],
            'script': ['Gameplay', 'AI', 'UI', 'Utility', 'Shader'],
            'ui': ['Icon', 'Menu', 'HUD', 'Button', 'Panel'],
            'effect': ['Particle', 'Shader', 'VFX', 'Post Processing'],
            'other': ['Lainnya']
        };
        
        categorySelect.addEventListener('change', function() {
            const category = this.value;
            subcategorySelect.innerHTML = '<option value="">Pilih subkategori</option>';
            
            if (category && subcategories[category]) {
                subcategories[category].forEach(sub => {
                    const option = document.createElement('option');
                    option.value = sub.toLowerCase().replace(/\s+/g, '-');
                    option.textContent = sub;
                    subcategorySelect.appendChild(option);
                });
            }
        });
        
        // Free asset checkbox handling
        const freeAssetCheckbox = document.getElementById('free-asset');
        const priceInput = document.getElementById('asset-price');
        
        freeAssetCheckbox.addEventListener('change', function() {
            if (this.checked) {
                priceInput.value = '0';
                priceInput.disabled = true;
            } else {
                priceInput.disabled = false;
                priceInput.value = '';
            }
        });
        
        // Tags handling
        const tagsContainer = document.getElementById('tags-container');
        const tagInput = document.getElementById('tag-input');
        const tags = [];
        
        tagInput.addEventListener('keydown', function(e) {
            if (e.key === 'Enter') {
                e.preventDefault();
                const tag = this.value.trim();
                if (tag && !tags.includes(tag)) {
                    tags.push(tag);
                    renderTags();
                    this.value = '';
                }
            }
        });
        
        function renderTags() {
            // Clear existing tags
            const existingTags = tagsContainer.querySelectorAll('.tag');
            existingTags.forEach(tag => tag.remove());
            
            // Add tags
            tags.forEach((tag, index) => {
                const tagElement = document.createElement('div');
                tagElement.className = 'tag';
                tagElement.innerHTML = `
                    ${tag}
                    <span class="remove-tag" onclick="removeTag(${index})">
                        <i class="fas fa-times"></i>
                    </span>
                `;
                tagsContainer.insertBefore(tagElement, tagInput);
            });
        }
        
        function removeTag(index) {
            tags.splice(index, 1);
            renderTags();
        }
        
        // Preview image upload
        const previewUpload = document.getElementById('preview-upload');
        const previewInput = document.getElementById('preview-input');
        const previewContainer = document.getElementById('preview-container');
        const previewImages = [];
        
        previewUpload.addEventListener('click', function() {
            previewInput.click();
        });
        
        previewInput.addEventListener('change', function(e) {
            const files = Array.from(e.target.files);
            files.forEach(file => {
                if (file.type.startsWith('image/') && file.size <= 5 * 1024 * 1024) {
                    const reader = new FileReader();
                    reader.onload = function(event) {
                        previewImages.push({
                            file: file,
                            url: event.target.result
                        });
                        renderPreviewImages();
                    };
                    reader.readAsDataURL(file);
                } else {
                    showToast('File harus berupa gambar dan maksimal 5MB', 'error');
                }
            });
        });
        
        function renderPreviewImages() {
            previewContainer.innerHTML = '';
            previewImages.forEach((image, index) => {
                const previewDiv = document.createElement('div');
                previewDiv.className = 'preview-container';
                previewDiv.innerHTML = `
                    <img src="${image.url}" alt="Preview" class="preview-image">
                    <div class="preview-remove" onclick="removePreviewImage(${index})">
                        <i class="fas fa-times"></i>
                    </div>
                `;
                previewContainer.appendChild(previewDiv);
            });
        }
        
        function removePreviewImage(index) {
            previewImages.splice(index, 1);
            renderPreviewImages();
        }
        
        // File upload
        const fileUpload = document.getElementById('file-upload');
        const fileInput = document.getElementById('file-input');
        const fileContainer = document.getElementById('file-container');
        const uploadedFiles = [];
        
        fileUpload.addEventListener('click', function() {
            fileInput.click();
        });
        
        fileInput.addEventListener('change', function(e) {
            const files = Array.from(e.target.files);
            files.forEach(file => {
                if ((file.name.endsWith('.zip') || file.name.endsWith('.rar')) && file.size <= 50 * 1024 * 1024) {
                    uploadedFiles.push(file);
                    renderUploadedFiles();
                } else {
                    showToast('File harus berupa ZIP/RAR dan maksimal 50MB', 'error');
                }
            });
        });
        
        function renderUploadedFiles() {
            fileContainer.innerHTML = '';
            uploadedFiles.forEach((file, index) => {
                const fileDiv = document.createElement('div');
                fileDiv.className = 'file-item';
                fileDiv.innerHTML = `
                    <div class="file-info">
                        <div class="file-icon">
                            <i class="fas fa-file-archive text-blue-400"></i>
                        </div>
                        <div class="file-details">
                            <div class="file-name">${file.name}</div>
                            <div class="file-size">${formatFileSize(file.size)}</div>
                        </div>
                    </div>
                    <div class="file-remove" onclick="removeUploadedFile(${index})">
                        <i class="fas fa-trash"></i>
                    </div>
                `;
                fileContainer.appendChild(fileDiv);
            });
        }
        
        function removeUploadedFile(index) {
            uploadedFiles.splice(index, 1);
            renderUploadedFiles();
        }
        
        function formatFileSize(bytes) {
            if (bytes === 0) return '0 Bytes';
            const k = 1024;
            const sizes = ['Bytes', 'KB', 'MB', 'GB'];
            const i = Math.floor(Math.log(bytes) / Math.log(k));
            return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
        }
        
        // Form submission
        const uploadForm = document.getElementById('upload-asset-form');
        
        uploadForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Validate form
            const assetName = document.getElementById('asset-name').value;
            const assetCategory = document.getElementById('asset-category').value;
            const assetPrice = document.getElementById('asset-price').value;
            const assetDescription = document.getElementById('asset-description').value;
            const assetLicense = document.getElementById('asset-license').value;
            const termsChecked = document.getElementById('terms').checked;
            
            if (!assetName || !assetCategory || !assetPrice || !assetDescription || !assetLicense || !termsChecked) {
                showToast('Harap lengkapi semua field yang wajib diisi', 'error');
                return;
            }
            
            if (previewImages.length === 0) {
                showToast('Harap upload minimal satu gambar preview', 'error');
                return;
            }
            
            if (uploadedFiles.length === 0) {
                showToast('Harap upload file asset', 'error');
                return;
            }
            
            // Here you would handle the asset upload
            console.log('Asset uploaded:', {
                name: assetName,
                category: assetCategory,
                subcategory: document.getElementById('asset-subcategory').value,
                price: assetPrice,
                isFree: freeAssetCheckbox.checked,
                tags: tags,
                description: assetDescription,
                license: assetLicense,
                previewImages: previewImages,
                files: uploadedFiles
            });
            
            // Show success message and redirect
            showToast('Asset berhasil diunggah dan menunggu review', 'success');
            
            // Redirect to my assets page after a delay
            setTimeout(() => {
                window.location.href = '{{ url("/assets-saya") }}';
            }, 2000);
        });
        
        // Show toast notification
        function showToast(message, type = 'info') {
            const toast = document.createElement('div');
            toast.className = `toast ${type}`;
            toast.textContent = message;
            document.body.appendChild(toast);
            
            // Show toast
            setTimeout(() => {
                toast.classList.add('show');
            }, 10);
            
            // Hide toast after 3 seconds
            setTimeout(() => {
                toast.classList.remove('show');
                setTimeout(() => {
                    document.body.removeChild(toast);
                }, 300);
            }, 3000);
        }
        
        // Drag and drop functionality
        const uploadAreas = [previewUpload, fileUpload];
        
        uploadAreas.forEach(area => {
            area.addEventListener('dragover', function(e) {
                e.preventDefault();
                this.classList.add('dragover');
            });
            
            area.addEventListener('dragleave', function() {
                this.classList.remove('dragover');
            });
            
            area.addEventListener('drop', function(e) {
                e.preventDefault();
                this.classList.remove('dragover');
                
                const files = Array.from(e.dataTransfer.files);
                
                if (this === previewUpload) {
                    files.forEach(file => {
                        if (file.type.startsWith('image/') && file.size <= 5 * 1024 * 1024) {
                            const reader = new FileReader();
                            reader.onload = function(event) {
                                previewImages.push({
                                    file: file,
                                    url: event.target.result
                                });
                                renderPreviewImages();
                            };
                            reader.readAsDataURL(file);
                        } else {
                            showToast('File harus berupa gambar dan maksimal 5MB', 'error');
                        }
                    });
                } else if (this === fileUpload) {
                    files.forEach(file => {
                        if ((file.name.endsWith('.zip') || file.name.endsWith('.rar')) && file.size <= 50 * 1024 * 1024) {
                            uploadedFiles.push(file);
                            renderUploadedFiles();
                        } else {
                            showToast('File harus berupa ZIP/RAR dan maksimal 50MB', 'error');
                        }
                    });
                }
            });
        });
    </script>
</body>
</html>
                <aside class="w-full lg:w-64 sidebar-glass rounded-2xl p-6 h-fit lg:sticky lg:top-32 sidebar" id="sidebar">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-lg font-bold gradient-text">Alat Developer</h2>
                        <button class="lg:hidden text-gray-400 hover:text-white" onclick="toggleSidebar()">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    
                    <nav class="space-y-2">
                        <a href="{{ url('/developer') }}"" class="sidebar-item active flex items-center px-4 py-3 text-sm rounded-lg transition-all">
                            <i class="fas fa-chart-line mr-3"></i>
                            Dashboard
                        </a>
                        <a href="{{ url('/game-saya') }}"" class="sidebar-item flex items-center px-4 py-3 text-sm text-gray-300 hover:text-white rounded-lg transition-all">
                            <i class="fas fa-gamepad mr-3"></i>
                            Game Saya
                        </a>
                        <a href="{{ url('/asset-saya') }}"" class="sidebar-item flex items-center px-4 py-3 text-sm text-gray-300 hover:text-white rounded-lg transition-all">
                            <i class="fas fa-cog mr-3"></i>
                            Assets
                        </a>
                        <a href="{{ url('/penghasilan') }}"" class="sidebar-item flex items-center px-4 py-3 text-sm text-gray-300 hover:text-white rounded-lg transition-all">
                            <i class="fas fa-coins mr-3"></i>
                            Pendapatan
                        </a>
                        <a href="{{ url('/') }}"" class="sidebar-item flex items-center px-4 py-3 text-sm text-gray-300 hover:text-white rounded-lg transition-all">
                            <i class="fas fa-sign-out-alt mr-3"></i>
                            Logout
                        </a>
                    </nav>
                    
                    <!-- Quick Stats -->
                    <div class="mt-8 p-4 bg-gradient-to-br from-green-600/20 to-blue-600/20 rounded-xl border border-green-500/30">
                        <h3 class="text-sm font-bold text-white mb-2 flex items-center">
                            <i class="fas fa-rocket mr-2"></i> Terbitkan Cepat
                        </h3>
                        <p class="text-xs text-gray-300 mb-3">Terbitkan perubahan terbaru Anda</p>
                        <button class="w-full bg-green-600 hover:bg-green-700 text-white py-2 px-3 rounded-lg text-xs font-medium transition-colors">
                            Terbitkan Sekarang
                        </button>
                    </div>
                    
                    <!-- Storage Info -->
                    <div class="mt-6 p-4 bg-gray-800/50 rounded-xl border border-gray-700/50">
                        <h3 class="text-sm font-bold text-white mb-3 flex items-center">
                            <i class="fas fa-database mr-2"></i> Penyimpanan
                        </h3>
                        <div class="mb-2">
                            <div class="flex justify-between text-xs mb-1">
                                <span class="text-gray-400">Digunakan</span>
                                <span class="text-white">7.2 GB / 10 GB</span>
                            </div>
                            <div class="w-full bg-gray-700 rounded-full h-2">
                                <div class="progress-bar w-3/4"></div>
                            </div>
                        </div>
                        <button class="text-xs text-blue-400 hover:text-blue-300 mt-2">
                            Tingkatkan Penyimpanan
                        </button>
                    </div>
                </aside>
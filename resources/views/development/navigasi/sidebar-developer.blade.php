                <aside class="w-full lg:w-64 sidebar-glass rounded-2xl p-6 h-fit lg:sticky lg:top-32 sidebar" id="sidebar">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-lg font-bold gradient-text">Alat Developer</h2>
                        <button class="lg:hidden text-gray-400 hover:text-white" onclick="toggleSidebar()">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    
                    <nav class="space-y-2">
                       <a href="{{ url('/developer-dashboard') }}" class="sidebar-item {{ request()->is('developer') ? 'active' : (!request()->is('game-saya') && !request()->is('asset-saya') && !request()->is('penghasilan') ? 'active' : '') }} flex items-center px-4 py-3 text-sm rounded-lg transition-all">
    <i class="fas fa-chart-line mr-3"></i>
    Dashboard
</a>

<a href="{{ url('/game-saya') }}" class="sidebar-item {{ request()->is('game-saya') ? 'active' : '' }} flex items-center px-4 py-3 text-sm text-gray-300 hover:text-white rounded-lg transition-all">
    <i class="fas fa-gamepad mr-3"></i>
    Game Saya
</a>

<a href="{{ url('/asset-saya') }}" class="sidebar-item {{ request()->is('asset-saya') ? 'active' : '' }} flex items-center px-4 py-3 text-sm text-gray-300 hover:text-white rounded-lg transition-all">
    <i class="fas fa-cog mr-3"></i>
    Assets
</a>

<a href="{{ url('/penghasilan') }}" class="sidebar-item {{ request()->is('penghasilan') ? 'active' : '' }} flex items-center px-4 py-3 text-sm text-gray-300 hover:text-white rounded-lg transition-all">
    <i class="fas fa-coins mr-3"></i>
    Pendapatan
</a>

<a href="{{ url('/') }}" class="sidebar-item flex items-center px-4 py-3 text-sm text-gray-300 hover:text-white rounded-lg transition-all">
    <i class="fas fa-sign-out-alt mr-3"></i>
    Keluar
</a>


                    </nav>
                    
                    <!-- Quick Stats -->
                 
                </aside>
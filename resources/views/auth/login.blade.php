<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Playverse</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
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

        .login-container {
            background: linear-gradient(145deg, #1e1e3f 0%, #2a2a5a 100%);
            border: 1px solid rgba(59, 130, 246, 0.3);
            backdrop-filter: blur(20px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3), 0 0 30px rgba(59, 130, 246, 0.1);
        }

        .input-field {
            background: rgba(15, 15, 35, 0.8);
            border: 1px solid rgba(59, 130, 246, 0.3);
            transition: all 0.3s ease;
        }

        .input-field:focus {
            border-color: rgba(59, 130, 246, 0.8);
            box-shadow: 0 0 15px rgba(59, 130, 246, 0.2);
            outline: none;
        }

        .social-btn {
            background: rgba(15, 15, 35, 0.8);
            border: 1px solid rgba(255, 255, 255, 0.1);
            transition: all 0.3s ease;
        }

        .social-btn:hover {
            border-color: rgba(59, 130, 246, 0.5);
            box-shadow: 0 0 15px rgba(59, 130, 246, 0.2);
            transform: translateY(-2px);
        }

        .floating-orb {
            position: absolute;
            border-radius: 50%;
            filter: blur(40px);
            opacity: 0.3;
            animation: float 6s ease-in-out infinite;
        }

        .floating-orb:nth-child(1) {
            width: 200px;
            height: 200px;
            background: linear-gradient(45deg, #3b82f6, #8b5cf6);
            top: 10%;
            left: 10%;
            animation-delay: 0s;
        }

        .floating-orb:nth-child(2) {
            width: 150px;
            height: 150px;
            background: linear-gradient(45deg, #06b6d4, #3b82f6);
            top: 60%;
            right: 10%;
            animation-delay: 2s;
        }

        .floating-orb:nth-child(3) {
            width: 100px;
            height: 100px;
            background: linear-gradient(45deg, #8b5cf6, #06b6d4);
            bottom: 20%;
            left: 20%;
            animation-delay: 4s;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            33% { transform: translateY(-20px) rotate(120deg); }
            66% { transform: translateY(10px) rotate(240deg); }
        }

        .sidebar-glass {
            background: rgba(15, 15, 35, 0.9);
            backdrop-filter: blur(20px);
            border-right: 1px solid rgba(59, 130, 246, 0.2);
        }
        
        .sidebar-item:hover {
            background: linear-gradient(90deg, rgba(59, 130, 246, 0.1), rgba(59, 130, 246, 0.2));
            border-left: 3px solid #3b82f6;
            box-shadow: 0 0 15px rgba(59, 130, 246, 0.2);
        }
    </style>
</head>
<body class="text-white min-h-screen overflow-hidden relative">

    @include('partials.navbar')
    @include('partials.sidebar')
                <!-- Main Content - Login Form -->
                <main class="flex-1 flex items-center justify-center min-h-screen">
                    <div class="login-container rounded-2xl p-8 w-full max-w-md mx-auto">
                        <!-- Header -->
                        <div class="text-center mb-8">
                            <div class="w-16 h-16 bg-gradient-to-r from-blue-500 via-purple-500 to-cyan-500 rounded-xl flex items-center justify-center neon-glow mx-auto mb-4">
                                <span class="text-white font-bold text-2xl">🎮</span>
                            </div>
                            <h1 class="text-3xl font-bold gradient-text mb-2">Welcome Back!</h1>
                            <p class="text-gray-400">Login ke akun Playverse kamu</p>
                        </div>

                        <!-- Login Form -->
                        <form class="space-y-6">
                            <!-- Email -->
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-300 mb-2">Email Address</label>
                                <input type="email" id="email" name="email" required
                                       class="input-field w-full px-4 py-3 rounded-lg text-white placeholder-gray-500"
                                       placeholder="your@email.com">
                            </div>

                            <!-- Password -->
                            <div>
                                <label for="password" class="block text-sm font-medium text-gray-300 mb-2">Password</label>
                                <div class="relative">
                                    <input type="password" id="password" name="password" required
                                           class="input-field w-full px-4 py-3 rounded-lg text-white placeholder-gray-500 pr-12"
                                           placeholder="••••••••">
                                    <button type="button" onclick="togglePassword()" class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-white">
                                        <span id="password-toggle">👁</span>
                                    </button>
                                </div>
                            </div>

                            <!-- Remember & Forgot -->
                            <div class="flex items-center justify-between">
                                <label class="flex items-center">
                                    <input type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-700 border-gray-600 rounded focus:ring-blue-500">
                                    <span class="ml-2 text-sm text-gray-300">Remember me</span>
                                </label>
                                <a href="#" class="text-sm text-blue-400 hover:text-blue-300 transition-colors">Forgot password?</a>
                            </div>

                            <!-- Login Button -->
                            <button type="submit" class="w-full btn-neon py-3 rounded-lg font-semibold text-white">
                                🚀 Login to Playverse
                            </button>
                        </form>

                        <!-- Divider -->
                        <div class="my-8 flex items-center">
                            <div class="flex-1 border-t border-gray-600"></div>
                            <span class="px-4 text-gray-400 text-sm">or continue with</span>
                            <div class="flex-1 border-t border-gray-600"></div>
                        </div>

                        <!-- Social Login -->
                        <div class="space-y-3">
                            <button class="social-btn w-full py-3 rounded-lg font-medium text-white flex items-center justify-center space-x-3">
                                <span>🌐</span>
                                <span>Continue with Google</span>
                            </button>
                            <button class="social-btn w-full py-3 rounded-lg font-medium text-white flex items-center justify-center space-x-3">
                                <span>📘</span>
                                <span>Continue with Facebook</span>
                            </button>
                            <button class="social-btn w-full py-3 rounded-lg font-medium text-white flex items-center justify-center space-x-3">
                                <span>🎯</span>
                                <span>Continue with Discord</span>
                            </button>
                        </div>

                        <!-- Register Link -->
                        <div class="mt-8 text-center">
                            <p class="text-gray-400">
                                Belum punya akun? 
                                <a href="#" class="text-blue-400 hover:text-blue-300 font-medium transition-colors">Daftar sekarang</a>
                            </p>
                        </div>

                        <!-- Gaming Stats -->
                        <div class="mt-8 grid grid-cols-3 gap-4 text-center">
                            <div class="p-3 bg-gradient-to-br from-blue-600/20 to-purple-600/20 rounded-lg border border-blue-500/30">
                                <div class="text-lg font-bold text-blue-400">1.2K+</div>
                                <div class="text-xs text-gray-400">Games</div>
                            </div>
                            <div class="p-3 bg-gradient-to-br from-purple-600/20 to-pink-600/20 rounded-lg border border-purple-500/30">
                                <div class="text-lg font-bold text-purple-400">50K+</div>
                                <div class="text-xs text-gray-400">Players</div>
                            </div>
                            <div class="p-3 bg-gradient-to-br from-cyan-600/20 to-blue-600/20 rounded-lg border border-cyan-500/30">
                                <div class="text-lg font-bold text-cyan-400">24/7</div>
                                <div class="text-xs text-gray-400">Online</div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </div>

    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const toggleButton = document.getElementById('password-toggle');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleButton.textContent = '🙈';
            } else {
                passwordInput.type = 'password';
                toggleButton.textContent = '👁';
            }
        }

        // Form submission
        document.querySelector('form').addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Show loading state
            const submitBtn = document.querySelector('button[type="submit"]');
            const originalText = submitBtn.innerHTML;
            submitBtn.innerHTML = '⏳ Logging in...';
            submitBtn.disabled = true;
            
            // Simulate login process
            setTimeout(() => {
                submitBtn.innerHTML = '✅ Login Successful!';
                setTimeout(() => {
                    // Redirect to dashboard or home page
                    window.location.href = '#dashboard';
                }, 1000);
            }, 2000);
        });

        // Social login handlers
        document.querySelectorAll('.social-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const platform = this.textContent.trim().split(' ').pop();
                this.innerHTML = `⏳ Connecting to ${platform}...`;
                this.disabled = true;
                
                setTimeout(() => {
                    this.innerHTML = `✅ Connected to ${platform}!`;
                    setTimeout(() => {
                        window.location.href = '#dashboard';
                    }, 1000);
                }, 2000);
            });
        });

        // Input focus effects
        document.querySelectorAll('.input-field').forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.classList.add('focused');
            });
            
            input.addEventListener('blur', function() {
                this.parentElement.classList.remove('focused');
            });
        });
    </script>
</body>
</html>
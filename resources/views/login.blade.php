<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GameHub - Sign In & Sign Up</title>
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
        
        .auth-card {
            background: linear-gradient(145deg, #1e1e3f 0%, #2a2a5a 100%);
            border: 1px solid rgba(59, 130, 246, 0.2);
            backdrop-filter: blur(10px);
            transition: all 0.3s ease;
        }
        
        .auth-card:hover {
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
        
        .tab-button {
            background: transparent;
            border: none;
            color: rgba(255, 255, 255, 0.6);
            padding: 12px 24px;
            font-size: 16px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
        }
        
        .tab-button.active {
            color: white;
        }
        
        .tab-button.active::after {
            content: '';
            position: absolute;
            bottom: -1px;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, #3b82f6, #8b5cf6);
            border-radius: 2px;
        }
        
        .tab-button:hover:not(.active) {
            color: rgba(255, 255, 255, 0.8);
        }
        
        .social-button {
            background: rgba(30, 30, 63, 0.6);
            border: 1px solid rgba(59, 130, 246, 0.3);
            transition: all 0.3s ease;
        }
        
        .social-button:hover {
            background: rgba(59, 130, 246, 0.2);
            border-color: rgba(59, 130, 246, 0.5);
            transform: translateY(-1px);
        }
        
        .divider {
            position: relative;
            text-align: center;
            margin: 24px 0;
        }
        
        .divider::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            height: 1px;
            background: rgba(59, 130, 246, 0.3);
        }
        
        .divider span {
            background: linear-gradient(145deg, #1e1e3f 0%, #2a2a5a 100%);
            padding: 0 16px;
            position: relative;
            color: rgba(255, 255, 255, 0.6);
            font-size: 14px;
        }
        
        .error-message {
            color: #ef4444;
            font-size: 0.875rem;
            margin-top: 0.25rem;
            display: none;
        }
        
        .success-message {
            color: #22c55e;
            font-size: 0.875rem;
            margin-top: 0.25rem;
            display: none;
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
                    <a href="{{ url('/') }}" class="text-gray-300 hover:text-white px-3 py-2 text-sm font-medium transition-colors">Home</a>
                    <a href="{{ url('/developer-dashboard') }}" class="text-gray-300 hover:text-white px-3 py-2 text-sm font-medium transition-colors">Developer Mode</a>
                    <a href="{{ url('/my-games') }}" class="text-gray-300 hover:text-white px-3 py-2 text-sm font-medium transition-colors">My Games</a>
                    <a href="{{ url('/join-developer') }}" class="text-gray-300 hover:text-white px-3 py-2 text-sm font-medium transition-colors">Join as Developer</a>
                    <a href="#" class="text-gray-300 hover:text-white px-3 py-2 text-sm font-medium transition-colors">Community</a>
                </div>
                <!-- User Actions -->
                <div class="flex items-center space-x-4">
                    <div class="flex items-center space-x-2">
                        <a href="#" class="text-white px-3 py-2 text-sm font-medium transition-colors border-b-2 border-blue-500">Sign In</a>
                        <a href="#" class="btn-neon px-4 py-2 rounded-lg text-sm font-medium">Sign Up</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    
    <!-- Main Content -->
    <div class="pt-24 pb-12 min-h-screen flex items-center">
        <div class="max-w-md mx-auto px-4 sm:px-6 lg:px-8 w-full">
            <!-- Auth Card -->
            <div class="auth-card rounded-2xl p-8">
                <!-- Tab Navigation -->
                <div class="flex justify-center mb-8">
                    <button class="tab-button active" onclick="switchTab('signin')">Sign In</button>
                    <button class="tab-button" onclick="switchTab('signup')">Sign Up</button>
                </div>
                
                <!-- Sign In Form -->
                <div id="signin-form" class="auth-form">
                    <h2 class="text-2xl font-bold text-white text-center mb-6">Welcome Back</h2>
                    
                    <form onsubmit="handleSignIn(event)">
                        <div class="space-y-4">
                            <div>
                                <label class="form-label block mb-2">Email</label>
                                <input type="email" class="form-input w-full px-4 py-3 rounded-lg text-white" placeholder="your@email.com" required>
                                <span class="error-message">Email tidak valid</span>
                            </div>
                            
                            <div>
                                <label class="form-label block mb-2">Password</label>
                                <input type="password" class="form-input w-full px-4 py-3 rounded-lg text-white" placeholder="••••••••" required>
                                <span class="error-message">Password salah</span>
                            </div>
                            
                            <div class="flex items-center justify-between">
                                <label class="flex items-center">
                                    <input type="checkbox" class="form-checkbox mr-2">
                                    <span class="text-sm text-gray-300">Remember me</span>
                                </label>
                                <a href="#" class="text-sm text-blue-400 hover:text-blue-300">Forgot password?</a>
                            </div>
                            
                            <button type="submit" class="btn-neon w-full py-3 rounded-lg font-medium">
                                Sign In
                            </button>
                        </div>
                    </form>
                    
                    <div class="divider">
                        <span>or continue with</span>
                    </div>
                    
                    <div class="grid grid-cols-2 gap-3">
                        <button class="social-button py-3 rounded-lg flex items-center justify-center gap-2">
                            <i class="fab fa-google text-xl"></i>
                            <span class="text-sm">Google</span>
                        </button>
                        <button class="social-button py-3 rounded-lg flex items-center justify-center gap-2">
                            <i class="fab fa-github text-xl"></i>
                            <span class="text-sm">GitHub</span>
                        </button>
                    </div>
                    
                    <p class="text-center text-gray-400 mt-6">
                        Don't have an account? <a href="#" onclick="switchTab('signup')" class="text-blue-400 hover:text-blue-300">Sign up</a>
                    </p>
                </div>
                
                <!-- Sign Up Form -->
                <div id="signup-form" class="auth-form hidden">
                    <h2 class="text-2xl font-bold text-white text-center mb-6">Create Account</h2>
                    
                    <form onsubmit="handleSignUp(event)">
                        <div class="space-y-4">
                            <div class="grid grid-cols-2 gap-3">
                                <div>
                                    <label class="form-label block mb-2">First Name</label>
                                    <input type="text" class="form-input w-full px-4 py-3 rounded-lg text-white" placeholder="John" required>
                                </div>
                                <div>
                                    <label class="form-label block mb-2">Last Name</label>
                                    <input type="text" class="form-input w-full px-4 py-3 rounded-lg text-white" placeholder="Doe" required>
                                </div>
                            </div>
                            
                            <div>
                                <label class="form-label block mb-2">Email</label>
                                <input type="email" class="form-input w-full px-4 py-3 rounded-lg text-white" placeholder="your@email.com" required>
                                <span class="error-message">Email sudah terdaftar</span>
                            </div>
                            
                            <div>
                                <label class="form-label block mb-2">Password</label>
                                <input type="password" id="signup-password" class="form-input w-full px-4 py-3 rounded-lg text-white" placeholder="••••••••" required>
                                <span class="error-message">Password minimal 8 karakter</span>
                            </div>
                            
                            <div>
                                <label class="form-label block mb-2">Confirm Password</label>
                                <input type="password" id="confirm-password" class="form-input w-full px-4 py-3 rounded-lg text-white" placeholder="••••••••" required>
                                <span class="error-message">Password tidak cocok</span>
                            </div>
                            
                            <div>
                                <label class="flex items-start">
                                    <input type="checkbox" class="form-checkbox mt-1 mr-2" required>
                                    <span class="text-sm text-gray-300">
                                        I agree to the <a href="#" class="text-blue-400 hover:text-blue-300">Terms of Service</a> and <a href="#" class="text-blue-400 hover:text-blue-300">Privacy Policy</a>
                                    </span>
                                </label>
                            </div>
                            
                            <button type="submit" class="btn-neon w-full py-3 rounded-lg font-medium">
                                Sign Up
                            </button>
                        </div>
                    </form>
                    
                    <div class="divider">
                        <span>or continue with</span>
                    </div>
                    
                    <div class="grid grid-cols-2 gap-3">
                        <button class="social-button py-3 rounded-lg flex items-center justify-center gap-2">
                            <i class="fab fa-google text-xl"></i>
                            <span class="text-sm">Google</span>
                        </button>
                        <button class="social-button py-3 rounded-lg flex items-center justify-center gap-2">
                            <i class="fab fa-github text-xl"></i>
                            <span class="text-sm">GitHub</span>
                        </button>
                    </div>
                    
                    <p class="text-center text-gray-400 mt-6">
                        Already have an account? <a href="#" onclick="switchTab('signin')" class="text-blue-400 hover:text-blue-300">Sign in</a>
                    </p>
                </div>
            </div>
            
            <!-- Developer CTA -->
            <div class="mt-8 text-center">
                <p class="text-gray-400 mb-2">Are you a game developer?</p>
                <a href="{{ url('/join-developer') }}" class="text-blue-400 hover:text-blue-300 font-medium">
                    Join as Developer <i class="fas fa-arrow-right ml-1"></i>
                </a>
            </div>
        </div>
    </div>
    
    <!-- Success Modal -->
    <div id="success-modal" class="fixed inset-0 bg-black/50 backdrop-blur-sm z-50 hidden">
        <div class="flex items-center justify-center min-h-screen p-4">
            <div class="auth-card rounded-2xl p-8 max-w-md w-full">
                <div class="text-center">
                    <div class="w-20 h-20 bg-green-500/20 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-check text-4xl text-green-500"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-white mb-2" id="modal-title">Success!</h3>
                    <p class="text-gray-300 mb-6" id="modal-message">Operation completed successfully.</p>
                    <button onclick="closeModal()" class="btn-neon px-6 py-3 rounded-lg font-medium">
                        Continue
                    </button>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        function switchTab(tab) {
            const signinForm = document.getElementById('signin-form');
            const signupForm = document.getElementById('signup-form');
            const tabButtons = document.querySelectorAll('.tab-button');
            
            tabButtons.forEach(btn => btn.classList.remove('active'));
            
            if (tab === 'signin') {
                signinForm.classList.remove('hidden');
                signupForm.classList.add('hidden');
                tabButtons[0].classList.add('active');
            } else {
                signinForm.classList.add('hidden');
                signupForm.classList.remove('hidden');
                tabButtons[1].classList.add('active');
            }
        }
        
        function handleSignIn(event) {
            event.preventDefault();
            
            // Simulate sign in process
            const modal = document.getElementById('success-modal');
            const modalTitle = document.getElementById('modal-title');
            const modalMessage = document.getElementById('modal-message');
            
            modalTitle.textContent = 'Welcome Back!';
            modalMessage.textContent = 'You have successfully signed in to your account.';
            modal.classList.remove('hidden');
            
            // In real app, this would redirect to dashboard
            setTimeout(() => {
                window.location.href = '{{ url("/developer-dashboard") }}';
            }, 2000);
        }
        
        function handleSignUp(event) {
            event.preventDefault();
            
            const password = document.getElementById('signup-password').value;
            const confirmPassword = document.getElementById('confirm-password').value;
            
            if (password !== confirmPassword) {
                alert('Passwords do not match!');
                return;
            }
            
            if (password.length < 8) {
                alert('Password must be at least 8 characters long!');
                return;
            }
            
            // Simulate sign up process
            const modal = document.getElementById('success-modal');
            const modalTitle = document.getElementById('modal-title');
            const modalMessage = document.getElementById('modal-message');
            
            modalTitle.textContent = 'Account Created!';
            modalMessage.textContent = 'Your account has been created successfully. Please check your email for verification.';
            modal.classList.remove('hidden');
            
            // In real app, this would redirect to verification page
            setTimeout(() => {
                window.location.href = '{{ url("/") }}';
            }, 2000);
        }
        
        function closeModal() {
            document.getElementById('success-modal').classList.add('hidden');
        }
        
        // Add input focus effects
        document.querySelectorAll('.form-input').forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.querySelector('.error-message').style.display = 'none';
            });
        });
    </script>
</body>
</html>
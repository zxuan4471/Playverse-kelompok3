<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - GameHub</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #000000;
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
        }
        
        .login-container {
            background: #1a1a1a;
            border: 1px solid #333333;
        }
        
        .form-input {
            background: #2a2a2a;
            border: 1px solid #404040;
            color: white;
            transition: border-color 0.3s ease;
        }
        
        .form-input:focus {
            background: #2a2a2a;
            border-color: #3b82f6;
            outline: none;
        }
        
        .btn-login {
            background: #3b82f6;
            color: white;
            transition: background-color 0.3s ease;
        }
        
        .btn-login:hover {
            background: #2563eb;
        }
        
        .social-btn {
            background: #2a2a2a;
            border: 1px solid #404040;
            transition: all 0.3s ease;
        }
        
        .social-btn:hover {
            background: #333333;
            border-color: #3b82f6;
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
    </style>
</head>
<body class="flex items-center justify-center min-h-screen p-4">
    <!-- Login Container -->
    <div class="login-container rounded-lg p-8 w-full max-w-md">
        <!-- Logo and Header -->
        <div class="text-center mb-8">
            <div class="flex justify-center mb-4">
                <div class="w-16 h-16 bg-blue-600 rounded-lg flex items-center justify-center">
                    <i class="fas fa-shield-alt text-white text-2xl"></i>
                </div>
            </div>
            <h1 class="text-2xl font-bold text-white mb-2">GameHub Admin</h1>
            <p class="text-gray-400">Masuk ke panel administrator</p>
        </div>
        
        <!-- Login Form -->
        <form onsubmit="handleLogin(event)" class="space-y-6">
            <!-- Email Input -->
            <div>
                <label class="block text-gray-300 text-sm font-medium mb-2">Email</label>
                <div class="relative">
                    <input type="email" 
                           id="email"
                           class="form-input w-full pl-10 pr-4 py-3 rounded-lg" 
                           placeholder="admin@gamehub.com"
                           required>
                    <i class="fas fa-envelope absolute left-3 top-3.5 text-gray-400"></i>
                </div>
                <span class="error-message" id="emailError">Email tidak valid</span>
            </div>
            
            <!-- Password Input -->
            <div>
                <label class="block text-gray-300 text-sm font-medium mb-2">Password</label>
                <div class="relative">
                    <input type="password" 
                           id="password"
                           class="form-input w-full pl-10 pr-10 py-3 rounded-lg" 
                           placeholder="••••••••"
                           required>
                    <i class="fas fa-lock absolute left-3 top-3.5 text-gray-400"></i>
                    <button type="button" onclick="togglePassword()" class="absolute right-3 top-3.5 text-gray-400 hover:text-white">
                        <i class="fas fa-eye" id="toggleIcon"></i>
                    </button>
                </div>
                <span class="error-message" id="passwordError">Password minimal 8 karakter</span>
            </div>
            
            <!-- Remember Me & Forgot Password -->
            <div class="flex items-center justify-between">
                <label class="flex items-center">
                    <input type="checkbox" class="rounded bg-gray-700 border-gray-600">
                    <span class="ml-2 text-sm text-gray-300">Ingat saya</span>
                </label>
                <a href="#" class="text-sm text-blue-400 hover:text-blue-300">Lupa password?</a>
            </div>
            
            <!-- Login Button -->
            <button type="submit" class="btn-login w-full py-3 rounded-lg font-medium">
                <i class="fas fa-sign-in-alt mr-2"></i>
                Masuk
            </button>
            
            <span class="success-message" id="successMessage">Login berhasil! Mengalihkan...</span>
        </form>
    
    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const toggleIcon = document.getElementById('toggleIcon');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
            }
        }
        
        function handleLogin(event) {
            event.preventDefault();
            
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;
            const emailError = document.getElementById('emailError');
            const passwordError = document.getElementById('passwordError');
            const successMessage = document.getElementById('successMessage');
            
            // Reset error messages
            emailError.style.display = 'none';
            passwordError.style.display = 'none';
            successMessage.style.display = 'none';
            
            let isValid = true;
            
            // Validate email
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email)) {
                emailError.style.display = 'block';
                isValid = false;
            }
            
            // Validate password
            if (password.length < 8) {
                passwordError.style.display = 'block';
                isValid = false;
            }
            
            if (isValid) {
                // Show success message
                successMessage.style.display = 'block';
                
                // Simulate login process
                setTimeout(() => {
                    // Redirect to admin dashboard
                    window.location.href = '/dashboard-admin';
                }, 1500);
            }
        }
        
        // Add input event listeners for real-time validation
        document.getElementById('email').addEventListener('input', function() {
            const emailError = document.getElementById('emailError');
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            
            if (emailRegex.test(this.value)) {
                emailError.style.display = 'none';
            }
        });
        
        document.getElementById('password').addEventListener('input', function() {
            const passwordError = document.getElementById('passwordError');
            
            if (this.value.length >= 8) {
                passwordError.style.display = 'none';
            }
        });
        
        // Social login handlers
        document.querySelectorAll('.social-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const provider = this.textContent.trim();
                alert(`Login dengan ${provider} akan segera tersedia`);
            });
        });
    </script>
</body>
</html>
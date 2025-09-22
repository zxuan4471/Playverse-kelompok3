{{-- resources/views/auth/register.blade.php --}}
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Playverse - Sign Up</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    body { background: linear-gradient(135deg,#0f0f23 0%,#1a1a2e 50%,#16213e 100%); font-family:'Inter',sans-serif; }
    .neon-glow { box-shadow:0 0 20px rgba(59,130,246,.3),0 0 40px rgba(59,130,246,.1); }
    .glass-morphism { background:rgba(30,30,63,.8); backdrop-filter:blur(20px); border:1px solid rgba(255,255,255,.1); }
    .auth-card { background:linear-gradient(145deg,#1e1e3f 0%,#2a2a5a 100%); border:1px solid rgba(59,130,246,.2); backdrop-filter:blur(10px); }
    .btn-neon { background:linear-gradient(45deg,#3b82f6,#1d4ed8); box-shadow:0 0 15px rgba(59,130,246,.4); transition:.3s; }
    .btn-neon:hover { box-shadow:0 0 25px rgba(59,130,246,.6),0 0 35px rgba(59,130,246,.3); transform:translateY(-2px); }
    .form-input { background:rgba(30,30,63,.6); border:1px solid rgba(59,130,246,.3); transition:.3s; }
    .form-input:focus { border-color:rgba(59,130,246,.6); box-shadow:0 0 15px rgba(59,130,246,.3); outline:none; }
  </style>
</head>
<body class="text-white min-h-screen">

  <!-- Navbar -->
  <nav class="glass-morphism fixed top-0 left-0 right-0 z-50 border-b border-blue-500/20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex justify-between h-16">
        <div class="flex-shrink-0 flex items-center">
    <a href="{{ url('/') }}">
        <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-14 w-auto">
    </a>
</div>
        <div class="hidden md:flex items-center space-x-8">
          <a href="{{ ('/') }}" class="text-gray-300 hover:text-white">Home</a>
          <a href="{{ url('/developer-dashboard') }}" class="text-gray-300 hover:text-white">Developer Mode</a>
          <a href="{{ url('/join-developer') }}" class="text-gray-300 hover:text-white">Join as Developer</a>
        </div>
        <div class="flex items-center space-x-2">
          <a href="{{ route('login') }}" class="text-white border-b-2 border-blue-500 px-3 py-2">Login</a>
          <a href="{{ route('register') }}" class="btn-neon px-4 py-2 rounded-lg">Sign Up</a>
        </div>
      </div>
    </div>
  </nav>

  <!-- Content -->
  <div class="pt-24 flex justify-center">
    <div class="auth-card rounded-2xl p-8 max-w-md w-full">
      <h2 class="text-2xl font-bold text-center mb-6">Create Account</h2>
      <form method="POST" action="{{ route('register.proses') }}">
        @csrf
        <div class="space-y-4">
          <div>
  <label>Nama</label>
  <input type="text" name="name" value="{{ old('name') }}" class="form-input w-full px-4 py-3 rounded-lg" required>
  @error('nama')<p class="text-red-500 text-sm">{{ $message }}</p>@enderror
</div>

          <div>
            <label>Email</label>
            <input type="email" name="email" value="{{ old('email') }}" class="form-input w-full px-4 py-3 rounded-lg" required>
            @error('email')<p class="text-red-500 text-sm">{{ $message }}</p>@enderror
          </div>
          <div>
            <label>Password</label>
            <input type="password" name="password" class="form-input w-full px-4 py-3 rounded-lg" required>
            @error('password')<p class="text-red-500 text-sm">{{ $message }}</p>@enderror
          </div>
          <div>
            <label>Confirm Password</label>
            <input type="password" name="password_confirmation" class="form-input w-full px-4 py-3 rounded-lg" required>
          </div>
          <button type="submit" class="btn-neon w-full py-3 rounded-lg">Sign Up</button>
        </div>
      </form>
      <p class="text-center text-gray-400 mt-6">
        Already have an account? <a href="{{ route('login') }}" class="text-blue-400">Sign In</a>
      </p>
    </div>
  </div>
</body>
</html>

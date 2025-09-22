<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GameHub - Koleksi Game Itch.io Terbaik</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="text-white min-h-screen">
    @include('partials.navbar')
    @include('partials.sidebar')

    <!-- Main Content -->
    <main class="flex-1">
        <!-- Breadcrumb -->
        <div class="breadcrumb"></div>

        <!-- Hero Section -->
        <section class="bg-gradient-to-r from-purple-600 via-blue-500 to-cyan-500 rounded-2xl p-8 mb-8 neon-glow">
            <div class="max-w-2xl">
                <h1 class="text-4xl font-bold mb-4">Discover Amazing Indie Games</h1>
                <p class="text-lg text-blue-100 mb-6">
                    Jelajahi koleksi game indie terbaik dari game kita. Mainkan langsung di browser tanpa perlu download!
                </p>
            </div>
        </section>

        <!-- Filter Bar -->
        <div class="flex flex-wrap items-center gap-4 mb-8 p-4 glass-morphism rounded-xl">
            <span class="text-sm font-medium text-gray-300">Filter:</span>
            <button class="category-badge active" data-filter="all">All</button>
            <button class="category-badge" data-filter="free">Free</button>
            <button class="category-badge" data-filter="paid">Paid</button>
            <button class="category-badge" data-filter="new">New</button>
            <button class="category-badge" data-filter="popular">Popular</button>
        </div>

        <!-- Games Grid -->
        <div id="games-container" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
            @foreach($games as $game)
                <div class="game-card rounded-xl overflow-hidden" 
                     data-category="{{ $game->category->name ?? 'uncategorized' }}" 
                     data-price="{{ $game->is_free ? 'free' : 'paid' }}">
                    <div class="relative">
                        @if($game->cover_image)
                            <img src="{{ asset('storage/' . $game->cover_image) }}" 
                                 alt="{{ $game->title }}" 
                                 class="game-thumbnail">
                        @else
                            <img src="https://via.placeholder.com/300x200/4338ca/ffffff?text=No+Image" 
                                 alt="No Cover" 
                                 class="game-thumbnail">
                        @endif
                        <div class="absolute top-3 right-3">
                            <span class="category-badge">{{ $game->category->name ?? 'Tanpa Kategori' }}</span>
                        </div>
                        <div class="absolute bottom-3 left-3">
                            @if($game->is_free)
                                <span class="text-green-400 font-bold text-sm bg-black/50 px-2 py-1 rounded">Free</span>
                            @else
                                <span class="text-yellow-400 font-bold text-sm bg-black/50 px-2 py-1 rounded">
                                    {{ $game->price ?? 'Paid' }}
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="p-4">
                        <h3 class="font-bold text-white mb-2 text-lg">{{ $game->title }}</h3>
                        <p class="text-gray-400 text-sm mb-3 line-clamp-2">{{ $game->description }}</p>

                        <div class="flex space-x-2">
                            <a href="{{ route('games.show', $game->id) }}">
                                <button class="flex-1 btn-neon text-white py-2 px-4 rounded-lg font-semibold text-sm">
                                    Play
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Load More Button -->
        <div class="text-center">
            <button id="load-more" class="btn-neon px-8 py-3 rounded-xl font-semibold">
                Load More Games
            </button>
        </div>
    </main>

    <!-- Game Modal -->
    <div id="game-modal" class="modal">
        <div class="modal-content relative w-full max-w-4xl h-3/4">
            <button class="close-modal">&times;</button>
            <div id="modal-game-content" class="w-full h-full">
                <!-- Game iframe will be loaded here -->
            </div>
        </div>
    </div>
</body>
</html>

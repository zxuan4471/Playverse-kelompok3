{{-- Game Card Component --}}
<div class="game-card rounded-xl overflow-hidden">
    <div class="relative">
        <img src="{{ $game['thumbnail'] }}" 
             alt="{{ $game['title'] }}" 
             class="game-thumbnail"
             loading="lazy">
        
        {{-- Featured Badge --}}
        @if($game['featured'] ?? false)
        <div class="absolute top-3 left-3">
            <span class="bg-yellow-500 text-black text-xs font-bold px-2 py-1 rounded">
                ⭐ FEATURED
            </span>
        </div>
        @endif
        
        {{-- Category Badge --}}
        <div class="absolute top-3 right-3">
            <span class="category-badge">{{ ucfirst($game['category']) }}</span>
        </div>
        
        {{-- Price Badge --}}
        <div class="absolute bottom-3 left-3">
            <span class="{{ $game['price'] === 'Free' ? 'text-green-400' : 'text-yellow-400' }} font-bold text-sm bg-black/50 px-2 py-1 rounded">
                {{ $game['price'] }}
            </span>
        </div>
    </div>
    
    <div class="p-4">
        {{-- Game Title --}}
        <h3 class="font-bold text-white mb-2 text-lg">
            {{ $game['title'] }}
        </h3>
        
        {{-- Game Description --}}
        <p class="text-gray-400 text-sm mb-3 line-clamp-2">
            {{ Str::limit($game['description'], 100) }}
        </p>
        
        {{-- Rating and Author --}}
        <div class="flex items-center justify-between mb-3">
            <div class="flex items-center space-x-1">
                <span class="text-yellow-400">
                    @for($i = 0; $i < floor($game['rating']); $i++)⭐@endfor
                </span>
                <span class="text-yellow-400 font-bold">{{ $game['rating'] }}</span>
            </div>
            <div class="flex items-center space-x-2">
                <img src="{{ $game['author_avatar'] }}" 
                     alt="{{ $game['author'] }}" 
                     class="w-5 h-5 rounded-full">
                <span class="text-gray-500 text-xs">{{ $game['author'] }}</span>
            </div>
        </div>
        
        {{-- Stats --}}
        <div class="flex items-center justify-between mb-3">
            <span class="text-gray-500 text-xs">
                💾 {{ number_format($game['downloads']) }} downloads
            </span>
            <span class="text-gray-500 text-xs">
                📅 {{ \Carbon\Carbon::parse($game['created_at'])->format('M d, Y') }}
            </span>
        </div>
        
        {{-- Tags --}}
        @if(isset($game['tags']) && count($game['tags']) > 0)
        <div class="flex flex-wrap gap-1 mb-3">
            @foreach(array_slice($game['tags'], 0, 3) as $tag)
            <span class="bg-gray-700 text-gray-300 px-2 py-1 rounded text-xs">
                #{{ $tag }}
            </span>
            @endforeach
            @if(count($game['tags']) > 3)
            <span class="text-gray-500 text-xs">+{{ count($game['tags']) - 3 }} more</span>
            @endif
        </div>
        @endif
        
        {{-- Action Buttons --}}
        <div class="flex space-x-2">
            <button onclick="playGame('{{ $game['url'] }}')" 
                    class="flex-1 btn-neon text-white py-2 px-4 rounded-lg font-semibold text-sm hover:scale-105 transition-transform">
                🎮 Play
            </button>
            <button onclick="viewGame('{{ $game['url'] }}')" 
                    class="bg-gray-700 hover:bg-gray-600 text-white py-2 px-4 rounded-lg font-semibold text-sm transition-colors">
                👁 View
            </button>
            <button onclick="shareGame('{{ $game['title'] }}', '{{ $game['url'] }}')" 
                    class="bg-purple-600 hover:bg-purple-700 text-white py-2 px-3 rounded-lg font-semibold text-sm transition-colors"
                    title="Share Game">
                📤
            </button>
        </div>
    </div>
</div>

{{-- Add this script to handle interactions --}}
@once
@push('scripts')
<script>
function playGame(url) {
    // Track play event (you can add analytics here)
    gtag && gtag('event', 'play_game', {
        'game_url': url
    });
    
    // Open game in new tab
    window.open(url, '_blank');
}

function viewGame(url) {
    // Track view event
    gtag && gtag('event', 'view_game', {
        'game_url': url
    });
    
    // Open game page in new tab
    window.open(url, '_blank');
}

function shareGame(title, url) {
    if (navigator.share) {
        // Use native Web Share API if available
        navigator.share({
            title: title,
            text: `Check out this awesome game: ${title}`,
            url: url
        });
    } else {
        // Fallback to clipboard copy
        const shareText = `Check out this awesome game: ${title} - ${url}`;
        navigator.clipboard.writeText(shareText).then(() => {
            // Show toast notification
            showToast('Game link copied to clipboard! 📋');
        });
    }
}

function showToast(message) {
    // Create toast element
    const toast = document.createElement('div');
    toast.className = 'fixed top-4 right-4 bg-green-600 text-white px-4 py-2 rounded-lg shadow-lg z-50 transition-all transform translate-x-full';
    toast.textContent = message;
    
    document.body.appendChild(toast);
    
    // Animate in
    setTimeout(() => {
        toast.classList.remove('translate-x-full');
    }, 100);
    
    // Remove after 3 seconds
    setTimeout(() => {
        toast.classList.add('translate-x-full');
        setTimeout(() => {
            document.body.removeChild(toast);
        }, 300);
    }, 3000);
}
</script>
@endpush
@endonce
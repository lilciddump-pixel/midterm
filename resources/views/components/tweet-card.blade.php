@props(['tweet', 'currentUserId'])

<div class="p-4 cursor-pointer transition border-b" style="background-color: #000; border-color: #2f3336;">
    <div class="flex gap-3">
        {{-- Avatar Placeholder --}}
        <div class="w-12 h-12 rounded-full flex-shrink-0" style="background-color: #2f3336;"></div>
        
        <div class="flex-1 min-w-0">
            {{-- Header --}}
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-2 min-w-0">
                    
                    {{-- Name --}}
                    @php $author = $tweet->user; @endphp
                    @if ($author)
                        <a href="{{ route('users.show', $author->id) }}" class="font-bold text-white hover:underline">
                            {{ $author->name }}
                        </a>
                        {{-- Handle & Time --}}
                        <span style="color: #71767b;">@ {{ strtolower(str_replace(' ', '', $author->name)) }}</span>
                    @else
                        <span class="font-bold text-white">Unknown</span>
                    @endif
                    @if ($tweet->created_at)
                        <span style="color: #71767b;">&middot; {{ $tweet->created_at->diffForHumans(null, true, true) }}</span>
                    @endif
                </div>
                
                {{-- Edit/Delete Buttons --}}
                @if ($tweet->user_id === $currentUserId)
                    <div class="flex-shrink-0 flex gap-2">
                        <a href="{{ route('tweets.edit', $tweet) }}" class="transition p-2 -m-2 rounded-full text-sm font-medium" style="color: #71767b;">
                            Edit
                        </a>
                        <form method="POST" action="{{ route('tweets.destroy', $tweet) }}" style="display:inline;">
                            @csrf @method('delete')
                            <button type="submit" onclick="return confirm('Are you sure you want to delete this tweet?')" class="transition p-2 -m-2 rounded-full text-sm font-medium" style="color: #71767b;">
                                Delete
                            </button>
                        </form>
                    </div>
                @endif
            </div>

            {{-- Message Content --}}
            <p class="mt-2 text-white text-[15px] leading-normal break-words">{{ $tweet->content }}</p>

            {{-- Action Icons (Like) --}}
            <div class="flex items-center mt-3 -ml-2">
                @php
                    // Check if the current user has liked the tweet
                    $isLiked = $tweet->likes->contains('user_id', $currentUserId);
                @endphp
                
                <button 
                    onclick="toggleLike({{ $tweet->id }})" 
                    id="like-btn-{{ $tweet->id }}"
                    class="flex items-center gap-2 group transition text-sm p-2 rounded-full"
                    style="color: {{ $isLiked ? '#f91880' : '#71767b' }};"
                >
                    <span id="like-heart-{{ $tweet->id }}" class="text-lg">
                        {{ $isLiked ? '❤️' : '🤍' }}
                    </span>
                    <span id="like-count-{{ $tweet->id }}" class="text-sm">{{ $tweet->likes->count() }}</span>
                </button>
            </div>
        </div>
    </div>
</div>
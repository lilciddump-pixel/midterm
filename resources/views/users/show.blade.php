<x-app-layout>
    <div class="max-w-2xl mx-auto bg-black border-x border-gray-800 min-h-screen px-4 py-6">
        <div class="mb-6 p-4 border-b border-gray-800">
            <h1 class="text-2xl font-bold text-white mb-2">{{ $user->name }}</h1>
            <p class="text-sm text-gray-400">Joined: {{ $user->created_at->format('M d, Y') }}</p>
            <p class="text-sm text-gray-400">Tweets: {{ $tweetCount }} | Likes Received: {{ $totalLikesReceived }}</p>
        </div>

        <div>
            @forelse($tweets as $tweet)
                <div class="p-4 border-b border-gray-800 flex gap-4">
                    <div class="w-12 h-12 rounded-full bg-blue-500 flex-shrink-0"></div>
                    <div class="flex-1">
                        <a href="{{ route('users.show', $tweet->user) }}" class="text-white font-bold hover:underline">
                            {{ $tweet->user->name }}
                        </a>
                        <p class="text-white text-sm mt-1">{{ $tweet->content }}</p>
                        <div class="flex items-center justify-between mt-2 text-gray-400 text-xs">
                            <span>{{ $tweet->likes_count }} Likes</span>
                            <span>{{ $tweet->created_at->diffForHumans() }}</span>
                        </div>
                    </div>
                </div>
            @empty
                <div class="flex items-center justify-center p-8">
                    <p class="text-gray-500 text-sm">No tweets yet.</p>
                </div>
            @endforelse
        </div>
    </div>
</x-app-layout>

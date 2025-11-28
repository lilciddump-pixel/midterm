<x-app-layout>
    <div class="max-w-[100px] mx-auto bg-black border-x border-gray-800 min-h-screen px-4">

        {{-- 2. Create Tweet Area --}}
        <div class="p-4 border-b border-gray-800 bg-black">
            <form id="tweetForm" method="POST" action="{{ route('tweets.store') }}">
                @csrf
                <div class="flex flex-col gap-4">
                    <div class="w-12 h-12 rounded-full bg-blue-500 flex-shrink-0"></div>
                    
                    <div class="flex-1">
                        <textarea
                            name="content"
                            id="tweetContent"
                            placeholder="What's happening?!"
                            class="w-full border-none text-sm focus:ring-0 resize-none text-white placeholder-slate-500 bg-transparent"
                            rows="3"
                            maxlength="280"
                            oninput="updateCounter(this)"
                        >{{ old('content') }}</textarea>

                        <x-input-error :messages="$errors->get('content')" class="mt-2 text-red-500 text-xs" />

                        <div class="flex justify-end items-center mt-2 pt-2 border-t border-slate-700">
                            <span id="charCount" class="text-xs text-blue-500 mr-2">0 / 280</span>
                            <button 
                                type="submit" 
                                id="tweetSubmitButton"
                                class="font-bold py-1 px-3 rounded-full text-xs transition text-white bg-blue-600 hover:bg-blue-700 disabled:opacity-50 disabled:cursor-not-allowed" 
                                disabled
                            >
                                Tweet
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        {{-- 3. The Feed --}}
        <div>
            @if ($tweets->isEmpty())
                <div class="flex items-center justify-center p-8">
                    <p class="text-slate-500 text-xs">No tweets yet. Be the first to post!</p>
                </div>
            @else
                @foreach ($tweets as $tweet)
                    <x-tweet-card :tweet="$tweet" :currentUserId="auth()->id()" />
                @endforeach
            @endif
        </div>
    </div>

    {{-- JS for Char Counter and Likes --}}
    <script>
        const tweetInput = document.getElementById('tweetContent'); 
        const tweetButton = document.getElementById('tweetSubmitButton');

        document.addEventListener('DOMContentLoaded', () => {
            if (tweetInput) updateCounter(tweetInput);
        });

        function updateCounter(input) {
            const maxLength = 280;
            const currentLength = input.value.length;
            const counter = document.getElementById('charCount');
            
            counter.innerText = `${currentLength} / ${maxLength}`;
            
            tweetButton.disabled = !(currentLength > 0 && currentLength <= maxLength);

            if (currentLength > 0 && currentLength <= 20) counter.style.color = "#4ade80";
            else if (currentLength >= 260 && currentLength <= maxLength) counter.style.color = "#ef4444";
            else if (currentLength > maxLength) counter.style.color = "#f87171";
            else counter.style.color = "#94a3b8";
        }

        async function toggleLike(tweetId) {
            const btn = document.getElementById(`like-btn-${tweetId}`);
            const countSpan = document.getElementById(`like-count-${tweetId}`);
            const heart = document.getElementById(`like-heart-${tweetId}`);

            try {
                const response = await fetch(`/tweets/${tweetId}/like`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },
                });

                if (response.ok) {
                    const data = await response.json();
                    countSpan.innerText = data.likes_count;
                    heart.innerText = data.liked ? '❤️' : '🤍';
                    countSpan.style.color = data.liked ? '#ef4444' : '#64748b';
                }
            } catch (error) {
                console.error('Error toggling like:', error);
            }
        }
    </script>
</x-app-layout>

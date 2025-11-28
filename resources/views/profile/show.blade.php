@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto bg-white p-6 rounded-2xl shadow-md border border-gray-100">

    <!-- Profile Header -->
    <div class="flex items-center justify-between mb-6">
        <div class="flex items-center gap-4">
            {{-- Avatar --}}
            <div class="w-16 h-16 rounded-full bg-blue-200 flex items-center justify-center text-blue-700 font-bold text-2xl">
                {{ strtoupper(substr($user->name, 0, 1)) }}
            </div>

            <div>
                <h1 class="text-2xl font-bold text-gray-900">{{ $user->name }}</h1>
                <p class="text-sm text-gray-500">Joined {{ $user->created_at->format('M d, Y') }}</p>
                <p class="text-sm text-gray-500 mt-1">
                    Tweets: {{ $tweets->total() }} • Likes received: {{ $totalLikes }}
                </p>
            </div>
        </div>
    </div>

    <hr class="my-4 border-gray-200">

    <!-- Tweets List -->
    <div class="space-y-4">
        @foreach($tweets as $tweet)
        <div class="bg-gray-50 p-4 rounded-xl shadow-sm border border-gray-100 hover:shadow-md transition">
            <div class="text-gray-800 leading-relaxed">{{ $tweet->content }}</div>
            <div class="text-xs text-gray-500 mt-2">
                {{ $tweet->created_at->diffForHumans() }}
                @if($tweet->edited_at)
                    <span class="italic text-gray-400 ml-1">(edited)</span>
                @endif
            </div>
        </div>
        @endforeach
    </div>

    <!-- Pagination -->
    <div class="mt-6">
        {{ $tweets->links() }}
    </div>
</div>
@endsection

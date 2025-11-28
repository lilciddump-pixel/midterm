<nav class="flex items-center justify-between px-4 py-3 bg-black border-b border-gray-800">

    <!-- Left: Twitter Logo -->
    <a href="{{ url('/') }}" class="flex items-center space-x-2">
        <svg viewBox="0 0 24 24" aria-hidden="true" 
             class="w-6 h-6 text-blue-400 fill-current">
            <path d="M23.643 4.937c-.835.37-1.732.62-2.675.732a4.68 4.68 0 0 0 
                     2.048-2.578 9.345 9.345 0 0 1-2.964 1.134 4.66 4.66 0 0 
                     0-7.93 4.244A13.23 13.23 0 0 1 1.671 3.149a4.653 4.653 
                     0 0 0 1.443 6.214 4.607 4.607 0 0 1-2.112-.583v.60a4.658 
                     4.658 0 0 0 3.737 4.566 4.68 4.68 0 0 1-2.104.80 4.664 
                     4.664 0 0 0 4.352 3.234A9.356 9.356 0 0 1 .960 19.54 
                     13.18 13.18 0 0 0 7.160 21c8.290 0 12.837-6.872 
                     12.837-12.837 0-.196-.004-.392-.013-.586a9.18 9.18 
                     0 0 0 2.660-2.640z"/>
        </svg>
        <span class="text-xl font-semibold text-blue-400">twitter</span>
    </a>

    <!-- Right Side -->
    @auth
    <div class="relative">
        <button id="userDropdownBtn" 
                class="flex items-center text-gray-300 font-medium px-3 py-1 bg-gray-800 rounded hover:bg-gray-700 focus:outline-none">
            {{ Auth::user()->name }}
            <svg class="ml-1 w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <path d="M5.25 7.5l4.75 4.75 4.75-4.75h-9.5z"/>
            </svg>
        </button>

        <!-- Scrollable Dropdown menu -->
        <div id="userDropdownMenu" 
             class="absolute right-0 mt-2 w-40 bg-gray-900 border border-gray-700 rounded shadow-lg hidden z-50 max-h-48 overflow-y-auto">
            <a href="{{ route('profile.edit') }}" 
               class="block px-4 py-2 text-gray-200 hover:bg-gray-800">Profile</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="w-full text-left px-4 py-2 text-red-400 hover:bg-gray-800">
                    Logout
                </button>
            </form>
            <!-- Example extra items to test scroll -->
            <!--
            <a href="#" class="block px-4 py-2 text-gray-200 hover:bg-gray-800">Item 3</a>
            <a href="#" class="block px-4 py-2 text-gray-200 hover:bg-gray-800">Item 4</a>
            <a href="#" class="block px-4 py-2 text-gray-200 hover:bg-gray-800">Item 5</a>
            -->
        </div>
    </div>
    @else
    <!-- Guest Options -->
    <div class="flex items-center space-x-4">
        <a href="{{ route('login') }}" class="text-gray-200 hover:text-blue-400">Login</a>
        <a href="{{ route('register') }}" 
           class="px-3 py-1 bg-blue-600 hover:bg-blue-700 rounded text-white text-sm">
            Sign Up
        </a>
    </div>
    @endauth

</nav>

<!-- JS for clickable dropdown -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const btn = document.getElementById('userDropdownBtn');
    const menu = document.getElementById('userDropdownMenu');

    // Toggle dropdown on click
    btn.addEventListener('click', function(e) {
        e.stopPropagation();
        menu.classList.toggle('hidden');
    });

    // Close dropdown if clicked outside
    document.addEventListener('click', function() {
        menu.classList.add('hidden');
    });
});
</script>

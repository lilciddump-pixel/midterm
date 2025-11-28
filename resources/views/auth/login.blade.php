<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-black">
        <div class="w-full max-w-md bg-gray-900 p-8 rounded-3xl shadow-xl border border-gray-800">
            
            <!-- Twitter Icon -->
            <div class="flex justify-center mb-6">
                <svg viewBox="0 0 24 24" class="w-10 h-10 text-blue-400 fill-current">
                    <path d="M23.954 4.569a10 10 0 01-2.825.775 4.93 4.93 0 002.163-2.723 9.865 9.865 0 01-3.127 1.195 4.916 4.916 0 00-8.38 4.482A13.94 13.94 0 011.671 3.149 4.916 4.916 0 003.195 9.723a4.903 4.903 0 01-2.228-.616c-.054 2.281 1.581 4.415 3.949 4.89a4.935 4.935 0 01-2.224.084 4.919 4.919 0 004.6 3.417A9.867 9.867 0 010 19.54 13.94 13.94 0 007.548 21c9.142 0 14.307-7.721 13.995-14.646a9.936 9.936 0 002.411-2.285z"/>
                </svg>
            </div>

            <!-- Header -->
            <p class="text-3xl font-bold text-gray-400 text-center mb-2">Welcome Back</p>
            <p class="text-center text-gray-400 mb-8">Sign in to your account</p>

            <!-- Login Form -->
            <form method="POST" action="{{ route('login') }}" class="space-y-5">
                @csrf

                <!-- Email -->
                <div>
                    <x-input-label for="email" :value="__('Email')" class="text-black font-medium" />
                    <x-text-input id="email" type="email" name="email" :value="old('email')" required autofocus
                        class="mt-1 block w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg shadow-sm text-black placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-blue-400" />
                    <x-input-error :messages="$errors->get('email')" class="mt-1 text-black text-sm" />
                </div>

                <!-- Password -->
                <div>
                    <x-input-label for="password" :value="__('Password')" class="text-gray-300 font-medium" />
                    <x-text-input id="password" type="password" name="password" required
                        class="mt-1 block w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg shadow-sm text-black placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-blue-400" />
                    <x-input-error :messages="$errors->get('password')" class="mt-1 text-red-500 text-sm" />
                </div>

                <!-- Remember Me -->
                <div class="flex items-center justify-between text-sm text-gray-400">
                    <label class="flex items-center space-x-2">
                        <input type="checkbox" name="remember" class="rounded border-gray-600 text-blue-500 focus:ring-blue-400">
                        <span>Remember me</span>
                    </label>

                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-blue-400 hover:underline">
                            Forgot password?
                        </a>
                    @endif
                </div>

                <!-- Submit Button -->
                <div>
                    <button 
                        type="submit"
                        class="w-full px-6 py-3 bg-blue-500 hover:bg-blue-600 
                            text-white font-semibold rounded-lg shadow-md 
                            transition duration-200">
                        Sign In
                    </button>
                </div>
            </form>

            <!-- Divider / Sign Up -->
            <div class="flex items-center my-6">
                <hr class="flex-1 border-gray-700">
                <span class="mx-2 text-gray-500 text-sm">or</span>
                <hr class="flex-1 border-gray-700">
            </div>

            <p class="text-center text-gray-400 text-sm">
                Don't have an account? 
                <a href="{{ route('register') }}" class="text-blue-400 font-medium hover:underline">Sign up</a>
            </p>

        </div>
    </div>
</x-guest-layout>

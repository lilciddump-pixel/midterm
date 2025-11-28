<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-gray-100">
        <div class="w-full max-w-md bg-white p-8 rounded-2xl shadow-lg border border-gray-200">
            <!-- Header -->
            <h2 class="text-3xl font-bold text-center text-gray-800 mb-6">Create Your Account</h2>
            <p class="text-center text-gray-500 mb-6">Sign up to join our community</p>

            <!-- Registration Form -->
            <form method="POST" action="{{ route('register') }}" class="space-y-5">
                @csrf

                <!-- Name -->
                <div>
                    <x-input-label for="name" :value="__('Name')" class="text-gray-700 font-medium" />
                    <x-text-input id="name" class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-1 text-red-500 text-sm" />
                </div>

                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email')" class="text-gray-700 font-medium" />
                    <x-text-input id="email" class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" type="email" name="email" :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-1 text-red-500 text-sm" />
                </div>

                <!-- Password -->
                <div>
                    <x-input-label for="password" :value="__('Password')" class="text-gray-700 font-medium" />
                    <x-text-input id="password" class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" type="password" name="password" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-1 text-red-500 text-sm" />
                </div>

                <!-- Confirm Password -->
                <div>
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-gray-700 font-medium" />
                    <x-text-input id="password_confirmation" class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" type="password" name="password_confirmation" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1 text-red-500 text-sm" />
                </div>

                <!-- Links & Submit -->
                <div class="flex flex-col sm:flex-row items-center justify-between mt-4">
                    <a href="{{ route('login') }}" class="text-sm text-gray-600 hover:text-gray-900 underline mb-3 sm:mb-0">
                        {{ __('Already registered?') }}
                    </a>

                    <x-primary-button class="w-full sm:w-auto px-6 py-3 bg-blue-500 hover:bg-blue-600 text-white font-semibold rounded-lg shadow-md transition-colors">
                        {{ __('Register') }}
                    </x-primary-button>
                </div>
            </form>

            <!-- Optional Divider / Social Signup -->
            {{-- 
            <div class="flex items-center my-6">
                <hr class="flex-1 border-gray-300">
                <span class="mx-2 text-gray-400 text-sm">or</span>
                <hr class="flex-1 border-gray-300">
            </div>
            <div class="flex space-x-3 justify-center">
                <button class="px-4 py-2 border rounded-lg hover:bg-gray-100">Sign up with Google</button>
                <button class="px-4 py-2 border rounded-lg hover:bg-gray-100">Sign up with GitHub</button>
            </div>
            --}}
        </div>
    </div>
</x-guest-layout>

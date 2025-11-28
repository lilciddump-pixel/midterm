<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-100 leading-tight">
                {{ __('Profile') }}
            </h2>
            <!-- Back Button -->
            <a href="{{ route('tweets.index') }}" 
               class="px-3 py-1 bg-gray-700 hover:bg-gray-600 text-gray-100 rounded shadow">
                ← Back
            </a>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-900 min-h-screen flex justify-center">
        <div class="w-1/2 space-y-6">

            <!-- Update Profile Information -->
            <div class="p-6 bg-gray-800 border border-gray-700 shadow-md sm:rounded-lg">
                <h3 class="text-lg font-semibold text-gray-100 mb-4">Update Profile Information</h3>
                <div class="max-w-full">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <!-- Update Password -->
            <div class="p-6 bg-gray-800 border border-gray-700 shadow-md sm:rounded-lg">
                <h3 class="text-lg font-semibold text-gray-100 mb-4">Update Password</h3>
                <div class="max-w-full">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <!-- Delete Account -->
            <div class="p-6 bg-gray-800 border border-gray-700 shadow-md sm:rounded-lg">
                <h3 class="text-lg font-semibold text-gray-100 mb-4">Delete Account</h3>
                <div class="max-w-full">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>

        </div>
    </div>
</x-app-layout>

<x-layouts.auth>
    <div class="w-full max-w-md">
        <div class="bg-white dark:bg-zinc-900 rounded-lg shadow-lg p-8">
            <div class="text-center mb-8">
                <x-app-logo class="h-12 w-auto mx-auto mb-4" />
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Konfirmasi Password</h2>
                <p class="text-gray-600 dark:text-gray-400 mt-2">
                    Ini adalah area aman. Mohon konfirmasi password Anda sebelum melanjutkan.
                </p>
            </div>

            <form method="POST" action="{{ route('password.confirm') }}">
                @csrf

                <!-- Password -->
                <div class="mb-6">
                    <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Password
                    </label>
                    <input id="password" type="password" name="password" required autocomplete="current-password"
                        autofocus
                        class="w-full px-4 py-2 border border-gray-300 dark:border-zinc-700 rounded-lg focus:ring-2 focus:ring-blue-500 dark:bg-zinc-800 dark:text-white">
                    @error('password')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Submit Button -->
                <button type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg transition duration-200">
                    Konfirmasi
                </button>
            </form>
        </div>
    </div>
</x-layouts.auth>

<x-layouts.auth>
    <div class="w-full max-w-md">
        <div class="bg-white dark:bg-zinc-900 rounded-lg shadow-lg p-8">
            <div class="text-center mb-8">
                <x-app-logo class="h-12 w-auto mx-auto mb-4" />
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Two Factor Authentication</h2>
                <p class="text-gray-600 dark:text-gray-400 mt-2" x-data="{ recovery: false }" x-show="! recovery">
                    Masukkan kode autentikasi dari aplikasi authenticator Anda
                </p>
                <p class="text-gray-600 dark:text-gray-400 mt-2" x-data="{ recovery: false }" x-show="recovery"
                    style="display: none;">
                    Masukkan salah satu recovery code Anda
                </p>
            </div>

            <form method="POST" action="{{ route('two-factor.login') }}" x-data="{ recovery: false }">
                @csrf

                <!-- Code -->
                <div class="mb-6" x-show="! recovery">
                    <label for="code" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Kode Autentikasi
                    </label>
                    <input id="code" type="text" name="code" autofocus autocomplete="one-time-code"
                        x-ref="code"
                        class="w-full px-4 py-2 border border-gray-300 dark:border-zinc-700 rounded-lg focus:ring-2 focus:ring-blue-500 dark:bg-zinc-800 dark:text-white">
                    @error('code')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Recovery Code -->
                <div class="mb-6" x-show="recovery" style="display: none;">
                    <label for="recovery_code" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Recovery Code
                    </label>
                    <input id="recovery_code" type="text" name="recovery_code" autocomplete="one-time-code"
                        x-ref="recovery_code"
                        class="w-full px-4 py-2 border border-gray-300 dark:border-zinc-700 rounded-lg focus:ring-2 focus:ring-blue-500 dark:bg-zinc-800 dark:text-white">
                    @error('recovery_code')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Submit Button -->
                <button type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg transition duration-200 mb-4">
                    Login
                </button>

                <!-- Toggle Recovery -->
                <button type="button"
                    class="w-full text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-200"
                    x-show="! recovery"
                    x-on:click="
                        recovery = true;
                        $nextTick(() => { $refs.recovery_code.focus() })
                    ">
                    Gunakan recovery code
                </button>

                <button type="button"
                    class="w-full text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-200"
                    x-show="recovery"
                    x-on:click="
                        recovery = false;
                        $nextTick(() => { $refs.code.focus() })
                    "
                    style="display: none;">
                    Gunakan kode autentikasi
                </button>
            </form>
        </div>
    </div>
</x-layouts.auth>

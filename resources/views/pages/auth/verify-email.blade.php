<x-layouts.auth>
    <div class="w-full max-w-md">
        <div class="bg-white dark:bg-zinc-900 rounded-lg shadow-lg p-8">
            <div class="text-center mb-8">
                <x-app-logo class="h-12 w-auto mx-auto mb-4" />
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Verifikasi Email</h2>
                <p class="text-gray-600 dark:text-gray-400 mt-2">
                    Terima kasih telah mendaftar! Sebelum memulai, mohon verifikasi email Anda dengan mengklik link yang
                    telah kami kirimkan.
                </p>
            </div>

            @if (session('status') == 'verification-link-sent')
                <div class="mb-4 p-4 bg-green-100 dark:bg-green-900 text-green-700 dark:text-green-200 rounded-lg">
                    Link verifikasi baru telah dikirim ke email Anda.
                </div>
            @endif

            <div class="flex items-center justify-between">
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf
                    <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg transition duration-200">
                        Kirim Ulang Email Verifikasi
                    </button>
                </form>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-200">
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-layouts.auth>

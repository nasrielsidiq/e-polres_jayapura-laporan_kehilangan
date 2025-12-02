<x-guest-layout>
    <div class="mb-6">
        <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-2">Verifikasi Email</h2>
        <p class="text-gray-600 dark:text-gray-400 text-sm">Terima kasih telah mendaftar! Sebelum mulai, silahkan verifikasi alamat email Anda dengan mengklik link yang kami kirimkan. Jika Anda tidak menerima email, kami dengan senang hati akan mengirimkan yang lain.</p>
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 p-4 bg-green-50 dark:bg-green-900/20 border border-green-200 dark:border-green-800 rounded-lg text-green-700 dark:text-green-300 font-medium text-sm">
            {{ __('Link verifikasi baru telah dikirim ke alamat email yang Anda daftarkan.') }}
        </div>
    @endif

    <div class="mt-6 space-y-3">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <button type="submit" class="w-full px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 dark:hover:bg-blue-500 transition font-semibold">
                {{ __('Kirim Ulang Email Verifikasi') }}
            </button>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="w-full px-4 py-2 bg-gray-200 dark:bg-slate-700 text-gray-900 dark:text-white rounded-lg hover:bg-gray-300 dark:hover:bg-slate-600 transition font-semibold">
                {{ __('Logout') }}
            </button>
        </form>
    </div>
</x-guest-layout>

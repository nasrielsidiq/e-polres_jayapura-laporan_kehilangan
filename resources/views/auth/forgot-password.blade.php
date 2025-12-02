<x-guest-layout>
    <div class="mb-6">
        <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-2">Lupa Password?</h2>
        <p class="text-gray-600 dark:text-gray-400 text-sm">Tidak masalah. Masukkan nomor HP Anda untuk reset password.</p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}" class="space-y-5">
        @csrf

        <!-- Phone Number -->
        <div>
            <x-input-label for="no_hp" :value="__('Nomor HP')" />
            <x-text-input id="no_hp" class="block mt-1 w-full border-gray-300 dark:border-slate-600 dark:bg-slate-900 dark:text-white" type="text" name="no_hp" :value="old('no_hp')" required autofocus placeholder="08xxxxxxxxxx" />
            <x-input-error :messages="$errors->get('no_hp')" class="mt-2" />
        </div>

        <button type="submit" class="w-full mt-6 px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 dark:hover:bg-blue-500 transition font-semibold">
            {{ __('Reset Password') }}
        </button>
    </form>

    <div class="mt-6 text-center">
        <a href="{{ route('login') }}" class="text-sm text-blue-600 dark:text-blue-400 hover:underline">
            {{ __('Kembali ke login') }}
        </a>
    </div>
</x-guest-layout>

<x-app-layout>
    <!-- Hero Section -->
    <section class="bg-gradient-to-br from-orange-50 to-indigo-100 dark:from-slate-800 dark:to-slate-900 py-20 px-4">
        <div class="max-w-4xl mx-auto text-center">
            <div class="text-8xl mb-6">🔍</div>
            <h1 class="text-5xl font-bold text-gray-900 dark:text-white mb-6">Cek Status Laporan</h1>
            <p class="text-xl text-gray-600 dark:text-gray-300 mb-8">Masukkan nomor laporan untuk melihat status dan progress terkini dari laporan kehilangan Anda.</p>
        </div>
    </section>

    <section class="py-20 px-4 bg-white dark:bg-slate-800">
        <div class="max-w-2xl mx-auto">
            <div class="bg-white dark:bg-slate-800 p-8 rounded-lg shadow-lg">

                @if ($errors->any())
                    <div class="mb-6 p-4 bg-red-50 dark:bg-red-900/20 border border-red-200 dark:border-red-800 rounded-lg">
                        <ul class="text-red-700 dark:text-red-300 text-sm">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('status.search') }}" class="space-y-8">
                    @csrf

                    <div>
                        <x-input-label for="nomor_laporan" :value="__('Nomor Laporan')" class="text-lg font-semibold" />
                        <x-text-input
                            id="nomor_laporan"
                            name="nomor_laporan"
                            type="text"
                            class="mt-3 block w-full dark:bg-slate-700 dark:border-slate-600 dark:text-white text-xl py-4 px-6 rounded-lg border-2 border-gray-300 focus:border-orange-500 focus:ring-orange-500"
                            placeholder="Contoh: LP-2024-00001"
                            :value="old('nomor_laporan')"
                            required
                            autofocus
                        />
                        <p class="text-gray-500 dark:text-gray-400 mt-3">
                            Format: LP-YYYY-XXXXX (contoh: LP-2024-00001)
                        </p>
                    </div>

                    <button type="submit" class="w-full px-8 py-4 bg-orange-600 text-white rounded-lg hover:bg-orange-700 transition font-semibold text-xl">
                        🔍 Cari Laporan
                    </button>
                </form>

                <div class="mt-8 p-6 bg-orange-50 dark:bg-orange-900/20 border border-orange-200 dark:border-orange-800 rounded-lg">
                    <h4 class="font-semibold text-orange-900 dark:text-orange-100 mb-3 text-lg">💡 Tips Pencarian:</h4>
                    <ul class="text-orange-800 dark:text-orange-200 space-y-2">
                        <li>• Nomor laporan diberikan saat Anda membuat laporan</li>
                        <li>• Periksa email konfirmasi untuk nomor laporan</li>
                        <li>• Hubungi petugas jika lupa nomor laporan</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>

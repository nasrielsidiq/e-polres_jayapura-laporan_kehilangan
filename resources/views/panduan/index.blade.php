<x-app-layout>
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <!-- Header -->
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-gray-900 dark:text-white mb-4">Panduan Laporan Kehilangan</h1>
            <p class="text-lg text-gray-600 dark:text-gray-400">Ikuti langkah-langkah berikut untuk membuat laporan kehilangan barang</p>
        </div>

        <!-- Steps -->
        <div class="space-y-8">
            <!-- Step 1 -->
            <div class="bg-white dark:bg-slate-800 rounded-lg shadow-md p-6 border-l-4 border-orange-500">
                <div class="flex items-start">
                    <div class="flex-shrink-0">
                        <div class="w-8 h-8 bg-orange-500 text-white rounded-full flex items-center justify-center font-bold">1</div>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">Daftar Akun</h3>
                        <p class="text-gray-600 dark:text-gray-400 mb-3">Jika belum memiliki akun, silakan daftar terlebih dahulu dengan nomor HP yang aktif.</p>
                        <a href="{{ route('register') }}" class="inline-block px-4 py-2 bg-orange-600 text-white rounded-md hover:bg-orange-700 transition">Daftar Sekarang</a>
                    </div>
                </div>
            </div>

            <!-- Step 2 -->
            <div class="bg-white dark:bg-slate-800 rounded-lg shadow-md p-6 border-l-4 border-blue-500">
                <div class="flex items-start">
                    <div class="flex-shrink-0">
                        <div class="w-8 h-8 bg-blue-500 text-white rounded-full flex items-center justify-center font-bold">2</div>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">Login ke Sistem</h3>
                        <p class="text-gray-600 dark:text-gray-400 mb-3">Masuk menggunakan nomor HP dan password yang telah didaftarkan.</p>
                        <a href="{{ route('login') }}" class="inline-block px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition">Login</a>
                    </div>
                </div>
            </div>

            <!-- Step 3 -->
            <div class="bg-white dark:bg-slate-800 rounded-lg shadow-md p-6 border-l-4 border-green-500">
                <div class="flex items-start">
                    <div class="flex-shrink-0">
                        <div class="w-8 h-8 bg-green-500 text-white rounded-full flex items-center justify-center font-bold">3</div>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">Buat Laporan</h3>
                        <p class="text-gray-600 dark:text-gray-400 mb-3">Isi formulir laporan kehilangan dengan lengkap dan jelas:</p>
                        <ul class="list-disc list-inside text-gray-600 dark:text-gray-400 space-y-1 mb-3">
                            <li>Pilih kategori barang yang hilang</li>
                            <li>Tulis nama dan deskripsi barang secara detail</li>
                            <li>Tentukan lokasi dan waktu kehilangan</li>
                            <li>Ceritakan kronologi kejadian</li>
                            <li>Upload foto barang (jika ada)</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Step 4 -->
            <div class="bg-white dark:bg-slate-800 rounded-lg shadow-md p-6 border-l-4 border-purple-500">
                <div class="flex items-start">
                    <div class="flex-shrink-0">
                        <div class="w-8 h-8 bg-purple-500 text-white rounded-full flex items-center justify-center font-bold">4</div>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">Tunggu Verifikasi</h3>
                        <p class="text-gray-600 dark:text-gray-400 mb-3">Petugas akan memverifikasi laporan Anda dalam 1-2 hari kerja. Anda dapat memantau status laporan melalui menu "Laporan Saya".</p>
                    </div>
                </div>
            </div>

            <!-- Step 5 -->
            <div class="bg-white dark:bg-slate-800 rounded-lg shadow-md p-6 border-l-4 border-red-500">
                <div class="flex items-start">
                    <div class="flex-shrink-0">
                        <div class="w-8 h-8 bg-red-500 text-white rounded-full flex items-center justify-center font-bold">5</div>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">Cetak Surat Keterangan</h3>
                        <p class="text-gray-600 dark:text-gray-400">Setelah laporan diverifikasi, Anda dapat mencetak surat keterangan kehilangan untuk keperluan administrasi.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tips -->
        <div class="mt-12 bg-yellow-50 dark:bg-yellow-900/20 border border-yellow-200 dark:border-yellow-800 rounded-lg p-6">
            <h3 class="text-lg font-semibold text-yellow-800 dark:text-yellow-200 mb-3">💡 Tips Penting</h3>
            <ul class="list-disc list-inside text-yellow-700 dark:text-yellow-300 space-y-2">
                <li>Pastikan informasi yang diisi akurat dan lengkap</li>
                <li>Simpan nomor laporan untuk tracking status</li>
                <li>Upload foto barang yang hilang jika tersedia</li>
                <li>Hubungi call center jika mengalami kesulitan</li>
            </ul>
        </div>

        <!-- Call Center -->
        <div class="mt-8 bg-orange-50 dark:bg-orange-900/20 border border-orange-200 dark:border-orange-800 rounded-lg p-6 text-center">
            <h3 class="text-lg font-semibold text-orange-800 dark:text-orange-200 mb-3">📞 Butuh Bantuan?</h3>
            <p class="text-orange-700 dark:text-orange-300 mb-2">Hubungi Call Center kami:</p>
            <div class="text-2xl font-bold text-orange-600 dark:text-orange-400">
                📱 0804-1-500-500
            </div>
            <p class="text-sm text-orange-600 dark:text-orange-400 mt-2">Senin - Jumat: 08:00 - 17:00 WIB</p>
        </div>
    </div>
</x-app-layout>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Laporan Kehilangan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 sm:p-8">

                <div class="mb-6 p-4 bg-yellow-50 dark:bg-yellow-900/20 border border-yellow-200 dark:border-yellow-800 rounded-lg">
                    <p class="text-yellow-700 dark:text-yellow-300 font-semibold">⚠️ Laporan Ditolak</p>
                    <p class="text-yellow-600 dark:text-yellow-400 text-sm mt-1">Silakan perbaiki data laporan dan ajukan kembali. Ini adalah pengajuan ke-{{ $lap->submission_count + 1 }}.</p>
                </div>

                @if ($errors->any())
                    <div class="mb-6 p-4 bg-red-50 dark:bg-red-900/20 border border-red-200 dark:border-red-800 rounded-lg">
                        <p class="text-red-700 dark:text-red-300 font-semibold mb-2">Terdapat kesalahan:</p>
                        <ul class="list-disc list-inside space-y-1 text-red-600 dark:text-red-400 text-sm">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('laporan.update', $lap->id_laporan) }}" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <!-- Informasi Barang -->
                    <div class="border-b border-gray-200 dark:border-gray-700 pb-6">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Informasi Barang</h3>
                        <div class="space-y-4">
                            <div>
                                <x-input-label for="id_kategori_barang" :value="__('Kategori Barang')" />
                                <select id="id_kategori_barang" name="id_kategori_barang" required class="mt-1 block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:border-blue-500 focus:ring-blue-500">
                                    <option value="">-- Pilih Kategori --</option>
                                    @foreach($kategoris as $k)
                                        <option value="{{ $k->id_kategori }}" {{ old('id_kategori_barang', $lap->id_kategori_barang) == $k->id_kategori ? 'selected' : '' }}>
                                            {{ $k->nama_kategori }}
                                        </option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('id_kategori_barang')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="nama_barang" :value="__('Nama Barang')" />
                                <x-text-input id="nama_barang" name="nama_barang" type="text" required class="mt-1 block w-full dark:bg-gray-700 dark:border-gray-600 dark:text-white" :value="old('nama_barang', $lap->nama_barang)" />
                                <x-input-error :messages="$errors->get('nama_barang')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="deskripsi_barang" :value="__('Deskripsi Barang')" />
                                <textarea id="deskripsi_barang" name="deskripsi_barang" required rows="4" class="mt-1 block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:border-blue-500 focus:ring-blue-500">{{ old('deskripsi_barang', $lap->deskripsi_barang) }}</textarea>
                                <x-input-error :messages="$errors->get('deskripsi_barang')" class="mt-2" />
                            </div>
                        </div>
                    </div>

                    <!-- Informasi Kehilangan -->
                    <div class="border-b border-gray-200 dark:border-gray-700 pb-6">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Informasi Kehilangan</h3>
                        <div class="space-y-4">
                            <div>
                                <x-input-label for="lokasi_kehilangan" :value="__('Lokasi Kehilangan')" />
                                <x-text-input id="lokasi_kehilangan" name="lokasi_kehilangan" type="text" required class="mt-1 block w-full dark:bg-gray-700 dark:border-gray-600 dark:text-white" :value="old('lokasi_kehilangan', $lap->lokasi_kehilangan)" />
                                <x-input-error :messages="$errors->get('lokasi_kehilangan')" class="mt-2" />
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <x-input-label for="tanggal_lapor" :value="__('Tanggal Kehilangan')" />
                                    <x-text-input id="tanggal_lapor" name="tanggal_lapor" type="date" required class="mt-1 block w-full dark:bg-gray-700 dark:border-gray-600 dark:text-white" :value="old('tanggal_lapor', $lap->tanggal_lapor)" />
                                    <x-input-error :messages="$errors->get('tanggal_lapor')" class="mt-2" />
                                </div>

                                <div>
                                    <x-input-label for="waktu_kehilangan" :value="__('Waktu Kehilangan')" />
                                    <x-text-input id="waktu_kehilangan" name="waktu_kehilangan" type="time" class="mt-1 block w-full dark:bg-gray-700 dark:border-gray-600 dark:text-white" :value="old('waktu_kehilangan', $lap->waktu_kehilangan ? date('H:i', strtotime($lap->waktu_kehilangan)) : '')" />
                                    <x-input-error :messages="$errors->get('waktu_kehilangan')" class="mt-2" />
                                </div>
                            </div>

                            <div>
                                <x-input-label for="kronologi" :value="__('Kronologi')" />
                                <textarea id="kronologi" name="kronologi" rows="4" class="mt-1 block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:border-blue-500 focus:ring-blue-500">{{ old('kronologi', $lap->kronologi) }}</textarea>
                                <x-input-error :messages="$errors->get('kronologi')" class="mt-2" />
                            </div>
                        </div>
                    </div>

                    <!-- Buttons -->
                    <div class="flex justify-between items-center pt-6 border-t border-gray-200 dark:border-gray-700">
                        <a href="{{ route('laporan.saya') }}" class="px-4 py-2 bg-gray-300 dark:bg-gray-600 text-gray-800 dark:text-white rounded-lg hover:bg-gray-400 dark:hover:bg-gray-500 transition font-medium">
                            Batal
                        </a>
                        <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 dark:hover:bg-blue-500 transition font-medium">
                            Ajukan Kembali
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
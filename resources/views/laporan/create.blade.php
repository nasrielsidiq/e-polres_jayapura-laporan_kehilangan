<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Buat Laporan Kehilangan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 sm:p-8">

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

                <form method="POST" action="{{ route('laporan.store') }}" enctype="multipart/form-data" class="space-y-6">
                    @csrf

                    <!-- Informasi Pelapor -->
                    <div class="border-b border-gray-200 dark:border-gray-700 pb-6">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Informasi Pelapor</h3>
                        <input type="text" value="1" class="hidden" name="id_petugas">
                        <div class="space-y-4">
                            <div>
                                <x-input-label for="nama_pelapor" :value="__('Nama Lengkap')" />
                                <p class="mt-1 px-3 py-2 bg-gray-100 dark:bg-gray-700 rounded-md text-gray-800 dark:text-gray-300 text-sm font-medium">
                                    {{ Auth::user()->nama_lengkap }}
                                </p>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <x-input-label for="email_pelapor" :value="__('Email')" />
                                    <p class="mt-1 px-3 py-2 bg-gray-100 dark:bg-gray-700 rounded-md text-gray-800 dark:text-gray-300 text-sm font-medium">
                                        {{ Auth::user()->email }}
                                    </p>
                                </div>
                                <div>
                                    <x-input-label for="nomor_telepon" :value="__('Nomor Telepon')" />
                                    <p class="mt-1 px-3 py-2 bg-gray-100 dark:bg-gray-700 rounded-md text-gray-800 dark:text-gray-300 text-sm font-medium">
                                        {{ Auth::user()->no_hp ?? '-' }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Informasi Barang -->
                    <div class="border-b border-gray-200 dark:border-gray-700 pb-6">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Informasi Barang</h3>
                        <div class="space-y-4">
                            <div>
                                <x-input-label for="id_kategori_barang" :value="__('Kategori Barang')" />
                                <select id="id_kategori_barang" name="id_kategori_barang" required class="mt-1 block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:border-blue-500 focus:ring-blue-500 dark:focus:border-blue-400">
                                    <option value="">-- Pilih Kategori --</option>
                                    @foreach($kategoris ?? [] as $k)
                                        <option value="{{ $k->id_kategori }}" {{ old('id_kategori_barang') == $k->id_kategori ? 'selected' : '' }}>
                                            {{ $k->nama_kategori }}
                                        </option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('id_kategori_barang')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="nama_barang" :value="__('Nama Barang')" />
                                <x-text-input id="nama_barang" name="nama_barang" type="text" placeholder="Contoh: iPhone 13 Pro, Tas Hitam, dll" required class="mt-1 block w-full dark:bg-gray-700 dark:border-gray-600 dark:text-white" :value="old('nama_barang')" />
                                <x-input-error :messages="$errors->get('nama_barang')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="deskripsi_barang" :value="__('Deskripsi Barang')" />
                                <textarea id="deskripsi_barang" name="deskripsi_barang" required rows="4" placeholder="Jelaskan ciri-ciri barang, kondisi, warna, merek, dll" class="mt-1 block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:border-blue-500 focus:ring-blue-500 dark:focus:border-blue-400">{{ old('deskripsi_barang') }}</textarea>
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
                                <x-text-input id="lokasi_kehilangan" name="lokasi_kehilangan" type="text" placeholder="Contoh: Bandara Soekarno-Hatta Terminal 3" required class="mt-1 block w-full dark:bg-gray-700 dark:border-gray-600 dark:text-white" :value="old('lokasi_kehilangan')" />
                                <x-input-error :messages="$errors->get('lokasi_kehilangan')" class="mt-2" />
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <x-input-label for="tanggal_lapor" :value="__('Tanggal Kehilangan')" />
                                    <x-text-input id="tanggal_lapor" name="tanggal_lapor" type="date" required class="mt-1 block w-full dark:bg-gray-700 dark:border-gray-600 dark:text-white" :value="old('tanggal_lapor', now()->format('Y-m-d'))" />
                                    <x-input-error :messages="$errors->get('tanggal_lapor')" class="mt-2" />
                                </div>

                                <div>
                                    <x-input-label for="waktu_kehilangan" :value="__('Waktu Kehilangan (Jam:Menit)')" />
                                    <x-text-input id="waktu_kehilangan" name="waktu_kehilangan" type="time" placeholder="HH:MM" class="mt-1 block w-full dark:bg-gray-700 dark:border-gray-600 dark:text-white" :value="old('waktu_kehilangan')" />
                                    <x-input-error :messages="$errors->get('waktu_kehilangan')" class="mt-2" />
                                </div>
                            </div>

                            <div>
                                <x-input-label for="kronologi" :value="__('Kronologi / Penjelasan Lengkap')" />
                                <textarea id="kronologi" name="kronologi" rows="4" placeholder="Jelaskan kejadian secara detail, kapan, di mana, dan bagaimana barang hilang" class="mt-1 block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:border-blue-500 focus:ring-blue-500 dark:focus:border-blue-400">{{ old('kronologi') }}</textarea>
                                <x-input-error :messages="$errors->get('kronologi')" class="mt-2" />
                            </div>
                        </div>
                    </div>

                    <!-- Lampiran -->
                    <div class="border-b border-gray-200 dark:border-gray-700 pb-6">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Lampiran (Foto/Dokumen)</h3>
                        <div class="space-y-2">
                            <p class="text-sm text-gray-600 dark:text-gray-400">Maksimal 5 file per laporan. Format: JPG, PNG, PDF. Ukuran maksimal: 5MB per file</p>
                            <div class="relative border-2 border-dashed border-gray-300 dark:border-gray-600 rounded-lg p-6 hover:border-blue-500 transition cursor-pointer" onclick="document.getElementById('lampiran').click()">
                                <input type="file" id="lampiran" name="lampiran[]" multiple accept=".jpg,.jpeg,.png,.pdf" class="hidden" onchange="updateFilePreview(this)">
                                <div class="text-center">
                                    <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                        <path d="M28 8H12a4 4 0 00-4 4v20a4 4 0 004 4h24a4 4 0 004-4V20m-8-12l-4-4m0 0H8m16 0v12m0-12l4 4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                    <p class="mt-2 text-sm font-medium text-gray-900 dark:text-white">Klik atau drag file ke sini</p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">JPG, PNG, atau PDF hingga 5MB</p>
                                </div>
                            </div>
                            <div id="file-preview" class="mt-4 grid grid-cols-2 sm:grid-cols-3 gap-4"></div>
                            <x-input-error :messages="$errors->get('lampiran')" class="mt-2" />
                        </div>
                    </div>

                    <!-- Buttons -->
                    <div class="flex justify-between items-center pt-6 border-t border-gray-200 dark:border-gray-700">
                        <a href="{{ route('laporan.saya') }}" class="px-4 py-2 bg-gray-300 dark:bg-gray-600 text-gray-800 dark:text-white rounded-lg hover:bg-gray-400 dark:hover:bg-gray-500 transition font-medium">
                            Kembali
                        </a>
                        <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 dark:hover:bg-blue-500 transition font-medium">
                            Buat Laporan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function updateFilePreview(input) {
            const preview = document.getElementById('file-preview');
            preview.innerHTML = '';

            if (input.files && input.files.length > 0) {
                Array.from(input.files).forEach((file, index) => {
                    const fileDiv = document.createElement('div');
                    fileDiv.className = 'relative bg-gray-100 dark:bg-gray-700 rounded-lg p-4 text-center';
                    fileDiv.innerHTML = `
                        <div class="text-3xl mb-2">
                            ${file.type.includes('image') ? '🖼️' : '📄'}
                        </div>
                        <p class="text-xs font-medium text-gray-900 dark:text-white truncate">${file.name}</p>
                        <p class="text-xs text-gray-600 dark:text-gray-400">${(file.size / 1024 / 1024).toFixed(2)} MB</p>
                    `;
                    preview.appendChild(fileDiv);
                });
            }
        }

        // Drag and drop
        const dropZone = document.querySelector('[onclick*="lampiran"]');
        dropZone?.addEventListener('dragover', (e) => {
            e.preventDefault();
            dropZone.classList.add('border-blue-500', 'bg-blue-50', 'dark:bg-blue-900/20');
        });
        dropZone?.addEventListener('dragleave', () => {
            dropZone.classList.remove('border-blue-500', 'bg-blue-50', 'dark:bg-blue-900/20');
        });
        dropZone?.addEventListener('drop', (e) => {
            e.preventDefault();
            dropZone.classList.remove('border-blue-500', 'bg-blue-50', 'dark:bg-blue-900/20');
            document.getElementById('lampiran').files = e.dataTransfer.files;
            updateFilePreview(document.getElementById('lampiran'));
        });
    </script>
</x-app-layout>

@extends('layouts.admin.app')

@section('content')
    <div class="max-w-4xl mx-auto px-4">
        <!-- Header -->
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-gray-900">Pengaturan Sistem</h1>
            <p class="text-gray-600 text-sm mt-1">Kelola konfigurasi aplikasi dan informasi instansi</p>
        </div>

        <!-- Messages -->
        @if ($errors->any())
            <div class="bg-red-50 border border-red-200 rounded-lg p-4 mb-4">
                <h3 class="text-red-800 font-semibold text-sm mb-2">Terjadi Kesalahan</h3>
                <ul class="list-disc list-inside text-red-700 text-sm space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('success'))
            <div class="bg-green-50 border border-green-200 rounded-lg p-4 mb-4">
                <p class="text-green-800 text-sm font-medium">✓ {{ session('success') }}</p>
            </div>
        @endif

        <!-- Settings Form -->
        <form action="{{ route('admin.pengaturan.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <!-- Tab Navigation -->
            <div class="bg-white border-b border-gray-200">
                <div class="flex gap-8 px-6">
                    <button type="button" onclick="switchTab('umum')"
                        id="tab-umum" class="tab-button py-4 font-medium text-gray-700 hover:text-gray-900 border-b-2 border-transparent focus:border-blue-500 active">
                        Umum
                    </button>
                    <button type="button" onclick="switchTab('branding')"
                        id="tab-branding" class="tab-button py-4 font-medium text-gray-700 hover:text-gray-900 border-b-2 border-transparent focus:border-blue-500">
                        Branding
                    </button>
                    <button type="button" onclick="switchTab('kontak')"
                        id="tab-kontak" class="tab-button py-4 font-medium text-gray-700 hover:text-gray-900 border-b-2 border-transparent focus:border-blue-500">
                        Kontak
                    </button>
                </div>
            </div>

            <!-- Tab: Umum -->
            <div id="content-umum" class="tab-content bg-white shadow rounded-lg p-6">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Informasi Umum</h2>

                <div class="space-y-4">
                    <!-- Nama Aplikasi -->
                    <div>
                        <label for="app_name" class="block text-sm font-medium text-gray-700 mb-1">
                            Nama Aplikasi
                        </label>
                        <input type="text" id="app_name" name="app_name"
                            value="{{ old('app_name', $settings['app_name'] ?? 'Sistem Pelaporan Kehilangan') }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                            placeholder="Nama aplikasi" required>
                        @error('app_name')
                            <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Nama Instansi -->
                    <div>
                        <label for="instansi" class="block text-sm font-medium text-gray-700 mb-1">
                            Nama Instansi
                        </label>
                        <input type="text" id="instansi" name="instansi"
                            value="{{ old('instansi', $settings['instansi'] ?? 'Polres XXX') }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                            placeholder="Nama institusi" required>
                        @error('instansi')
                            <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Alamat -->
                    <div>
                        <label for="alamat" class="block text-sm font-medium text-gray-700 mb-1">
                            Alamat Instansi
                        </label>
                        <textarea id="alamat" name="alamat" rows="3"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                            placeholder="Alamat lengkap instansi">{{ old('alamat', $settings['alamat'] ?? '') }}</textarea>
                        @error('alamat')
                            <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Tab: Branding -->
            <div id="content-branding" class="tab-content hidden bg-white shadow rounded-lg p-6">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Branding</h2>

                <div class="space-y-6">
                    <!-- Logo Upload -->
                    <div>
                        <label for="logo" class="block text-sm font-medium text-gray-700 mb-2">
                            Logo Aplikasi
                        </label>

                        <!-- Current Logo Display -->
                        @php
                            $logoSetting = \App\Models\Pengaturan::where('key', 'logo')->first();
                            $hasLogo = $logoSetting && $logoSetting->getFirstMediaUrl('logo');
                        @endphp

                        @if ($hasLogo)
                            <div class="mb-4">
                                <div class="flex items-center gap-4">
                                    <img src="{{ $logoSetting->getFirstMediaUrl('logo') }}"
                                        alt="Logo" class="h-24 w-auto border border-gray-300 rounded-lg p-2">
                                    <div class="text-sm text-gray-600">
                                        <p class="font-medium">Logo Saat Ini</p>
                                        <p class="text-xs mt-1">Format: JPG, PNG | Ukuran maks: 1 MB</p>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <!-- Upload Input -->
                        <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center hover:border-blue-400 transition cursor-pointer"
                            onclick="document.getElementById('logo-input').click()">
                            <svg class="mx-auto h-12 w-12 text-gray-400 mb-2" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                <path d="M28 8H12a4 4 0 00-4 4v20a4 4 0 004 4h24a4 4 0 004-4V20m-8-12v12m0 0l-4-4m4 4l4-4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <p class="text-sm font-medium text-gray-700">Klik atau seret logo ke sini</p>
                            <p class="text-xs text-gray-500 mt-1">PNG, JPG, JPEG (Maks 1 MB)</p>
                        </div>

                        <input type="file" id="logo-input" name="logo" accept="image/*"
                            class="hidden" onchange="previewLogo(this)">

                        <!-- Preview -->
                        <div id="logo-preview" class="hidden mt-4">
                            <img id="preview-img" src="" alt="Preview" class="h-24 w-auto border border-gray-300 rounded-lg p-2">
                            <button type="button" onclick="clearLogo()"
                                class="mt-2 text-sm text-red-600 hover:text-red-700 font-medium">Batal</button>
                        </div>

                        @error('logo')
                            <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Info -->
                    <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
                        <p class="text-sm text-blue-800">
                            <span class="font-semibold">💡 Tips:</span> Gunakan logo dengan aspek rasio persegi (1:1) untuk hasil terbaik.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Tab: Kontak -->
            <div id="content-kontak" class="tab-content hidden bg-white shadow rounded-lg p-6">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Informasi Kontak</h2>

                <div class="space-y-4">
                    <!-- Nomor Kontak -->
                    <div>
                        <label for="kontak" class="block text-sm font-medium text-gray-700 mb-1">
                            Nomor Telepon
                        </label>
                        <input type="tel" id="kontak" name="kontak"
                            value="{{ old('kontak', $settings['kontak'] ?? '') }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                            placeholder="Contoh: +62 123 4567 8900">
                        @error('kontak')
                            <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Additional Info -->
                    <div class="bg-gray-50 border border-gray-200 rounded-lg p-4 mt-6">
                        <h3 class="text-sm font-semibold text-gray-900 mb-3">Informasi Tambahan</h3>
                        <div class="space-y-2 text-sm text-gray-600">
                            <p>• Alamat dan nomor kontak akan ditampilkan di bagian footer halaman publik</p>
                            <p>• Pastikan informasi selalu akurat dan terkini</p>
                            <p>• Perubahan pengaturan akan langsung berlaku di semua halaman</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="flex gap-3 pt-6">
                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg font-medium transition">
                    Simpan Pengaturan
                </button>
                <a href="{{ route('admin.dashboard') }}"
                    class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-6 py-2 rounded-lg font-medium transition">
                    Batal
                </a>
            </div>
        </form>
    </div>

    <script>
        function switchTab(tabName) {
            // Hide all tabs
            document.querySelectorAll('.tab-content').forEach(el => {
                el.classList.add('hidden');
            });

            // Remove active class from all buttons
            document.querySelectorAll('.tab-button').forEach(el => {
                el.classList.remove('active', 'border-blue-500', 'text-blue-600');
                el.classList.add('border-transparent', 'text-gray-700');
            });

            // Show selected tab
            document.getElementById('content-' + tabName).classList.remove('hidden');

            // Add active class to clicked button
            document.getElementById('tab-' + tabName).classList.add('active', 'border-blue-500', 'text-blue-600');
            document.getElementById('tab-' + tabName).classList.remove('border-transparent', 'text-gray-700');
        }

        function previewLogo(input) {
            const preview = document.getElementById('logo-preview');
            const previewImg = document.getElementById('preview-img');

            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    previewImg.src = e.target.result;
                    preview.classList.remove('hidden');
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        function clearLogo() {
            document.getElementById('logo-input').value = '';
            document.getElementById('logo-preview').classList.add('hidden');
        }
    </script>

    <style>
        .tab-button.active {
            @apply border-blue-500 text-blue-600;
        }
    </style>
@endsection

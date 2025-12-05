<x-guest-layout>
    <div class="mb-6">
        <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-2">Buat Akun</h2>
        <p class="text-gray-600 dark:text-gray-400 text-sm">Daftar untuk mulai melaporkan barang hilang Anda</p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="space-y-5">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="nama_lengkap" :value="__('Nama Lengkap')" />
            <x-text-input id="nama_lengkap" class="block mt-1 w-full border-gray-300 dark:border-slate-600 dark:bg-slate-900 dark:text-white" type="text" name="nama_lengkap" :value="old('nama_lengkap')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('nama_lengkap')" class="mt-2" />
        </div>

        <!-- Phone Number -->
        <div>
            <x-input-label for="no_hp" :value="__('Nomor HP')" />
            <x-text-input id="no_hp" class="block mt-1 w-full border-gray-300 dark:border-slate-600 dark:bg-slate-900 dark:text-white" type="tel" name="no_hp" :value="old('no_hp')" required autocomplete="tel" placeholder="08xxxxxxxxxx" pattern="[0-9]{10,15}" maxlength="15" />
            <x-input-error :messages="$errors->get('no_hp')" class="mt-2" />
        </div>

        <!-- Email Address (Optional) -->
        <div>
            <x-input-label for="email" :value="__('Email (Opsional)')" />
            <x-text-input id="email" class="block mt-1 w-full border-gray-300 dark:border-slate-600 dark:bg-slate-900 dark:text-white" type="email" name="email" :value="old('email')" autocomplete="email" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Address Fields -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <!-- Province -->
            <div>
                <x-input-label for="province_code" :value="__('Provinsi')" />
                <select id="province_code" name="province_code" class="block mt-1 w-full border-gray-300 dark:border-slate-600 dark:bg-slate-900 dark:text-white rounded-md">
                    <option value="">Pilih Provinsi</option>
                </select>
                <x-input-error :messages="$errors->get('province_code')" class="mt-2" />
            </div>

            <!-- City -->
            <div>
                <x-input-label for="city_code" :value="__('Kabupaten/Kota')" />
                <select id="city_code" name="city_code" class="block mt-1 w-full border-gray-300 dark:border-slate-600 dark:bg-slate-900 dark:text-white rounded-md" disabled>
                    <option value="">Pilih Kabupaten/Kota</option>
                </select>
                <x-input-error :messages="$errors->get('city_code')" class="mt-2" />
            </div>

            <!-- District -->
            <div>
                <x-input-label for="district_code" :value="__('Kecamatan')" />
                <select id="district_code" name="district_code" class="block mt-1 w-full border-gray-300 dark:border-slate-600 dark:bg-slate-900 dark:text-white rounded-md" disabled>
                    <option value="">Pilih Kecamatan</option>
                </select>
                <x-input-error :messages="$errors->get('district_code')" class="mt-2" />
            </div>

            <!-- Village -->
            <div>
                <x-input-label for="village_code" :value="__('Desa/Kelurahan')" />
                <select id="village_code" name="village_code" class="block mt-1 w-full border-gray-300 dark:border-slate-600 dark:bg-slate-900 dark:text-white rounded-md" disabled>
                    <option value="">Pilih Desa/Kelurahan</option>
                </select>
                <x-input-error :messages="$errors->get('village_code')" class="mt-2" />
            </div>
        </div>

        <!-- Detailed Address -->
        <div>
            <x-input-label for="alamat" :value="__('Alamat Lengkap')" />
            <textarea id="alamat" name="alamat" rows="3" class="block mt-1 w-full border-gray-300 dark:border-slate-600 dark:bg-slate-900 dark:text-white rounded-md" placeholder="Jalan, RT/RW, No. Rumah, dll.">{{ old('alamat') }}</textarea>
            <x-input-error :messages="$errors->get('alamat')" class="mt-2" />
        </div>

        <!-- Password -->
        <div>
            <x-input-label for="password" :value="__('Password')" />
            <div class="relative">
                <x-text-input id="password" class="block mt-1 w-full pr-10 border-gray-300 dark:border-slate-600 dark:bg-slate-900 dark:text-white"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
                <button type="button" class="absolute inset-y-0 right-0 pr-3 flex items-center" onclick="togglePassword('password')">
                    <svg id="password-eye" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                </button>
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div>
            <x-input-label for="password_confirmation" :value="__('Konfirmasi Password')" />
            <div class="relative">
                <x-text-input id="password_confirmation" class="block mt-1 w-full pr-10 border-gray-300 dark:border-slate-600 dark:bg-slate-900 dark:text-white"
                                type="password"
                                name="password_confirmation" required autocomplete="new-password" />
                <button type="button" class="absolute inset-y-0 right-0 pr-3 flex items-center" onclick="togglePassword('password_confirmation')">
                    <svg id="password_confirmation-eye" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                </button>
            </div>
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <button type="submit" class="w-full mt-6 px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 dark:hover:bg-blue-500 transition font-semibold">
            {{ __('Daftar') }}
        </button>
    </form>

    <div class="mt-6 text-center">
        <p class="text-gray-600 dark:text-gray-400 text-sm">
            Sudah punya akun?
            <a href="{{ route('login') }}" class="text-blue-600 dark:text-blue-400 hover:underline font-semibold">
                {{ __('Masuk di sini') }}
            </a>
        </p>
    </div>

    <script>
        function togglePassword(fieldId) {
            const field = document.getElementById(fieldId);
            const eye = document.getElementById(fieldId + '-eye');
            
            if (field.type === 'password') {
                field.type = 'text';
                eye.innerHTML = `
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.878 9.878L3 3m6.878 6.878L21 21" />
                `;
            } else {
                field.type = 'password';
                eye.innerHTML = `
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                `;
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            // Phone input validation
            const phoneInput = document.getElementById('no_hp');
            if (phoneInput) {
                phoneInput.addEventListener('input', function(e) {
                    this.value = this.value.replace(/[^0-9]/g, '');
                });
                phoneInput.addEventListener('keypress', function(e) {
                    if (!/[0-9]/.test(e.key) && !['Backspace', 'Delete', 'Tab', 'Enter', 'ArrowLeft', 'ArrowRight'].includes(e.key)) {
                        e.preventDefault();
                    }
                });
            }

            // Address dropdowns
            const provinceSelect = document.getElementById('province_code');
            const citySelect = document.getElementById('city_code');
            const districtSelect = document.getElementById('district_code');
            const villageSelect = document.getElementById('village_code');

            // Load provinces
            fetch('/api/provinces')
                .then(response => response.json())
                .then(data => {
                    data.forEach(province => {
                        const option = document.createElement('option');
                        option.value = province.code;
                        option.textContent = province.name;
                        provinceSelect.appendChild(option);
                    });
                });

            // Province change
            provinceSelect.addEventListener('change', function() {
                const provinceCode = this.value;
                citySelect.innerHTML = '<option value="">Pilih Kabupaten/Kota</option>';
                districtSelect.innerHTML = '<option value="">Pilih Kecamatan</option>';
                villageSelect.innerHTML = '<option value="">Pilih Desa/Kelurahan</option>';
                
                if (provinceCode) {
                    citySelect.disabled = false;
                    fetch(`/api/cities/${provinceCode}`)
                        .then(response => response.json())
                        .then(data => {
                            data.forEach(city => {
                                const option = document.createElement('option');
                                option.value = city.code;
                                option.textContent = city.name;
                                citySelect.appendChild(option);
                            });
                        });
                } else {
                    citySelect.disabled = true;
                    districtSelect.disabled = true;
                    villageSelect.disabled = true;
                }
            });

            // City change
            citySelect.addEventListener('change', function() {
                const cityCode = this.value;
                districtSelect.innerHTML = '<option value="">Pilih Kecamatan</option>';
                villageSelect.innerHTML = '<option value="">Pilih Desa/Kelurahan</option>';
                
                if (cityCode) {
                    districtSelect.disabled = false;
                    fetch(`/api/districts/${cityCode}`)
                        .then(response => response.json())
                        .then(data => {
                            data.forEach(district => {
                                const option = document.createElement('option');
                                option.value = district.code;
                                option.textContent = district.name;
                                districtSelect.appendChild(option);
                            });
                        });
                } else {
                    districtSelect.disabled = true;
                    villageSelect.disabled = true;
                }
            });

            // District change
            districtSelect.addEventListener('change', function() {
                const districtCode = this.value;
                villageSelect.innerHTML = '<option value="">Pilih Desa/Kelurahan</option>';
                
                if (districtCode) {
                    villageSelect.disabled = false;
                    fetch(`/api/villages/${districtCode}`)
                        .then(response => response.json())
                        .then(data => {
                            data.forEach(village => {
                                const option = document.createElement('option');
                                option.value = village.code;
                                option.textContent = village.name;
                                villageSelect.appendChild(option);
                            });
                        });
                } else {
                    villageSelect.disabled = true;
                }
            });
        });
    </script>
</x-guest-layout>

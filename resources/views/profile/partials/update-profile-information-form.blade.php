<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-white">
            {{ __('Informasi Profil') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Perbarui informasi profil akun dan alamat email Anda.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="nama_lengkap" :value="__('Nama Lengkap')" />
            <x-text-input id="nama_lengkap" name="nama_lengkap" type="text" class="mt-1 block w-full dark:bg-gray-700 dark:border-gray-600 dark:text-white" :value="old('nama_lengkap', $user->nama_lengkap)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('nama_lengkap')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full dark:bg-gray-700 dark:border-gray-600 dark:text-white" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                        {{ __('Email Anda belum diverifikasi.') }}

                        <button form="send-verification" class="underline text-sm text-blue-600 dark:text-blue-400 hover:text-blue-700 dark:hover:text-blue-300 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            {{ __('Klik di sini untuk mengirim ulang email verifikasi.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                            {{ __('Link verifikasi baru telah dikirim ke email Anda.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div>
            <x-input-label for="no_hp" :value="__('Nomor Telepon')" />
            <x-text-input id="no_hp" name="no_hp" type="tel" class="mt-1 block w-full dark:bg-gray-700 dark:border-gray-600 dark:text-white" :value="old('no_hp', $user->no_hp)" autocomplete="tel" pattern="[0-9]{10,15}" maxlength="15" placeholder="08xxxxxxxxxx" />
            <x-input-error class="mt-2" :messages="$errors->get('no_hp')" />
        </div>

        <!-- Address Fields -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <!-- Province -->
            <div>
                <x-input-label for="province_code" :value="__('Provinsi')" />
                <select id="province_code" name="province_code" class="mt-1 block w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-md">
                    <option value="">Pilih Provinsi</option>
                </select>
                <x-input-error class="mt-2" :messages="$errors->get('province_code')" />
            </div>

            <!-- City -->
            <div>
                <x-input-label for="city_code" :value="__('Kabupaten/Kota')" />
                <select id="city_code" name="city_code" class="mt-1 block w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-md" disabled>
                    <option value="">Pilih Kabupaten/Kota</option>
                </select>
                <x-input-error class="mt-2" :messages="$errors->get('city_code')" />
            </div>

            <!-- District -->
            <div>
                <x-input-label for="district_code" :value="__('Kecamatan')" />
                <select id="district_code" name="district_code" class="mt-1 block w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-md" disabled>
                    <option value="">Pilih Kecamatan</option>
                </select>
                <x-input-error class="mt-2" :messages="$errors->get('district_code')" />
            </div>

            <!-- Village -->
            <div>
                <x-input-label for="village_code" :value="__('Desa/Kelurahan')" />
                <select id="village_code" name="village_code" class="mt-1 block w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-md" disabled>
                    <option value="">Pilih Desa/Kelurahan</option>
                </select>
                <x-input-error class="mt-2" :messages="$errors->get('village_code')" />
            </div>
        </div>

        <!-- Detailed Address -->
        <div>
            <x-input-label for="alamat" :value="__('Alamat Lengkap')" />
            <textarea id="alamat" name="alamat" rows="3" class="mt-1 block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:border-blue-500 focus:ring-blue-500 dark:focus:border-blue-400" placeholder="Jalan, RT/RW, No. Rumah, dll.">{{ old('alamat', $user->alamat) }}</textarea>
            <x-input-error class="mt-2" :messages="$errors->get('alamat')" />
        </div>

        <div class="flex items-center gap-4">
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 dark:hover:bg-blue-500 transition font-medium">
                {{ __('Simpan') }}
            </button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-green-600 dark:text-green-400"
                >{{ __('✓ Berhasil disimpan.') }}</p>
            @endif
        </div>
    </form>

    <script>
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

            const currentProvince = '{{ old("province_code", $user->province_code) }}';
            const currentCity = '{{ old("city_code", $user->city_code) }}';
            const currentDistrict = '{{ old("district_code", $user->district_code) }}';
            const currentVillage = '{{ old("village_code", $user->village_code) }}';

            // Load provinces
            fetch('/api/provinces')
                .then(response => response.json())
                .then(data => {
                    data.forEach(province => {
                        const option = document.createElement('option');
                        option.value = province.code;
                        option.textContent = province.name;
                        if (province.code === currentProvince) option.selected = true;
                        provinceSelect.appendChild(option);
                    });
                    if (currentProvince) provinceSelect.dispatchEvent(new Event('change'));
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
                                if (city.code === currentCity) option.selected = true;
                                citySelect.appendChild(option);
                            });
                            if (currentCity) citySelect.dispatchEvent(new Event('change'));
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
                                if (district.code === currentDistrict) option.selected = true;
                                districtSelect.appendChild(option);
                            });
                            if (currentDistrict) districtSelect.dispatchEvent(new Event('change'));
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
                                if (village.code === currentVillage) option.selected = true;
                                villageSelect.appendChild(option);
                            });
                        });
                } else {
                    villageSelect.disabled = true;
                }
            });
        });
    </script>
</section>

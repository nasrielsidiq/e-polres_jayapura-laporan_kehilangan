<div class="grid grid-cols-1 md:grid-cols-2 gap-4">
    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
        <input type="text" name="nama_lengkap" 
               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('nama_lengkap') border-red-500 @enderror" 
               value="{{ old('nama_lengkap', $pelapor->nama_lengkap ?? '') }}" required>
        @error('nama_lengkap')
            <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700 mb-1">Nomor HP</label>
        <input type="text" name="no_hp" 
               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('no_hp') border-red-500 @enderror" 
               value="{{ old('no_hp', $pelapor->no_hp ?? '') }}" required
               oninput="this.value = this.value.replace(/[^0-9]/g, '')" 
               onkeypress="return /[0-9]/.test(event.key)">
        @error('no_hp')
            <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700 mb-1">Email (Opsional)</label>
        <input type="email" name="email" 
               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('email') border-red-500 @enderror" 
               value="{{ old('email', $pelapor->email ?? '') }}">
        @error('email')
            <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4 relative">
        <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
        <input type="password" name="password" id="password"
               class="w-full px-4 py-2 pr-10 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('password') border-red-500 @enderror">
        <button type="button" onclick="togglePassword('password')" class="absolute inset-y-0 right-0 top-6 pr-3 flex items-center">
            <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
            </svg>
        </button>
        <small class="text-gray-500 text-xs">Kosongkan jika tidak ingin mengubah</small>
        @error('password')
            <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
        @enderror
    </div>
</div>

<!-- Address Fields -->
<div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Provinsi</label>
        <select name="province_code" id="province_code" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('province_code') border-red-500 @enderror">
            <option value="">Pilih Provinsi</option>
        </select>
        @error('province_code')
            <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Kabupaten/Kota</label>
        <select name="city_code" id="city_code" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('city_code') border-red-500 @enderror" disabled>
            <option value="">Pilih Kabupaten/Kota</option>
        </select>
        @error('city_code')
            <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Kecamatan</label>
        <select name="district_code" id="district_code" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('district_code') border-red-500 @enderror" disabled>
            <option value="">Pilih Kecamatan</option>
        </select>
        @error('district_code')
            <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Desa/Kelurahan</label>
        <select name="village_code" id="village_code" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('village_code') border-red-500 @enderror" disabled>
            <option value="">Pilih Desa/Kelurahan</option>
        </select>
        @error('village_code')
            <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
        @enderror
    </div>
</div>

<div class="mb-4">
    <label class="block text-sm font-medium text-gray-700 mb-1">Alamat Lengkap</label>
    <textarea name="alamat" rows="3" placeholder="Jalan, RT/RW, No. Rumah, dll."
              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('alamat') border-red-500 @enderror">{{ old('alamat', $pelapor->alamat ?? '') }}</textarea>
    @error('alamat')
        <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
    @enderror
</div>

<script>
function togglePassword(fieldId) {
    const field = document.getElementById(fieldId);
    field.type = field.type === 'password' ? 'text' : 'password';
}

document.addEventListener('DOMContentLoaded', function() {
    const provinceSelect = document.getElementById('province_code');
    const citySelect = document.getElementById('city_code');
    const districtSelect = document.getElementById('district_code');
    const villageSelect = document.getElementById('village_code');

    const currentProvince = '{{ old("province_code", $pelapor->province_code ?? "") }}';
    const currentCity = '{{ old("city_code", $pelapor->city_code ?? "") }}';
    const currentDistrict = '{{ old("district_code", $pelapor->district_code ?? "") }}';
    const currentVillage = '{{ old("village_code", $pelapor->village_code ?? "") }}';

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

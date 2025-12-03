<div class="grid grid-cols-1 md:grid-cols-2 gap-4">
    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
        <input type="text" name="nama_lengkap" 
               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('nama_lengkap') border-red-500 @enderror" 
               value="{{ old('nama_lengkap', isset($petugas) ? $petugas->nama_lengkap : '') }}" required>
        @error('nama_lengkap')
            <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
        <input type="email" name="email" 
               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('email') border-red-500 @enderror" 
               value="{{ old('email', isset($petugas) ? $petugas->email : '') }}" required>
        @error('email')
            <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700 mb-1">Nomor HP (Opsional)</label>
        <input type="text" name="no_hp" 
               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('no_hp') border-red-500 @enderror" 
               value="{{ old('no_hp', isset($petugas) ? $petugas->no_hp : '') }}"
               oninput="this.value = this.value.replace(/[^0-9]/g, '')" 
               onkeypress="return /[0-9]/.test(event.key)">
        @error('no_hp')
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

    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700 mb-1">Peran</label>
        <select name="role" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('role') border-red-500 @enderror" required>
            <option value="">-- Pilih Peran --</option>
            <option value="admin" {{ (old('role', isset($petugas) && $petugas->roles->first() ? $petugas->roles->first()->name : '') == 'admin') ? 'selected' : '' }}>Admin</option>
            <option value="petugas" {{ (old('role', isset($petugas) && $petugas->roles->first() ? $petugas->roles->first()->name : '') == 'petugas') ? 'selected' : '' }}>Petugas</option>
        </select>
        @error('role')
            <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
        @enderror
    </div>
</div>

<script>
function togglePassword(fieldId) {
    const field = document.getElementById(fieldId);
    field.type = field.type === 'password' ? 'text' : 'password';
}
</script>

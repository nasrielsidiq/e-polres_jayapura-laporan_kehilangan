<div class="mb-4">
    <label class="block text-sm font-medium text-gray-700 mb-1">Nama Kategori</label>
    <input type="text" name="nama_kategori" 
           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('nama_kategori') border-red-500 @enderror" 
           value="{{ old('nama_kategori', $kategori->nama_kategori ?? '') }}" required>
    @error('nama_kategori')
        <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
    @enderror
</div>

<div class="mb-4">
    <label class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
    <textarea name="deskripsi" rows="3"
              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('deskripsi') border-red-500 @enderror">{{ old('deskripsi', $kategori->deskripsi ?? '') }}</textarea>
    @error('deskripsi')
        <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
    @enderror
</div>

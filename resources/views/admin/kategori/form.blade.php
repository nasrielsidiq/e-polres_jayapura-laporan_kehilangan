<div class="mb-3">
    <label>Nama Kategori</label>
    <input type="text" name="nama" class="form-control" value="{{ old('nama', $kategori->nama ?? '') }}">
</div>

<div class="mb-3">
    <label>Deskripsi</label>
    <textarea name="deskripsi" class="form-control">{{ old('deskripsi', $kategori->deskripsi ?? '') }}</textarea>
</div>

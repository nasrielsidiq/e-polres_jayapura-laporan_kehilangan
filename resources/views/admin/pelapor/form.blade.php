<div class="row">
    <div class="col-md-6 mb-3">
        <label>Nama</label>
        <input type="text" name="name" class="form-control" value="{{ old('name', $pelapor->name ?? '') }}">
    </div>

    <div class="col-md-6 mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" value="{{ old('email', $pelapor->email ?? '') }}">
    </div>

    <div class="col-md-6 mb-3">
        <label>Password</label>
        <input type="password" name="password" class="form-control">
        <small>Kosongkan jika tidak ingin mengubah.</small>
    </div>

    <div class="col-md-6 mb-3">
        <label>Telepon</label>
        <input type="text" name="phone" class="form-control" value="{{ old('phone', $pelapor->phone ?? '') }}">
    </div>

    <div class="col-md-12 mb-3">
        <label>Alamat</label>
        <textarea name="address" class="form-control">{{ old('address', $pelapor->address ?? '') }}</textarea>
    </div>
</div>

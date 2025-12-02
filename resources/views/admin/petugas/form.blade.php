<div class="row">
    <div class="col-md-6 mb-3">
        <label>Nama</label>
        <input type="text" name="name" class="form-control" value="{{ old('name', $petugas->name ?? '') }}">
    </div>

    <div class="col-md-6 mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" value="{{ old('email', $petugas->email ?? '') }}">
    </div>

    <div class="col-md-6 mb-3">
        <label>Password</label>
        <input type="password" name="password" class="form-control">
        <small>Kosongkan jika tidak diubah</small>
    </div>

    <div class="col-md-6 mb-3">
        <label>Telepon</label>
        <input type="text" name="phone" class="form-control" value="{{ old('phone', $petugas->phone ?? '') }}">
    </div>

    <div class="col-md-6 mb-3">
        <label>Role</label>
        <select name="role" class="form-control">
            <option value="admin" {{ (old('role', $petugas->roles->first()->name ?? '') == 'admin') ? 'selected' : '' }}>Admin</option>
            <option value="petugas" {{ (old('role', $petugas->roles->first()->name ?? '') == 'petugas') ? 'selected' : '' }}>Petugas</option>
        </select>
    </div>
</div>

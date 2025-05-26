<div class="mb-3">
    <label>Nama</label>
    <input type="text" name="nama_pelanggan" class="form-control" value="{{ old('nama_pelanggan', $pelanggan->nama_pelanggan ?? '') }}">
</div>
<div class="mb-3">
    <label>Alamat</label>
    <textarea name="alamat" class="form-control">{{ old('alamat', $pelanggan->alamat ?? '') }}</textarea>
</div>
<div class="mb-3">
    <label>Nomor Telepon</label>
    <input type="text" name="nomor_telepon" class="form-control" value="{{ old('nomor_telepon', $pelanggan->nomor_telepon ?? '') }}">
</div>
<div class="mb-3">
    <label>Membership</label>
    <input type="text" name="membership" class="form-control" value="{{ old('membership', $pelanggan->membership ?? '') }}">
</div>
<div class="mb-3">
    <label>ID Karyawan</label>
    <input type="text" name="id_karyawan" class="form-control" value="{{ old('id_karyawan', $pelanggan->id_karyawan ?? '') }}">
</div>

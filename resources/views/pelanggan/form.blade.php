<div class="mb-3">
    <label>ID Pelanggan</label>
    <input type="text" name="ID_PELANGGAN" class="form-control" value="{{ old('ID_PELANGGAN', $pelanggan->ID_PELANGGAN ?? '') }}" {{ isset($pelanggan) ? 'readonly' : '' }}>
</div>
<div class="mb-3">
    <label>Nama</label>
    <input type="text" name="NAMA_PELANGGAN" class="form-control" value="{{ old('NAMA_PELANGGAN', $pelanggan->NAMA_PELANGGAN ?? '') }}">
</div>
<div class="mb-3">
    <label>Alamat</label>
    <textarea name="ALAMAT" class="form-control">{{ old('ALAMAT', $pelanggan->ALAMAT ?? '') }}</textarea>
</div>
<div class="mb-3">
    <label>Nomor Telepon</label>
    <input type="text" name="NOMOR_TELEPON" class="form-control" value="{{ old('NOMOR_TELEPON', $pelanggan->NOMOR_TELEPON ?? '') }}">
</div>
<div class="mb-3">
    <label>Membership</label>
    <input type="text" name="MEMBERSHIP" class="form-control" value="{{ old('MEMBERSHIP', $pelanggan->MEMBERSHIP ?? '') }}">
</div>
<div class="mb-3">
    <label>ID Karyawan</label>
    <input type="text" name="ID_KARYAWAN" class="form-control" value="{{ old('ID_KARYAWAN', $pelanggan->ID_KARYAWAN ?? '') }}">
</div>

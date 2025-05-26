
<div class="mb-3">
    <label>Metode Pembayaran</label>
    <select name="metode_pembayaran" class="form-control">
        <option value="">-- Pilih Metode Pembayaran --</option>
        <option value="Tunai" {{ (old('metode_pembayaran', $pembayaran->metode_pembayaran ?? '') == 'Tunai') ? 'selected' : '' }}>Tunai</option>
        <option value="Transfer Bank" {{ (old('metode_pembayaran', $pembayaran->metode_pembayaran ?? '') == 'Transfer Bank') ? 'selected' : '' }}>Transfer Bank</option>
        <option value="Kartu Kredit" {{ (old('metode_pembayaran', $pembayaran->metode_pembayaran ?? '') == 'Kartu Kredit') ? 'selected' : '' }}>Kartu Kredit</option>
        <option value="Kartu Debit" {{ (old('metode_pembayaran', $pembayaran->metode_pembayaran ?? '') == 'Kartu Debit') ? 'selected' : '' }}>Kartu Debit</option>
        <option value="E-Wallet" {{ (old('metode_pembayaran', $pembayaran->metode_pembayaran ?? '') == 'E-Wallet') ? 'selected' : '' }}>E-Wallet</option>
    </select>
</div>
<div class="mb-3">
    <label>Jumlah Pembayaran</label>
    <input type="text" name="jumlah_pembayaran" class="form-control" value="{{ old('jumlah_pembayaran', $pembayaran->jumlah_pembayaran ?? '') }}">
</div>
<div class="mb-3">
    <label>Pelanggan</label>
    <select name="id_pelanggan" class="form-control">
        <option value="">-- Pilih Pelanggan --</option>
        @foreach($pelanggan ?? [] as $p)
        <option value="{{ $p->id_pelanggan }}" {{ (old('id_pelanggan', $pembayaran->id_pelanggan ?? '') == $p->id_pelanggan) ? 'selected' : '' }}>
            {{ $p->nama_pelanggan }}
        </option>
        @endforeach
    </select>
</div>
<div class="mb-3">
    <label>ID Karyawan</label>
    <input type="number" name="id_karyawan" class="form-control" value="{{ old('id_karyawan', $pembayaran->id_karyawan ?? '') }}">
</div>
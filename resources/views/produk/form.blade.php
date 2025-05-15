<div>
    <label>Nama:</label>
    <input type="text" name="NAMA" value="{{ old('NAMA', $produk->NAMA ?? '') }}" required>
</div>
<div>
    <label>Jenis:</label>
    <input type="text" name="JENIS" value="{{ old('JENIS', $produk->JENIS ?? '') }}" required>
</div>
<div>
    <label>Harga:</label>
    <input type="number" name="HARGA" value="{{ old('HARGA', $produk->HARGA ?? '') }}" required>
</div>
<div>
    <label>Stok:</label>
    <input type="number" name="STOK" value="{{ old('STOK', $produk->STOK ?? '') }}" required>
</div>
<div>
    <label>Tanggal Kadaluwarsa:</label>
    <input type="date" name="TANGGAL_KADALUWARSA"
       value="{{ old('TANGGAL_KADALUWARSA', isset($produk) && $produk->TANGGAL_KADALUWARSA ? $produk->TANGGAL_KADALUWARSA->format('Y-m-d') : '') }}">
</div>
<div>
    <label>Deskripsi:</label>
    <textarea name="DESKRIPSI_PRODUK">{{ old('DESKRIPSI_PRODUK', $produk->DESKRIPSI_PRODUK ?? '') }}</textarea>
</div>
<div>
    <label>ID Pembayaran:</label>
    <input type="number" name="ID_PEMBAYARAN" value="{{ old('ID_PEMBAYARAN', $produk->ID_PEMBAYARAN ?? '') }}" required>
</div>

<div class="mb-3">
    <label>ID Produk</label>
    <input type="text" name="id_produk" class="form-control" value="{{ old('id_produk', $produk->id_produk ?? '') }}" {{ isset($produk) ? 'readonly' : '' }}>
</div>
<div class="mb-3">
    <label>Nama</label>
    <input type="text" name="nama" class="form-control" value="{{ old('nama', $produk->nama ?? '') }}">
</div>
<div class="mb-3">
    <label>Jenis</label>
    <input type="text" name="jenis" class="form-control" value="{{ old('jenis', $produk->jenis ?? '') }}">
</div>
<div class="mb-3">
    <label>Harga</label>
    <input type="number" name="harga" class="form-control" value="{{ old('harga', $produk->harga ?? '') }}">
</div>
<div class="mb-3">
    <label>Stok</label>
    <input type="number" name="stok" class="form-control" value="{{ old('stok', $produk->stok ?? '') }}">
</div>
<div class="mb-3">
    <label>Tanggal Kadaluwarsa</label>
    <input type="date" name="tanggal_kadaluwarsa" class="form-control" value="{{ old('tanggal_kadaluwarsa', isset($produk->tanggal_kadaluwarsa) ? date('Y-m-d', strtotime($produk->tanggal_kadaluwarsa)) : '') }}">
</div>
<div class="mb-3">
    <label>Deskripsi Produk</label>
    <textarea name="deskripsi_produk" class="form-control">{{ old('deskripsi_produk', $produk->deskripsi_produk ?? '') }}</textarea>
</div>
<div class="mb-3">
    <label>ID Pembayaran</label>
    <input type="number" name="id_pembayaran" class="form-control" value="{{ old('id_pembayaran', $produk->id_pembayaran ?? '') }}">
</div>
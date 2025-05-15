<h1>Daftar Produk</h1>
<a href="{{ route('produk.create') }}">Tambah Produk</a>

<table border="1">
    <tr>
        <th>ID</th><th>Nama</th><th>Jenis</th><th>Harga</th><th>Stok</th><th>Expired</th><th>Aksi</th>
    </tr>
    @foreach ($produks as $produk)
        <tr>
            <td>{{ $produk->ID_PRODUK }}</td>
            <td>{{ $produk->NAMA }}</td>
            <td>{{ $produk->JENIS }}</td>
            <td>{{ $produk->HARGA }}</td>
            <td>{{ $produk->STOK }}</td>
            <td>{{ $produk->TANGGAL_KADALUWARSA ? $produk->TANGGAL_KADALUWARSA->format('Y-m-d') : '-' }}</td>
            <td>
                <a href="{{ route('produk.show', ['id' => $produk->ID_PRODUK]) }}">Lihat</a> |
                <a href="{{ route('produk.edit', $produk) }}">Edit</a> |
                <a href="{{ route('produk.confirmDelete', $produk) }}">Hapus</a>
            </td>
        </tr>
    @endforeach
</table>

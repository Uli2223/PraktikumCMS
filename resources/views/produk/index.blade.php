@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Daftar Produk</h1>
    <a href="{{ route('produk.create') }}" class="btn btn-primary mb-3">Tambah Produk</a>

    <table class="table table-bordered">
        <thead class="table-light">
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Jenis</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Tanggal Kadaluwarsa</th>
                <th>Deskripsi</th>
                <th>ID Pembayaran</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        @if(count($produk) > 0)
            @foreach ($produk as $item)
            <tr>
                <td>{{ $item->id_produk }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->jenis }}</td>
                <td>{{ number_format($item->harga, 0, ',', '.') }}</td>
                <td>{{ $item->stok }}</td>
                <td>{{ $item->tanggal_kadaluwarsa ? date('d-m-Y', strtotime($item->tanggal_kadaluwarsa)) : '-' }}</td>
                <td>{{ $item->deskripsi_produk }}</td>
                <td>{{ $item->id_pembayaran }}</td>
                <td>
                    <a href="{{ route('produk.show', $item->id_produk) }}" class="btn btn-info btn-sm">Detail</a>
                    <a href="{{ route('produk.edit', $item->id_produk) }}" class="btn btn-warning btn-sm">Edit</a>
                    <a href="{{ route('produk.confirmDelete', $item->id_produk) }}" class="btn btn-danger btn-sm">Hapus</a>
                </td>
            </tr>
            @endforeach
        @else
            <tr>
                <td colspan="9" class="text-center">Tidak ada data produk</td>
            </tr>
        @endif
        </tbody>
    </table>
</div>
@endsection
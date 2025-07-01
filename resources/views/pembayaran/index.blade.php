@extends('layouts.app')

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

@section('content')
<div class="container">
    <h1 class="mb-4">Daftar Pembayaran</h1>
    <a href="{{ route('pembayaran.create') }}" class="btn btn-primary mb-3">Tambah Pembayaran</a>

    {{-- Pesan sukses dan error --}}
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

   <table class="table table-bordered">
    <thead class="table-light">
        <tr>
            <th>ID</th>
            <th>Metode Pembayaran</th>
            <th>Jumlah Pembayaran</th>
            <th>Pelanggan</th> <!-- Ubah dari "ID Pelanggan" menjadi "Pelanggan" -->
            <th>ID Karyawan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
    @if(count($pembayaran) > 0)
        @foreach ($pembayaran as $item)
        <tr>
            <td>{{ $item->id_pembayaran }}</td>
            <td>{{ $item->metode_pembayaran }}</td>
            <td>
                Rp {{ number_format($item->produk->sum('harga'), 0, ',', '.') }}
                <small class="text-muted">
                    ({{ $item->produk->count() }} produk)
                </small>
            </td>
            <td>
                {{ $item->id_pelanggan }} - {{ $item->pelanggan->nama_pelanggan ?? 'N/A' }}
            </td>
            <td>{{ $item->id_karyawan }}</td>
            <td>
                <div class="btn-group" role="group">
                    <a href="{{ route('pembayaran.show', $item->id_pembayaran) }}" 
                        class="btn btn-info btn-sm mx-1">
                        <i class="fas fa-eye"></i> Detail
                    </a>
                    <a href="{{ route('pembayaran.edit', ['id' => $item->id_pembayaran]) }}" 
                        class="btn btn-warning btn-sm">
                        <i class="fas fa-edit"></i> Edit
                        </a>
                    <a href="{{ route('pembayaran.confirmDelete', $item->id_pembayaran) }}" 
                        class="btn btn-danger btn-sm mx-1"
                        onclick="return confirm('Yakin hapus pembayaran ini?')">
                        <i class="fas fa-trash"></i> Hapus
                    </a>
                </div>
            </td>
        </tr>
        @endforeach
    @else
        <tr>
            <td colspan="6" class="text-center">Tidak ada data pembayaran</td>
        </tr>
    @endif
    </tbody>
</table>
</div>
@endsection

@extends('layouts.app')

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

@section('content')
<div class="container mt-4">
    <h1>Detail Produk</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $produk->nama }}</h5>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><strong>Jenis:</strong> {{ $produk->jenis }}</li>
                <li class="list-group-item"><strong>Harga:</strong> Rp {{ number_format($produk->harga, 0, ',', '.') }}</li>
                <li class="list-group-item"><strong>Stok:</strong> {{ $produk->stok }}</li>
                <li class="list-group-item"><strong>Tanggal Kadaluwarsa:</strong> {{ $produk->tanggal_kadaluwarsa ? date('d-m-Y', strtotime($produk->tanggal_kadaluwarsa)) : 'Tidak ada' }}</li>
                <li class="list-group-item"><strong>Deskripsi:</strong> {{ $produk->deskripsi_produk }}</li>
                <li class="list-group-item"><strong>ID Pembayaran:</strong> {{ $produk->id_pembayaran }}</li>
            </ul>
        </div>
    </div>
    <a href="{{ route('produk.index') }}" class="btn btn-secondary mt-3">Kembali</a>
</div>
@endsection
@extends('layouts.app')

@section('content')
    <h1>Detail Produk</h1>
    <ul>
        <li><strong>Nama:</strong> {{ $produk->NAMA }}</li>
        <li><strong>Jenis:</strong> {{ $produk->JENIS }}</li>
        <li><strong>Harga:</strong> {{ $produk->HARGA }}</li>
        <li><strong>Stok:</strong> {{ $produk->STOK }}</li>
        <li><strong>Tanggal Kadaluwarsa:</strong> {{ $produk->TANGGAL_KADALUWARSA ? $produk->TANGGAL_KADALUWARSA->format('Y-m-d') : '-' }}</li>
        <li><strong>Deskripsi:</strong> {{ $produk->DESKRIPSI_PRODUK }}</li>
        <li><strong>ID Pembayaran:</strong> {{ $produk->ID_PEMBAYARAN }}</li>
    </ul>
    <a href="{{ route('produk.index') }}">Kembali</a>
@endsection

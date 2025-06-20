@extends('layouts.app')

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

@section('content')
<div class="container mt-4">
    <h1>Detail Pembayaran</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Pembayaran #{{ $pembayaran->id_pembayaran }}</h5>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><strong>Metode Pembayaran:</strong> {{ $pembayaran->metode_pembayaran }}</li>
                <li class="list-group-item"><strong>Jumlah Pembayaran:</strong> {{ $pembayaran->jumlah_pembayaran }}</li>
                <li class="list-group-item"><strong>ID Pelanggan:</strong> {{ $pembayaran->id_pelanggan }}</li>
                <li class="list-group-item"><strong>ID Karyawan:</strong> {{ $pembayaran->id_karyawan }}</li>
            </ul>
        </div>
    </div>
    
    @if($pembayaran->produk && count($pembayaran->produk) > 0)
    <div class="card mt-4">
        <div class="card-header">
            Produk Terkait
        </div>
        <div class="card-body">
            <ul class="list-group list-group-flush">
                @foreach($pembayaran->produk as $produk)
                <li class="list-group-item">
                    <strong>{{ $produk->nama }}</strong> - {{ $produk->jenis }}
                    <span class="badge bg-primary">Rp {{ number_format($produk->harga, 0, ',', '.') }}</span>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
    @endif
    
    <a href="{{ route('pembayaran.index') }}" class="btn btn-secondary mt-3">Kembali</a>
</div>
@endsection
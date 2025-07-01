@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Detail Pembelian</h2>
    
    <div class="card mb-4">
        <div class="card-header">
            <h4>Informasi Pembelian</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <p><strong>ID Pembelian:</strong> {{ $pembelian->id }}</p>
                    <p><strong>Pelanggan:</strong> {{ $pembelian->pelanggan->nama }}</p>
                    <p><strong>Metode Pembayaran:</strong> {{ ucfirst($pembelian->metode_pembayaran) }}</p>
                </div>
                <div class="col-md-6">
                    <p><strong>Total Pembayaran:</strong> Rp {{ number_format($pembelian->jumlah_pembayaran, 0, ',', '.') }}</p>
                    <p><strong>Tanggal:</strong> {{ $pembelian->created_at->format('d/m/Y H:i') }}</p>
                    <p><strong>Status:</strong> {{ ucfirst($pembelian->status) }}</p>
                </div>
            </div>
        </div>
    </div>
    
    <div class="card">
        <div class="card-header">
            <h4>Daftar Produk</h4>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Nama Produk</th>
                        <th>Harga Satuan</th>
                        <th>Jumlah</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pembelian->produk as $produk)
                    <tr>
                        <td>{{ $produk->nama_produk }}</td>
                        <td>Rp {{ number_format($produk->pivot->harga_saat_ini, 0, ',', '.') }}</td>
                        <td>{{ $produk->pivot->jumlah }}</td>
                        <td>Rp {{ number_format($produk->pivot->harga_saat_ini * $produk->pivot->jumlah, 0, ',', '.') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    
    <div class="mt-3">
        <a href="{{ route('pembelian.index') }}" class="btn btn-secondary">Kembali ke Daftar</a>
    </div>
</div>
@endsection
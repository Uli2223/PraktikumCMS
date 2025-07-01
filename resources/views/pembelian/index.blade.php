@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Daftar Pembelian</h2>
    <div class="mb-3">
        <a href="{{ route('pelanggan.index') }}" class="btn btn-primary">
            Buat Pembelian Baru (Pilih Pelanggan)
        </a>
    </div>
    
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID Pembelian</th>
                    <th>Pelanggan</th>
                    <th>Produk</th>
                    <th>Total</th>
                    <th>Metode</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pembelians as $pembelian)
                    <tr>
                        <td>{{ $pembelian->id_pembelian }}</td>
                        <td>{{ $pembelian->pelanggan->nama_pelanggan }}</td>
                        <td>
                            @foreach($pembelian->produk as $produk)
                                {{ $produk->nama_produk }} ({{ $produk->pivot->jumlah }}),
                            @endforeach
                        </td>
                        <td>Rp {{ number_format($pembelian->total_harga, 0, ',', '.') }}</td>
                        <td>{{ ucfirst($pembelian->metode_pembayaran) }}</td>
                        <td>{{ $pembelian->tanggal_pembelian->format('d/m/Y H:i') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
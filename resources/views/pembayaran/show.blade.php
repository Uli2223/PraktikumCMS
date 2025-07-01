@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <h5>Informasi Pembayaran</h5>
                <ul class="list-group">
                    <li class="list-group-item">
                        <strong>Total Pembayaran:</strong> 
                        Rp {{ number_format($pembayaran->jumlah_pembayaran, 0, ',', '.') }}
                        <span class="badge bg-info">
                            {{ $pembayaran->produk->count() }} produk
                        </span>
                    </li>
                    <!-- Data lainnya -->
                </ul>
            </div>
        </div>
        
        @if($pembayaran->produk->count() > 0)
        <div class="mt-4">
            <h5>Detail Produk</h5>
            <table class="table">
                <thead>
                    <tr>
                        <th>Nama Produk</th>
                        <th>Harga Satuan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pembayaran->produk as $produk)
                    <tr>
                        <td>{{ $produk->nama }}</td>
                        <td>Rp {{ number_format($produk->harga, 0, ',', '.') }}</td>
                    </tr>
                    @endforeach
                    <tr class="table-primary">
                        <td><strong>Total</strong></td>
                        <td><strong>Rp {{ number_format($pembayaran->jumlah_pembayaran, 0, ',', '.') }}</strong></td>
                    </tr>
                </tbody>
            </table>
        </div>
    @endif
</div>
    </div>
    <a href="{{ route('pembayaran.index') }}" class="btn btn-secondary mt-3">
        <i class="fas fa-arrow-left"></i> Kembali ke Daftar Pembayaran
    </a>
</div>
@endsection
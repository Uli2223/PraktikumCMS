@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Hapus Pembayaran</h1>
    <div class="alert alert-warning">
        <p>Apakah Anda yakin ingin menghapus pembayaran dengan ID <strong>{{ $pembayaran->id_pembayaran }}</strong>?</p>
        <p>Metode Pembayaran: {{ $pembayaran->metode_pembayaran }}</p>
        <p>Jumlah Pembayaran: {{ $pembayaran->jumlah_pembayaran }}</p>
    </div>
    <form action="{{ route('pembayaran.destroy', $pembayaran->id_pembayaran) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Ya, Hapus</button>
        <a href="{{ route('pembayaran.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
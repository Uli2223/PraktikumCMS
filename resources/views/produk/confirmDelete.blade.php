@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Hapus Produk</h1>
    <div class="alert alert-warning">
        <p>Apakah Anda yakin ingin menghapus produk <strong>{{ $produk->nama }}</strong>?</p>
    </div>
    <form action="{{ route('produk.destroy', $produk->id_produk) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Ya, Hapus</button>
        <a href="{{ route('produk.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
@extends('layouts.app')

@section('content')
    <h1>Konfirmasi Hapus Produk</h1>
    <p>Apakah Anda yakin ingin menghapus produk: <strong>{{ $produk->NAMA }}</strong>?</p>
    <form action="{{ route('produk.destroy', $produk->ID_PRODUK) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Ya, Hapus</button>
        <a href="{{ route('produk.index') }}">Batal</a>
    </form>
@endsection

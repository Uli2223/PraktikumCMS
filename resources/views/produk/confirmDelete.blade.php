@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card border-danger">
        <div class="card-header bg-danger text-white">
            <h5>Konfirmasi Hapus Produk</h5>
        </div>
        <div class="card-body">
            <p>Anda akan menghapus produk:</p>
            <ul>
                <li>ID: {{ $produk->id_produk }}</li>
                <li>Nama: {{ $produk->nama }}</li>
            </ul>
            
            <form method="POST" action="{{ route('produk.destroy', $produk->id_produk) }}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">
                    <i class="fas fa-trash"></i> Ya, Hapus
                </button>
                <a href="{{ route('produk.index') }}" class="btn btn-secondary">
                    <i class="fas fa-times"></i> Batal
                </a>
            </form>
        </div>
    </div>
</div>
@endsection
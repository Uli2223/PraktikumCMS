@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card border-danger">
        <div class="card-header bg-danger text-white">
            <h5>Konfirmasi Hapus Pelanggan</h5>
        </div>
        <div class="card-body">
            <p>Anda akan menghapus pelanggan:</p>
            <ul>
                <li>ID: {{ $pelanggan->id_pelanggan }}</li>
                <li>Nama: {{ $pelanggan->nama_pelanggan }}</li>
            </ul>
            
            @if($relatedCount > 0)
            <div class="alert alert-warning">
                <i class="fas fa-exclamation-triangle"></i>
                Pelanggan ini memiliki {{ $relatedCount }} data transaksi terkait.
                Semua data terkait juga akan dihapus!
            </div>
            @endif
            
            <form method="POST" action="{{ route('pelanggan.destroy', $pelanggan->id_pelanggan) }}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">
                    <i class="fas fa-trash"></i> Ya, Hapus
                </button>
                <a href="{{ route('pelanggan.index') }}" class="btn btn-secondary">
                    <i class="fas fa-times"></i> Batal
                </a>
            </form>
        </div>
    </div>
</div>
@endsection
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Hapus Pelanggan</h1>
    <div class="alert alert-warning">
        <p>Apakah Anda yakin ingin menghapus pelanggan <strong>{{ $pelanggan->nama_pelanggan }}</strong>?</p>
    </div>
    <form action="{{ route('pelanggan.destroy', $pelanggan->id_pelanggan) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Ya, Hapus</button>
        <a href="{{ route('pelanggan.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Konfirmasi Hapus Karyawan</h1>

    <div class="alert alert-danger">
        <p>Apakah Anda yakin ingin menghapus data karyawan <strong>{{ $karyawan->nama_karyawan }}</strong>?</p>
    </div>

    <form action="{{ route('karyawan.destroy', $karyawan->id_karyawan) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Hapus</button>
        <a href="{{ route('karyawan.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
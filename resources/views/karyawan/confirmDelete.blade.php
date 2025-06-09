@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h1 class="mb-4">Konfirmasi Hapus Karyawan</h1>

            <div class="card border-danger">
                <div class="card-header bg-danger text-white">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-exclamation-triangle"></i> 
                        Peringatan
                    </h5>
                </div>
                <div class="card-body">
                    <p class="mb-3">Apakah Anda yakin ingin menghapus data karyawan berikut?</p>
                    
                    <div class="alert alert-info">
                        <strong>Nama:</strong> {{ $karyawan->nama_karyawan }}<br>
                        <strong>Jabatan:</strong> {{ $karyawan->jabatan }}<br>
                        <strong>Alamat:</strong> {{ $karyawan->alamat }}<br>
                        <strong>Telepon:</strong> {{ $karyawan->nomor_telepon }}
                    </div>
                    
                    <div class="alert alert-warning">
                        <small>
                            <i class="fas fa-info-circle"></i>
                            Data yang sudah dihapus tidak dapat dikembalikan.
                        </small>
                    </div>
                </div>
                <div class="card-footer">
                    <form action="{{ route('karyawan.destroy', $karyawan->id_karyawan) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda benar-benar yakin?')">
                            <i class="fas fa-trash"></i> Ya, Hapus
                        </button>
                    </form>
                    <a href="{{ route('karyawan.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Batal
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
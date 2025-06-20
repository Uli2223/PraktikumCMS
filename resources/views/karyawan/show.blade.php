@extends('layouts.app')

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif


@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="mb-4">Detail Karyawan</h1>

            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">{{ $karyawan->nama_karyawan }}</h5>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <strong>ID:</strong>
                        </div>
                        <div class="col-sm-9">
                            {{ $karyawan->id_karyawan }}
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <strong>Nama:</strong>
                        </div>
                        <div class="col-sm-9">
                            {{ $karyawan->nama_karyawan }}
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <strong>Jabatan:</strong>
                        </div>
                        <div class="col-sm-9">
                            {{ $karyawan->jabatan }}
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <strong>Alamat:</strong>
                        </div>
                        <div class="col-sm-9">
                            {{ $karyawan->alamat }}
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <strong>Nomor Telepon:</strong>
                        </div>
                        <div class="col-sm-9">
                            {{ $karyawan->nomor_telepon }}
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="{{ route('karyawan.index') }}" class="btn btn-secondary">Kembali</a>
                    <a href="{{ route('karyawan.edit', $karyawan->id_karyawan) }}" class="btn btn-warning">Edit</a>
                    <a href="{{ route('karyawan.confirmDelete', $karyawan->id_karyawan) }}" class="btn btn-danger">Hapus</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Detail Karyawan</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $karyawan->nama_karyawan }}</h5>
            <p class="card-text"><strong>Jabatan:</strong> {{ $karyawan->jabatan }}</p>
            <p class="card-text"><strong>Alamat:</strong> {{ $karyawan->alamat }}</p>
            <p class="card-text"><strong>Nomor Telepon:</strong> {{ $karyawan->nomor_telepon }}</p>
        </div>
    </div>

    <a href="{{ route('karyawan.index') }}" class="btn btn-secondary mt-3">Kembali</a>
</div>
@endsection
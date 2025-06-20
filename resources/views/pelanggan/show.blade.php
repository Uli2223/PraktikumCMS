@extends('layouts.app')

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

@section('content')
<div class="container mt-4">
    <h1>Detail Pelanggan</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $pelanggan->nama_pelanggan }}</h5>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><strong>Alamat:</strong> {{ $pelanggan->alamat }}</li>
                <li class="list-group-item"><strong>Telepon:</strong> {{ $pelanggan->nomor_telepon }}</li>
                <li class="list-group-item"><strong>Membership:</strong> {{ $pelanggan->membership }}</li>
                <li class="list-group-item"><strong>ID Karyawan:</strong> {{ $pelanggan->id_karyawan }}</li>
            </ul>
        </div>
    </div>
    <a href="{{ route('pelanggan.index') }}" class="btn btn-secondary mt-3">Kembali</a>
</div>
@endsection
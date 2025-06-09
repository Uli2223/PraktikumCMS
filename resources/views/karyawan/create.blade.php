@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Tambah Karyawan</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('karyawan.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="nama_karyawan" class="form-label">Nama Karyawan</label>
            <input type="text" 
                   name="nama_karyawan" 
                   id="nama_karyawan"
                   class="form-control @error('nama_karyawan') is-invalid @enderror" 
                   value="{{ old('nama_karyawan') }}"
                   required>
            @error('nama_karyawan')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="jabatan" class="form-label">Jabatan</label>
            <input type="text" 
                   name="jabatan" 
                   id="jabatan"
                   class="form-control @error('jabatan') is-invalid @enderror" 
                   value="{{ old('jabatan') }}"
                   required>
            @error('jabatan')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea name="alamat" 
                      id="alamat"
                      class="form-control @error('alamat') is-invalid @enderror" 
                      rows="3"
                      required>{{ old('alamat') }}</textarea>
            @error('alamat')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="nomor_telepon" class="form-label">Nomor Telepon</label>
            <input type="text" 
                   name="nomor_telepon" 
                   id="nomor_telepon"
                   class="form-control @error('nomor_telepon') is-invalid @enderror" 
                   value="{{ old('nomor_telepon') }}"
                   required>
            @error('nomor_telepon')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('karyawan.index') }}" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>
@endsection
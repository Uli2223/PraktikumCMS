@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4 text-center text-dark">Daftar Karyawan</h1>

    <!-- Search Bar -->
    <div class="row mb-3">
        <div class="col-md-6">
            <form action="{{ route('karyawan.index') }}" method="GET" class="d-flex">
                <input type="text" 
                       name="search" 
                       class="form-control me-2" 
                       placeholder="Cari karyawan... (tidak case sensitive)" 
                       value="{{ request('search') }}">
                <button type="submit" class="btn btn-outline-primary">Cari</button>
                @if(request('search'))
                    <a href="{{ route('karyawan.index') }}" class="btn btn-outline-secondary ms-2">Reset</a>
                @endif
            </form>
        </div>
        <div class="col-md-6 text-end">
            <a href="{{ route('karyawan.create') }}" class="btn btn-primary">Tambah Karyawan</a>
        </div>
    </div>

    <!-- Search Result Info -->
    @if(request('search'))
        <div class="alert alert-info">
            <i class="fas fa-search"></i> 
            Hasil pencarian untuk: <strong>"{{ request('search') }}"</strong>
            ({{ count($karyawan) }} data ditemukan)
        </div>
    @endif

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(count($karyawan) > 0)
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="table-warning">
                    <tr>
                        <th>ID</th>
                        <th>Nama Karyawan</th>
                        <th>Jabatan</th>
                        <th>Alamat</th>
                        <th>Nomor Telepon</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($karyawan as $item)
                        <tr>
                            <td>{{ $item->id_karyawan }}</td>
                            <td>{{ $item->nama_karyawan }}</td>
                            <td>{{ $item->jabatan }}</td>
                            <td>{{ $item->alamat }}</td>
                            <td>{{ $item->nomor_telepon }}</td>
                            <td>
                                <a href="{{ route('karyawan.show', $item->id_karyawan) }}" class="btn btn-info btn-sm">Lihat</a>
                                <a href="{{ route('karyawan.edit', $item->id_karyawan) }}" class="btn btn-warning btn-sm">Edit</a>
                                <a href="{{ route('karyawan.confirmDelete', $item->id_karyawan) }}" class="btn btn-danger btn-sm">Hapus</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="alert alert-warning text-center">
            <h5>Tidak ada data karyawan yang ditemukan</h5>
            @if(request('search'))
                <p>Coba ubah kata kunci pencarian atau <a href="{{ route('karyawan.index') }}">lihat semua data</a></p>
            @else
                <p><a href="{{ route('karyawan.create') }}">Tambah karyawan pertama</a></p>
            @endif
        </div>
    @endif
</div>
@endsection
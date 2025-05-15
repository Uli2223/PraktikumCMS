@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4 text-center text-dark">Daftar Karyawan</h1>

    <a href="{{ route('karyawan.create') }}" class="btn btn-primary mb-3">Tambah Karyawan</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

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
@endsection
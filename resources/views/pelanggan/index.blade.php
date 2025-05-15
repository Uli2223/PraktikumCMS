@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Daftar Pelanggan</h1>
    <a href="{{ route('pelanggan.create') }}" class="btn btn-primary mb-3">Tambah Pelanggan</a>

    <table class="table table-bordered">
        <thead class="table-light">
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Telepon</th>
                <th>Membership</th>
                <th>ID Karyawan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        @if(count($pelanggan) > 0)
            @foreach ($pelanggan as $item)
            <tr>
                <td>{{ $item->id_pelanggan }}</td>
                <td>{{ $item->nama_pelanggan }}</td>
                <td>{{ $item->alamat }}</td>
                <td>{{ $item->nomor_telepon }}</td>
                <td>{{ $item->membership }}</td>
                <td>{{ $item->id_karyawan }}</td>
                <td>
                    <a href="{{ route('pelanggan.show', $item->id_pelanggan) }}" class="btn btn-info btn-sm">Detail</a>
                    <a href="{{ route('pelanggan.edit', $item->id_pelanggan) }}" class="btn btn-warning btn-sm">Edit</a>
                    <a href="{{ route('pelanggan.confirmDelete', $item->id_pelanggan) }}" class="btn btn-danger btn-sm">Hapus</a>
                </td>
            </tr>
            @endforeach
        @else
            <tr>
                <td colspan="7" class="text-center">Tidak ada data pelanggan</td>
            </tr>
        @endif
        </tbody>
    </table>
</div>
@endsection
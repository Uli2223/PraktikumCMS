@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Daftar Pembayaran</h1>
    <a href="{{ route('pembayaran.create') }}" class="btn btn-primary mb-3">Tambah Pembayaran</a>

    {{-- Pesan sukses dan error --}}
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <table class="table table-bordered">
        <thead class="table-light">
            <tr>
                <th>ID</th>
                <th>Metode Pembayaran</th>
                <th>Jumlah Pembayaran</th>
                <th>ID Pelanggan</th>
                <th>ID Karyawan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        @if(count($pembayaran) > 0)
            @foreach ($pembayaran as $item)
            <tr>
                <td>{{ $item->id_pembayaran }}</td>
                <td>{{ $item->metode_pembayaran }}</td>
                <td>{{ $item->jumlah_pembayaran }}</td>
                <td>{{ $item->id_pelanggan }}</td>
                <td>{{ $item->id_karyawan }}</td>
                <td>
                    <a href="{{ route('pembayaran.show', $item->id_pembayaran) }}" class="btn btn-info btn-sm">Detail</a>
                    <a href="{{ route('pembayaran.edit', $item->id_pembayaran) }}" class="btn btn-warning btn-sm">Edit</a>
                    <a href="{{ route('pembayaran.confirmDelete', $item->id_pembayaran) }}" class="btn btn-danger btn-sm">Hapus</a>
                </td>
            </tr>
            @endforeach
        @else
            <tr>
                <td colspan="6" class="text-center">Tidak ada data pembayaran</td>
            </tr>
        @endif
        </tbody>
    </table>
</div>
@endsection

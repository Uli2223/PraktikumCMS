@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Tambah Karyawan</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('karyawan.store') }}" method="POST">
    @csrf

    <label>Nama Karyawan</label>
    <input type="text" name="nama_karyawan" value="{{ old('nama_karyawan') }}">

    <label>Jabatan</label>
    <input type="text" name="jabatan" value="{{ old('jabatan') }}">

    <label>Alamat</label>
    <input type="text" name="alamat" value="{{ old('alamat') }}">

    <label>Nomor Telepon</label>
    <input type="text" name="nomor_telepon" value="{{ old('nomor_telepon') }}">

    <button type="submit">Simpan</button>
    </form>

</div>
@endsection
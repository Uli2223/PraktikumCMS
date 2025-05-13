@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4>Tambah Pelanggan Baru</h4>
                        <a href="{{ route('pelanggan.index') }}" class="btn btn-primary">Kembali</a>
                    </div>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Error!</strong> Ada masalah dengan input Anda.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('pelanggan.store') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="ID_PELANGGAN">ID Pelanggan:</label>
                            <input type="number" name="ID_PELANGGAN" class="form-control" id="ID_PELANGGAN" value="{{ old('ID_PELANGGAN') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="NAMA_PELANGGAN">Nama Pelanggan:</label>
                            <input type="text" name="NAMA_PELANGGAN" class="form-control" id="NAMA_PELANGGAN" value="{{ old('NAMA_PELANGGAN') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="ALAMAT">Alamat:</label>
                            <input type="text" name="ALAMAT" class="form-control" id="ALAMAT" value="{{ old('ALAMAT') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="NOMOR_TELEPON">Nomor Telepon:</label>
                            <input type="number" name="NOMOR_TELEPON" class="form-control" id="NOMOR_TELEPON" value="{{ old('NOMOR_TELEPON') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="RIWAYAT_PEMBELIAN">Riwayat Pembelian:</label>
                            <input type="text" name="RIWAYAT_PEMBELIAN" class="form-control" id="RIWAYAT_PEMBELIAN" value="{{ old('RIWAYAT_PEMBELIAN') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="ID_KARYAWAN">ID Karyawan:</label>
                            <select name="ID_KARYAWAN" class="form-control" id="ID_KARYAWAN" required>
                                <option value="">Pilih Karyawan</option>
                                @foreach($karyawan as $k)
                                    <option value="{{ $k->id }}" {{ old('ID_KARYAWAN') == $k->id ? 'selected' : '' }}>{{ $k->id }} - {{ $k->nama }}</option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-success">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
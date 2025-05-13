@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4>Detail Pelanggan</h4>
                        <a href="{{ route('pelanggan.index') }}" class="btn btn-primary">Kembali</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <th width="200px">ID Pelanggan</th>
                                <td>{{ $pelanggan->ID_PELANGGAN }}</td>
                            </tr>
                            <tr>
                                <th>Nama Pelanggan</th>
                                <td>{{ $pelanggan->NAMA_PELANGGAN }}</td>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <td>{{ $pelanggan->ALAMAT }}</td>
                            </tr>
                            <tr>
                                <th>Nomor Telepon</th>
                                <td>{{ $pelanggan->NOMOR_TELEPON }}</td>
                            </tr>
                            <tr>
                                <th>Riwayat Pembelian</th>
                                <td>{{ $pelanggan->RIWAYAT_PEMBELIAN }}</td>
                            </tr>
                            <tr>
                                <th>ID Karyawan</th>
                                <td>{{ $pelanggan->ID_KARYAWAN }}</td>
                            </tr>
                        </table>
                    </div>
                    
                    <div class="mt-3">
                        <a href="{{ route('pelanggan.edit', $pelanggan->ID_PELANGGAN) }}" class="btn btn-warning">Edit</a>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirmDelete">Hapus</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Confirm Delete Modal -->
<div class="modal fade" id="confirmDelete" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmDeleteLabel">Konfirmasi Hapus</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin menghapus pelanggan <strong>{{ $pelanggan->NAMA_PELANGGAN }}</strong>?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <form action="{{ route('pelanggan.destroy', ['pelanggan' => $pelanggan->ID_PELANGGAN]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
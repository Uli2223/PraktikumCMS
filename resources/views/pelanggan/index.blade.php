@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4>Daftar Pelanggan</h4>
                        <a href="{{ route('pelanggan.create') }}" class="btn btn-success">Tambah Pelanggan</a>
                    </div>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>Nomor Telepon</th>
                                    <th>Riwayat Pembelian</th>
                                    <th>ID Karyawan</th>
                                    <th width="250px">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($pelanggan as $p)
                                <tr>
                                    <td>{{ $p->ID_PELANGGAN }}</td>
                                    <td>{{ $p->NAMA_PELANGGAN }}</td>
                                    <td>{{ $p->ALAMAT }}</td>
                                    <td>{{ $p->NOMOR_TELEPON }}</td>
                                    <td>{{ $p->RIWAYAT_PEMBELIAN }}</td>
                                    <td>{{ $p->ID_KARYAWAN }}</td>
                                    <td>
                                        <a href="{{ route('pelanggan.show', $p->ID_PELANGGAN) }}" class="btn btn-info btn-sm">Detail</a>
                                        <a href="{{ route('pelanggan.edit', $p->ID_PELANGGAN) }}" class="btn btn-primary btn-sm">Edit</a>
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#confirmDelete{{ $p->ID_PELANGGAN }}">Hapus</button>
                                    </td>
                                </tr>

                                <!-- Confirm Delete Modal -->
                                <div class="modal fade" id="confirmDelete{{ $p->ID_PELANGGAN }}" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="confirmDeleteLabel">Konfirmasi Hapus</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Apakah Anda yakin ingin menghapus pelanggan <strong>{{ $p->NAMA_PELANGGAN }}</strong>?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                <form action="{{ route('pelanggan.destroy', ['pelanggan' => $p->ID_PELANGGAN]) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @empty
                                <tr>
                                    <td colspan="7" class="text-center">Tidak ada data pelanggan.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
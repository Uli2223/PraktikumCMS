<!DOCTYPE html>
<html>
<head>
    <title>Data Karyawan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f1e4;
        }
        .navbar, .btn-primary {
            background-color: #8b5e3c;
        }
        .btn-primary {
            border-color: #8b5e3c;
        }
        .btn-primary:hover {
            background-color: #704832;
        }
        .card {
            border: none;
            background-color: #fff5e1;
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <h1 class="mb-4 text-center text-dark">Daftar Karyawan</h1>

        <a href="{{ route('karyawan.create') }}" class="btn btn-primary mb-3">Tambah Karyawan</a>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-striped table-bordered">
            <thead class="table-warning">
                <tr>
                    <th>No</th>
                    <th>Nama Karyawan</th>
                    <th>Jabatan</th>
                    <th>Alamat</th>
                    <th>Nomor Telepon</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($karyawan as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $item->nama_karyawan }}</td>
                        <td>{{ $item->jabatan }}</td>
                        <td>{{ $item->alamat }}</td>
                        <td>{{ $item->nomor_telepon }}</td>
                        <td>
                            <a href="{{ route('karyawan.show', $item->id) }}" class="btn btn-info btn-sm">Lihat</a>
                            <a href="{{ route('karyawan.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <a href="{{ route('karyawan.confirmDelete', $item->id) }}" class="btn btn-danger btn-sm">Hapus</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
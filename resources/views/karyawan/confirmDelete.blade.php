<!DOCTYPE html>
<html>
<head>
    <title>Hapus Karyawan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h1>Konfirmasi Hapus Karyawan</h1>

    <div class="alert alert-danger">
        <p>Apakah Anda yakin ingin menghapus data karyawan <strong>{{ $karyawan->nama_karyawan }}</strong>?</p>
    </div>

    <form action="{{ route('karyawan.destroy', $karyawan->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Hapus</button>
        <a href="{{ route('karyawan.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
</body>
</html>
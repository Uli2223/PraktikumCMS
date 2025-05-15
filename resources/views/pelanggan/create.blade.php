@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Pelanggan</h1>
    <form action="{{ route('pelanggan.store') }}" method="POST">
        @csrf
        @include('pelanggan.form')
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('pelanggan.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection

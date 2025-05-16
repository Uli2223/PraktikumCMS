@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Pembayaran</h1>
    <form action="{{ route('pembayaran.store') }}" method="POST">
        @csrf
        @include('pembayaran.form')
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('pembayaran.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
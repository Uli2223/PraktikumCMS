@extends('layouts.app')

@section('content')
    <h1>Tambah Produk</h1>
    <form action="{{ route('produk.store') }}" method="POST">
        @csrf
        @include('produk.form')
        <button type="submit">Simpan</button>
    </form>
@endsection

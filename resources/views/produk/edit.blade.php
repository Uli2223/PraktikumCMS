@extends('layouts.app')

@section('content')
    <h1>Edit Produk</h1>
    <form action="{{ route('produk.update', $produk->ID_PRODUK) }}" method="POST">
        @csrf
        @method('PUT')
        @include('produk.form')
        <button type="submit">Perbarui</button>
    </form>
@endsection

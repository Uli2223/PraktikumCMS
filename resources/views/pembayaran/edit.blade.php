@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Pembayaran</h1>
    <form action="{{ route('pembayaran.update', $pembayaran->id_pembayaran) }}" method="POST">
        @csrf
        @method('PUT')
        @include('pembayaran.form')
        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('pembayaran.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
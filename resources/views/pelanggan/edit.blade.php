@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Pelanggan</h1>
    <form action="{{ route('pelanggan.update', $pelanggan->id_pelanggan) }}" method="POST">
        @csrf
        @method('PUT')
        @include('pelanggan.form')
        <button type="submit" class="btn btn-success">Update</button>
       <a href="{{ route('pelanggan.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection

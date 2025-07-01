@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Pembelian</h2>
    <h4>Pelanggan: {{ $pembelian->pelanggan->nama }}</h4>
    
    <form action="{{ route('pembelian.update', $pembelian->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label">Produk</label>
                <div class="border p-3" style="max-height: 300px; overflow-y: auto;">
                    @foreach($produk as $item)
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" name="produk_ids[]" 
                               value="{{ $item->id_produk }}" id="produk{{ $item->id_produk }}"
                               @if($pembelian->produk->contains($item->id_produk)) checked @endif>
                        <label class="form-check-label" for="produk{{ $item->id_produk }}">
                            {{ $item->nama_produk }} - Rp {{ number_format($item->harga, 0, ',', '.') }} 
                            (Stok: {{ $item->stok }})
                        </label>
                        <input type="number" name="jumlah[{{ $item->id_produk }}]" 
                               class="form-control form-control-sm mt-1" 
                               value="{{ $pembelian->produk->find($item->id_produk)->pivot->jumlah ?? 1 }}" 
                               min="1" max="{{ $item->stok }}" 
                               style="width: 80px; display: inline-block;">
                    </div>
                    @endforeach
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="metode_pembayaran" class="form-label">Metode Pembayaran</label>
                    <select class="form-select" id="metode_pembayaran" name="metode_pembayaran" required>
                        <option value="tunai" @if($pembelian->metode_pembayaran == 'tunai') selected @endif>Tunai</option>
                        <option value="debit" @if($pembelian->metode_pembayaran == 'debit') selected @endif>Debit</option>
                        <option value="kredit" @if($pembelian->metode_pembayaran == 'kredit') selected @endif>Kredit</option>
                        <option value="transfer" @if($pembelian->metode_pembayaran == 'transfer') selected @endif>Transfer</option>
                    </select>
                </div>
                
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Update Pembelian</button>
                    <a href="{{ route('pembelian.show', $pembelian->id) }}" class="btn btn-secondary">Batal</a>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
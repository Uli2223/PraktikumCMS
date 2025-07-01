@extends('layouts.app')

@section('content')
<div class="container">
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show">
        <i class="fas fa-check-circle me-2"></i>
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show">
        <i class="fas fa-exclamation-circle me-2"></i>
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <div class="d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Buat Pembelian Baru</h4>
                <a href="{{ route('pelanggan.index') }}" class="btn btn-light btn-sm">
                    <i class="fas fa-arrow-left me-1"></i> Kembali
                </a>
            </div>
        </div>

        <div class="card-body">
            <div class="mb-4">
                <h5>Pelanggan: <strong>{{ $pelanggan->nama_pelanggan }}</strong></h5>
                <p class="text-muted mb-0">ID: {{ $pelanggan->id_pelanggan }}</p>
            </div>

            <form id="formPembelian" action="{{ route('pembelian.store', $pelanggan->id_pelanggan) }}" method="POST">
                @csrf
                
                <div class="row">
                    <div class="col-md-8">
                        <div class="card mb-4">
                            <div class="card-header bg-light">
                                <h5 class="mb-0">Daftar Produk</h5>
                            </div>
                            <div class="card-body p-0">
                                @if($produk->isEmpty())
                                <div class="alert alert-warning m-3">Tidak ada produk tersedia</div>
                                @else
                                <div class="table-responsive">
                                    <table class="table table-hover mb-0">
                                        <thead class="table-light">
                                            <tr>
                                                <th width="50px"></th>
                                                <th>Produk</th>
                                                <th class="text-end">Harga</th>
                                                <th class="text-end">Stok</th>
                                                <th class="text-end">Jumlah</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($produk as $item)
                                            <tr>
                                                <td>
                                                    <input class="form-check-input product-check" 
                                                           type="checkbox" 
                                                           name="produk_ids[]" 
                                                           value="{{ $item->id_produk }}"
                                                           id="produk{{ $item->id_produk }}">
                                                </td>
                                                <td>
                                                    <label class="form-check-label" for="produk{{ $item->id_produk }}">
                                                        {{ $item->nama }}
                                                    </label>
                                                </td>
                                                <td class="text-end">Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                                                <td class="text-end">{{ $item->stok }}</td>
                                                <td class="text-end" width="120px">
                                                    <input type="number" 
                                                           name="jumlah[{{ $item->id_produk }}]"
                                                           class="form-control form-control-sm quantity-input"
                                                           value="1" 
                                                           min="1" 
                                                           max="{{ $item->stok }}"
                                                           disabled
                                                           style="text-align: right">
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header bg-light">
                                <h5 class="mb-0">Pembayaran</h5>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="form-label">Metode Pembayaran</label>
                                    <select class="form-select" name="metode_pembayaran" required>
                                        <option value="">Pilih Metode</option>
                                        <option value="TUNAI">Tunai</option>
                                        <option value="DEBIT">Debit</option>
                                        <option value="KREDIT">Kredit</option>
                                        <option value="TRANSFER">Transfer</option>
                                    </select>
                                </div>

                                <div class="d-grid gap-2 mt-4">
                                    <button type="submit" class="btn btn-primary btn-lg" id="btnSubmit">
                                        <i class="fas fa-save me-2"></i> Simpan Pembelian
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
$(document).ready(function() {
    // Enable quantity input when product is selected
    $('.product-check').change(function() {
        const productId = $(this).val();
        const quantityInput = $(`input[name="jumlah[${productId}]"]`);
        quantityInput.prop('disabled', !this.checked);
        
        if (!this.checked) {
            quantityInput.val(1);
        }
    });

    // Form validation before submit
    $('#formPembelian').submit(function(e) {
        const checkedProducts = $('.product-check:checked').length;
        if (checkedProducts === 0) {
            e.preventDefault();
            alert('Pilih minimal 1 produk!');
            return false;
        }
        
        // Validate quantity doesn't exceed stock
        let valid = true;
        $('.product-check:checked').each(function() {
            const productId = $(this).val();
            const quantity = parseInt($(`input[name="jumlah[${productId}]"]`).val());
            const maxStock = parseInt($(`input[name="jumlah[${productId}]"]`).attr('max'));
            
            if (quantity > maxStock) {
                alert(`Jumlah untuk produk ${productId} melebihi stok yang tersedia!`);
                valid = false;
                return false; // exit loop
            }
        });
        
        if (!valid) {
            e.preventDefault();
            return false;
        }
        
        $('#btnSubmit').prop('disabled', true).html('<i class="fas fa-spinner fa-spin me-2"></i> Menyimpan...');
    });
});
</script>
@endsection
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggan;
use App\Models\Produk;
use App\Models\Pembelian;
use Illuminate\Support\Facades\DB;

class PembelianController extends Controller
{
    public function index()
    {
        $pembelians = Pembelian::with(['pelanggan', 'produk'])->get();
        return view('pembelian.index', compact('pembelians'));
    }

    public function create($pelanggan_id)
    {
        $pelanggan = Pelanggan::findOrFail($pelanggan_id);
        $produk = Produk::where('STOK', '>', 0)->get();
        
        return view('pembelian.create', compact('pelanggan', 'produk'));
    }

    public function store(Request $request, $pelanggan_id)
    {
        $request->validate([
            'produk_ids' => 'required|array',
            'produk_ids.*' => 'exists:PRODUK,ID_PRODUK',
            'jumlah.*' => 'required|integer|min:1',
            'metode_pembayaran' => 'required|in:TUNAI,DEBIT,KREDIT,TRANSFER'
        ]);

        // Get logged in karyawan ID
        $karyawan_id = auth()->user()->id_karyawan;

        // Create pembelian
        $pembelian = Pembelian::create([
            'ID_PELANGGAN' => $pelanggan_id,
            'ID_KARYAWAN' => $karyawan_id,
            'METODE_PEMBAYARAN' => $request->metode_pembayaran,
            'TANGGAL_PEMBELIAN' => now(),
            'STATUS' => 'SELESAI'
        ]);

        // Attach products
        $total_harga = 0;
        foreach ($request->produk_ids as $produk_id) {
            $produk = Produk::find($produk_id);
            $jumlah = $request->jumlah[$produk_id];
            $harga = $produk->HARGA;
            $subtotal = $jumlah * $harga;
            
            $pembelian->produk()->attach($produk_id, [
                'JUMLAH' => $jumlah,
                'HARGA_SAAT_INI' => $harga,
                'SUBTOTAL' => $subtotal
            ]);
            
            // Update product stock
            $produk->decrement('STOK', $jumlah);
            
            $total_harga += $subtotal;
        }

        // Update total harga
        $pembelian->update(['TOTAL_HARGA' => $total_harga]);

        return redirect()->route('pembelian.show', $pembelian->ID_PEMBELIAN)
            ->with('success', 'Pembelian berhasil disimpan');
    }

    public function show($id)
    {
        $pembelian = Pembelian::with(['pelanggan', 'produk'])->findOrFail($id);
        return view('pembelian.show', compact('pembelian'));
    }

    public function edit($id)
    {
        $pembelian = Pembelian::with(['produk'])->findOrFail($id);
        $produk = Produk::where('STOK', '>', 0)->get();
        return view('pembelian.edit', compact('pembelian', 'produk'));
    }

    public function update(Request $request, $id)
    {
        // Similar to store but with update logic
        // Remember to handle stock adjustments
    }

    public function destroy($id)
    {
        // Implement soft delete or cascade delete
    }
}
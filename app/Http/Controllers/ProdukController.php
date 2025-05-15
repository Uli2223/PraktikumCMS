<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class ProdukController extends Controller
{
    public function index()
    {
        $produks = Produk::all();
        return view('produk.index', compact('produks'));
    }

    public function show($id)
    {

        return view('produk.show', compact('produk'));
    }

    public function create()
    {
        return view('produk.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'NAMA' => 'required|string',
            'JENIS' => 'required|string',
            'HARGA' => 'required|integer',
            'STOK' => 'required|integer',
            'TANGGAL_KADALUWARSA' => 'required|date',
            'DESKRIPSI_PRODUK' => 'nullable|string',
            'ID_PEMBAYARAN' => 'required|integer',
        ]);

        Produk::create($request->all());
        return redirect()->route('produk.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $produk = Produk::findOrFail($id);
        return view('produk.edit', compact('produk'));
    }

    public function update(Request $request, $id)
    {
        $produk = Produk::findOrFail($id);

        $request->validate([
            'NAMA' => 'required|string',
            'JENIS' => 'required|string',
            'HARGA' => 'required|integer',
            'STOK' => 'required|integer',
            'TANGGAL_KADALUWARSA' => 'required|date',
            'DESKRIPSI_PRODUK' => 'nullable|string',
            'ID_PEMBAYARAN' => 'required|integer',
        ]);

        $produk->update($request->all());
        return redirect()->route('produk.index')->with('success', 'Produk berhasil diperbarui.');
    }

    public function confirmDelete($id)
    {
        $produk = Produk::findOrFail($id);
        return view('produk.confirmDelete', compact('produk'));
    }

    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);
        $produk->delete();
        return redirect()->route('produk.index')->with('success', 'Produk berhasil dihapus.');
    }

    
}

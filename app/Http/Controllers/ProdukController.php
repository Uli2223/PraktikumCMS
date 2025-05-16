<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use Illuminate\Support\Facades\DB;

class ProdukController extends Controller
{
    public function index(){
        try {
            // Ambil data produk
            $produk = Produk::all();
            
            return view('produk.index', compact('produk'));
        } catch (\Exception $e) {
            die("Error koneksi database: " . $e->getMessage());
        }
    }
    
    public function create()
    {
        return view('produk.create');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'jenis' => 'required',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric',
            'tanggal_kadaluwarsa' => 'nullable|date',
            'deskripsi_produk' => 'nullable',
            'id_pembayaran' => 'nullable|numeric',
        ]);
        
        Produk::create($request->all());
        
        return redirect()->route('produk.index')
            ->with('success', 'Produk berhasil ditambahkan.');
    }
    
    public function show($id)
    {
        $produk = Produk::findOrFail($id);
        return view('produk.show', compact('produk'));
    }
    
    public function edit($id)
    {
        $produk = Produk::findOrFail($id);
        return view('produk.edit', compact('produk'));
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'jenis' => 'required',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric',
            'tanggal_kadaluwarsa' => 'nullable|date',
            'deskripsi_produk' => 'nullable',
            'id_pembayaran' => 'nullable|numeric',
        ]);
        
        $produk = Produk::findOrFail($id);
        $produk->update($request->all());
        
        return redirect()->route('produk.index')
            ->with('success', 'Produk berhasil diperbarui.');
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
        
        return redirect()->route('produk.index')
            ->with('success', 'Produk berhasil dihapus.');
    }
}
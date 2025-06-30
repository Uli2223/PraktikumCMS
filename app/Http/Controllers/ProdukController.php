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
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'jenis' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
            'tanggal_kadaluwarsa' => 'nullable|date',
            'deskripsi_produk' => 'nullable|string',
            'id_pembayaran' => 'nullable|exists:pembayaran,id_pembayaran'
        ]);

        try {
            // Hanya ambil field yang diisi
            $data = $request->only([
                'nama',
                'jenis',
                'harga',
                'stok',
                'tanggal_kadaluwarsa',
                'deskripsi_produk',
                'id_pembayaran'
            ]);

            // Konversi format tanggal jika perlu
            if (!empty($data['tanggal_kadaluwarsa'])) {
                $data['tanggal_kadaluwarsa'] = date('Y-m-d', strtotime($data['tanggal_kadaluwarsa']));
            }

            Produk::create($data);

            return redirect()->route('produk.index')
                ->with('success', 'Produk berhasil ditambahkan');

        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Gagal menambah produk: ' . $e->getMessage());
        }
    }
    
    public function show($id)
    {
        try{
            $produk = Produk::findOrFail($id);
        return view('produk.show', compact('produk'));
        }catch (\Exception $e) {
            return redirect()->route('produk.index')->with('error', 'Data Produk tidak ditemukan.');
        }
        
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
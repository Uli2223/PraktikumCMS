<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembayaran;
use App\Models\Pelanggan;
use Illuminate\Support\Facades\DB;

class PembayaranController extends Controller
{
    public function index(){
        try {
            // Ambil data pembayaran
            $pembayaran = Pembayaran::all();
            
            return view('pembayaran.index', compact('pembayaran'));
        } catch (\Exception $e) {
            die("Error koneksi database: " . $e->getMessage());
        }
    }
    
    public function create()
    {
        // Ambil data pelanggan untuk dropdown
        $pelanggan = Pelanggan::all();
        
        return view('pembayaran.create', compact('pelanggan'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'metode_pembayaran' => 'required',
            'jumlah_pembayaran' => 'required',
            'id_pelanggan' => 'required|numeric',
            'id_karyawan' => 'required|numeric',
        ]);
        
        Pembayaran::create($request->all());
        
        return redirect()->route('pembayaran.index')
            ->with('success', 'Pembayaran berhasil ditambahkan.');
    }
    
    public function show($id)
    {
        $pembayaran = Pembayaran::findOrFail($id);
        return view('pembayaran.show', compact('pembayaran'));
    }
    
    public function edit($id)
    {
        $pembayaran = Pembayaran::findOrFail($id);
        $pelanggan = Pelanggan::all();
        
        return view('pembayaran.edit', compact('pembayaran', 'pelanggan'));
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'metode_pembayaran' => 'required',
            'jumlah_pembayaran' => 'required',
            'id_pelanggan' => 'required|numeric',
            'id_karyawan' => 'required|numeric',
        ]);
        
        $pembayaran = Pembayaran::findOrFail($id);
        $pembayaran->update($request->all());
        
        return redirect()->route('pembayaran.index')
            ->with('success', 'Pembayaran berhasil diperbarui.');
    }
    
    public function confirmDelete($id)
    {
        $pembayaran = Pembayaran::findOrFail($id);
        return view('pembayaran.confirmDelete', compact('pembayaran'));
    }
    
    public function destroy($id)
    {
        $pembayaran = Pembayaran::findOrFail($id);
        $pembayaran->delete();
        
        return redirect()->route('pembayaran.index')
            ->with('success', 'Pembayaran berhasil dihapus.');
    }
}
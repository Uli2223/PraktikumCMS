<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggan;
use Illuminate\Support\Facades\DB;

class PelangganController extends Controller
{
    public function index(){
        try {
            $pelanggan = Pelanggan::all();  
            return view('pelanggan.index', compact('pelanggan'));
        } catch (\Exception $e) {
            die("Error koneksi database: " . $e->getMessage());
        }
    }
    
    public function create()
    {
        return view('pelanggan.create');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'nama_pelanggan' => 'required',
            'alamat' => 'required',
            'nomor_telepon' => 'required',
            'membership' => 'required',
            'id_karyawan' => 'required',
        ]);
        
        Pelanggan::create($request->all());
        
        return redirect()->route('pelanggan.index')
            ->with('success', 'Pelanggan berhasil ditambahkan.');
    }
    
    public function show($id)
    {
        try{
            $pelanggan = Pelanggan::findOrFail($id);
            return view('pelanggan.show', compact('pelanggan'));
        }catch (\Exception $e) {
            return redirect()->route('pelanggan.index')->with('error', 'Data Pelanggan tidak ditemukan.');
        }
    }
    
    
    public function edit($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        return view('pelanggan.edit', compact('pelanggan'));
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_pelanggan' => 'required',
            'alamat' => 'required',
            'nomor_telepon' => 'required',
            'membership' => 'required',
            'id_karyawan' => 'required',
        ]);
        
        $pelanggan = Pelanggan::findOrFail($id);
        $pelanggan->update($request->all());
        
        return redirect()->route('pelanggan.index')
            ->with('success', 'Pelanggan berhasil diperbarui.');
    }
    
    public function confirmDelete($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        return view('pelanggan.confirmDelete', compact('pelanggan'));
    }
    
    public function destroy($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        $pelanggan->delete();
        
        return redirect()->route('pelanggan.index')
            ->with('success', 'Pelanggan berhasil dihapus.');
    }
}
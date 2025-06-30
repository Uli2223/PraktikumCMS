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
        
        try{
            Pelanggan::create($request->all());
        
            return redirect()->route('pelanggan.index')
            ->with('success', 'Pelanggan berhasil ditambahkan.');
        }catch (\Exception $e) {
            return redirect()->route('pelanggan.index')->with('error', 'Data Pelanggan tidak ditemukan.');
        }
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
        try {
                $pelanggan = Pelanggan::findOrFail($id);
                return view('pelanggan.edit', compact('pelanggan'));
        }catch (\Exception $e) {
            return redirect()->route('pelanggan.index')->with('error', 'Data Pelanggan tidak ditemukan.');
        }
       
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
        
        try{
            $pelanggan = Pelanggan::findOrFail($id);
        $pelanggan->update($request->all());
        
        return redirect()->route('pelanggan.index')
            ->with('success', 'Pelanggan berhasil diperbarui.');
        }catch (\Exception $e) {
            return redirect()->route('pelanggan.index')->with('error', 'Data Pelanggan tidak ditemukan.');
        }   
    }
    
    public function confirmDelete($id)
    {
        $pelanggan = Pelanggan::find($id);
        
        if(!$pelanggan) {
            return redirect()->route('pelanggan.index')
                ->with('error', 'Data pelanggan tidak ditemukan');
        }
        
        $relatedCount = DB::table('pembayaran')
                        ->where('id_pelanggan', $id)
                        ->count();
        
        return view('pelanggan.confirmDelete', [
            'pelanggan' => $pelanggan,
            'relatedCount' => $relatedCount
        ]);
    }
    
   public function destroy($id)
    {
        DB::beginTransaction();
        try {
            // 1. Hapus dulu semua data terkait
            DB::table('pembayaran')
            ->where('id_pelanggan', $id)
            ->delete();
            
            // 2. Baru hapus pelanggan
            $pelanggan = Pelanggan::where('id_pelanggan', $id)->first();
            
            if(!$pelanggan) {
                return redirect()->back()->with('error', 'Data pelanggan tidak ditemukan');
            }
            
            $pelanggan->delete();
            
            DB::commit();
            return redirect()->route('pelanggan.index')
                ->with('success', 'Pelanggan berhasil dihapus');
                
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()
                ->with('error', 'Gagal menghapus: ' . $e->getMessage());
        }
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');
        
        if ($search) {
            // Menggunakan LOWER() untuk case-insensitive search
            $karyawan = Karyawan::whereRaw('LOWER(nama_karyawan) LIKE LOWER(?)', ["%{$search}%"])
                               ->orWhereRaw('LOWER(jabatan) LIKE LOWER(?)', ["%{$search}%"])
                               ->orWhereRaw('LOWER(alamat) LIKE LOWER(?)', ["%{$search}%"])
                               ->orWhereRaw('LOWER(nomor_telepon) LIKE LOWER(?)', ["%{$search}%"])
                               ->get();
        } else {
            $karyawan = Karyawan::all();
        }
        
        return view('karyawan.index', compact('karyawan', 'search'));
    }

    public function create()
    {
        return view('karyawan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_karyawan' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'alamat' => 'required|string',
            'nomor_telepon' => 'required|string|max:20',
        ]);

        Karyawan::create($request->all());

        return redirect()->route('karyawan.index')->with('success', 'Data karyawan berhasil ditambahkan.');
    }

    public function show($id)
    {
        try{
            $karyawan = Karyawan::findOrFail($id);
            return view('karyawan.show', compact('karyawan'));
        }catch (\Exception $e) {
            return redirect()->route('karyawan.index')->with('error', 'Data Karyawan tidak ditemukan.');   
        }  
    }

    public function edit($id)
    {
        $karyawan = Karyawan::findOrFail($id);
        return view('karyawan.edit', compact('karyawan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_karyawan' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'alamat' => 'required|string',
            'nomor_telepon' => 'required|string|max:20',
        ]);

        $karyawan = Karyawan::findOrFail($id);
        $karyawan->update($request->all());

        return redirect()->route('karyawan.index')->with('success', 'Data karyawan berhasil diperbarui.');
    }

    public function confirmDelete($id)
    {
        $karyawan = Karyawan::findOrFail($id);
        return view('karyawan.confirmDelete', compact('karyawan'));
    }

    public function destroy($id)
    {
        $karyawan = Karyawan::findOrFail($id);
        $karyawan->delete();

        return redirect()->route('karyawan.index')->with('success', 'Data karyawan berhasil dihapus.');
    }
}
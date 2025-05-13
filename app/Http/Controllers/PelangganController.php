<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pelanggan = Pelanggan::all();
        return view('pelanggan.index', compact('pelanggan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Get list of karyawan for dropdown
        $karyawan = DB::table('karyawan')->select('id', 'nama')->get();
        return view('pelanggan.create', compact('karyawan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'ID_PELANGGAN' => 'required|integer|unique:pelanggan,ID_PELANGGAN',
            'NAMA_PELANGGAN' => 'required|string|max:255',
            'ALAMAT' => 'required|string|max:255',
            'NOMOR_TELEPON' => 'required|numeric',
            'RIWAYAT_PEMBELIAN' => 'required|string|max:255',
            'ID_KARYAWAN' => 'required|integer|exists:karyawan,id',
        ]);

        Pelanggan::create($request->all());

        return redirect()->route('pelanggan.index')
            ->with('success', 'Pelanggan berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        return view('pelanggan.show', compact('pelanggan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        $karyawan = DB::table('karyawan')->select('id', 'nama')->get();
        return view('pelanggan.edit', compact('pelanggan', 'karyawan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'NAMA_PELANGGAN' => 'required|string|max:255',
            'ALAMAT' => 'required|string|max:255',
            'NOMOR_TELEPON' => 'required|numeric',
            'RIWAYAT_PEMBELIAN' => 'required|string|max:255',
            'ID_KARYAWAN' => 'required|integer|exists:karyawan,id',
        ]);

        $pelanggan = Pelanggan::findOrFail($id);
        $pelanggan->update($request->all());

        return redirect()->route('pelanggan.index')
            ->with('success', 'Data pelanggan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($pelanggan)
    {
        $pelanggan = Pelanggan::findOrFail($pelanggan);
        $pelanggan->delete();

        return redirect()->route('pelanggan.index')
            ->with('success', 'Pelanggan berhasil dihapus.');
    }
}
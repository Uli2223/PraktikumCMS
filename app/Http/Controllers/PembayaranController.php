<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembayaran;
use App\Models\Pelanggan;
use App\Models\Produk;
use App\Models\Karyawan;
use Illuminate\Support\Facades\DB;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $pembayaran = Pembayaran::with(['pelanggan', 'karyawan', 'produk'])
                          ->orderBy('id_pembayaran', 'asc')
                          ->get();
            
            return view('pembayaran.index', compact('pembayaran'));
        } catch (\Exception $e) {
            return redirect()->back()
                   ->with('error', 'Error koneksi database: ' . $e->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pelanggan = Pelanggan::all();
        $produk = Produk::whereNull('id_pembayaran')->get();
        $karyawan = Karyawan::all();
        
        return view('pembayaran.create', compact('pelanggan', 'produk', 'karyawan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'metode_pembayaran' => 'required|string|max:50',
            'id_pelanggan' => 'required|exists:pelanggan,id_pelanggan',
            'id_karyawan' => 'required|exists:karyawan,id_karyawan',
            'produk_ids' => 'required|array',
            'produk_ids.*' => 'exists:produk,id_produk'
        ]);

        DB::beginTransaction();
        try {
            $pembayaran = Pembayaran::create([
                'metode_pembayaran' => $request->metode_pembayaran,
                'id_pelanggan' => $request->id_pelanggan,
                'id_karyawan' => $request->id_karyawan,
                'jumlah_pembayaran' => 0
            ]);

            // Attach products
            Produk::whereIn('id_produk', $request->produk_ids)
                ->update(['id_pembayaran' => $pembayaran->id_pembayaran]);
            
            // Calculate total
            $total = Produk::where('id_pembayaran', $pembayaran->id_pembayaran)->sum('harga');
            $pembayaran->update(['jumlah_pembayaran' => $total]);

            DB::commit();
            return redirect()->route('pembayaran.index')
                ->with('success', 'Pembayaran berhasil ditambahkan');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()
                ->with('error', 'Gagal menambahkan pembayaran: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $pembayaran = Pembayaran::with(['pelanggan', 'karyawan', 'produk'])
                          ->findOrFail($id);
            
            $totalPembayaran = $pembayaran->produk->sum('harga');
            
            return view('pembayaran.show', compact('pembayaran', 'totalPembayaran'));
        } catch (\Exception $e) {
            return redirect()->route('pembayaran.index')
                   ->with('error', 'Data pembayaran tidak ditemukan');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        try {
            $pembayaran = Pembayaran::with(['produk'])->findOrFail($id);
            $pelanggan = Pelanggan::all();
            $karyawan = Karyawan::all();
            $produk = Produk::whereNull('id_pembayaran')
                      ->orWhere('id_pembayaran', $id)
                      ->get();
            
            return view('pembayaran.edit', compact('pembayaran', 'pelanggan', 'karyawan', 'produk'));
        } catch (\Exception $e) {
            return redirect()->route('pembayaran.index')
                   ->with('error', 'Pembayaran tidak ditemukan');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'metode_pembayaran' => 'required|string|max:50',
            'id_pelanggan' => 'required|exists:pelanggan,id_pelanggan',
            'id_karyawan' => 'required|exists:karyawan,id_karyawan',
            'produk_ids' => 'sometimes|array',
            'produk_ids.*' => 'exists:produk,id_produk'
        ]);

        DB::beginTransaction();
        try {
            $pembayaran = Pembayaran::findOrFail($id);
            
            $pembayaran->update([
                'metode_pembayaran' => $request->metode_pembayaran,
                'id_pelanggan' => $request->id_pelanggan,
                'id_karyawan' => $request->id_karyawan
            ]);

            if ($request->has('produk_ids')) {
                // Remove old products
                Produk::where('id_pembayaran', $id)
                      ->update(['id_pembayaran' => null]);
                
                // Add new products
                Produk::whereIn('id_produk', $request->produk_ids)
                      ->update(['id_pembayaran' => $id]);
                
                // Update total
                $total = Produk::where('id_pembayaran', $id)->sum('harga');
                $pembayaran->update(['jumlah_pembayaran' => $total]);
            }

            DB::commit();
            return redirect()->route('pembayaran.index')
                   ->with('success', 'Pembayaran berhasil diperbarui');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()
                   ->with('error', 'Gagal memperbarui pembayaran: ' . $e->getMessage());
        }
    }

    /**
     * Show confirmation before deleting.
     */
    public function confirmDelete($id)
    {
        try {
            $pembayaran = Pembayaran::findOrFail($id);
            return view('pembayaran.confirmDelete', compact('pembayaran'));
        } catch (\Exception $e) {
            return redirect()->route('pembayaran.index')
                   ->with('error', 'Pembayaran tidak ditemukan');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $pembayaran = Pembayaran::findOrFail($id);
            
            // Remove product relations first
            $pembayaran->produk()->update(['id_pembayaran' => null]);
            
            $pembayaran->delete();
            
            DB::commit();
            return redirect()->route('pembayaran.index')
                   ->with('success', 'Pembayaran berhasil dihapus');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()
                   ->with('error', 'Gagal menghapus pembayaran: ' . $e->getMessage());
        }
    }
}
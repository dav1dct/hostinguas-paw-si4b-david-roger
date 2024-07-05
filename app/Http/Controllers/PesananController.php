<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Pesanan;
use App\Models\Barang;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pesanan = Pesanan::with('barang')->get();
        return view('pesanan.index', compact('pesanan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        if ($request->user()->cannot('create', Pesanan::class)) {
            abort(403);
        }

        $barang = Barang::all();
        return view('pesanan.create', compact('barang'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    if ($request->user()->cannot('create', Pesanan::class)) {
        abort(403);
    }

    $request->validate([
        'nama' => 'required|string|max:255',
        'barang_id' => 'required|exists:barangs,id',
        'tanggal_pesanan' => 'required|date',
        'total_pesanan' => 'required|numeric',
    ]);

    // Create the Pesanan
    Pesanan::create([
        'nama' => $request->input('nama'),
        'barang_id' => $request->input('barang_id'),
        'tanggal_pesanan' => $request->input('tanggal_pesanan'),
        'total_pesanan' => $request->input('total_pesanan'),
    ]);



    $barang = Barang::find($request->barang_id);
    if ($request->total_pesanan > $barang->stock) {
        return redirect()->back()->withErrors(['total_pesanan' => 'Jumlah pesanan melebihi stok yang tersedia']);
    }

    $barang->stock -= $request->input('total_pesanan');
    $barang->save();
    
    return redirect()->route('pesanan.index')->with('success', 'Pesanan berhasil dibuat.');
}
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pesanan $pesanan)
    {
        $barang = Barang::all();
        return view('pesanan.edit', compact('pesanan', 'barang'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pesanan $pesanan)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'barang_id' => 'required|exists:barangs,id',
            'tanggal_pesanan' => 'required|date',
            'total_pesanan' => 'required|numeric',
        ]);
        $barang = Barang::findOrFail($request->barang_id);
        $perbedaanPesanan = $request->total_pesanan - $pesanan->total_pesanan;
        if ($perbedaanPesanan > 0 && $perbedaanPesanan > $barang->stock) {
            return redirect()->back()->withErrors(['total_pesanan' => 'Jumlah pesanan melebihi stok yang tersedia']);
        }
        $barang->stock -= $perbedaanPesanan;
        $barang->save();
        
        $barang = Barang::find($request->barang_id);
        if ($request->total_pesanan > $barang->stock) {
            return redirect()->back()->withErrors(['total_pesanan' => 'Jumlah pesanan melebihi stok yang tersedia']);
        }
        
        $pesanan->update($request->all());
        return redirect()->route('pesanan.index')->with('success', 'Pesanan berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pesanan $pesanan)
    {
        $pesanan->delete();
        return redirect()->route('pesanan.index')->with('success', 'Pesanan berhasil dihapus.');
    }
}

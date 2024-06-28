<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Pesanan;
use App\Models\Barang;
use App\Models\Pembeli;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pesanan = Pesanan::with('pembeli', 'barang')->get();
        return view('pesanan.index', compact('pesanan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pembeli = Pembeli::all();
        $barang = Barang::all();
        return view('pesanan.create', compact('pembeli', 'barang'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'pembeli_id' => 'required|exists:pembelis,id',
            'barang_id' => 'required|exists:barangs,id',
            'tanggal_pesanan' => 'required|date',
            'total_pesanan' => 'required|numeric',
        ]);

        Pesanan::create($request->all());
        return redirect()->route('pesanan.index')->with('success', 'Pesanan berhasil dibuat.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pesanan $pesanan)
    {
        $pembeli = Pembeli::all();
        $barang = Barang::all();
        return view('pesanan.edit', compact('pesanan', 'pembeli', 'barang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pesanan $pesanan)
    {
        $request->validate([
            'pembeli_id' => 'required|exists:pembelis,id',
            'barang_id' => 'required|exists:barangs,id',
            'tanggal_pesanan' => 'required|date',
            'total_pesanan' => 'required|numeric',
        ]);

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

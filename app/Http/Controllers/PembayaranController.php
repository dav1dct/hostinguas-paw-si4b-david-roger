<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Pesanan;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pembayaran = Pembayaran::with('pesanan')->get();
        return view('pembayaran.index', compact('pembayaran'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        if ($request->user()->cannot('create', Pembayaran::class)) {
            abort(403);
        }

        $pesanan = Pesanan::with('pembeli')->get();
        return view('pembayaran.create', compact('pesanan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->user()->cannot('create', Pembayaran::class)) {
            abort(403);
        }

        $imageName = time().'.'.$request->url_foto->extension();  
        $request->url_foto->move(public_path('images'), $imageName);

        Pembayaran::create([
            'pesanan_id' => $request->pesanan_id,
            'jumlah' => $request->jumlah,
            'harga' => $request->harga,
            'url_foto' => $imageName,
        ]);
        return redirect()->route('pembayaran.index')->with('success', 'Pembayaran berhasil dibuat.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Pembayaran $pembayaran)
    {
        if ($request->user()->cannot('update', $pembayaran)) {
            abort(403);
        }

        $pesanan = Pesanan::all();
        return view('pembayaran.edit', compact('pembayaran', 'pesanan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pembayaran $pembayaran)
    {
        if ($request->user()->cannot('update', $pembayaran)) {
            abort(403);
        }

        $request->validate([
            'pesanan_id' => 'required|exists:pesanans,id',
            'jumlah' => 'required|numeric',
            'harga' => 'required',
            'url_foto' => 'required',
        ]);

        $pembayaran->update($request->all());
        return redirect()->route('pembayaran.index')->with('success', 'Pembayaran berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Pembayaran $pembayaran)
    {
        if ($request->user()->cannot('delete', $pembayaran)) {
            abort(403);
        }

        $pembayaran->delete();
        return redirect()->route('pembayaran.index')->with('success', 'Pembayaran berhasil dihapus.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Pembeli;
use Illuminate\Http\Request;

class PembeliController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pembeli = Pembeli::all();
        return view('pembeli.index', compact('pembeli'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pembeli.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email|',
            'hp' => 'required',
            'alamat' => 'required',
        ]);

        Pembeli::create($request->all());
        return redirect()->route('pembeli.index')->with('success', 'Pembeli berhasil dibuat.');
    }
    /**
     * Display the specified resource.
     */
    public function show(pembeli $pembeli)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(pembeli $pembeli)
    {
        return view('pembeli.edit', compact('pembeli'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, pembeli $pembeli)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email|',
            'hp' => 'required',
            'alamat' => 'required',
        ]);

        $pembeli->update($request->all());
        return redirect()->route('pembeli.index')->with('success', 'Pembeli berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(pembeli $pembeli)
    {
        $pembeli->delete();
        return redirect()->route('pembeli.index')->with('success', 'Pembeli berhasil dihapus.');
    }
}

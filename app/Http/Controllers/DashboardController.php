<?php

namespace App\Http\Controllers;
use App\Models\Barang;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $barang = Barang::all();
        $stokCategories = $barang->pluck('nama')->toArray();
        $stokBarangs = $barang->pluck('stock')->toArray();
        return view('dashboard.dashboard', compact('stokCategories', 'stokBarangs'));
    }
}
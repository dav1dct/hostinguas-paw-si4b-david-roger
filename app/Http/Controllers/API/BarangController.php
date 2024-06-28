<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BarangController extends Controller
{
    public function index()
    {
        $barang = Barang::all();
        if ($barang->isEmpty()) {
            $response['message'] = 'Tidak ada barang yang ditemukan.';
            $response['success'] = false;
            return response()->json($response, Response::HTTP_NOT_FOUND);
        }

        $response['success'] = true;
        $response['message'] = 'Barang ditemukan.';
        $response['data'] = $barang;
        return response()->json($response, Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'nama' => 'required|max:255',
            'deskripsi' => 'nullable',
            'harga' => 'required|numeric',
            'stock' => 'required|numeric',
        ]);

        $barang = Barang::create($validate);
        if ($barang) {
            $response['success'] = true;
            $response['message'] = 'Barang berhasil ditambahkan.';
            return response()->json($response, Response::HTTP_CREATED);
        }
    }

    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'nama' => 'required|max:255',
            'deskripsi' => 'nullable',
            'harga' => 'required|numeric',
            'stock' => 'required|numeric',
        ]);

        Barang::where('id', $id)->update($validate);
        $response['success'] = true;
        $response['message'] = 'Barang berhasil diperbarui.';
        return response()->json($response, Response::HTTP_OK);
    }

    public function destroy($id)
    {
        $barang = Barang::where('id', $id);
        if ($barang->exists()) {
            $barang->delete();
            $response['success'] = true;
            $response['message'] = 'Barang berhasil dihapus.';
            return response()->json($response, Response::HTTP_OK);
        } else {
            $response['success'] = false;
            $response['message'] = 'Barang tidak ditemukan.';
            return response()->json($response, Response::HTTP_NOT_FOUND);
        }
    }
}
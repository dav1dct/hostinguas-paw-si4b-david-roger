<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Pesanan;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PesananController extends Controller
{
    public function index()
    {
        $pesanan = Pesanan::all();
        if ($pesanan->isEmpty()) {
            $response['message'] = 'Tidak ada pesanan yang ditemukan.';
            $response['success'] = false;
            return response()->json($response, Response::HTTP_NOT_FOUND);
        }

        $response['success'] = true;
        $response['message'] = 'Pesanan ditemukan.';
        $response['data'] = $pesanan;
        return response()->json($response, Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'pembeli_id' => 'required|exists:pembelis,id',
            'barang_id' => 'required|exists:barangs,id',
            'tanggal_pesanan' => 'required|date',
            'total_pesanan' => 'required|numeric',
        ]);

        $pesanan = Pesanan::create($validate);
        if ($pesanan) {
            $response['success'] = true;
            $response['message'] = 'Pesanan berhasil ditambahkan.';
            return response()->json($response, Response::HTTP_CREATED);
        }
    }

    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'pembeli_id' => 'required|exists:pembelis,id',
            'barang_id' => 'required|exists:barangs,id',
            'tanggal_pesanan' => 'required|date',
            'total_pesanan' => 'required|numeric',
        ]);

        Pesanan::where('id', $id)->update($validate);
        $response['success'] = true;
        $response['message'] = 'pesanan berhasil diperbarui.';
        return response()->json($response, Response::HTTP_OK);
    }

    public function destroy($id)
    {
        $pesanan = Pesanan::where('id', $id);
        if ($pesanan->exists()) {
            $pesanan->delete();
            $response['success'] = true;
            $response['message'] = 'Pesanan berhasil dihapus.';
            return response()->json($response, Response::HTTP_OK);
        } else {
            $response['success'] = false;
            $response['message'] = 'Pesanan tidak ditemukan.';
            return response()->json($response, Response::HTTP_NOT_FOUND);
        }
    }
}

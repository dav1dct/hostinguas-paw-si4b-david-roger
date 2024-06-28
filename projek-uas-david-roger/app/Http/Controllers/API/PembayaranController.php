<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PembayaranController extends Controller
{
    public function index()
    {
        $pembayaran = Pembayaran::all();
        if ($pembayaran->isEmpty()) {
            $response['message'] = 'Tidak ada pembayaran yang ditemukan.';
            $response['success'] = false;
            return response()->json($response, Response::HTTP_NOT_FOUND);
        }

        $response['success'] = true;
        $response['message'] = 'pembayaran ditemukan.';
        $response['data'] = $pembayaran;
        return response()->json($response, Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'pesanan_id' => 'required|exists:pesanans,id',
            'jumlah' => 'required|numeric',
            'harga' => 'required',
            'url_foto' => 'required',
        ]);

        $pembayaran = Pembayaran::create($validate);
        if ($pembayaran) {
            $response['success'] = true;
            $response['message'] = 'Pembayaran berhasil ditambahkan.';
            return response()->json($response, Response::HTTP_CREATED);
        }
    }

    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'pesanan_id' => 'required|exists:pesanans,id',
            'jumlah' => 'required|numeric',
            'harga' => 'required',
            'url_foto' => 'required',
        ]);

        Pembayaran::where('id', $id)->update($validate);
        $response['success'] = true;
        $response['message'] = 'Pembayaran berhasil diperbarui.';
        return response()->json($response, Response::HTTP_OK);
    }

    public function destroy($id)
    {
        $pembayaran = Pembayaran::where('id', $id);
        if ($pembayaran->exists()) {
            $pembayaran->delete();
            $response['success'] = true;
            $response['message'] = 'Pembayaran berhasil dihapus.';
            return response()->json($response, Response::HTTP_OK);
        } else {
            $response['success'] = false;
            $response['message'] = 'Pembayaran tidak ditemukan.';
            return response()->json($response, Response::HTTP_NOT_FOUND);
        }
    }
}

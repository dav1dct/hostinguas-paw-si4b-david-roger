<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Pembeli;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PembeliController extends Controller
{
    public function index()
    {
        $pembeli = Pembeli::all();
        if ($pembeli->isEmpty()) {
            $response['message'] = 'Tidak ada pembeli yang ditemukan.';
            $response['success'] = false;
            return response()->json($response, Response::HTTP_NOT_FOUND);
        }

        $response['success'] = true;
        $response['message'] = 'Pembeli ditemukan.';
        $response['data'] = $pembeli;
        return response()->json($response, Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'nama' => 'required',
            'email' => 'required|email|',
            'hp' => 'required',
            'alamat' => 'required',
        ]);

        $pembeli = Pembeli::create($validate);
        if ($pembeli) {
            $response['success'] = true;
            $response['message'] = 'Pembeli berhasil ditambahkan.';
            return response()->json($response, Response::HTTP_CREATED);
        }
    }

    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'nama' => 'required',
            'email' => 'required|email|',
            'hp' => 'required',
            'alamat' => 'required',
        ]);

        Pembeli::where('id', $id)->update($validate);
        $response['success'] = true;
        $response['message'] = 'Pembeli berhasil diperbarui.';
        return response()->json($response, Response::HTTP_OK);
    }

    public function destroy($id)
    {
        $pembeli = Pembeli::where('id', $id);
        if ($pembeli->exists()) {
            $pembeli->delete();
            $response['success'] = true;
            $response['message'] = 'Pembeli berhasil dihapus.';
            return response()->json($response, Response::HTTP_OK);
        } else {
            $response['success'] = false;
            $response['message'] = 'Pembeli tidak ditemukan.';
            return response()->json($response, Response::HTTP_NOT_FOUND);
        }
    }
}

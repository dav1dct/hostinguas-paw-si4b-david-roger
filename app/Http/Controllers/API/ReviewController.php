<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::all();
        if ($reviews->isEmpty()) {
            $response['message'] = 'Tidak ada review yang ditemukan.';
            $response['success'] = false;
            return response()->json($response, Response::HTTP_NOT_FOUND);
        }

        $response['success'] = true;
        $response['message'] = 'Review ditemukan.';
        $response['data'] = $reviews;
        return response()->json($response, Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'hp' => 'required',
            'review' => 'required',
        ]);

        $review = Review::create($validate);
        if ($review) {
            $response['success'] = true;
            $response['message'] = 'Review berhasil ditambahkan.';
            return response()->json($response, Response::HTTP_CREATED);
        }
    }

    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'hp' => 'required',
            'review' => 'required',
        ]);

        Review::where('id', $id)->update($validate);
        $response['success'] = true;
        $response['message'] = 'Review berhasil diperbarui.';
        return response()->json($response, Response::HTTP_OK);
    }

    public function destroy($id)
    {
        $review = Review::where('id', $id);
        if ($review->exists()) {
            $review->delete();
            $response['success'] = true;
            $response['message'] = 'Review berhasil dihapus.';
            return response()->json($response, Response::HTTP_OK);
        } else {
            $response['success'] = false;
            $response['message'] = 'Review tidak ditemukan.';
            return response()->json($response, Response::HTTP_NOT_FOUND);
        }
    }
}

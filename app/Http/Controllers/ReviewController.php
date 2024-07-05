<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $review = Review::all();
        return view('review.index', compact('review'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        if ($request->user()->cannot('create', Review::class)) {
            abort(403);
        }

        return view('review.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->user()->cannot('create', review::class)) {
            abort(403);
        }

        $request->validate([
            'nama' => 'required',
            'email' => 'required|email|',
            'hp' => 'required',
            'review' => 'required',
        ]);

        Review::create($request->all());
        return redirect()->route('review.index')->with('success', 'Review berhasil dibuat.');
    }

    /**
     * Display the specified resource.
     */
    public function show(review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, review $review)
    {
        if ($request->user()->cannot('update', $review)) {
            abort(403);
        }

        return view('review.edit', compact('review'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, review $review)
    {
        if ($request->user()->cannot('update', $review)) {
            abort(403);
        }

        $request->validate([
            'nama' => 'required',
            'email' => 'required|email|',
            'hp' => 'required',
            'review' => 'required',
        ]);

        $review->update($request->all());
        return redirect()->route('review.index')->with('success', 'Review berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, review $review)
    {
        if ($request->user()->cannot('delete', $review)) {
            abort(403);
        }

        $review->delete();
        return redirect()->route('review.index')->with('success', 'Review berhasil dihapus.');
    }
}

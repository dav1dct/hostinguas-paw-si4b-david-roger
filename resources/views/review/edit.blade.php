@extends('layout.main')

@section('title', 'Edit Review')

@section('content')
<div class="container">
    <h1>Edit Review</h1>
    <form action="{{ route('review.update', $review->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" name="nama" id="nama" class="form-control" value="{{ $review->nama }}" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ $review->email }}" required>
        </div>
        <div class="mb-3">
            <label for="hp" class="form-label">Nomor HP</label>
            <input type="text" name="hp" id="hp" class="form-control" value="{{ $review->hp }}" required>
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Ulasan</label>
            <input type="text" name="alamat" id="alamat" class="form-control" value="{{ $review->alamat }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection

@extends('layout.main')

@section('title', 'Buat Review')

@section('content')
<div class="container">
    <h1>Tambah Review</h1>
    <form action="{{ route('review.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" name="nama" id="nama" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="hp" class="form-label">Nomor HP</label>
            <input type="text" name="hp" id="hp" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Ulasan</label>
            <input type="text" name="alamat" id="alamat" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection

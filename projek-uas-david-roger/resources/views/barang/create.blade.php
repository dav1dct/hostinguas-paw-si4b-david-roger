@extends('layout.main')

@section('title','Barang')

@section('content')
<div class="container">
    <h1>Tambah Barang</h1>
    <form action="{{ route('barang.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nama">Nama Barang</label>
            <input type="text" class="form-control" id="nama" name="nama" required>
        </div>
        <div class="form-group">
            <label for="deskripsi">Deskripsi Barang</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi"></textarea>
        </div>
        <div class="form-group">
            <label for="harga">Harga Barang</label>
            <input type="number" class="form-control" id="harga" name="harga" step="0.01" required>
        </div>
        <div class="form-group">
            <label for="stock">Jumlah Stok</label>
            <input type="number" class="form-control" id="stock" name="stock" step="0.01" required>
        </div>
        <button type="submit" class="btn btn-primary btn-success">Simpan</button>
    </form>
</div>
@endsection

@extends('layout.main')

@section('title','Barang')

@section('content')
<div class="container">
    <h1>Ubah Barang</h1>
    <form action="{{ route('barang.update', $barang->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nama">Nama Barang</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{ $barang->nama }}" required>
        </div>
        <div class="form-group">
            <label for="deskripsi">Deskripsi Barang</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi">{{ $barang->deskripsi }}</textarea>
        </div>
        <div class="form-group">
            <label for="harga">Harga</label>
            <input type="number" class="form-control" id="harga" name="harga" value="{{ $barang->harga }}" step="0.01" required>
        </div>
        <div class="form-group">
            <label for="stock">Jumlah Stok</label>
            <input type="number" class="form-control" id="stock" name="stock" value="{{ $barang->stock }}" step="0.01" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
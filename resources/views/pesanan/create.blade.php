@extends('layout.main')

@section('title', 'Buat Pesanan')

@section('content')
<div class="container">
    <h1>Tambah Pesanan</h1>
    <form action="{{ route('pesanan.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Pembeli</label>
            <input type="text" name="nama" id="nama" class="form-control" required>
            @error('nama')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="barang_id" class="form-label">Barang</label>
            <select name="barang_id" id="barang_id" class="form-select">
                <option value="">Pilih Barang</option>
                @foreach ($barang as $item)
                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                @endforeach
            </select>
            @error('barang_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="tanggal_pesanan" class="form-label">Tanggal Pesanan</label>
            <input type="date" name="tanggal_pesanan" id="tanggal_pesanan" class="form-control">
            @error('tanggal_pesanan')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="total_pesanan" class="form-label">Total Pesanan</label>
            <input type="number" name="total_pesanan" id="total_pesanan" class="form-control">
            @error('total_pesanan')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection

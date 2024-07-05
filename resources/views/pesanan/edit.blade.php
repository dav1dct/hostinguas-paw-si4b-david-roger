@extends('layout.main')

@section('title', 'Edit Pesanan')

@section('content')
<div class="container">
    <h1>Edit Pesanan</h1>
    <form action="{{ route('pesanan.update', $pesanan->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Pembeli</label>
            <input type="text" name="nama" id="nama" class="form-control" value="{{ old('nama', $pesanan->nama) }}" required>
            @error('nama')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="barang_id" class="form-label">Barang</label>
            <select name="barang_id" id="barang_id" class="form-select" disabled>
                <option value="">Pilih Barang</option>
                @foreach ($barang as $item)
                    <option value="{{ $item->id }}" {{ $pesanan->barang_id == $item->id ? 'selected' : '' }}>
                        {{ $item->nama }}
                    </option>
                @endforeach
            </select>
            <input type="hidden" name="barang_id" value="{{ $pesanan->barang_id }}">
            @error('barang_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="tanggal_pesanan" class="form-label">Tanggal Pesanan</label>
            <input type="date" name="tanggal_pesanan" id="tanggal_pesanan" class="form-control" value="{{ old('tanggal_pesanan', $pesanan->tanggal_pesanan) }}" required>
            @error('tanggal_pesanan')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="total_pesanan" class="form-label">Total Pesanan</label>
            <input type="number" name="total_pesanan" id="total_pesanan" class="form-control" value="{{ old('total_pesanan', $pesanan->total_pesanan) }}" required>
            @error('total_pesanan')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection

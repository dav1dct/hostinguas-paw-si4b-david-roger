@extends('layout.main')

@section('title', 'Tambah Pembayaran')

@section('content')
<div class="container">
    <h2>Tambah Pembayaran</h2>
    <form action="{{ route('pembayaran.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="pesanan_id" class="form-label">Pesanan</label>
            <select name="pesanan_id" id="pesanan_id" class="form-control">
                <option value="">Pilih Pesanan</option>
                @foreach ($pesanan as $item)
                    <option value="{{ $item->id }}">{{ $item->barang->nama }}</option>
                @endforeach
            </select>
            @error('pesanan_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="text" name="harga" id="harga" class="form-control" value="{{ old('harga') }}">
            @error('harga')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="url_foto">Bukti Pembayaran</label>
            <input type="file" class="form-control" name="url_foto">
            @error('url_foto')
                <span class="text-danger">{{ $message }}</span> 
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection

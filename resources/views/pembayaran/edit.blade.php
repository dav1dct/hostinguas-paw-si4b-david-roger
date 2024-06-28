@extends('layout.main')

@section('title', 'Edit Pembayaran')

@section('content')
<div class="container">
    <h2>Edit Pembayaran</h2>
    <form action="{{ route('pembayaran.update', $pembayaran->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="pesanan_id" class="form-label">Pesanan</label>
            <select name="pesanan_id" id="pesanan_id" class="form-control">
                <option value="">Pilih Pesanan</option>
                @foreach ($pesanan as $p)
                    <option value="{{ $p->id }}" {{ $p->id == $pembayaran->pesanan_id ? 'selected' : '' }}>
                        {{ $p->pembeli->nama }} - {{ $p->barang->nama }}
                    </option>
                @endforeach
            </select>
            @error('pesanan_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="jumlah" class="form-label">Jumlah</label>
            <input type="number" name="jumlah" id="jumlah" class="form-control" value="{{ old('jumlah', $pembayaran->jumlah) }}">
            @error('jumlah')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="text" name="harga" id="harga" class="form-control" value="{{ old('harga', $pembayaran->harga) }}">
            @error('harga')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="url_foto">Url Foto</label>
            <input type="file" class="form-control" name="url_foto">
            @error('url_foto')
                <span class="text-danger">{{$message}}</span> 
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection

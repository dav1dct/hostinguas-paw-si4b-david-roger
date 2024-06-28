@extends('layout.main')

@section('title', 'Edit Pesanan')

@section('content')
<div class="container">
    <h1>Edit Pesanan</h1>
    <form action="{{ route('pesanan.update', $pesanan->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="pembeli_id" class="form-label">Pembeli</label>
            <select name="pembeli_id" id="pembeli_id" class="form-select" disabled>
                <option value="">Pilih Pembeli</option>
                @foreach ($pembeli as $p)
                    <option value="{{ $p->id }}" {{ $pesanan->pembeli_id == $p->id ? 'selected' : '' }}>
                        {{ $p->nama }}
                    </option>
                @endforeach
            </select>
            <input type="hidden" name="pembeli_id" value="{{ $pesanan->pembeli_id }}">
        </div>
        <div class="mb-3">
            <label for="barang_id" class="form-label">Barang</label>
            <select name="barang_id" id="barang_id" class="form-select" disabled>
                <option value="">Pilih Barang</option>
                @foreach ($barang as $b)
                    <option value="{{ $b->id }}" {{ $pesanan->barang_id == $b->id ? 'selected' : '' }}>
                        {{ $b->nama }}
                    </option>
                @endforeach
            </select>
            <input type="hidden" name="barang_id" value="{{ $pesanan->barang_id }}">
        </div>
        <div class="mb-3">
            <label for="tanggal_pesanan" class="form-label">Tanggal Pesanan</label>
            <input type="date" name="tanggal_pesanan" id="tanggal_pesanan" class="form-control" value="{{ $pesanan->tanggal_pesanan }}">
        </div>
        <div class="mb-3">
            <label for="total_pesanan" class="form-label">Total Pesanan</label>
            <input type="number" name="total_pesanan" id="total_pesanan" class="form-control" value="{{ $pesanan->total_pesanan }}">
        </div>
        <button type="submit" class="btn btn-primary">Update Pesanan</button>
    </form>
</div>
@endsection

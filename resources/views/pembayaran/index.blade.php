@extends('layout.main')

@section('title','Pembayaran')

@section('content')
<div class="container">
    <h2>Daftar Pembayaran</h2>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="mb-3">
            <a href="{{ route('pembayaran.create') }}" class="btn btn-primary">Tambah Pembayaran</a>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Pesanan</th>
                <th>Jumlah</th>
                <th>Harga</th>
                <th>Bukti Pembayaran</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pembayaran as $p)
                <tr>
                    <td>{{ $p->id }}</td>
                    <td>{{ $p->pesanan->pembeli->nama }} - {{ $p->pesanan->barang->nama }}</td>
                    <td>{{ $p->jumlah }}</td>
                    <td>{{ $p->harga }}</td>
                    <td><img src="{{ url('images/'.$p["url_foto"])}}" style="width: 100px; height: auto;"></td>
                    <td>
                        @can('update', $p)
                            <a href="{{ route('pembayaran.edit', $p->id) }}" class="btn btn-warning">Edit</a>
                        @endcan
                        @can('delete', $p)
                        <form action="{{ route('pembayaran.destroy', $p->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger delete-button" data-id="{{ $p->id }}">Delete</button>
                            @endcan
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

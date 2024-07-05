@extends('layout.main')

@section('title','Pesanan')

@section('content')
<div class="container">
    <h1>Pesanan</h1>
    <a href="{{ route('pesanan.create') }}" class="btn btn-primary mb-3">Tambah Pesanan</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Pembeli</th>
                <th>Barang</th>
                <th>Tanggal Pesanan</th>
                <th>Total Pesanan</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pesanan as $p)
                <tr>
                    <td>{{ $p->id }}</td>
                    <td>{{ $p->nama }}</td>
                    <td>{{ $p->barang->nama }}</td>
                    <td>{{ $p->tanggal_pesanan }}</td>
                    <td>{{ $p->total_pesanan }}</td>
                    <td>
                        @can('update', $p)
                        <a href="{{ route('pesanan.edit', $p->id) }}" class="btn btn-warning">Edit</a>
                        @endcan

                        @can('delete', $p) 
                        <form action="{{ route('pesanan.destroy', $p->id) }}" method="POST" style="display:inline-block;">
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

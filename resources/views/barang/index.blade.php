@extends('layout.main')

@section('title','Barang')

@section('content')
<div class="container">
    <h1>Daftar Barang</h1>
    @can('create', App\Models\Barang::class)
        <a href="{{ route('barang.create') }}" class="btn btn-primary">Tambah Barang</a>
    @endcan
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID Barang</th>
                <th>Nama Barang</th>
                <th>Deskripsi Barang</th>
                <th>Harga</th>
                <th>Stok</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($barang as $barang)
                <tr>
                    <td>{{ $barang->id }}</td>
                    <td>{{ $barang->nama }}</td>
                    <td>{{ $barang->deskripsi }}</td>
                    <td>{{ $barang->harga }}</td>
                    <td>{{ $barang->stock }}</td>
                    <td>
                        @can('update', $barang)
                            <a href="{{ route('barang.edit', $barang->id) }}" class="btn btn-warning">Edit</a>
                        @endcan

                        @can('delete', $barang)
                        <form id="delete-form-{{ $barang->id }}" action="{{ route('barang.destroy', $barang->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                            <button type="submit" class="btn btn-danger delete-button">Delete</button>
                        @endcan
                        
                    </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
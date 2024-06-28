@extends('layout.main')

@section('title', 'Daftar Pembeli')

@section('content')
<div class="container">
    <h1>Daftar Pembeli</h1>
    <a href="{{ route('pembeli.create') }}" class="btn btn-primary mb-3">Tambah Pembeli</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Nomor HP</th>
                <th>Alamat</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pembeli as $p)
            <tr>
            <td>{{ $loop->iteration }}</td>
                <td>{{ $p->nama }}</td>
                <td>{{ $p->email }}</td>
                <td>{{ $p->hp }}</td>
                <td>{{ $p->alamat }}</td>
                <td>
                    @can('update', $p)
                    <a href="{{ route('pembeli.edit', $p->id) }}" class="btn btn-warning">Edit</a>
                    @endcan
                    @can('delete', $p)
                    <form action="{{ route('pembeli.destroy', $p->id) }}" method="POST" style="display:inline-block;">
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

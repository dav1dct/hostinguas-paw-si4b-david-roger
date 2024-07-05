@extends('layout.main')

@section('title', 'Daftar Review')

@section('content')
<div class="container">
    <h1>Daftar Review</h1>
    <a href="{{ route('review.create') }}" class="btn btn-primary mb-3">Tambah Review</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Nomor HP</th>
                <th>Review</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($review as $p)
            <tr>
            <td>{{ $loop->iteration }}</td>
                <td>{{ $p->nama }}</td>
                <td>{{ $p->email }}</td>
                <td>{{ $p->hp }}</td>
                <td>{{ $p->alamat }}</td>
                <td>
                    @can('update', $p)
                    <a href="{{ route('review.edit', $p->id) }}" class="btn btn-warning">Edit</a>
                    @endcan
                    @can('delete', $p)
                    <form action="{{ route('review.destroy', $p->id) }}" method="POST" style="display:inline-block;">
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

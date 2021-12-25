@extends('admin_layouts.master')
@section('title', 'Struktur Organisasi - LPPM ITK')
@section('content')

<h1>Struktur Admin</h1><br>

@if(Session::has('success'))
<div class="alert alert-success" role="alert">
    {{ Session('success') }}
</div>
@endif

<div class="row">
    <div class="col-lg-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <h5 class="card-title">
                    <a href="{{ route('struktur-admin.create')}}" class="btn btn-success btn-sm">Tambah Anggota</a>
                </h5>
                <table class="mb-0 table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Jabatan</th>
                            <th>Atasan</th>
                            <th>Edit<th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $result => $hasil)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $hasil->nama}}</td>
                            <td>{{ $hasil->jabatan}}</td>
                            @foreach ($items->flatten() as $item)
                            @if($hasil->id_atasan == $item->id)
                                <td>{{ $item->nama}}</td>
                            @endif
                            @endforeach
                            <td>
                                <form action="{{ route('struktur-admin.destroy', $hasil->id) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <a href="{{ route('struktur-admin.edit', $hasil->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus {{ $hasil->nama}} dengan jabatan {{ $hasil->jabatan }}?');">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <br>
                {{ $data->links()}}
            </div>
        </div>
    </div>
</div>
@endsection
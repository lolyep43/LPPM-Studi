@extends('admin_layouts.master')
@section('title', 'Buku Ajar - LPPM ITK')
@section('content')

<h1>Buku Ajar</h1><br>

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
                    <a href="{{ route('buku-ajar.create')}}" class="btn btn-success btn-sm">Tambah Buku Ajar</a>
                </h5>
                <table class="mb-0 table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Judul</th>
                            <th>Gambar</th>
                            <th width="17%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($buku_ajar as $result => $hasil)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $hasil->judul}}</td>
                            <td><img src="{{ asset($hasil->gambar) }}" class="img-fluid" style="width:100px"></td>
                            <td>
                                <form action="{{ route('buku-ajar.destroy', $hasil->id) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <a href="{{ route('buku-ajar.isi', $hasil->slug)}}" class="btn btn-primary btn-sm" target="_blank">Lihat</a>
                                    <a href="{{ route('buku-ajar.edit', $hasil->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus berita ini?');">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <br>
                {{ $buku_ajar->links()}}
            </div>
        </div>
    </div>
</div>
@endsection
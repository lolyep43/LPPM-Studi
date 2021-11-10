@extends('admin_layouts.master')
@section('title', 'Berita - LPPM ITK')
@section('content')

<h1>Inovasi Mandiri </h1><br>

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
                    <a href="{{ route('inovasi-mandiri.create')}}" class="btn btn-success btn-sm">Tambah Data Inovasi Mandiri</a>
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
                        @foreach ($inovasi_mandiri as $result => $hasil)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $hasil->judul}}</td>
                            <td><img src="{{ asset($hasil->gambar) }}" class="img-fluid" style="width:100px"></td>
                            <td>
                                <form action="{{ route('inovasi-mandiri.destroy', $hasil->id) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <a href="{{ route('inovasi-mandiri.isi', $hasil->slug)}}" class="btn btn-primary btn-sm" target="_blank">Lihat</a>
                                    <a href="{{ route('inovasi-mandiri.edit', $hasil->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus berita ini?');">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <br>
                {{ $inovasi_mandiri->links()}}
            </div>
        </div>
    </div>
</div>
@endsection
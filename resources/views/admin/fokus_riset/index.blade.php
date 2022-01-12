@extends('admin_layouts.master')
@section('title', 'Deskripsi Fokus Riset - LPPM ITK')
@section('content')

<h1>Fokus Riset</h1><br>

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
                    <a href="{{ route('fokus-riset.create')}}" class="btn btn-success btn-sm">Tambah Fokus Riset</a>
                </h5>
                <table class="mb-0 table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Judul</th>
                            <th width="17%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($deskripsi as $result => $hasil)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $hasil->judul}}</td>
                            <td>
                                <form action="{{ route('fokus-riset.destroy', $hasil->id) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <a href="{{ route('fokus-riset.isi', $hasil->slug) }}" class="btn btn-primary btn-sm" target="_blank">Lihat</a>
                                    <a href="{{ route('fokus-riset.edit', $hasil->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus fokus riset tersebut?');">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <br>
                {{ $deskripsi->links()}}
            </div>
        </div>
    </div>
</div>
@endsection
@extends('admin_layouts.master')
@section('title', 'Halaman - LPPM ITK')
@section('content')

<h1>Halaman</h1><br>

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
                    <!-- <a href="{{ route('halaman.create')}}" class="btn btn-success btn-sm">Tambah Halaman</a> -->
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
                        @foreach ($halaman as $result => $hasil)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $hasil->judul}}</td>
                            <td>
                                <form action="{{ route('halaman.destroy', $hasil->id) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <a href="{{ route('halaman.isi', $hasil->slug)}}" class="btn btn-primary btn-sm" target="_blank">Lihat</a>
                                    <a href="{{ route('halaman.edit', $hasil->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <br>
            </div>
        </div>
    </div>
</div>
@endsection
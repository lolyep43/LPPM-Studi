@extends('admin_layouts.master')
@section('title', 'Hasil Pengabdian - LPPM ITK')
@section('content')

<h1>Hasil Pengabdian</h1><br>

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
                    <a href="{{ route('hasil-pengabdian.create')}}" class="btn btn-success btn-sm">Tambah Hasil Pengabdian</a>
                </h5>
                <table class="mb-0 table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Pengabdi</th>
                            <th>Judul</th>
                            <th>Tahun</th>
                            <th width="17%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($hasil_pengabdian as $result => $hasil)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $hasil->peneliti}}</td>
                            <td>{{ $hasil->judul}}</td>
                            <td>{{ $hasil->tahun}}</td>
                            <td>
                                <form action="{{ route('hasil-pengabdian.destroy', $hasil->id) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <a href="{{ route('hasil-pengabdian.isi', $hasil->slug) }}" class="btn btn-primary btn-sm" target="_blank">Lihat</a>
                                    <a href="{{ route('hasil-pengabdian.edit', $hasil->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus hasil pengabdian ini?');">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <br>
                {{ $hasil_pengabdian->links()}}
            </div>
        </div>
    </div>
</div>
@endsection
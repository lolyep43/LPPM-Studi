@extends('admin_layouts.master')
@section('title', 'Deskripsi Fokus Riset - LPPM ITK')
@section('content')

<h1>Deskripsi Fokus Riset</h1><br>

@if(Session::has('success'))
<div class="alert alert-success" role="alert">
    {{ Session('success') }}
</div>
@endif

<div class="row">
    <div class="col-lg-12">
        <div class="main-card mb-3 card">
            <div class="card-body">

                <table class="mb-0 table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Judul</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($deskripsi as $result => $hasil)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $hasil->judul}}</td>
                            <td>
                                <form action="{{ route('deskripsi-fokus-riset.destroy', $hasil->id) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    @if($hasil->id === 1)
                                        <a href="{{ route('energi.isi')}}" class="btn btn-warning btn-sm" target="_blank">Lihat</a>
                                        <a href="{{ route('deskripsi-fokus-riset.edit', $hasil->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                    @elseif($hasil->id === 3)
                                        <a href="{{ route('pertanian-dan-pangan.isi')}}" class="btn btn-warning btn-sm" target="_blank">Lihat</a>
                                        <a href="{{ route('deskripsi-fokus-riset.edit', $hasil->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                    @elseif($hasil->id === 4)
                                        <a href="{{ route('smart-city.isi')}}" class="btn btn-warning btn-sm" target="_blank">Lihat</a>
                                        <a href="{{ route('deskripsi-fokus-riset.edit', $hasil->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                    @elseif($hasil->id === 5)
                                        <a href="{{ route('kemaritiman.isi')}}" class="btn btn-warning btn-sm" target="_blank">Lihat</a>
                                        <a href="{{ route('deskripsi-fokus-riset.edit', $hasil->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                    @endif
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
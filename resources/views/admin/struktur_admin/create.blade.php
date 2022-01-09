@extends('admin_layouts.master')
@section('title', 'Tambah Anggota - LPPM ITK')

@section('content')

@if(count($errors)>0)
@foreach($errors->all() as $error)
<div class="alert alert-danger" role="alert">
    {{ $error }}
</div>
@endforeach
@endif

@if(Session::has('success'))
<div class="alert alert-success" role="alert">
    {{ Session('success') }}
</div>
@endif

<h1>Tambah Anggota</h1><br>
<div class="row">
    <div class="col-lg-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        
                        <form class="" action="{{ route('struktur-admin.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="position-relative form-group"><label>Nama</label><input name="nama" type="text" class="form-control"></div>
                            <div class="position-relative form-group"><label>Jabatan</label><input name="jabatan" type="text" class="form-control" value="Admin"></div>
                            <div class="position-relative form-group"><label>Atasan</label>
                                <select name="id_atasan" class="form-control">
                                    @foreach($items->flatten() as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama}}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <button class="mt-1 btn btn-primary" style="float:right">Tambah</button>
                     
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.ckeditor.com/4.14.1/basic/ckeditor.js"></script>
<script>
    CKEDITOR.replace('editor1');
    CKEDITOR.replace('editor2');
</script>

@endsection
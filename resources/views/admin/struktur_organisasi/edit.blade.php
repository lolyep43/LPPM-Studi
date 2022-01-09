@extends('admin_layouts.master')
@section('title', 'Edit Anggota - LPPM ITK')

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

<h1>Edit Anggota</h1><br>
<div class="row">
    <div class="col-lg-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        <form class="" action="{{ route('struktur-organisasi.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH ')
                            <div class="position-relative form-group">
                                <label>Nama</label>
                                <input name="nama" type="text" class="form-control" value="{{ $data->nama }}">
                            </div>
                            <div class="position-relative form-group">
                                <label>Jabatan</label>
                                <input name="jabatan" type="text" class="form-control" value="{{ $data->jabatan }}">
                            </div>
                            <div class="position-relative form-group">
                                <label>Level</label>
                                <input name="level" type="text" class="form-control" value="{{ $data->level }}">
                            </div>
                            <div class="position-relative form-group">
                                <label>Parent</label>
                                <select name="parent" class="form-control">
                                    <option value="">Pilih Parent</option>
                                    @foreach ($parent as $item)
                                        <option value="{{$item->id}}" {{$item->id == $data->parent ? "selected":""}}>[{{$item->jabatan}}] {{$item->nama}}</option>
                                    @endforeach
                                </select>
                            </div>
                    </div>
                    <div class="col-md-4">
                        <button class="mt-1 btn btn-primary" style="float:right">Update</button>
                        </form>
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
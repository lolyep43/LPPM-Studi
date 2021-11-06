@extends('admin_layouts.master')
@section('title', 'Edit Dokumen - LPPM ITK')

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

<h1>Edit Dokumen</h1><br>
<div class="row">
    <div class="col-lg-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <form class="" action="{{ route('dokumen.update', $dokumen->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH ')
                            <div class="position-relative form-group"><label>Nama Dokumen</label><input name="judul" type="text" class="form-control" value="{{ $dokumen->judul }}"></div>
                            <div class="position-relative form-group"><label>File</label><br>
                                <a href="{{ asset($dokumen->file) }}" class="img-fluid" target="_blank">{{$dokumen->judul}}</a><br><br>
                                <input name="file" type="file" class="form-control-file">
                            </div>
                            <button class="mt-1 btn btn-warning">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
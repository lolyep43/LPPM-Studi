@extends('admin_layouts.master')
@section('title', 'Tambah Dokumen - LPPM ITK')

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

<h1>Tambah Dokumen</h1><br>
<div class="row">
    <div class="col-lg-12">
        <div class="main-card mb-3 card">
            <div class="card-body">

                <div class="row">
                    <div class="col-md-12">
                        <form class="" action="{{ route('dokumen.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="position-relative form-group"><label>Nama Dokumen</label><input name="judul" type="text" class="form-control"></div>
                            <div class="position-relative form-group"><label>File</label>
                                <input name="file" type="file" class="form-control-file">
                                <small>Format file berupa .pdf atau .docx</small>
                            </div>
                            <button class="mt-1 btn btn-primary">Publish</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
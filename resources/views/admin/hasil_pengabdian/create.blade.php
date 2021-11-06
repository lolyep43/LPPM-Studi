@extends('admin_layouts.master')
@section('title', 'Tambah Hasil Pengabdian - LPPM ITK')

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

<h1>Tambah Hasil Pengabdian</h1><br>
<div class="row">
    <div class="col-lg-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <form class="" action="{{ route('hasil-pengabdian.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="position-relative form-group"><label>Pengabdi</label><input name="peneliti" type="text" class="form-control"></div>
                            <div class="position-relative form-group"><label>Judul</label><input name="judul" type="text" class="form-control"></div>
                            <div class="position-relative form-group"><label>Deskripsi</label><textarea name="deskripsi" class="form-control" id="editor1"></textarea></div>
                    </div>
                    <div class="col-md-6">
                        <div class="position-relative form-group"><label>Manfaat</label><textarea name="manfaat" class="form-control" id="editor2"></textarea></div>
                        <div class="position-relative form-group"><label>Tahun</label><input name="tahun" type="text" class="form-control"></div>
                        <div class="position-relative form-group"><label>Foto</label><input name="foto" type="file" class="form-control-file">
                        </div>
                        <button class="mt-1 btn btn-primary" style="float:right">Publish</button>
                        </form>
                        <br>
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
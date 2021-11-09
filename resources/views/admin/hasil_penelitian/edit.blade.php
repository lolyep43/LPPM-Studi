@extends('admin_layouts.master')
@section('title', 'Edit Hasil Penelitian - LPPM ITK')

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

<h1>Edit Hasil Penelitian</h1><br>
<div class="row">
    <div class="col-lg-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        <form class="" action="{{ route('hasil-penelitian.update', $hasil_penelitian->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH ')
                            <div class="position-relative form-group"><label>Peneliti</label><input name="peneliti" type="text" class="form-control" value="{{ $hasil_penelitian->peneliti }}"></div>
                            <div class="position-relative form-group"><label>Judul</label><input name="judul" type="text" class="form-control" value="{{ $hasil_penelitian->judul }}"></div>
                            <div class="position-relative form-group"><label>Deskripsi</label><textarea name="deskripsi" class="form-control" id="konten">{{ $hasil_penelitian->deskripsi }}</textarea></div>
                            <div class="position-relative form-group"><label>Manfaat</label><textarea name="manfaat" class="form-control" id="konten">{{ $hasil_penelitian->manfaat }}</textarea></div>
                    </div>
                    <div class="col-md-4">
                        <div class="position-relative form-group"><label>Tahun</label><input name="tahun" type="text" class="form-control" value="{{ $hasil_penelitian->tahun }}"></div>
                        <div class="position-relative form-group"><label>Foto</label><br>
                            <img src="{{ asset($hasil_penelitian->foto) }}" class="img-fluid" style="width:100%" target="_blank"><br><br>
                            <input name="foto" type="file" class="form-control-file">
                        </div>
                        <button class="mt-1 btn btn-primary" style="float:right">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('konten', {
        filebrowserUploadUrl: "{{route('post.image', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form',
        height: 500
    });
</script>
@endsection
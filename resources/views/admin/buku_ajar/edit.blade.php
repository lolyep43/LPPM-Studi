@extends('admin_layouts.master')
@section('title', 'Edit Buku Ajar- LPPM ITK')

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

<h1>Edit Publikasi Ilmiah</h1><br>
<div class="row">
    <div class="col-lg-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <form class="" action="{{ route('buku-ajar.update', $buku_ajar->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH ')
                            <div class="position-relative form-group"><label>Pengarang</label><input name="pengarang" type="text" class="form-control" value="{{ $buku_ajar->pengarang }}"></div>
                            <div class="position-relative form-group"><label>Judul</label><input name="judul" type="text" class="form-control" value="{{ $buku_ajar->judul }}"></div>
                            <div class="position-relative form-group"><label>Deskripsi</label><textarea name="deskripsi" class="form-control" id="konten">{{ $buku_ajar->deskripsi }}</textarea></div>  
                            
                    </div>
                    <div class="col-md-4">
                        <div class="position-relative form-group"><label>Penerbit</label><input name="penerbit" type="text" class="form-control" value="{{ $buku_ajar->penerbit }}"></div>
                        <div class="position-relative form-group"><label>Tahun Terbit</label><input name="tahun" type="text" class="form-control" value="{{ $buku_ajar->tahun }}"></div>
                        <div class="position-relative form-group"><label>Gambar</label><br>
                            <img src="{{ asset($buku_ajar->gambar) }}" class="img-fluid" style="width:100%" target="_blank"><br><br>
                            <input name="gambar" type="file" class="form-control-file">
                        </div>
                        <button class="mt-1 btn btn-primary" style="float:right">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.ckeditor.com/4.14.1/full/ckeditor.js"></script>
<script>
    CKEDITOR.replace('konten', {
        filebrowserUploadUrl: "{{route('post.image', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form',
        height: 500,
        removeButtons: 'Underline,Strike,Subscript,Superscript,Anchor,Styles,Specialchar,Print,NewPage,Replace,SelectAll,Scayt,Form,Checkbox,Radio,TexField,Textarea,Select,Button,ImageButton,HiddenField,RemoveFormat,Outdent,Indent,BidiLtr,BidiRtl,CreatePlaceHolder,CreateDiv,Iframe,Smiley,Preview,Save'
    });
</script>
@endsection
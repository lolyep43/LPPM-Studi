@extends('admin_layouts.master')
@section('title', 'Tambah Agenda - LPPM ITK')

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

<h1>Tambah Agenda</h1><br>
<div class="row">
    <div class="col-lg-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <form class="" action="{{ route('agenda.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="position-relative form-group"><label>Judul</label><input name="judul" type="text" class="form-control"></div>
                            <div class="position-relative form-group"><label>Isi</label><textarea name="konten" class="form-control" id="konten1"></textarea></div>
                            <div class="position-relative form-group"><label>Tanggal</label><input name="tanggal" type="date" class="form-control"></div>
                            <div class="position-relative form-group"><label>Jam</label><input name="jam" type="text" class="form-control"></div>
                            <div class="position-relative form-group"><label>Tempat</label><input name="tempat" type="text" class="form-control"></div>
                            <button class="mt-1 btn btn-primary">Publish</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.ckeditor.com/4.14.1/full/ckeditor.js"></script>
<script>
    CKEDITOR.replace('konten1', {
        filebrowserUploadUrl: "{{route('post.image', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form',
        height: 500,
        removeButtons: 'Underline,Strike,Subscript,Superscript,Anchor,Styles,Specialchar,Print,NewPage,Replace,SelectAll,Scayt,Form,Checkbox,Radio,TexField,Textarea,Select,Button,ImageButton,HiddenField,RemoveFormat,Outdent,Indent,BidiLtr,BidiRtl,CreatePlaceHolder,CreateDiv,Iframe,Smiley,Preview,Save'
    });
    CKEDITOR.replace('konten2', {
        filebrowserUploadUrl: "{{route('post.image', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form',
        height: 250,
        removeButtons: 'Underline,Strike,Subscript,Superscript,Anchor,Styles,Specialchar,Print,NewPage,Replace,SelectAll,Scayt,Form,Checkbox,Radio,TexField,Textarea,Select,Button,ImageButton,HiddenField,RemoveFormat,Outdent,Indent,BidiLtr,BidiRtl,CreatePlaceHolder,CreateDiv,Iframe,Smiley,Preview,Save'
    });
</script>

@endsection
@extends('admin_layouts.master')
@section('title', 'Tambah Publikasi Ilmiah - LPPM ITK')

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

<h1>Tambah Publikasi Ilmiah</h1><br>
<div class="row">
    <div class="col-lg-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <form class="" action="{{ route('publikasi-ilmiah.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="position-relative form-group"><label>Peneliti</label><input name="peneliti" type="text" class="form-control"></div>
                            <div class="position-relative form-group"><label>Judul</label><input name="judul" type="text" class="form-control"></div>
                            <div class="position-relative form-group"><label>Fokus Riset</label>
                                <select name="fokus_riset" class="form-control">
                                    <option value="Energi">Energi</option>
                                    <option value="Pangan dan Pertanian">Pangan dan Pertanian</option>
                                    <option value="Smart City">Smart City</option>
                                    <option value="Kemaritiman">Kemaritiman</option>
                                </select>
                            <div class="position-relative form-group"><label>Deskripsi</label><textarea name="deskripsi" class="form-control" id="konten1" ></textarea></div>
                            </div>
                    </div>


                    <div class="col-md-6">
                        <div class="position-relative form-group"><label>Manfaat</label><textarea name="manfaat" class="form-control" id="konten2"></textarea></div>
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
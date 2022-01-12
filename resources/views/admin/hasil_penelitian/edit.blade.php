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
                    <div class="col-md-12">
                        <form class="" action="{{ route('hasil-penelitian.update', $hasil_penelitian->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH ')
                            <div class="position-relative form-group"><label>Peneliti</label><input name="peneliti" type="text" class="form-control" value="{{ $hasil_penelitian->peneliti }}"></div>
                            <div class="position-relative form-group"><label>Judul</label><input name="judul" type="text" class="form-control" value="{{ $hasil_penelitian->judul }}"></div>
                            <div class="position-relative form-group"><label>Fokus Riset</label>
                                <select name="fokus_riset" class="form-control">
                                    <option value="">Pilih Fokus Riset</option>
                                    @foreach ($data as $item)
                                        <option value="{{$item->judul}}" {{$item->judul== $hasil_penelitian->fokus_riset? "selected":""}}>{{$item->judul}}</option>
                                    @endforeach
                                </select>
                            </div>    
                            <div class="position-relative form-group"><label>Deskripsi</label><textarea name="deskripsi" class="form-control" id="konten1">{{ $hasil_penelitian->deskripsi }}</textarea></div>
                            <div class="position-relative form-group"><label>Manfaat</label><textarea name="manfaat" class="form-control" id="konten2">{{ $hasil_penelitian->manfaat }}</textarea></div> 
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
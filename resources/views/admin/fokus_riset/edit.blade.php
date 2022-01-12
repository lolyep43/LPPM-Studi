@extends('admin_layouts.master')
@section('title', 'Edit Deskripsi Fokus Riset - LPPM ITK')

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

<h1>Edit Deskripsi</h1><br>
<div class="row">
    <div class="col-lg-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <form class="" action="{{ route('fokus-riset.update', $deskripsi->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH ')
                    <div class="position-relative form-group"><label>Deskripsi</label><textarea name="deskripsi" class="form-control" id="konten">{{ $deskripsi->deskripsi }}</textarea></div>
                    <button class="mt-1 btn btn-warning">Update</button>
                </form>
                <br>
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


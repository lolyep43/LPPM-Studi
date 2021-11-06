@extends('admin_layouts.master')
@section('title', 'Tambah Berita - LPPM ITK')

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

<h1>Tambah Berita</h1><br>
<div class="row">
    <div class="col-lg-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        <form class="" action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="position-relative form-group"><label>Judul</label><input name="judul" type="text" class="form-control"></div>
                            <div class="position-relative form-group"><label>Isi</label><textarea name="konten" class="form-control" id="konten"></textarea></div>
                    </div>

                    <div class="col-md-4">
                        <div class="position-relative form-group"><label>Thumbnail</label><input name="gambar" type="file" class="form-control-file">
                        </div>
                        <button class="mt-1 btn btn-primary">Publish</button>
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
    CKEDITOR.replace('konten', {
        filebrowserUploadUrl: "{{route('post.image', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form',
        height: 1000
    });
</script>

@endsection
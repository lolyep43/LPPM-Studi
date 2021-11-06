@extends('admin_layouts.master')
@section('title', 'Edit Slider - LPPM ITK')

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

<h1>Edit Slider</h1><br>
<div class="row">
    <div class="col-lg-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <form class="" action="{{ route('slider.update', $slider->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH ')
                    <div class="position-relative form-group"><label>Judul</label><input name="judul" type="text" class="form-control" value="{{ $slider->judul }}"></div>
                    <div class="position-relative form-group"><label>Gambar</label><br>
                        <img src="{{ asset($slider->gambar) }}" class="img-fluid" style="width:300px"><br><br>
                        <input name="gambar" type="file" class="form-control-file">
                        <small>Gambar ukuran 1138x380 px</small>
                    </div>
                    <button class="mt-1 btn btn-warning">Update</button>
                </form>
                <br>
            </div>
        </div>
    </div>
</div>
@endsection
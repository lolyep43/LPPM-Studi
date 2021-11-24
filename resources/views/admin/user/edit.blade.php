@extends('admin_layouts.master')
@section('title', 'Edit User - LPPM ITK')

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

<h1>Edit User</h1><br>
<div class="row">
    <div class="col-lg-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        <form class="" action="{{ route('User.update', $User->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH ')
                            <div class="position-relative form-group"><label>Nama</label><input name="name" type="text" class="form-control" value="{{ $User->name }}"></div>
                            <div class="position-relative form-group"><label>Email</label><input name="email" type="text" class="form-control" value="{{ $User->email }}"></div>
                            <div class="position-relative form-group"><label>Password</label><input name="password" type="text" class="form-control"value="{{ $User->password }}"></div>
                            <div class="position-relative form-group"><label>Role</label>
                                <select name="role" class="form-control">
                                    <option {{ $User->role == 'Super Admin' ? "selected" : "" }} value="Super Admin">Super Admin</option>
                                    <option {{ $User->role == 'Admin' ? "selected" : "" }} value="Admin">Admin</option>
                                </select>
                            </div>
                    </div>
                    <div class="col-md-4">
                        <button class="mt-1 btn btn-primary" style="float:right">Update</button>
                        </form>
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
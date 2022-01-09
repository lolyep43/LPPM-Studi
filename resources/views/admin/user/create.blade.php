@extends('admin_layouts.master')
@section('title', 'Tambah User - LPPM ITK')

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

<h1>Tambah User</h1><br>
<div class="row">
    <div class="col-lg-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <form class="" action="{{ route('User.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="position-relative form-group"><label>Nama</label><input name="name" type="text" class="form-control"></div>
                            <div class="position-relative form-group"><label>Email</label><input name="email" type="text" class="form-control"></div>
                            <div class="position-relative form-group"><label>Role</label>
                                <select name="role" class="form-control">
                                    <option value="Super Admin">Super Admin</option>
                                    <option value="Admin">Admin</option>
                                </select>
                            </div>
                            <div class="position-relative form-group"><label>Password</label><input name="password" type="text" class="form-control"></div>
                            <button class="mt-1 btn btn-primary" style="float:right">Tambah</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
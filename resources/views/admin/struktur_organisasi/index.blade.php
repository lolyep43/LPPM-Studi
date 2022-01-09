@extends('admin_layouts.master')
@section('title', 'Struktur Organisasi - LPPM ITK')
@push('css')
    <style>
        
.tree{
    display: flex;
    justify-content: center;
    align-items: center;
}

.tree ul {
	padding-top: 20px; position: relative;
	transition: all 0.5s;
	-webkit-transition: all 0.5s;
	-moz-transition: all 0.5s;
    list-style-type: none;
    list-style-position: inside;
    padding-left: 0;
}

.tree li {
    float: left; text-align: center;
	list-style-type: none;
	position: relative;
	padding: 20px 5px 0 5px;
	transition: all 0.5s;
	-webkit-transition: all 0.5s;
	-moz-transition: all 0.5s;
}

/*We will use ::before and ::after to draw the connectors*/
.tree li::before, .tree li::after{
	content: '';
	position: absolute; top: 0; right: 50%;
	border-top: 1px solid #ccc;
	width: 50%; height: 20px;
}
.tree li::after{
	right: auto; left: 50%;
	border-left: 1px solid #ccc;
}

/*We need to remove left-right connectors from elements without 
any siblings*/
.tree li:only-child::after, .tree li:only-child::before {
	display: none;
}

/*Remove space from the top of single children*/
.tree li:only-child{ padding-top: 0;}

/*Remove left connector from first child and 
right connector from last child*/
.tree li:first-child::before, .tree li:last-child::after{
	border: 0 none;
}
/*Adding back the vertical connector to the last nodes*/
.tree li:last-child::before{
	border-right: 1px solid #ccc;
	border-radius: 0 5px 0 0;
	-webkit-border-radius: 0 5px 0 0;
	-moz-border-radius: 0 5px 0 0;
}
.tree li:first-child::after{
	border-radius: 5px 0 0 0;
	-webkit-border-radius: 5px 0 0 0;
	-moz-border-radius: 5px 0 0 0;
}

/*Time to add downward connectors from parents*/
.tree ul ul::before{
	content: '';
	position: absolute; top: 0; left: 50%;
	border-left: 1px solid #ccc;
	width: 0; height: 20px;
}

.tree li a{
	border: 1px solid #ccc;
	padding: 5px 10px;
    width: 5vw;
	text-decoration: none;
	color: #666;
	font-family: arial, verdana, tahoma;
	font-size: 11px;
	display: inline-block;
	
	border-radius: 5px;
	-webkit-border-radius: 5px;
	-moz-border-radius: 5px;
	
	transition: all 0.5s;
	-webkit-transition: all 0.5s;
	-moz-transition: all 0.5s;
}

/*Time for some hover effects*/
/*We will apply the hover effect the the lineage of the element also*/
.tree li a:hover, .tree li a:hover+ul li a {
	background: #c8e4f8; color: #000; border: 1px solid #94a0b4;
}
/*Connector styles on hover*/
.tree li a:hover+ul li::after, 
.tree li a:hover+ul li::before, 
.tree li a:hover+ul::before, 
.tree li a:hover+ul ul::before{
	border-color:  #94a0b4;
}
    </style>
@endpush
@section('content')

<h1>Struktur Organisasi</h1><br>

@if(Session::has('success'))
<div class="alert alert-success" role="alert">
    {{ Session('success') }}
</div>
@endif

<div class="row">
    <div class="col-lg-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <h5 class="card-title">
                    <a href="{{ route('struktur-organisasi.create')}}" class="btn btn-success btn-sm">Tambah Anggota</a>
                </h5>
                <table class="mb-0 table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Jabatan</th>
                            <th>Level</th>
                            <th>Parent</th>
                            <th>Edit<th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $result => $hasil)
                        <tr>

                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $hasil->nama}}</td>
                            <td>{{ $hasil->jabatan}}</td>
                            <td>{{ $hasil->level}}</td>
                            <td>{{ $hasil->Parent->nama??""}}</td>
                            <td>
                                <form action="{{ route('struktur-organisasi.destroy', $hasil->id) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <a href="{{ route('struktur-organisasi.edit', $hasil->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus {{ $hasil->nama}} dengan jabatan {{ $hasil->jabatan }}?');">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <br>
        <div class="main-card mb-3 card">
            <div class="card-body">
                <div class="tree">
                    <ul>
                        <li>
                            <a href="">{{$data[0]->nama}}</a>
                            {{ Tree($data[0]) }}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    function Tree($parent)
    {
        if ($parent->childs->count()) {
            echo '<ul>';
            foreach ($parent->childs as $child) {
                # code...
                echo '<li><a href="#">'.$child->nama.'</a>';
                Tree($child);
                echo '</li>';
            }
            echo '</ul>';
        }// end while
    }
?>
@endsection
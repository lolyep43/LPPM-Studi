@extends('admin_layouts.master')
@section('title', 'Dashboard - LPPM ITK')
@section('content')
<h1>Dashboard</h1>
<div class="row mt-4">
    <div class="col-md-6 col-xl-4">
        <div class="card mb-3 widget-content">
            <div class="widget-content-outer">
                <div class="widget-content-wrapper">
                    <div class="widget-content-left">
                        <div class="widget-heading">Jumlah Berita</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-success">{{ $post->count() }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-4">
        <div class="card mb-3 widget-content">
            <div class="widget-content-outer">
                <div class="widget-content-wrapper">
                    <div class="widget-content-left">
                        <div class="widget-heading">Jumlah Pengumuman</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-warning">{{ $pengumuman->count() }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-4">
        <div class="card mb-3 widget-content">
            <div class="widget-content-outer">
                <div class="widget-content-wrapper">
                    <div class="widget-content-left">
                        <div class="widget-heading">Jumlah Agenda</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-danger">{{ $agenda->count() }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6 col-lg-3">
        <div class="card-shadow-danger mb-3 widget-chart widget-chart2 text-left card">
            <div class="widget-content">
                <div class="widget-content-outer">
                    <div class="widget-content-wrapper">
                        <div class="widget-content-left pr-2 fsize-1">
                            <div class="widget-numbers mt-0 fsize-3 text-danger">{{ $hasil_penelitian->count() }}</div>
                        </div>

                    </div>
                    <div class="widget-content-left fsize-1">
                        <div class="text-muted opacity-6">Hasil Penelitian</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="card-shadow-success mb-3 widget-chart widget-chart2 text-left card">
            <div class="widget-content">
                <div class="widget-content-outer">
                    <div class="widget-content-wrapper">
                        <div class="widget-content-left pr-2 fsize-1">
                            <div class="widget-numbers mt-0 fsize-3 text-success">{{ $hasil_pengabdian->count() }}</div>
                        </div>

                    </div>
                    <div class="widget-content-left fsize-1">
                        <div class="text-muted opacity-6">Hasil Pengabdian</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="card-shadow-warning mb-3 widget-chart widget-chart2 text-left card">
            <div class="widget-content">
                <div class="widget-content-outer">
                    <div class="widget-content-wrapper">
                        <div class="widget-content-left pr-2 fsize-1">
                            <div class="widget-numbers mt-0 fsize-3 text-warning">{{ $dokumen->count() }}</div>
                        </div>

                    </div>
                    <div class="widget-content-left fsize-1">
                        <div class="text-muted opacity-6">Dokumen</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="card-shadow-info mb-3 widget-chart widget-chart2 text-left card">
            <div class="widget-content">
                <div class="widget-content-outer">
                    <div class="widget-content-wrapper">
                        <div class="widget-content-left pr-2 fsize-1">
                            <div class="widget-numbers mt-0 fsize-3 text-info">{{ $galeri->count() }}</div>
                        </div>

                    </div>
                    <div class="widget-content-left fsize-1">
                        <div class="text-muted opacity-6">Galeri</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
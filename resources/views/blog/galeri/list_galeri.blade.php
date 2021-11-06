@extends('blog_layouts.content')
@section('judul', 'Galeri - LPPM ITK')
@section('isi')
<section style="padding-bottom: 25px;">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-8">
                <div class="p-30 mb-30 card-view">
                    <h4 class="p-title"><b>GALERI</b></h4>
                    <div class="row">
                        @foreach($data as $isi_galeri)
                        <div class="col-sm-4 mb-sm-20" style="margin-bottom: 20px">
                            <a href="{{ asset($isi_galeri->gambar) }}" data-lightbox="galeri" data-title="{{$isi_galeri->judul}}" data-alt="{{$isi_galeri->judul}}"><img src="{{ asset($isi_galeri->gambar) }}" alt="{{$isi_galeri->judul}}" title="{{$isi_galeri->judul}}" data-lightbox="galeri" data-title="{{$isi_galeri->judul}}"></a>
                            <ul class="mtb-5 list-li-mr-20 color-lite-black">
                            </ul>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-4">
                <div class="mb-30 p-30 card-view">
                    <h4 class="p-title"><b>BERITA</b></h4>
                    <div class="sided-80x mb-20">
                        @foreach($post as $isi_post)
                        <div>
                            <h5><a href="{{ route('blog.isi', $isi_post->slug)}}">
                                    <b>{{$isi_post->judul}}</b></a></h5>
                            <ul class="mtb-5 list-li-mr-20 color-lite-black">
                                <li><i class="mr-5 font-12 ion-clock"></i>{{$isi_post->created_at->isoFormat('D MMMM YYYY')}}</li>
                            </ul>
                        </div>
                        @endforeach
                    </div>
                    <h6><a class="mt-15 plr-20 btn-b-lg btn-fill-primary dplay-block mlr-auto" href="{{ route('blog.list')}}"><b>Lihat Selengkapnya</b></a></h6>
                </div>
                <div class="mb-30 p-30 card-view">
                    <h4 class="p-title"><b>PENGUMUMAN</b></h4>
                    <div class="sided-80x mb-20">
                        @foreach($pengumuman as $isi_pengumuman)
                        <div>
                            <h5><a href="{{ route('pengumuman.isi', $isi_pengumuman->slug)}}">
                                    <b>{{$isi_pengumuman->judul}}</b></a></h5>
                            <ul class="mtb-5 list-li-mr-20 color-lite-black">
                                <li><i class="mr-5 font-12 ion-clock"></i>{{$isi_pengumuman->created_at->isoFormat('D MMMM YYYY')}}</li>
                            </ul>
                        </div>
                        @endforeach
                    </div>
                    <h6><a class="mt-15 plr-20 btn-b-lg btn-fill-primary dplay-block mlr-auto" href="{{ route('pengumuman.list')}}"><b>Lihat Selengkapnya</b></a></h6>
                </div>
                <div class="mb-30 p-30 card-view">
                    <h4 class="p-title"><b>AGENDA</b></h4>
                    <div class="sided-80x mb-20" style="height:430px">
                        @foreach($agenda as $hasil_agenda)
                        <div class="detail-calendar-grey">
                            <div class="calendar-grey">
                                <h3><b>{{Carbon\Carbon::parse($hasil_agenda->tanggal)->isoFormat('D')}}</b></h3>
                                <h4>{{Carbon\Carbon::parse($hasil_agenda->tanggal)->isoFormat('MMM')}}</h4>
                            </div>
                            <div class="calendar-contain-grey">
                                <div class="calendar-contain-description-grey">
                                    <a href="{{ route('agenda.isi', $hasil_agenda->slug)}}" title="{{$hasil_agenda->judul}}”"><b>{{$hasil_agenda->judul}}</b></a>
                                    <br>{{$hasil_agenda->jam}}
                                    <br>{{$hasil_agenda->tempat}}
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <h6><a class="mt-15 plr-20 btn-b-lg btn-fill-primary dplay-block mlr-auto" href="{{ route('agenda.list')}}"><b>Lihat Selengkapnya</b></a></h6>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
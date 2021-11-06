@extends('blog_layouts.content')
@section('judul', 'LPPM Institut Teknologi Kalimantan')
@section('deskripsi', 'Lembaga Penelitian dan Pengabdian kepada Masyarakat (LPPM) Institut Teknologi Kalimantan (ITK)')
@section('isi')
<section class="bg-primary">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="myslider">
                    @foreach($slider as $hasil_slider)
                    <div><img src="{{$hasil_slider->gambar}}" /></div>
                    @endforeach
                </div>
                <div>
                    <br>
                    <marquee style="color:white"><a href="/daftar-hasil-penelitian">Pengumuman Hasil Penelitian LPPM ITK</a></marquee>
                </div>
            </div>
        </div><!-- row -->
    </div><!-- container -->
</section>
<section style="padding-bottom: 25px;">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-8">
                <div class="mb-30 p-30 ptb-sm-25 plr-sm-15 card-view">
                    <h4 class="p-title"><b>BERITA TERBARU</b></h4>
                    @foreach($post as $post_terbaru)
                    <div class="mb-30 sided-250x card-view">
                        <div class="s-left">
                            <a href="{{ route('blog.isi', $post_terbaru->slug)}}"><img src="{{$post_terbaru->gambar}}" alt=""></a>
                        </div><!-- left-area -->
                        <div class="s-right ptb-50 plr-sm-20 pt-sm-20 pb-sm-5 plr-30 plr-xs-0">
                            <h4><a href="{{ route('blog.isi', $post_terbaru->slug)}}">{{$post_terbaru->judul}}</a></h4>
                            <ul class="mtb-10 list-li-mr-20 color-lite-black">
                                <li><i class="mr-5 font-12 ion-clock"></i>{{$post_terbaru->created_at->isoFormat('D MMMM YYYY')}}
                                </li>
                                <li><i class="mr-5 font-12 ion-android-person"></i>Admin</li>
                            </ul>
                        </div><!-- right-area -->
                    </div><!-- sided-250x -->
                    @endforeach
                    <h6><a class="mt-15 plr-20 btn-b-lg btn-fill-primary dplay-block mlr-auto" href="{{ route('blog.list')}}"><b>Lihat Selengkapnya</b></a></h6>
                </div>
            </div>

            <div class="col-md-12 col-lg-4">
                <div class="mb-30 p-30 card-view">
                    <h4 class="p-title"><b>PENGUMUMAN</b></h4>
                    <div class="sided-80x mb-20">
                        @foreach($pengumuman as $hasil)
                        <div>
                            <h5><a href="{{ route('pengumuman.isi', $hasil->slug)}}">
                                    <b>{{$hasil->judul}}</b></a></h5>
                            <ul class="mtb-5 list-li-mr-20 color-lite-black">
                                <li><i class="mr-5 font-12 ion-clock"></i>{{$hasil->created_at->isoFormat('D MMMM YYYY')}}</li>
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
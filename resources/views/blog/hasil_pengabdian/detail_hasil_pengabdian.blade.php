@extends('blog_layouts.content')
@foreach($data as $isi_hasil_pengabdian)
@section('judul', $isi_hasil_pengabdian->judul. ' - LPPM ITK')
@endforeach
@section('isi')
<section style="padding-bottom: 25px;">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-8">
                <div class="p-30 mb-30 card-view">
                    @foreach($data as $isi_hasil_pengabdian)
                    <img src="{{ asset($isi_hasil_pengabdian->foto)}}" alt="">
                    <h3 class="mt-30 mb-5"><a href="#"><b>{{$isi_hasil_pengabdian->judul}}</b></a></h3>
                    <ul class="list-li-mr-10 color-lite-black">
                        <li><i class="mr-5 font-12 ion-android-person"></i>Ketua Pengabdian: {{$isi_hasil_pengabdian->peneliti}}</li>
                        <li><i class="mr-5 font-12 ion-clock"></i>Tahun Pengabdian: {{$isi_hasil_pengabdian->tahun}}</li>
                    </ul><br>
                    <h4 class="p-title-isi"><b>Deskripsi</b></h4>
                    {!!$isi_hasil_pengabdian->deskripsi!!}
                    <br>
                    <h4 class="p-title-isi"><b>Manfaat</b></h4>
                    {!!$isi_hasil_pengabdian->manfaat!!}
                </div>
                @endforeach
            </div>
            <div class="col-md-12 col-lg-4">
                <div class="mb-30 p-30 card-view">
                    <h4 class="p-title"><b>BERITA</b></h4>
                    <div class="sided-80x mb-20">
                        @foreach($post as $berita)
                        <div>
                            <h5><a href="{{ route('blog.isi', $berita->slug)}}">
                                    <b>{{$berita->judul}}</b></a></h5>
                            <ul class="mtb-5 list-li-mr-20 color-lite-black">
                                <li><i class="mr-5 font-12 ion-clock"></i>{{$berita->created_at->isoFormat('D MMMM YYYY')}}</li>
                            </ul>
                        </div>
                        @endforeach
                    </div>
                    <h6><a class="mt-15 plr-20 btn-b-lg btn-fill-primary dplay-block mlr-auto" href="{{ route('blog.list')}}"><b>Lihat Selengkapnya</b></a></h6>
                </div>
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
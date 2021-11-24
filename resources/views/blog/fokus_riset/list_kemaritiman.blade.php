@extends('blog_layouts.content')
@section('judul', 'Hasil Penelitian - LPPM ITK')
@section('isi')
<section style="padding-bottom: 25px;">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-8">
                <div class="mb-15 p-30 ptb-lg-25 plr-sm-15 card-view">
                    <h4 class="p-title"><b>HASIL PENELITIAN</b></h4>
                    @foreach($data_hasil_penelitian as $list_hasil_penelitian)
                    <div class="mb-15 sided-250x card-view">
                        <div class="s-left">
                            <a href="{{ route('hasil-penelitian.isi', $list_hasil_penelitian->slug)}}"><img src="{{$list_hasil_penelitian->foto}}"></a>
                        </div>
                        <div class="s-right ptb-25 plr-sm-20 pt-sm-20 pb-lg-5 plr-30 plr-xs-0">
                            <h4><a href="{{ route('hasil-penelitian.isi', $list_hasil_penelitian->slug)}}">{{$list_hasil_penelitian->judul}}</a></h4>
                            <ul class="mtb-10 list-li-mr-20 color-lite-black">
                                <li><i class="mr-5 font-12 ion-paperclip"></i>Fokus Riset: {{$list_hasil_penelitian->fokus_riset}}</li><br>
                                <li><i class="mr-5 font-12 ion-android-person"></i>Ketua: {{$list_hasil_penelitian->peneliti}}</li><br>
                                <li><i class="mr-5 font-12 ion-clock"></i>Tahun: {{$list_hasil_penelitian->tahun}}</li>
                            </ul>
                        </div>
                    </div>
                    @endforeach
                    @if($jumlah_data_hasil_penelitian->count() > 3)
                    <h6><a class="mt-15 plr-20 btn-b-lg btn-fill-primary dplay-block mlr-auto" href="{{ route('hasil-penelitian.list')}}"><b>Lihat Seluruh Hasil Penelitian</b></a></h6>
                    @endif
                    <br>
                </div>
                <div class="mb-15 p-30 ptb-lg-25 plr-sm-15 card-view">
                    <h4 class="p-title"><b>PUBLIKASI ILMIAH</b></h4>
                    @foreach($data_publikasi_ilmiah as $list_publikasi_ilmiah)
                    <div class="mb-15 sided-250x card-view">
                        <div class="s-left">
                            <a href="{{ route('publikasi-ilmiah.isi', $list_publikasi_ilmiah->slug)}}"><img src="{{$list_publikasi_ilmiah->foto}}"></a>
                        </div>
                        <div class="s-right ptb-25 plr-sm-20 pt-sm-20 pb-lg-5 plr-30 plr-xs-0">
                            <h4><a href="{{ route('publikasi-ilmiah.isi', $list_publikasi_ilmiah->slug)}}">{{$list_publikasi_ilmiah->judul}}</a></h4>
                            <ul class="mtb-10 list-li-mr-20 color-lite-black">
                                <li><i class="mr-5 font-12 ion-android-person"></i>Ketua: {{$list_publikasi_ilmiah->peneliti}}</li><br>
                                <li><i class="mr-5 font-12 ion-clock"></i>Tahun: {{$list_publikasi_ilmiah->tahun}}</li>
                            </ul>
                        </div>
                    </div>
                    @endforeach
                    <h6><a class="mt-15 plr-20 btn-b-lg btn-fill-primary dplay-block mlr-auto" href="{{ route('hasil-penelitian.list')}}"><b>Lihat Seluruh Hasil Penelitian</b></a></h6>
                    <br>
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
                                <h3><b>{{$hasil_agenda->tanggal->isoFormat('D')}}</b></h3>
                                <h4>{{$hasil_agenda->tanggal->isoFormat('MMM')}}</h4>
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
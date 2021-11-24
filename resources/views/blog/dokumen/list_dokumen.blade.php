@extends('blog_layouts.content')
@section('judul', 'Dokumen - LPPM ITK')
@section('isi')
<section style="padding-bottom: 25px;">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-8">
                <div class="p-30 mb-30 card-view">
                    <h4 class="p-title"><b>DOKUMEN</b></h4>
                    <table class="mb-0 table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Dokumen</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @foreach($data as $isi_dokumen)
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $isi_dokumen->judul}}</td>
                                <td>
                                    <a href="{{ asset($isi_dokumen->file) }}" class="btn btn-primary btn-sm" target="_blank">Unduh</a>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
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
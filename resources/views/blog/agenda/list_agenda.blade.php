@extends('blog_layouts.content')
@section('judul', 'Agenda - LPPM ITK')
@section('isi')
<section style="padding-bottom: 25px;">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-8">
                <div class="mb-30 p-30 ptb-lg-25 plr-sm-15 card-view">
                    <h4 class="p-title"><b>AGENDA</b></h4>
                    @foreach($data as $list_agenda)
                    <div class="mb-30 sided-250x card-view">
                        <div class="s-left">
                            <a href="{{ route('agenda.isi', $list_agenda->slug)}}"><img src="{{asset('frontend/images/agenda-lppm-itk.png')}}" alt=""></a>
                        </div>
                        <div class="s-right ptb-50 plr-sm-20 pt-sm-20 pb-lg-5 plr-30 plr-xs-0">
                            <h4><a href="{{ route('agenda.isi', $list_agenda->slug)}}">{{$list_agenda->judul}}</a></h4>
                            <ul class="mtb-10 list-li-mr-20 color-lite-black">
                                <li><i class="mr-5 font-12 ion-clock"></i>{{Carbon\Carbon::parse($list_agenda->tanggal)->isoFormat('D MMMM Y')}}</li><br>
                                <li><i class="mr-5 font-12 ion-clock"></i>{{$list_agenda->jam}}</li><br>
                                <li><i class="mr-5 font-12 ion-clock"></i>{{$list_agenda->tempat}}</li>
                            </ul>
                        </div>
                    </div>
                    @endforeach
                    {{$data->links()}}
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

            </div>
        </div>
    </div>
</section>
@endsection
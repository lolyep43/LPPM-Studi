@extends('blog_layouts.content')
@section('judul', 'Berita - LPPM ITK')
@section('isi')
<section style="padding-bottom: 25px;">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-lg-8">
				<div class="mb-30 p-30 ptb-lg-25 plr-sm-15 card-view">
					<h4 class="p-title"><b>BUKU AJAR</b></h4>
					@foreach($data as $isi_buku_ajar)
					<div class="mb-30 sided-250x card-view">
						<div class="s-left">
							<a href="{{ route('buku-ajar.isi', $isi_buku_ajar->slug)}}"><img src="{{$isi_buku_ajar->gambar}}" alt=""></a>
						</div>
						<div class="s-right ptb-50 plr-sm-20 pt-sm-20 pb-lg-5 plr-30 plr-xs-0">
							<h4><a href="{{ route('buku-ajar.isi', $isi_buku_ajar->slug)}}">{{$isi_buku_ajar->judul}}</a></h4>
							<ul class="list-li-mr-10 color-lite-black">
								<li><i class="mr-5 font-12 ion-paperclip"></i>Pengarang: {{$isi_buku_ajar->pengarang}}</li><br>
								<li><i class="mr-5 font-12 ion-android-person"></i>Penerbit: {{$isi_buku_ajar->penerbit}}</li>
								<li><i class="mr-5 font-12 ion-clock"></i>Tahun terbit: {{$isi_buku_ajar->tahun}}</li>
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
						@foreach($post as $isi_buku_ajar)
						<div>
							<h5><a href="{{ route('blog.isi', $isi_buku_ajar->slug)}}">
									<b>{{$isi_buku_ajar->judul}}</b></a></h5>
							<ul class="mtb-5 list-li-mr-20 color-lite-black">
								<li><i class="mr-5 font-12 ion-clock"></i>{{$isi_buku_ajar->created_at->isoFormat('D MMMM YYYY')}}</li>
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
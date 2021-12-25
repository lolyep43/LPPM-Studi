@extends('blog_layouts.content')
@section('judul',  'Struktur Organisasi - LPPM ITK')
@section('isi')

<section style="padding-bottom: 25px;">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-lg-8 justify-content-center">
				<div class="p-30 mb-30 card-view my-auto">
					<h3 class="mt-30 mb-5 text-center"><a href="#"><b>STRUKTUR ORGANISASI</b></a></h3>
					<div class="tree">
						@foreach($data as $isi_struktur_organisasi)
							@if($isi_struktur_organisasi->jabatan == 'Ketua LPPM')
							<ul>
								<li><a>{{$isi_struktur_organisasi->jabatan}}<br>{{$isi_struktur_organisasi->nama}}</a>
								<ul>
									@foreach($data as $isi_struktur_organisasi)
										@foreach($data_admin as $isi_struktur_admin)
										@if($isi_struktur_organisasi->jabatan == 'Super Admin' && $isi_struktur_admin->id_atasan == $isi_struktur_organisasi->id && !in_array($isi_struktur_organisasi->id, $arr))
										<li>
											<style>{{array_push($arr, $isi_struktur_organisasi->id)}}</style>
											<a>{{$isi_struktur_organisasi->jabatan}}<br>{{$isi_struktur_organisasi->nama}}</a>
											<ul>
												@foreach($data_admin as $isi_struktur_admin)
												@if($isi_struktur_admin->id_atasan == $isi_struktur_organisasi->id )
												<li>
													<a>{{$isi_struktur_admin->jabatan}}<br>{{$isi_struktur_admin->nama}}</a>
												</li>
												@endif
												@endforeach
											</ul>
										</li>
										@endif
										@endforeach
									@endforeach
								</ul>
							</li>
							@endif
							@endforeach
						</ul>
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
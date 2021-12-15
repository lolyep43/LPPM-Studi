<!DOCTYPE HTML>
<html lang="en">

<head>
    <title>@yield('judul')</title>
    <meta name="title" content="@yield('judul')">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="{{asset('frontend/assets/favicon.png')}}" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,600,700" rel="stylesheet">
    <link href="{{asset('frontend/plugin-frameworks/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/fonts/ionicons.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/common/styles.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.css" />
    <link href="{{asset('frontend/assets/lightbox.css')}}" rel="stylesheet" />

</head>

<body>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-196336367-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-196336367-1');
</script>

    <header>
        <div class="middle-header mt-xs-0">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <a class="logo" href="/"><img src="{{asset('frontend/images/logo-black.png')}}" alt="Logo"></a>
                    </div><!-- col-sm-4 -->
                    <div class="col-sm-8">
                    </div><!-- col-sm-4 -->
                </div><!-- row -->
            </div><!-- container -->
        </div><!-- top-header -->
        <div class="bottom-menu">
            <div class="container">
                <a class="menu-nav-icon" data-menu="#main-menu" href="#"><i class="ion-navicon"></i></a>
                <ul class="main-menu" id="main-menu">
                    <li><a href="/">HOME</a>
                    </li>
                    <li class="drop-down"><a href="#!">TENTANG KAMI<i class="ion-chevron-down"></i></a>
                        <ul class="drop-down-menu drop-down-inner">
                            <li><a href="/detail-halaman/sambutan-ketua-lppm">Sambutan Ketua LPPM</a></li>
                            <li><a href="/detail-halaman/sejarah">Sejarah</a></li>
                            <li><a href="/detail-halaman/visi-misi-tujuan">Visi, Misi, & Tujuan</a></li>
                            <li><a href="/halaman/struktur-organisasi">Struktur Organisasi</a></li>
                        </ul>
                    </li>
                    <li class="drop-down"><a href="#!">PUSAT STUDI<i class="ion-chevron-down"></i></a>
                        <ul class="drop-down-menu drop-down-inner">
                            <li><a href="/detail-halaman/pusat-penelitian-dan-publikasi-ilmiah">Pusat Penelitian dan Publikasi Ilmiah</a></li>
                            <li><a href="/detail-halaman/pusat-kerjasama-dan-pengabdian-kepada-masyarakat">Pusat Kerjasama dan Pengabdian kepada Masyarakat</a></li>
                            <li><a href="/detail-halaman/inkubator-bisnis-teknologi">Inkubator Bisnis Teknologi</a></li>
                            <li><a href="/detail-halaman/sentra-hki">Sentra HKI</a></li>

                        </ul>
                    </li>
                    <li class="drop-down"><a href="#!">FOKUS RISET<i class="ion-chevron-down"></i></a>
                        <ul class="drop-down-menu drop-down-inner">
                            <li><a href="{{ route('energi.list') }}">Energi</a></li>
                            <li><a href="{{ route('pertanian-dan-pangan.list') }}">Pangan dan Pertanian</a></li>
                            <li><a href="{{ route('smart-city.list') }}">Smart City</a></li>
                            <li><a href="{{ route('kemaritiman.list') }}">Kemaritiman</a></li>
                        </ul>
                    </li>
                    <li class="drop-down"><a href="#!">FASILITAS<i class="ion-chevron-down"></i></a>
                        <ul class="drop-down-menu drop-down-inner">
                            <li><a href="{{ route('laboratorium.list') }}">Laboratorium</a></li>
                            <li><a href="https://journal.itk.ac.id/" target="_blank" title="Jurnal ITK">Jurnal</a></li>
                        </ul>
                    </li>
                    <li class="drop-down"><a href="#!">LUARAN<i class="ion-chevron-down"></i></a>
                        <ul class="drop-down-menu drop-down-inner">
                            <li><a href="{{ route('hasil-penelitian.list') }}">Hasil Penelitian</a></li>
                            <li><a href="{{ route('hasil-pengabdian.list') }}">Hasil Pengabdian</a></li>
                            <li><a href="{{ route('buku-ajar.list') }}">Buku Ajar</a></li>
                            <li><a href="{{ route('publikasi-ilmiah.list') }}">Publikasi Ilmiah</a></li>
                        </ul>
                    </li>
                    <li class="drop-down"><a href="#!">INOVASI<i class="ion-chevron-down"></i></a>
                        <ul class="drop-down-menu drop-down-inner">
                            <li><a href="{{ route('inovasi-mandiri.list') }}">Inovasi Mandiri</a></li>
                            <li><a href="{{ route('inovasi-industri.list') }}">Inovasi dengan Industri</a></li>
                        </ul>
                    </li>
                    <li><a href="{{ route('dokumen.list') }}">DOKUMEN</a>
                    </li>
                    <li><a href="{{ route('galeri.list') }}">GALERI</a>
                    </li>
                    <li><a href="/detail-halaman/kontak">KONTAK</a>
                    </li>


                </ul>
                <div class="clearfix"></div>
            </div><!-- container -->
        </div><!-- bottom-menu -->
    </header>
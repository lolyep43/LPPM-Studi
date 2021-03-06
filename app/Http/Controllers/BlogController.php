<?php

namespace App\Http\Controllers;

use App\Slider;
use App\Posts;
use App\Pengumuman;
use App\Agenda;
use App\HasilPenelitian;
use App\HasilPengabdian;
use App\PublikasiIlmiah;
use App\Dokumen;
use App\Galeri;
use App\Laboratorium;
use App\InovasiMandiri;
use App\InovasiIndustri;
use App\Halaman;
use App\BukuAjar;
use App\StrukturOrganisasi;
use App\StrukturAdmin;
use App\deskripsiFokus;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Posts $posts, Pengumuman $pengumuman, Slider $slider, Agenda $agenda)
    {
        $slider = Slider::all();
        $pengumuman = Pengumuman::latest()->paginate(5);
        $agenda = Agenda::latest()->paginate(5);
        $post = Posts::latest()->paginate(5);

        return view('blog', compact('post', 'pengumuman', 'slider', 'agenda'));
    }


    public function isi_blog($slug)
    {
        $post = Posts::latest()->paginate(5);
        $pengumuman = Pengumuman::latest()->paginate(5);
        $agenda = Agenda::latest()->paginate(5);
        $data = Posts::where('slug', $slug)->get();
        return view('blog.berita.detail_post', compact('data', 'post', 'pengumuman', 'agenda'));
    }

    public function isi_pengumuman($slug)
    {
        $post = Posts::latest()->paginate(5);
        $pengumuman = Pengumuman::latest()->paginate(5);
        $agenda = Agenda::latest()->paginate(5);
        $data = Pengumuman::where('slug', $slug)->get();
        return view('blog.pengumuman.detail_pengumuman', compact('data', 'post', 'pengumuman', 'agenda'));
    }

    public function isi_agenda($slug)
    {
        $post = Posts::latest()->paginate(5);
        $pengumuman = Pengumuman::latest()->paginate(5);
        $agenda = Agenda::latest()->paginate(5);
        $data = Agenda::where('slug', $slug)->get();
        return view('blog.agenda.detail_agenda', compact('data', 'post', 'pengumuman', 'agenda'));
    }

    public function isi_hasil_penelitian($slug)
    {
        $post = Posts::latest()->paginate(5);
        $pengumuman = Pengumuman::latest()->paginate(5);
        $agenda = Agenda::latest()->paginate(5);
        $data = HasilPenelitian::where('slug', $slug)->get();
        return view('blog.hasil_penelitian.detail_hasil_penelitian', compact('data', 'post', 'pengumuman', 'agenda'));
    }

    public function isi_struktur_organisasi()
    {
        $arr = [];
        $post = Posts::latest()->paginate(5);
        $pengumuman = Pengumuman::latest()->paginate(5);
        $agenda = Agenda::latest()->paginate(5);
        $data = StrukturOrganisasi::all();
        $data_admin = StrukturAdmin::all();
        return view('blog.struktur_organisasi.detail_struktur_organisasi', compact('data', 'post', 'pengumuman', 'agenda', 'data_admin','arr'));
    }

    public function isi_hasil_pengabdian($slug)
    {
        $post = Posts::latest()->paginate(5);
        $pengumuman = Pengumuman::latest()->paginate(5);
        $agenda = Agenda::latest()->paginate(5);
        $data = HasilPengabdian::where('slug', $slug)->get();
        return view('blog.hasil_pengabdian.detail_hasil_pengabdian', compact('data', 'post', 'pengumuman', 'agenda'));
    }

    public function isi_buku_ajar($slug)
    {
        $post = Posts::latest()->paginate(5);
        $pengumuman = Pengumuman::latest()->paginate(5);
        $agenda = Agenda::latest()->paginate(5);
        $data = BukuAjar::where('slug', $slug)->get();
        return view('blog.buku_ajar.detail_buku_ajar', compact('data', 'post', 'pengumuman', 'agenda'));
    }

    public function isi_publikasi_ilmiah($slug)
    {
        $post = Posts::latest()->paginate(5);
        $pengumuman = Pengumuman::latest()->paginate(5);
        $agenda = Agenda::latest()->paginate(5);
        $data = PublikasiIlmiah::where('slug', $slug)->get();
        return view('blog.publikasi_ilmiah.detail_publikasi_ilmiah', compact('data', 'post', 'pengumuman', 'agenda'));
    }

    public function isi_inovasi_mandiri($slug)
    {
        $post = Posts::latest()->paginate(5);
        $pengumuman = Pengumuman::latest()->paginate(5);
        $agenda = Agenda::latest()->paginate(5);
        $data = InovasiMandiri::where('slug', $slug)->get();
        return view('blog.inovasi_mandiri.detail_inovasi_mandiri', compact('data', 'post', 'pengumuman', 'agenda'));
    }

    public function isi_inovasi_industri($slug)
    {
        $post = Posts::latest()->paginate(5);
        $pengumuman = Pengumuman::latest()->paginate(5);
        $agenda = Agenda::latest()->paginate(5);
        $data = InovasiIndustri::where('slug', $slug)->get();
        return view('blog.inovasi_industri.detail_inovasi_industri', compact('data', 'post', 'pengumuman', 'agenda'));
    }

    public function isi_halaman($slug)
    {
        $post = Posts::latest()->paginate(5);
        $pengumuman = Pengumuman::latest()->paginate(5);
        $agenda = Agenda::latest()->paginate(5);
        $data = Halaman::where('slug', $slug)->get();
        return view('blog.halaman.detail_halaman', compact('data', 'post', 'pengumuman', 'agenda'));
    }

    public function list_blog(Request $request)
    {
        $cari = $request->c;
        $post = Posts::latest()->paginate(5);
        $pengumuman = Pengumuman::latest()->paginate(5);
        $agenda = Agenda::latest()->paginate(5);
        if($cari){
            $data = Posts::where("judul", "LIKE", "%$cari%")->latest()->paginate(10);
        }else{
            $data = Posts::latest()->paginate(10);
        }
        return view('blog.berita.list_post', compact('data', 'post', 'pengumuman', 'agenda'));
    }

    public function luaran_fokus_riset($slug){
        $post = Posts::latest()->paginate(5);
        $pengumuman = Pengumuman::latest()->paginate(5);
        $agenda = Agenda::latest()->paginate(5);
        $data_hasil_penelitian = HasilPenelitian::where('slug2', $slug)->latest()->paginate(3);
        $data_publikasi_ilmiah = PublikasiIlmiah::where('slug2', $slug)->latest()->paginate(3);
        return view('blog.fokus_riset.luaran_fokus_riset', compact('data_hasil_penelitian','data_publikasi_ilmiah','post','pengumuman','agenda'));
    }

    public function deskripsi_fokus_riset($slug)
    {
        $post = Posts::latest()->paginate(5);
        $pengumuman = Pengumuman::latest()->paginate(5);
        $agenda = Agenda::latest()->paginate(5);
        $data = deskripsiFokus::where('slug', $slug)->get();
        if(!$data){
            abort(404);
        }
        return view('blog.fokus_riset.deskripsi_fokus_riset', compact('data', 'post', 'pengumuman', 'agenda'));

    }

    public function list_pengumuman(Request $request)
    {
        $cari = $request->c;
        $post = Posts::latest()->paginate(5);
        $pengumuman = Pengumuman::latest()->paginate(5);
        $agenda = Agenda::latest()->paginate(5);
        if($cari){
            $data = Pengumuman::where("judul", "LIKE", "%$cari%")->latest()->paginate(10);
        }else{
            $data = Pengumuman::latest()->paginate(10);
        }
        return view('blog.pengumuman.list_pengumuman', compact('data', 'post', 'pengumuman', 'agenda'));
    }

    public function list_agenda(Request $request)
    {
        $cari = $request->c;
        $post = Posts::latest()->paginate(5);
        $pengumuman = Pengumuman::latest()->paginate(5);
        $agenda = Agenda::latest()->paginate(5);
        if ($cari) {
            $data = Agenda::where("judul", "LIKE", "%$cari%")->orWhere("tanggal", "LIKE", "%$cari%")->latest()->paginate(10);
        } else {
            $data = Agenda::latest()->paginate(10);
        }
        return view('blog.agenda.list_agenda', compact('data', 'post', 'pengumuman', 'agenda'));
    }

    public function list_hasil_penelitian(Request $request)
    {
        $cari = $request->c;
        $post = Posts::latest()->paginate(5);
        $pengumuman = Pengumuman::latest()->paginate(5);
        $agenda = Agenda::latest()->paginate(5);
        if ($cari) {
            $data = HasilPenelitian::where("judul", "LIKE", "%$cari%")->orWhere("peneliti", "LIKE", "%$cari%")->latest()->paginate(10);
        } else {
            $data = HasilPenelitian::latest()->paginate(10);
        }
        return view('blog.hasil_penelitian.list_hasil_penelitian', compact('data', 'post', 'pengumuman', 'agenda'));
    }

    public function list_hasil_pengabdian(Request $request)
    {
        $cari = $request->c;
        $post = Posts::latest()->paginate(5);
        $pengumuman = Pengumuman::latest()->paginate(5);
        $agenda = Agenda::latest()->paginate(5);
        if ($cari) {
            $data = HasilPengabdian::where("judul", "LIKE", "%$cari%")->orWhere("peneliti", "LIKE", "%$cari%")->latest()->paginate(10);
        } else {
            $data = HasilPengabdian::latest()->paginate(10);
        }
        
        return view('blog.hasil_pengabdian.list_hasil_pengabdian', compact('data', 'post', 'pengumuman', 'agenda'));
    }

    public function list_buku_ajar(Request $request)
    {
        $cari = $request->c;
        $post = Posts::latest()->paginate(5);
        $pengumuman = Pengumuman::latest()->paginate(5);
        $agenda = Agenda::latest()->paginate(5);
        if ($cari) {
            $data = BukuAjar::where("judul", "LIKE", "%$cari%")->orWhere("pengarang", "LIKE", "%$cari%")->orWhere("penerbit", "LIKE", "%$cari%")->orWhere("tahun", "LIKE", "%$cari%")->latest()->paginate(10);
        } else {
            $data = BukuAjar::latest()->paginate(10);
        }
        
        return view('blog.buku_ajar.list_buku_ajar', compact('data', 'post', 'pengumuman', 'agenda'));
    }

    public function list_publikasi_ilmiah(Request $request)
    {
        $cari  = $request->c;
        $post = Posts::latest()->paginate(5);
        $pengumuman = Pengumuman::latest()->paginate(5);
        $agenda = Agenda::latest()->paginate(5);
        if ($cari) {
            $data = PublikasiIlmiah::where("judul", "LIKE", "%$cari%")->orWhere("tahun", "LIKE", "%$cari%")->orWhere("peneliti", "LIKE", "%$cari%")->orWhere("fokus_riset", "LIKE", "%$cari%")->latest()->paginate(10);
        } else {
            $data = PublikasiIlmiah::latest()->paginate(10);
        }
        
        return view('blog.publikasi_ilmiah.list_publikasi_ilmiah', compact('data', 'post', 'pengumuman', 'agenda'));
    }

    public function list_inovasi_mandiri(Request $request)
    {
        $cari = $request->c;
        $post = Posts::latest()->paginate(5);
        $pengumuman = Pengumuman::latest()->paginate(5);
        $agenda = Agenda::latest()->paginate(5);
        if ($cari) {
            $data = InovasiMandiri::where("judul", "LIKE", "%$cari%")->latest()->paginate(10);
        } else {
            $data = InovasiMandiri::latest()->paginate(10);
        }
        
        return view('blog.inovasi_mandiri.list_inovasi_mandiri', compact('data', 'post', 'pengumuman', 'agenda'));
    }

    public function list_inovasi_industri(Request $request)
    {
        $cari = $request->c;
        $post = Posts::latest()->paginate(5);
        $pengumuman = Pengumuman::latest()->paginate(5);
        $agenda = Agenda::latest()->paginate(5);
        if ($cari) {
            $data = InovasiIndustri::where("judul", "LIKE", "%$cari%")->latest()->paginate(10);
        } else {
            $data = InovasiIndustri::latest()->paginate(10);
        }
        
        return view('blog.inovasi_industri.list_inovasi_industri', compact('data', 'post', 'pengumuman', 'agenda'));
    }


    public function list_dokumen()
    {
        $post = Posts::latest()->paginate(5);
        $pengumuman = Pengumuman::latest()->paginate(5);
        $agenda = Agenda::latest()->paginate(5);
        $data = Dokumen::all();
        return view('blog.dokumen.list_dokumen', compact('data', 'post', 'pengumuman', 'agenda'));
    }

    public function list_laboratorium()
    {
        $post = Posts::latest()->paginate(5);
        $pengumuman = Pengumuman::latest()->paginate(5);
        $agenda = Agenda::latest()->paginate(5);
        $data = Laboratorium::all();
        return view('blog.laboratorium.list_laboratorium', compact('data', 'post', 'pengumuman', 'agenda'));
    }

    public function list_galeri()
    {
        $post = Posts::latest()->paginate(5);
        $pengumuman = Pengumuman::latest()->paginate(5);
        $agenda = Agenda::latest()->paginate(5);
        $data = Galeri::all();
        return view('blog.galeri.list_galeri', compact('data', 'post', 'pengumuman', 'agenda'));
    }

    public function data_fokus_riset()
    {
       
        return view('blog_layouts.header')->with(compact('data'));
    }
}

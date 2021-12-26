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
        $arr2 = [];
        $post = Posts::latest()->paginate(5);
        $pengumuman = Pengumuman::latest()->paginate(5);
        $agenda = Agenda::latest()->paginate(5);
        $data = StrukturOrganisasi::all();
        $data_admin = StrukturAdmin::all();
        return view('blog.struktur_organisasi.detail_struktur_organisasi', compact('data', 'post', 'pengumuman', 'agenda', 'data_admin','arr','arr2'));
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

    public function list_blog()
    {
        $post = Posts::latest()->paginate(5);
        $pengumuman = Pengumuman::latest()->paginate(5);
        $agenda = Agenda::latest()->paginate(5);
        $data = Posts::latest()->paginate(10);
        return view('blog.berita.list_post', compact('data', 'post', 'pengumuman', 'agenda'));
    }

    public function list_energi(){
        $fokus_riset = 'Energi';
        $post = Posts::latest()->paginate(5);
        $pengumuman = Pengumuman::latest()->paginate(5);
        $agenda = Agenda::latest()->paginate(5);
        $jumlah_data_hasil_penelitian = HasilPenelitian::all();
        $jumlah_data_publikasi_ilmiah = PublikasiIlmiah::all();
        $data_hasil_penelitian = HasilPenelitian::where('fokus_riset', $fokus_riset)->latest()->paginate(3);
        $data_publikasi_ilmiah = PublikasiIlmiah::where('fokus_riset', $fokus_riset)->latest()->paginate(3);
        return view('blog.fokus_riset.list_energi', compact('jumlah_data_hasil_penelitian','jumlah_data_publikasi_ilmiah','data_hasil_penelitian','data_publikasi_ilmiah','post','pengumuman','agenda'));
    }

    public function deskripsi_energi()
    {
        $post = Posts::latest()->paginate(5);
        $pengumuman = Pengumuman::latest()->paginate(5);
        $agenda = Agenda::latest()->paginate(5);
        $data = deskripsiFokus::where('judul', 'Energi')->get();
        return view('blog.deskripsi_fokus_riset.deskripsi_energi', compact('data', 'post', 'pengumuman', 'agenda'));
    }

    public function deskripsi_pertanian_dan_pangan()
    {
        $post = Posts::latest()->paginate(5);
        $pengumuman = Pengumuman::latest()->paginate(5);
        $agenda = Agenda::latest()->paginate(5);
        $data = deskripsiFokus::where('judul', 'Pertanian dan Pangan')->get();
        return view('blog.deskripsi_fokus_riset.deskripsi_pertanian_dan_pangan', compact('data', 'post', 'pengumuman', 'agenda'));
    }

    public function deskripsi_smart_city()
    {
        $post = Posts::latest()->paginate(5);
        $pengumuman = Pengumuman::latest()->paginate(5);
        $agenda = Agenda::latest()->paginate(5);
        $data = deskripsiFokus::where('judul', 'Smart City')->get();
        return view('blog.deskripsi_fokus_riset.deskripsi_smart_city', compact('data', 'post', 'pengumuman', 'agenda'));
    }

    public function deskripsi_kemaritiman()
    {
        $post = Posts::latest()->paginate(5);
        $pengumuman = Pengumuman::latest()->paginate(5);
        $agenda = Agenda::latest()->paginate(5);
        $data = deskripsiFokus::where('judul', 'Kemaritiman')->get();
        return view('blog.deskripsi_fokus_riset.deskripsi_kemaritiman', compact('data', 'post', 'pengumuman', 'agenda'));
    }

    public function list_pertanian_dan_pangan(){
        $fokus_riset = 'Pangan dan Pertanian';
        $post = Posts::latest()->paginate(5);
        $pengumuman = Pengumuman::latest()->paginate(5);
        $agenda = Agenda::latest()->paginate(5);
        $jumlah_data_hasil_penelitian = HasilPenelitian::all();
        $jumlah_data_publikasi_ilmiah = PublikasiIlmiah::all();
        $data_hasil_penelitian = HasilPenelitian::where('fokus_riset', $fokus_riset)->latest()->paginate(3);
        $data_publikasi_ilmiah = PublikasiIlmiah::where('fokus_riset', $fokus_riset)->latest()->paginate(3);
        return view('blog.fokus_riset.list_pertanian_dan_pangan', compact('jumlah_data_hasil_penelitian','jumlah_data_publikasi_ilmiah','data_hasil_penelitian','data_publikasi_ilmiah','post','pengumuman','agenda'));
    }

    public function list_smart_city(){
        $fokus_riset = 'Smart City';
        $post = Posts::latest()->paginate(5);
        $pengumuman = Pengumuman::latest()->paginate(5);
        $agenda = Agenda::latest()->paginate(5);
        $jumlah_data_hasil_penelitian = HasilPenelitian::all();
        $jumlah_data_publikasi_ilmiah = PublikasiIlmiah::all();
        $data_hasil_penelitian = HasilPenelitian::where('fokus_riset', $fokus_riset)->latest()->paginate(3);
        $data_publikasi_ilmiah = PublikasiIlmiah::where('fokus_riset', $fokus_riset)->latest()->paginate(3);
        return view('blog.fokus_riset.list_smart_city', compact('jumlah_data_hasil_penelitian','jumlah_data_publikasi_ilmiah','data_hasil_penelitian','data_publikasi_ilmiah','post','pengumuman','agenda'));
    }

    public function list_kemaritiman(){
        $fokus_riset = 'Kemaritiman';
        $post = Posts::latest()->paginate(5);
        $pengumuman = Pengumuman::latest()->paginate(5);
        $agenda = Agenda::latest()->paginate(5);
        $jumlah_data_hasil_penelitian = HasilPenelitian::all();
        $jumlah_data_publikasi_ilmiah = PublikasiIlmiah::all();
        $data_hasil_penelitian = HasilPenelitian::where('fokus_riset', $fokus_riset)->latest()->paginate(3);
        $data_publikasi_ilmiah = PublikasiIlmiah::where('fokus_riset', $fokus_riset)->latest()->paginate(3);
        return view('blog.fokus_riset.list_kemaritiman', compact('jumlah_data_hasil_penelitian','jumlah_data_publikasi_ilmiah','data_hasil_penelitian','data_publikasi_ilmiah','post','pengumuman','agenda'));
    }


    public function list_pengumuman()
    {
        $post = Posts::latest()->paginate(5);
        $pengumuman = Pengumuman::latest()->paginate(5);
        $agenda = Agenda::latest()->paginate(5);
        $data = Pengumuman::latest()->paginate(10);
        return view('blog.pengumuman.list_pengumuman', compact('data', 'post', 'pengumuman', 'agenda'));
    }

    public function list_agenda()
    {
        $post = Posts::latest()->paginate(5);
        $pengumuman = Pengumuman::latest()->paginate(5);
        $agenda = Agenda::latest()->paginate(5);
        $data = Agenda::latest()->paginate(10);
        return view('blog.agenda.list_agenda', compact('data', 'post', 'pengumuman', 'agenda'));
    }

    public function list_hasil_penelitian()
    {
        $post = Posts::latest()->paginate(5);
        $pengumuman = Pengumuman::latest()->paginate(5);
        $agenda = Agenda::latest()->paginate(5);
        $data = HasilPenelitian::latest()->paginate(10);
        return view('blog.hasil_penelitian.list_hasil_penelitian', compact('data', 'post', 'pengumuman', 'agenda'));
    }

    public function list_hasil_pengabdian()
    {
        $post = Posts::latest()->paginate(5);
        $pengumuman = Pengumuman::latest()->paginate(5);
        $agenda = Agenda::latest()->paginate(5);
        $data = HasilPengabdian::latest()->paginate(10);
        return view('blog.hasil_pengabdian.list_hasil_pengabdian', compact('data', 'post', 'pengumuman', 'agenda'));
    }

    public function list_buku_ajar()
    {
        $post = Posts::latest()->paginate(5);
        $pengumuman = Pengumuman::latest()->paginate(5);
        $agenda = Agenda::latest()->paginate(5);
        $data = BukuAjar::latest()->paginate(10);
        return view('blog.buku_ajar.list_buku_ajar', compact('data', 'post', 'pengumuman', 'agenda'));
    }

    public function list_publikasi_ilmiah()
    {
        $post = Posts::latest()->paginate(5);
        $pengumuman = Pengumuman::latest()->paginate(5);
        $agenda = Agenda::latest()->paginate(5);
        $data = PublikasiIlmiah::latest()->paginate(10);
        return view('blog.publikasi_ilmiah.list_publikasi_ilmiah', compact('data', 'post', 'pengumuman', 'agenda'));
    }

    public function list_inovasi_mandiri()
    {
        $post = Posts::latest()->paginate(5);
        $pengumuman = Pengumuman::latest()->paginate(5);
        $agenda = Agenda::latest()->paginate(5);
        $data = InovasiMandiri::latest()->paginate(10);
        return view('blog.inovasi_mandiri.list_inovasi_mandiri', compact('data', 'post', 'pengumuman', 'agenda'));
    }

    public function list_inovasi_industri()
    {
        $post = Posts::latest()->paginate(5);
        $pengumuman = Pengumuman::latest()->paginate(5);
        $agenda = Agenda::latest()->paginate(5);
        $data = InovasiIndustri::latest()->paginate(10);
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
}

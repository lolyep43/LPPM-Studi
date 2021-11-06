<?php

namespace App\Http\Controllers;

use App\Slider;
use App\Posts;
use App\Pengumuman;
use App\Agenda;
use App\HasilPenelitian;
use App\HasilPengabdian;
use App\Dokumen;
use App\Galeri;
use App\Laboratorium;
use App\Halaman;
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

    public function isi_hasil_pengabdian($slug)
    {
        $post = Posts::latest()->paginate(5);
        $pengumuman = Pengumuman::latest()->paginate(5);
        $agenda = Agenda::latest()->paginate(5);
        $data = HasilPengabdian::where('slug', $slug)->get();
        return view('blog.hasil_pengabdian.detail_hasil_pengabdian', compact('data', 'post', 'pengumuman', 'agenda'));
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

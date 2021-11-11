<?php

namespace App\Http\Controllers;

use App\Posts;
use App\Agenda;
use App\Pengumuman;
use App\HasilPenelitian;
use App\HasilPengabdian;
use App\PublikasiIlmiah;
use App\Dokumen;
use App\Galeri;
use App\InovasiMandiri;
use App\InovasiIndustri;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $post = Posts::all();
        $agenda = Agenda::all();
        $pengumuman = Pengumuman::all();
        $hasil_penelitian = HasilPenelitian::all();
        $hasil_pengabdian = HasilPengabdian::all();
        $publikasi_ilmiah = PublikasiIlmiah::all();
        $dokumen = Dokumen::all();
        $galeri = Galeri::all();
        $inovasi_mandiri = InovasiMandiri::all();
        $inovasi_industri = InovasiIndustri::all();
        return view('admin.dashboards.index', compact('post', 'agenda', 'pengumuman', 'hasil_penelitian', 'hasil_pengabdian', 'publikasi_ilmiah', 'inovasi_mandiri', 'inovasi_industri','dokumen', 'galeri'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Posts;
use App\Agenda;
use App\Pengumuman;
use App\HasilPenelitian;
use App\HasilPengabdian;
use App\Dokumen;
use App\Galeri;
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
        $dokumen = Dokumen::all();
        $galeri = Galeri::all();
        return view('admin.dashboards.index', compact('post', 'agenda', 'pengumuman', 'hasil_penelitian', 'hasil_pengabdian', 'dokumen', 'galeri'));
    }
}

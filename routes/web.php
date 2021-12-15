<?php

use Illuminate\Support\Facades\Route;
use app\Http\Controllers\BlogController;

// URL::forceScheme('https');

Route::get('/', 'BlogController@index');
Route::get('detail-berita/{slug}', 'BlogController@isi_blog')->name('blog.isi');
Route::get('daftar-berita/', 'BlogController@list_blog')->name('blog.list');
Route::get('detail-pengumuman/{slug}', 'BlogController@isi_pengumuman')->name('pengumuman.isi');
Route::get('daftar-pengumuman/', 'BlogController@list_pengumuman')->name('pengumuman.list');
Route::get('detail-agenda/{slug}', 'BlogController@isi_agenda')->name('agenda.isi');
Route::get('daftar-agenda/', 'BlogController@list_agenda')->name('agenda.list');
Route::get('detail-hasil-penelitan/{slug}', 'BlogController@isi_hasil_penelitian')->name('hasil-penelitian.isi');
Route::get('daftar-hasil-penelitian/', 'BlogController@list_hasil_penelitian')->name('hasil-penelitian.list');
Route::get('detail-hasil-pengabdian/{slug}', 'BlogController@isi_hasil_pengabdian')->name('hasil-pengabdian.isi');
Route::get('daftar-hasil-pengabdian/', 'BlogController@list_hasil_pengabdian')->name('hasil-pengabdian.list');
Route::get('detail-buku-ajar/{slug}', 'BlogController@isi_buku_ajar')->name('buku-ajar.isi');
Route::get('daftar-buku-ajar/', 'BlogController@list_buku_ajar')->name('buku-ajar.list');
Route::get('detail-publikasi-ilmiah/{slug}', 'BlogController@isi_publikasi_ilmiah')->name('publikasi-ilmiah.isi');
Route::get('daftar-publikasi-ilmiah/', 'BlogController@list_publikasi_ilmiah')->name('publikasi-ilmiah.list');
Route::get('detail-inovasi-mandiri/{slug}', 'BlogController@isi_inovasi_mandiri')->name('inovasi-mandiri.isi');
Route::get('daftar-inovasi-mandiri/', 'BlogController@list_inovasi_mandiri')->name('inovasi-mandiri.list');
Route::get('detail-inovasi-industri/{slug}', 'BlogController@isi_inovasi_industri')->name('inovasi-industri.isi');
Route::get('daftar-inovasi-industri/', 'BlogController@list_inovasi_industri')->name('inovasi-industri.list');
Route::get('daftar-energi/', 'BlogController@list_energi')->name('energi.list');
Route::get('daftar-pertanian-dan-pangan/', 'BlogController@list_pertanian_dan_pangan')->name('pertanian-dan-pangan.list');
Route::get('daftar-smart-city/', 'BlogController@list_smart_city')->name('smart-city.list');
Route::get('daftar-kemaritiman/', 'BlogController@list_kemaritiman')->name('kemaritiman.list');
Route::get('daftar-dokumen/', 'BlogController@list_dokumen')->name('dokumen.list');
Route::get('daftar-galeri/', 'BlogController@list_galeri')->name('galeri.list');
Route::get('daftar-laboratorium/', 'BlogController@list_laboratorium')->name('laboratorium.list');
Route::get('detail-halaman/{slug}', 'BlogController@isi_halaman')->name('halaman.isi');
Route::get('halaman/struktur-organisasi', 'BlogController@isi_struktur_organisasi')->name('struktur-organisasi.isi');
Route::get('/login', 'AuthController@login')->name('login');
Route::post('/postlogin', 'AuthController@postlogin');
Route::get('/logout', 'AuthController@logout');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', 'DashboardController@index');
    Route::resource('/slider', 'SliderController');
    Route::resource('/post', 'PostController');
    Route::resource('/pengumuman', 'PengumumanController');
    Route::resource('/agenda', 'AgendaController');
    Route::resource('/hasil-penelitian', 'HasilPenelitianController');
    Route::resource('/hasil-pengabdian', 'HasilPengabdianController');
    Route::resource('/inovasi-mandiri', 'InovasiMandiriController');
    Route::resource('/inovasi-industri', 'InovasiIndustriController');
    Route::resource('/buku-ajar', 'BukuAjarController');
    Route::resource('/publikasi-ilmiah', 'PublikasiIlmiahController');
    Route::resource('/dokumen', 'DokumenController');
    Route::resource('/galeri', 'GaleriController');
    Route::resource('/laboratorium', 'LaboratoriumController');
    Route::resource('/halaman', 'HalamanController');
    Route::resource('/struktur-organisasi', 'StrukturOrganisasiController');
    Route::resource('/User', 'UserController')->middleware('checkRole:Super Admin');
    Route::post('/images', 'PostController@uploadImage')->name('post.image');
});

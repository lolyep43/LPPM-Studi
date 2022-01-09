<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BukuAjar;
use Illuminate\Support\Str;

class BukuAjarController extends Controller
{
    public function index()
    {
        $buku_ajar = BukuAjar::latest()->paginate(10);
        return view('admin.buku_ajar.index', compact('buku_ajar'));
    }

    public function create()
    {
        return view('admin.buku_ajar.create');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'judul' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'required',
            'penerbit' => 'required',
            'pengarang' => 'required',
            'tahun' => 'required'
        ]);

        $gambar = $request->gambar;
        $new_gambar = time() . $gambar->getClientOriginalName();

        $buku_ajar = BukuAjar::create([
            'pengarang' => $request->pengarang,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'penerbit' => $request->penerbit,
            'gambar' => 'public/uploads/buku-ajar/' . $new_gambar,
            'tahun' => $request->tahun,
            'slug' => Str::slug($request->judul)
        ]);

        $gambar->move('public/uploads/buku-ajar/', $new_gambar);
        return redirect()->route('buku-ajar.index')->with('success', 'Buku Ajar berhasil ditambahkan');
    }

    public function edit($id)
    {
        $buku_ajar = BukuAjar::findOrFail($id);
        return view('admin.buku_ajar.edit', compact('buku_ajar'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'pengarang' => 'required',
            'judul' => 'required',
            'penerbit' => 'required',
            'deskripsi' => 'required',
            'tahun' => 'required'
        ]);

        $buku_ajar = BukuAjar::findOrFail($id);

        if ($request->has('gambar')) {
            $gambar = $request->gambar;
            $new_gambar = time() . $gambar->getClientOriginalName();
            $gambar->move('public/uploads/buku-ajar/', $new_gambar);

            $buku_ajar_data = [
                'pengarang' => $request->pengarang,
                'tahun' => $request->tahun,
                'penerbit' => $request->penerbit,
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
                'gambar' => 'public/uploads/buku-ajar/' . $new_gambar,
                'slug' => Str::slug($request->judul)
            ];
        } else {
            $buku_ajar_data = [
                'pengarang' => $request->pengarang,
                'tahun' => $request->tahun,
                'judul' => $request->judul,
                'penerbit' => $request->penerbit,
                'deskripsi' => $request->deskripsi,
                'slug' => Str::slug($request->judul)
            ];
        }

        $buku_ajar->update($buku_ajar_data);
        return redirect()->route('buku-ajar.index')->with('success', 'Buku Ajar berhasil diperbarui');
    }

    public function destroy($id)
    {
        $buku_ajar = BukuAjar::findOrFail($id);
        $buku_ajar->delete();
        return redirect()->route('buku-ajar.index')->with('success', 'Buku Ajar berhasil dihapus');
    }
}

<?php

namespace App\Http\Controllers;

use App\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class GaleriController extends Controller
{
    public function index()
    {
        $galeri = Galeri::latest()->paginate(10);
        return view('admin.galeri.index', compact('galeri'));
    }

    public function create()
    {
        return view('admin.galeri.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'judul' => 'required',
            'gambar' => 'required|mimes:png,jpeg|max:4096'
        ]);

        $file = $request->gambar;
        $new_file = time() . $file->getClientOriginalName();

        $galeri = Galeri::create([
            'judul' => $request->judul,
            'gambar' => 'public/uploads/galeri/' . $new_file,
            'slug' => Str::slug($request->judul)
        ]);

        $file->move('public/uploads/galeri/', $new_file);
        return redirect()->route('galeri.index')->with('success', 'Galeri berhasil ditambahkan');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $galeri = Galeri::findorfail($id);
        return view('admin.galeri.edit', compact('galeri'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'judul' => 'required',
            'gambar' => 'mimes:png,jpeg|max:4096'

        ]);

        $galeri = Galeri::findorfail($id);

        if ($request->has('gambar')) {
            $file = $request->gambar;
            $new_file = time() . $file->getClientOriginalName();
            $file->move('public/uploads/galeri/', $new_file);

            $galeri_data = [
                'judul' => $request->judul,
                'gambar' => 'public/uploads/galeri/' . $new_file,
                'slug' => Str::slug($request->judul)
            ];
        } else {
            $galeri_data = [
                'judul' => $request->judul,
                'slug' => Str::slug($request->judul)
            ];
        }

        $galeri->update($galeri_data);
        return redirect()->route('galeri.index')->with('success', 'Galeri berhasil diperbarui');
    }

    public function destroy($id)
    {
        $galeri = Galeri::findorfail($id);
        $galeri->delete();
        return redirect()->route('galeri.index')->with('success', 'Galeri berhasil dihapus');
    }
}

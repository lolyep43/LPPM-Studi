<?php

namespace App\Http\Controllers;

use App\Laboratorium;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class LaboratoriumController extends Controller
{
    public function index()
    {
        $laboratorium = Laboratorium::all();
        return view('admin.laboratorium.index', compact('laboratorium'));
    }

    public function create()
    {
        return view('admin.laboratorium.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_laboratorium' => 'required',
            'deskripsi' => 'required',
            'foto' => 'required',
        ]);

        $foto = $request->foto;
        $new_foto = time() . $foto->getClientOriginalName();

        $laboratorium = Laboratorium::create([
            'nama_laboratorium' => $request->nama_laboratorium,
            'deskripsi' => $request->deskripsi,
            'foto' => 'public/uploads/laboratorium/' . $new_foto,
            'slug' => Str::slug($request->judul)
        ]);

        $foto->move('public/uploads/laboratorium/', $new_foto);
        return redirect()->route('laboratorium.index')->with('success', 'Laboratorium berhasil ditambahkan');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $laboratorium = Laboratorium::findorfail($id);
        return view('admin.laboratorium.edit', compact('laboratorium'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama_laboratorium' => 'required',
            'deskripsi' => 'required',
        ]);

        $laboratorium = Laboratorium::findorfail($id);

        if ($request->has('foto')) {
            $foto = $request->foto;
            $new_foto = time() . $foto->getClientOriginalName();
            $foto->move('public/uploads/laboratorium/', $new_foto);

            $post_data = [
                'nama_laboratorium' => $request->nama_laboratorium,
                'deskripsi' => $request->deskripsi,
                'foto' => 'public/uploads/laboratorium/' . $new_foto,
                'slug' => Str::slug($request->judul)
            ];
        } else {
            $post_data = [
                'nama_laboratorium' => $request->nama_laboratorium,
                'deskripsi' => $request->deskripsi,
                'slug' => Str::slug($request->judul)
            ];
        }

        $laboratorium->update($post_data);
        return redirect()->route('laboratorium.index')->with('success', 'Laboratorium berhasil diperbarui');
    }

    public function destroy($id)
    {
        $laboratorium = Laboratorium::findorfail($id);
        $laboratorium->delete();
        return redirect()->route('laboratorium.index')->with('success', 'Laboratorium berhasil dihapus');
    }
}

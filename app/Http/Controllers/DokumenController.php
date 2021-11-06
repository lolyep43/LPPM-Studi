<?php

namespace App\Http\Controllers;

use App\Dokumen;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class DokumenController extends Controller
{
    public function index()
    {
        $dokumen = Dokumen::latest()->paginate(10);
        return view('admin.dokumen.index', compact('dokumen'));
    }

    public function create()
    {
        return view('admin.dokumen.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'judul' => 'required',
            'file' => 'required'
        ]);

        $file = $request->file;
        $new_file = time() . $file->getClientOriginalName();

        $dokumen = Dokumen::create([
            'judul' => $request->judul,
            'file' => 'public/uploads/dokumen/' . $new_file,
            'slug' => Str::slug($request->judul)
        ]);

        $file->move('public/uploads/dokumen/', $new_file);
        return redirect()->route('dokumen.index')->with('success', 'Dokumen berhasil ditambahkan');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $dokumen = Dokumen::findorfail($id);
        return view('admin.dokumen.edit', compact('dokumen'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'judul' => 'required',
        ]);

        $dokumen = Dokumen::findorfail($id);

        if ($request->has('file')) {
            $file = $request->file;
            $new_file = time() . $file->getClientOriginalName();
            $file->move('public/uploads/dokumen/', $new_file);

            $dokumen_data = [
                'judul' => $request->judul,
                'file' => 'public/uploads/dokumen/' . $new_file,
                'slug' => Str::slug($request->judul)
            ];
        } else {
            $dokumen_data = [
                'judul' => $request->judul,
                'slug' => Str::slug($request->judul)
            ];
        }

        $dokumen->update($dokumen_data);
        return redirect()->route('dokumen.index')->with('success', 'Dokumen berhasil diperbarui');
    }

    public function destroy($id)
    {
        $dokumen = Dokumen::findorfail($id);
        $dokumen->delete();
        return redirect()->route('dokumen.index')->with('success', 'Dokumen berhasil dihapus');
    }
}

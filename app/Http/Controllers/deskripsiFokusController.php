<?php

namespace App\Http\Controllers;

use App\deskripsiFokus;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class deskripsiFokusController extends Controller
{
    public function index()
    {
        $deskripsi = deskripsiFokus::paginate(10);
        return view('admin.fokus_riset.index', compact('deskripsi'));
    }

    public function create()
    {
        return view('admin.fokus_riset.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'judul' => 'required',
            'deskripsi' => 'required'

        ]);

        $deskripsi = deskripsiFokus::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'slug' => Str::slug($request->judul)
        ]);

        return redirect()->route('fokus-riset.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $deskripsi = deskripsiFokus::findOrFail($id);
        return view('admin.fokus_riset.edit', compact('deskripsi'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'deskripsi' => 'required',
        ]);

        $deskripsi = deskripsiFokus::findOrFail($id);

        $deskripsi_update = [
            'deskripsi' => $request->deskripsi,
            'slug' => Str::slug($request->judul)
        ];

        $deskripsi->update($deskripsi_update);
        return redirect()->route('fokus-riset.index')->with('success', 'Deskripsi berhasil diperbarui');
    }

    public function destroy($id)
    {
        $deskripsi = deskripsiFokus::findOrFail($id);
        $deskripsi->delete();
        return redirect()->route('fokus-riset.index')->with('success', 'Data telah berhasil dihapus');
    }
}

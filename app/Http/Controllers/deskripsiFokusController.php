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
        return view('admin.deskripsi_fokus_riset.index', compact('deskripsi'));
    }

    public function edit($id)
    {
        $deskripsi = deskripsiFokus::findOrFail($id);
        return view('admin.deskripsi_fokus_riset.edit', compact('deskripsi'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'deskripsi' => 'required',
        ]);

        $deskripsi = deskripsiFokus::findOrFail($id);

        $deskripsi_update = [
            'deskripsi' => $request->deskripsi,
        ];

        $deskripsi->update($deskripsi_update);
        return redirect()->route('deskripsi-fokus-riset.index')->with('success', 'Deskripsi berhasil diperbarui');
    }
}

<?php

namespace App\Http\Controllers;

use App\StrukturOrganisasi;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class StrukturOrganisasiController extends Controller
{
    public function index(){
        $data = StrukturOrganisasi::latest()->paginate(10);
        return view('admin.struktur_organisasi.index', compact('data'));
    }
    public function create(){
        return view('admin.struktur_organisasi.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'jabatan' => 'required',

        ]);

        $data = StrukturOrganisasi::create([
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
        ]);

        return redirect()->route('struktur-organisasi.index')->with('success', 'Data telah ditambahkan');
    }

    public function edit($id){
        $data = StrukturOrganisasi::findOrFail($id);
        return view('admin.struktur_organisasi.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama' => 'required',
            'jabatan' => 'required',

        ]);

        $data = StrukturOrganisasi::findOrFail($id);

        $updateData = [
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
        ];

        $data->update($updateData);
        return redirect()->route('struktur-organisasi.index')->with('success', 'Data telah diupdate');

    }

    public function destroy($id)
    {
        $data = StrukturOrganisasi::findOrFail($id);
        $data->delete();
        return redirect()->route('struktur-organisasi.index')->with('success', 'Data telah dihapus');
    }
}

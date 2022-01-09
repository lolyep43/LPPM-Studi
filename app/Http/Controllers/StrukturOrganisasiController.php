<?php

namespace App\Http\Controllers;

use App\StrukturOrganisasi;
use App\StrukturAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class StrukturOrganisasiController extends Controller
{
    public function index(){
        $data = StrukturOrganisasi::orderBy("level")->get();
        $data_admin = StrukturAdmin::all();
        $arr = [];
        return view('admin.struktur_organisasi.index', compact('data', 'data_admin', "arr"));
    }
    public function create(){
        $data = StrukturOrganisasi::all();
        return view('admin.struktur_organisasi.create', compact("data"));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'jabatan' => 'required',
            'level' => 'required',

        ]);

        $data = StrukturOrganisasi::create([
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'level' => $request->level,
            'parent' => $request->parent,
        ]);

        return redirect()->route('struktur-organisasi.index')->with('success', 'Data telah ditambahkan');
    }

    public function edit($id){
        $parent = StrukturOrganisasi::all();
        $data = StrukturOrganisasi::findOrFail($id);
        return view('admin.struktur_organisasi.edit', compact('data', 'parent'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama' => 'required',
            'jabatan' => 'required',
            'level' => 'required',

        ]);

        $data = StrukturOrganisasi::findOrFail($id);

        $updateData = [
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'level' => $request->level,
            'parent' => $request->parent,
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

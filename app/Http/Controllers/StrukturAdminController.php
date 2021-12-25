<?php

namespace App\Http\Controllers;

use App\StrukturAdmin;
use App\StrukturOrganisasi;
use Illuminate\Http\Request;

class StrukturAdminController extends Controller
{
    public function index(){
        $data = StrukturAdmin::latest()->paginate(10);
        $data_struktur_organisasi = StrukturOrganisasi::where('jabatan', 'Super Admin')->get();
        $items = collect($data_struktur_organisasi);
        $items->values()->all();;
        $arr = [];
        return view('admin.struktur_admin.index', compact('data','items','arr'));
    }

    public function create(){
        $data_struktur_organisasi = StrukturOrganisasi::where('jabatan', 'Super Admin')->get();
        $items = collect($data_struktur_organisasi);
        $items->values()->all();
        return view('admin.struktur_admin.create', compact('items'));
    }

    public function store(Request $request)
    {
       
        $this->validate($request, [
            'nama' => 'required',
            'jabatan' => 'required',
            'id_atasan' => 'Required'

        ]);

        $data = StrukturAdmin::create([
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'id_atasan' => $request->id_atasan
        ]);

        return redirect()->route('struktur-admin.index')->with('success', 'Data telah ditambahkan');
    }

    public function edit($id){
        $data = StrukturAdmin::findOrFail($id);
        $data_struktur_organisasi = StrukturOrganisasi::where('jabatan', 'Super Admin')->get();
        $items = collect($data_struktur_organisasi);
        $items->values()->all();
        return view('admin.struktur_admin.edit', compact('data','items'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama' => 'required',
            'jabatan' => 'required',
            'id_atasan' => 'Required'

        ]);

        $data = StrukturAdmin::findOrFail($id);

        $updateData = [
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'id_atasan' => $request->id_atasan
        ];

        $data->update($updateData);
        return redirect()->route('struktur-admin.index')->with('success', 'Data telah diupdate');

    }

    public function destroy($id)
    {
        $data = StrukturAdmin::findOrFail($id);
        $data->delete();
        return redirect()->route('struktur-admin.index')->with('success', 'Data telah dihapus');
    }
}

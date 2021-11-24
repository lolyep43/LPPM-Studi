<?php

namespace App\Http\Controllers;

use App\HasilPenelitian;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class HasilPenelitianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hasil_penelitian = HasilPenelitian::latest()->paginate(10);
        return view('admin.hasil_penelitian.index', compact('hasil_penelitian'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.hasil_penelitian.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'peneliti' => 'required',
            'judul' => 'required',
            'fokus_riset' => 'required',
            'deskripsi' => 'required',
            'manfaat' => 'required',
            'foto' => 'required',
            'tahun' => 'required',
        ]);

        $foto = $request->foto;
        $new_foto = time() . $foto->getClientOriginalName();

        $hasil_penelitian = HasilPenelitian::create([
            'peneliti' => $request->peneliti,
            'judul' => $request->judul,
            'fokus_riset' => $request->fokus_riset,
            'deskripsi' => $request->deskripsi,
            'manfaat' => $request->manfaat,
            'tahun' => $request->tahun,
            'foto' => 'public/uploads/hasil-penelitian/' . $new_foto,
            'slug' => Str::slug($request->judul)
        ]);

        $foto->move('public/uploads/hasil-penelitian/', $new_foto);
        return redirect()->route('hasil-penelitian.index')->with('success', 'Hasil penelitian berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $hasil_penelitian = HasilPenelitian::findorfail($id);
        return view('admin.hasil_penelitian.edit', compact('hasil_penelitian'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'peneliti' => 'required',
            'judul' => 'required',
            'fokus_riset' => 'required',
            'deskripsi' => 'required',
            'manfaat' => 'required',
            'tahun' => 'required',
        ]);

        $hasil_penelitian = HasilPenelitian::findorfail($id);
        
        if ($request->has('foto')) {
            $foto = $request->foto;
            $new_foto = time() . $foto->getClientOriginalName();
            $foto->move('public/uploads/hasil-penelitian/', $new_foto);

            $post_data = [
                'peneliti' => $request->peneliti,
                'judul' => $request->judul,
                'fokus_riset' => $request->fokus_riset,
                'deskripsi' => $request->deskripsi,
                'manfaat' => $request->manfaat,
                'foto' => 'public/uploads/hasil-penelitian/' . $new_foto,
                'tahun' => $request->tahun,
                'slug' => Str::slug($request->judul)
            ];
        } else {
            $post_data = [
                'peneliti' => $request->peneliti,
                'judul' => $request->judul,
                'fokus_riset' => $request->fokus_riset,
                'deskripsi' => $request->deskripsi,
                'manfaat' => $request->manfaat,
                'tahun' => $request->tahun,
                'slug' => Str::slug($request->judul)
            ];
        }

        $hasil_penelitian->update($post_data);
        return redirect()->route('hasil-penelitian.index')->with('success', 'Hasil penelitian berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hasil_penelitian = HasilPenelitian::findorfail($id);
        $hasil_penelitian->delete();
        return redirect()->route('hasil-penelitian.index')->with('success', 'Hasil penelitian berhasil dihapus');
    }
}

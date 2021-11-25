<?php

namespace App\Http\Controllers;

use App\HasilPengabdian;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class HasilPengabdianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hasil_pengabdian = HasilPengabdian::latest()->paginate(10);
        return view('admin.hasil_pengabdian.index', compact('hasil_pengabdian'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.hasil_pengabdian.create');
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
            'deskripsi' => 'required',
            'manfaat' => 'required',
            'foto' => 'required',
            'tahun' => 'required',
        ]);

        $foto = $request->foto;
        $new_foto = time() . $foto->getClientOriginalName();

        $hasil_pengabdian = HasilPengabdian::create([
            'peneliti' => $request->peneliti,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'manfaat' => $request->manfaat,
            'tahun' => $request->tahun,
            'foto' => 'public/uploads/hasil-pengabdian/' . $new_foto,
            'slug' => Str::slug($request->judul)
        ]);

        $foto->move('public/uploads/hasil-pengabdian/', $new_foto);
        return redirect()->route('hasil-pengabdian.index')->with('success', 'Hasil pengabdian berhasil ditambahkan');
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
        $hasil_pengabdian = HasilPengabdian::findOrFail($id);
        return view('admin.hasil_pengabdian.edit', compact('hasil_pengabdian'));
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
            'deskripsi' => 'required',
            'manfaat' => 'required',
            'tahun' => 'required',
        ]);

        $hasil_pengabdian = HasilPengabdian::findOrFail($id);

        if ($request->has('foto')) {
            $foto = $request->foto;
            $new_foto = time() . $foto->getClientOriginalName();
            $foto->move('public/uploads/hasil-pengabdian/', $new_foto);

            $post_data = [
                'peneliti' => $request->peneliti,
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
                'manfaat' => $request->manfaat,
                'foto' => 'public/uploads/hasil-pengabdian/' . $new_foto,
                'tahun' => $request->tahun,
                'slug' => Str::slug($request->judul)
            ];
        } else {
            $post_data = [
                'peneliti' => $request->peneliti,
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
                'manfaat' => $request->manfaat,
                'tahun' => $request->tahun,
                'slug' => Str::slug($request->judul)
            ];
        }

        $hasil_pengabdian->update($post_data);
        return redirect()->route('hasil-pengabdian.index')->with('success', 'Hasil pengabdian berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hasil_pengabdian = HasilPengabdian::findOrFail($id);
        $hasil_pengabdian->delete();
        return redirect()->route('hasil-pengabdian.index')->with('success', 'Hasil pengabdian berhasil dihapus');
    }
}

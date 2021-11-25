<?php

namespace App\Http\Controllers;

use App\InovasiIndustri;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class InovasiIndustriController extends Controller
{
    public function index()
    {
        $inovasi_industri = InovasiIndustri::latest()->paginate(10);
        return view('admin.inovasi_industri.index', compact('inovasi_industri'));
    }

    public function create()
    {
        return view('admin.inovasi_industri.create');
    }

    public function uploadImage(Request $request)
    {
        if ($request->hasFile('upload')) {
            $file = $request->file('upload');
            $fileName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $fileName = $fileName . '_' . time() . '.' . $file->getClientOriginalExtension();

            $file->move(public_path('public/uploads/inovasi-industri/'), $fileName);

            $ckeditor = $request->input('CKEditorFuncNum');
            $url = asset('public/uploads/inovasi-industri/' . $fileName);
            $msg = 'Image uploaded successfully';
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($ckeditor, '$url', '$msg')</script>";

            @header('Content-type: text/html; charset=utf-8');
            return $response;
        }
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'judul' => 'required',
            'konten' => 'required',
            'gambar' => 'required',
        ]);

        $gambar = $request->gambar;
        $new_gambar = time() . $gambar->getClientOriginalName();

        $inovasi_industri = inovasiIndustri::create([
            'judul' => $request->judul,
            'konten' => $request->konten,
            'gambar' => 'public/uploads/inovasi-industri/' . $new_gambar,
            'slug' => Str::slug($request->judul)
        ]);

        $gambar->move('public/uploads/inovasi-industri/', $new_gambar);
        return redirect()->route('inovasi-industri.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $inovasi_industri = InovasiIndustri::findOrFail($id);
        return view('admin.inovasi_industri.edit', compact('inovasi_industri'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'judul' => 'required',
            'konten' => 'required',
        ]);

        $inovasi_industri = InovasiIndustri::findOrFail($id);

        if ($request->has('gambar')) {
            $gambar = $request->gambar;
            $new_gambar = time() . $gambar->getClientOriginalName();
            $gambar->move('public/uploads/inovasi-industri/', $new_gambar);

            $post_data = [
                'judul' => $request->judul,
                'konten' => $request->konten,
                'gambar' => 'public/uploads/inovasi-industri/' . $new_gambar,
                'slug' => Str::slug($request->judul)
            ];
        } else {
            $post_data = [
                'judul' => $request->judul,
                'konten' => $request->konten,
                'slug' => Str::slug($request->judul)
            ];
        }

        $inovasi_industri->update($post_data);
        return redirect()->route('inovasi-industri.index')->with('success', 'Data berhasil diperbarui');
    }

    public function destroy($id)
    {
        $inovasi_industri = InovasiIndustri::findOrFail($id);
        $inovasi_industri->delete();
        return redirect()->route('inovasi-industri.index')->with('success', 'Data berhasil dihapus');
    }

}

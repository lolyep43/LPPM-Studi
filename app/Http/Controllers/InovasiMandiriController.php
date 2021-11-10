<?php

namespace App\Http\Controllers;

use App\InovasiMandiri;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class InovasiMandiriController extends Controller
{
    public function index()
    {
        $inovasi_mandiri = InovasiMandiri::latest()->paginate(10);
        return view('admin.inovasi_mandiri.index', compact('inovasi_mandiri'));
    }

    public function create()
    {
        return view('admin.inovasi_mandiri.create');
    }

    public function uploadImage(Request $request)
    {
        if ($request->hasFile('upload')) {
            $file = $request->file('upload');
            $fileName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $fileName = $fileName . '_' . time() . '.' . $file->getClientOriginalExtension();

            $file->move(public_path('public/uploads/inovasi-mandiri/'), $fileName);

            $ckeditor = $request->input('CKEditorFuncNum');
            $url = asset('public/uploads/inovasi-mandiri/' . $fileName);
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

        $inovasi_mandiri = InovasiMandiri::create([
            'judul' => $request->judul,
            'konten' => $request->konten,
            'gambar' => 'public/uploads/inovasi-mandiri/' . $new_gambar,
            'slug' => Str::slug($request->judul)
        ]);

        $gambar->move('public/uploads/inovasi-mandiri/', $new_gambar);
        return redirect()->route('inovasi-mandiri.index')->with('success', 'Data Inovasi Mandiri berhasil ditambahkan');
    }

    public function edit($id)
    {
        $inovasi_mandiri = InovasiMandiri::findorfail($id);
        return view('admin.inovasi-mandiri.edit', compact('inovasi_mandiri'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'judul' => 'required',
            'konten' => 'required',
        ]);

        $inovasi_mandiri = InovasiMandiri::findorfail($id);

        if ($request->has('gambar')) {
            $gambar = $request->gambar;
            $new_gambar = time() . $gambar->getClientOriginalName();
            $gambar->move('public/uploads/inovasi-mandiri/', $new_gambar);

            $post_data = [
                'judul' => $request->judul,
                'konten' => $request->konten,
                'gambar' => 'public/uploads/inovasi-mandiri/' . $new_gambar,
                'slug' => Str::slug($request->judul)
            ];
        } else {
            $post_data = [
                'judul' => $request->judul,
                'konten' => $request->konten,
                'slug' => Str::slug($request->judul)
            ];
        }

        $inovasi_mandiri->update($post_data);
        return redirect()->route('inovasi-mandiri.index')->with('success', 'Data Inovasi Mandiri berhasil diperbarui');
    }

    public function destroy($id)
    {
        $inovasi_mandiri = InovasiMandiri::findorfail($id);
        $inovasi_mandiri->delete();
        return redirect()->route('inovasi-mandiri.index')->with('success', 'Data Inovasi Mandiri berhasil dihapus');
    }

}

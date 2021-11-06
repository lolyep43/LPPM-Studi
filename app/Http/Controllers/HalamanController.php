<?php

namespace App\Http\Controllers;

use App\Halaman;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class HalamanController extends Controller
{

    public function index()
    {
        $halaman = Halaman::all();
        return view('admin.halaman.index', compact('halaman'));
    }

    public function create()
    {
        return view('admin.halaman.create');
    }

    public function uploadImage(Request $request)
    {
        if ($request->hasFile('upload')) {
            $file = $request->file('upload');
            $fileName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $fileName = $fileName . '_' . time() . '.' . $file->getClientOriginalExtension();

            $file->move(public_path('public/uploads/halaman/'), $fileName);

            $ckeditor = $request->input('CKEditorFuncNum');
            $url = asset('public/uploads/halaman/' . $fileName);
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
        ]);

        $halaman = Halaman::create([
            'judul' => $request->judul,
            'konten' => $request->konten,
            'slug' => Str::slug($request->judul)
        ]);

        return redirect()->route('halaman.index')->with('success', 'Halaman berhasil ditambahkan');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $halaman = Halaman::findorfail($id);
        return view('admin.halaman.edit', compact('halaman'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'judul' => 'required',
            'konten' => 'required',
        ]);

        $halaman = Halaman::findorfail($id);

        $halaman_data = [
            'judul' => $request->judul,
            'konten' => $request->konten,
            'slug' => Str::slug($request->judul)
        ];

        $halaman->update($halaman_data);
        return redirect()->route('halaman.index')->with('success', 'Halaman berhasil diperbarui');
    }

    public function destroy($id)
    {
        //
    }
}

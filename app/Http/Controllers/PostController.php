<?php

namespace App\Http\Controllers;

use App\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        $post = Posts::latest()->paginate(10);
        return view('admin.posts.index', compact('post'));
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function uploadImage(Request $request)
    {
        if ($request->hasFile('upload')) {
            $file = $request->file('upload');
            $fileName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $fileName = $fileName . '_' . time() . '.' . $file->getClientOriginalExtension();

            $file->move(public_path('public/uploads/posts/'), $fileName);

            $ckeditor = $request->input('CKEditorFuncNum');
            $url = asset('public/uploads/posts/' . $fileName);
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

        $post = Posts::create([
            'judul' => $request->judul,
            'konten' => $request->konten,
            'gambar' => 'public/uploads/posts/' . $new_gambar,
            'slug' => Str::slug($request->judul)
        ]);

        $gambar->move('public/uploads/posts/', $new_gambar);
        return redirect()->route('post.index')->with('success', 'Berita berhasil ditambahkan');
    }

    public function edit($id)
    {
        $post = Posts::findorfail($id);
        return view('admin.posts.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'judul' => 'required',
            'konten' => 'required',
        ]);

        $post = Posts::findorfail($id);

        if ($request->has('gambar')) {
            $gambar = $request->gambar;
            $new_gambar = time() . $gambar->getClientOriginalName();
            $gambar->move('public/uploads/posts/', $new_gambar);

            $post_data = [
                'judul' => $request->judul,
                'konten' => $request->konten,
                'gambar' => 'public/uploads/posts/' . $new_gambar,
                'slug' => Str::slug($request->judul)
            ];
        } else {
            $post_data = [
                'judul' => $request->judul,
                'konten' => $request->konten,
                'slug' => Str::slug($request->judul)
            ];
        }

        $post->update($post_data);
        return redirect()->route('post.index')->with('success', 'Berita berhasil diperbarui');
    }

    public function destroy($id)
    {
        $post = Posts::findorfail($id);
        $post->delete();
        return redirect()->route('post.index')->with('success', 'Berita berhasil dihapus');
    }
}

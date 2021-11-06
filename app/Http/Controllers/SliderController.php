<?php

namespace App\Http\Controllers;

use App\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class SliderController extends Controller
{
    public function index()
    {
        $slider = Slider::paginate(10);
        return view('admin.sliders.index', compact('slider'));
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $slider = Slider::findorfail($id);
        return view('admin.sliders.edit', compact('slider'));
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
            'judul' => 'required',
            'gambar' => 'required|mimes:jpeg,png',
        ]);

        $slider = Slider::findorfail($id);

        $gambar = $request->gambar;
        $new_gambar = time() . $gambar->getClientOriginalName();
        $gambar->move('public/uploads/sliders/', $new_gambar);

        $slider_data = [
            'judul' => $request->judul,
            'gambar' => 'public/uploads/sliders/' . $new_gambar,
        ];
        $slider->update($slider_data);
        return redirect()->route('slider.index')->with('success', 'Slider berhasil diperbarui');
    }


    public function destroy($id)
    {
        //
    }
}

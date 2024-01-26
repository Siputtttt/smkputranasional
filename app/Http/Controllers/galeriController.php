<?php

namespace App\Http\Controllers;

use App\Models\filterModels;
use App\Models\galeriModels;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class galeriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $galeri = galeriModels::orderBy('created_at', 'desc')->get();
        $filter = filterModels::get();
        $title = "galeri";
        return view('admin.galeri.index', compact('galeri', 'filter', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'judul_gambar' => 'required',
            'nama_filter' => 'required',
        ]);

        $input = [
            'judul_gambar' => $request->judul_gambar,
            'nama_filter' => $request->nama_filter,
        ];

        // var_dump($input);
        // die();
        if ($request->hasFile('foto')) {
            $foto_file = $request->file('foto');
            $foto_nama = $foto_file->hashName();
            $foto_file->move(public_path('galeri'), $foto_nama);

            $input['gambar'] = $foto_nama;
        }
        try {

            galeriModels::create($input);
            return redirect('/GaleriA')->with('pesan', "Data Telah Tersimpan");
        } catch (\Illuminate\Database\QueryException $e) {
            $errorCode = $e->errorInfo[1];
            if ($errorCode == 1062) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(galeriModels $galeriModels)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(String $id)
    {
        $galeri = galeriModels::where('id_galeri', $id)->first();
        $filter = filterModels::get();
        $title = 'galeri';
        return view('admin.galeri.edit', compact('galeri', 'filter', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, galeriModels $galeriModels)
    {
        $id = $request->id_galeri;
        $validator = $request->validate([
            'judul_gambar' => 'required',
            'nama_filter' => 'required',
        ]);

        $input = [
            'judul_gambar' => $request->judul_gambar,
            'nama_filter' => $request->nama_filter,
        ];
        if ($request->hasFile('foto')) {
            $foto_file = $request->file('foto');
            $foto_nama = $foto_file->hashName();
            $foto_file->move(public_path('galeri'), $foto_nama);

            $input['gambar'] = $foto_nama;

            // var_dump($input);
            // die();
            //hapus foto lama
            $foto_lama = $request->fotolama;
            File::delete('galeri/' . $foto_lama);
        }
        try {

            galeriModels::where('id_galeri', $id)->update($input);
            session()->flash('pesan', 'Data galeri telah diubah');
            return redirect('/GaleriA');
        } catch (\Illuminate\Database\QueryException $e) {
            $errorCode = $e->errorInfo[1];
            if ($errorCode == 1062) {
                return redirect()->back()->withErrors(['judul' => "Judul"])->withInput();
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        $galeri = galeriModels::where('id_galeri', $id)->first();
        File::delete('galeri/' . $galeri->gambar);
        galeriModels::where('id_galeri', $id)->delete();

        session()->flash('pesan', 'Data galeri telah dihapus');
        return redirect('/GaleriA');
    }
}

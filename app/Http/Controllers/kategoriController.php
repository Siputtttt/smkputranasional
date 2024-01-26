<?php

namespace App\Http\Controllers;

use App\Models\blogModels;
use App\Models\kategoriModels;
use Illuminate\Http\Request;

class kategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategori = kategoriModels::get();

        $title = "blog";
        return view('admin.kategori.index', compact('kategori', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'nama_kategori' => 'required',
            // 'keterangan_kategori' => 'required',
        ]);

        $input = $request->all();

        // var_dump($input);
        // die();
        try {
            kategoriModels::create($input);
            return redirect('/Kategori')->with('pesan', "Kategori Telah Tersimpan");
        } catch (\Illuminate\Database\QueryException $e) {
            $errorCode = $e->errorInfo[1];
            if ($errorCode == 1062) {
                return redirect()->back()->withErrors(['nama_kategori' => "nama_kategori"])->withInput();
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(String $id )
    {
        $kategori = kategoriModels::where('id_kategori', $id)->first();
        $blog = blogModels::where('id_kategori', $id)->get();
        $title = 'blog';
        return view('admin.kategori.show', compact('kategori', 'blog', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(String $id)
    {
        $kategori = kategoriModels::where('id_kategori', $id)->first();
        $title = 'blog';
        return view('admin.kategori.edit', compact('kategori', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, kategoriModels $kategoriModels)
    {
        $id = $request->id;
        $validator = $request->validate([
            'nama_kategori' => 'required',
            'keterangan_kategori' => 'required',
        ]);

        $input = [
            'nama_kategori' => $request->nama_kategori,
            'keterangan_kategori' => $request->keterangan_kategori
        ];
        kategoriModels::where('id_kategori', $id)->update($input);
        return redirect('/Kategori')->with('pesan', "Data telah berhasil diUpdate");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        kategoriModels::where('id_kategori', $id)->delete();

        $pesan = "Data penduduk berhasil dihapus";
        return redirect()->back()->with($pesan);
    }
}

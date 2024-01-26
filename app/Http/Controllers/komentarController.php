<?php

namespace App\Http\Controllers;

use App\Models\blogModels;
use App\Models\komentarModels;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class komentarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $komentar = komentarModels::orderBy('created_at', 'desc')->paginate(10);
        $title = "komentar";
        return view('admin.komentar.index', compact('komentar', 'title'));
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
        $judul = $request->judul;
        $validator = $request->validate([
            'id_blog' => 'required',
            'nama' => 'required',
            'email' => 'required',
            'komentar' => 'required',
        ]);

        $input = [
            'id_blog' => $request->id_blog,
            'nama' => $request->nama,
            'email' => $request->email,
            'komentar' => $request->komentar,
            'status' => "belum validasi",
        ];

        komentarModels::create($input);

        session()->flash('pesan', 'Komentar Anda akan tampil setelah moderasi');
        return redirect()->action([depanController::class, 'blogDetail'], ['judul' => $judul]);
    }

    /**
     * Display the specified resource.
     */
    public function show(komentarModels $komentarModels)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(String $id)
    {
        $komentar = komentarModels::where('id_komentar', $id)->first();
        $title = 'blog';
        return view('admin.komentar.edit', compact('komentar', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, komentarModels $komentarModels)
    {
        $id = $request->id;
        $validator = $request->validate([
            'status' => 'required',
        ]);

        $input = [
            'status' => $request->status,
        ];

        komentarModels::where('id_komentar', $id)->update($input);
        $pesan = "Komentar berhasil dihapus";
        return redirect('/Komentar')->with($pesan);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        komentarModels::where('id_komentar', $id)->delete();

        $pesan = "Komentar berhasil dihapus";
        return redirect()->back()->with($pesan);
    }
}

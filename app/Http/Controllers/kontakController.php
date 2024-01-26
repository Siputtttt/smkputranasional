<?php

namespace App\Http\Controllers;

use App\Models\kontakModels;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\Cast\String_;

class kontakController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kontak = kontakModels::orderBy('created_at', 'desc')->paginate(2);
        $title = "kontak";
        return view('admin.kontak.index', compact('kontak', 'title'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(String $id)
    {
        $kontak = kontakModels::where('id_kontak', $id)->first();
        $title = "kontak";
        return view('admin.kontak.show', compact('kontak', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(kontakModels $kontakModels)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, kontakModels $kontakModels)
    {
        $id = $request->id;
        $validator = $request->validate([
            'status' => 'required',
        ]);

        $input = [
            'status' => $request->status,
        ];

        kontakModels::where('id_kontak', $id)->update($input);
        $pesan = "Komentar berhasil dihapus";
        return redirect('/KontakA')->with($pesan);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        kontakModels::where('id_kontak', $id)->delete();

        session()->flash('pesan', 'Data Berhasil dihapus');
        return redirect()->back();
    }
}

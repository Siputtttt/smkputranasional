<?php

namespace App\Http\Controllers;

use App\Models\blogModels;
use App\Models\kategoriModels;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class blogController extends Controller
{
    public function index()
    {
        $data = blogModels::orderBy('tanggal', 'desc')->get();
        $title = 'blog';
        return view('admin.blog.index', compact('data', 'title'));
    }
    public function create()
    {
        $kt = kategoriModels::get();
        $title = "";
        return view('admin.blog.create', compact('title', 'kt'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'penulis' => 'required',
            'kutipan' => 'required',
            'judul' => 'required',
            'isi' => 'required',
            'tanggal' => 'required',
            'id_kategori' => 'required',
        ]);

        $input = [
            'penulis' => $request->penulis,
            'kutipan' => $request->kutipan,
            'judul' => $request->judul,
            'isi' => $request->isi,
            'tanggal' => $request->tanggal,
            'id_kategori' => $request->id_kategori,
        ];

        try {
            if ($request->hasFile('foto')) {
                $foto_file = $request->file('foto');
                $foto_nama = $foto_file->hashName();
                $foto_file->move(public_path('storage'), $foto_nama);

                $input['gambar'] = $foto_nama;
            }

            blogModels::create($input);
            return redirect('/Blog')->with('pesan', "Blog Telah Tersimpan");
        } catch (\Illuminate\Database\QueryException $e) {
            $errorCode = $e->errorInfo[1];
            if ($errorCode == 1062) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
        }
    }

    public function edit(String $id)
    {
        $blog = blogModels::where('id', $id)->first();
        $kategori = kategoriModels::get();
        $title = 'blog';
        return view('admin.blog.edit', compact('blog', 'kategori', 'title'));
    }

    // /**
    //  * Update the specified resource in storage.
    //  */
    public function update(Request $request, blogModels $blogModels)
    {
        $id = $request->id;

        // var_dump($id);
        // die();
        $validator = $request->validate([
            'penulis' => 'required',
            'kutipan' => 'required',
            'judul' => 'required',
            'isi' => 'required',
            'tanggal' => 'required',
            'id_kategori' => 'required',
        ]);

        $input = [
            'penulis' => $request->penulis,
            'kutipan' => $request->kutipan,
            'judul' => $request->judul,
            'isi' => $request->isi,
            'tanggal' => $request->tanggal,
            'id_kategori' => $request->id_kategori,
        ];


        if ($request->hasFile('foto')) {
            $foto_file = $request->file('foto');
            $foto_nama = $foto_file->hashName();
            $foto_file->move(public_path('storage'), $foto_nama);

            $input['gambar'] = $foto_nama;

            // var_dump($input);
            // die();
            //hapus foto lama
            $foto_lama = $request->fotolama;
            File::delete('storage/' . $foto_lama);
        }
        try {

            blogModels::where('id', $id)->update($input);
            return redirect('/Blog')->with('pesan', "Blog Telah Tersimpan");
        } catch (\Illuminate\Database\QueryException $e) {
            $errorCode = $e->errorInfo[1];
            if ($errorCode == 1062) {
                return redirect()->back()->withErrors(['judul' => "Judul"])->withInput();
            }
        }
    }

    // /**
    //  * Remove the specified resource from storage.
    //  */
    public function destroy(String $id)
    {
        $blog = blogModels::where('id', $id)->first();
        File::delete('storage/' . $blog->gambar);
        blogModels::where('id', $id)->delete();

        session()->flash('pesan', 'Blog berhasil dihapus');
        return redirect('/Blog');
    }
}

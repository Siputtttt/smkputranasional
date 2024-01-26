<?php

namespace App\Http\Controllers;

use App\Models\blogModels;
use App\Models\galeriModels;
use App\Models\kategoriModels;
use App\Models\komentarModels;
use App\Models\kontakModels;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class depanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = blogModels::orderBy('tanggal', 'desc')->paginate(9);
        $title = 'beranda';
        return view('depan.index', compact('data', 'title'));
    }
    public function blog()
    {
        $data = blogModels::orderBy('tanggal', 'desc')->paginate(6);
        $kategori = kategoriModels::get();
        $title = 'blog';
        return view('depan.blog', compact('data', 'kategori', 'title'));
    }
    public function blogDetail(String $judul)
    {
        $data = DB::table('blog')
            ->join('kategori', 'kategori.id_kategori', '=', 'blog.id_kategori')
            ->where('judul', $judul)
            ->get()->first();

        $title = 'blog';
        $komentar = komentarModels::where('id_blog', $data->id)->where('status', 'validasi')->paginate(5);
        $jmlkt = 0;
        foreach ($komentar as $jml) {
            $jmlkt++;
        }
        $blog = blogModels::get();
        $kategori = kategoriModels::get();
        return view('depan.blogdetail', compact('data', 'blog', 'kategori', 'komentar', 'jmlkt', 'title'));
    }
    public function komenDetail(Request $request)
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
    public function blogKategori(String $kategori)
    {
        $data = DB::table('kategori')
            ->join('blog', 'blog.id_kategori', '=', 'kategori.id_kategori')
            ->where('nama_kategori', $kategori)
            ->paginate(5);

        $hal = $kategori;
        $kategori = kategoriModels::get();
        $title = '';
        return view('depan.blogkategori', compact('data', 'kategori', 'hal', 'title'));
    }
    public function visimisi()
    {
        $title = "visimisi";
        return view('depan.visimisi', compact('title'));
    }
    public function galeri()
    {
        $kategori = kategoriModels::get();
        $galeri = galeriModels::orderBy('created_at', 'desc')->paginate(10);
        $title = "galeri";
        return view('depan.galeri', compact('kategori','galeri', 'title'));
    }
    public function kontak()
    {
        $title = "kontak";
        return view('depan.kontak', compact('title'));
    }
    public function kontakKirim(Request $request)
    {
        $validator = $request->validate([
            'nama_kontak' => 'required',
            'email_kontak' => 'required',
            'notel_kontak' => 'required',
            'subject_kontak' => 'required',
            'pesan_kontak' => 'required',
        ]);

        $input = [
            'nama_kontak' => $request->nama_kontak,
            'email_kontak' => $request->email_kontak,
            'notel_kontak' => $request->notel_kontak,
            'subject_kontak' => $request->subject_kontak,
            'pesan_kontak' => $request->pesan_kontak,
            'status' => "Belum dibaca",
        ];
        kontakModels::create($input);

        session()->flash('pesan', 'Kami akan segera menghubungi anda');
        return redirect()->action([depanController::class, 'kontak']);
    }
}

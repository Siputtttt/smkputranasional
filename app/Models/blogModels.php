<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class blogModels extends Model
{
    use HasFactory;
    protected $table = 'blog';
    protected $fillable = [
        'penulis',
        'kutipan',
        'judul',
        'isi',
        'tanggal',
        'gambar',
        'id_kategori',
    ];
    public $primaryKey = "id";
}

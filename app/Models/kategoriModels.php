<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kategoriModels extends Model
{
    use HasFactory;
    protected $table = 'kategori';
    // protected $guarded = ['id_kategori'];
    protected $fillable = [
        'id_kategori',
        'nama_kategori',
        'keterangan_kategori'
    ];
    public $primaryKey = "id_kategori";
}

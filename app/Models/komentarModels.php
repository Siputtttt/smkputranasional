<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class komentarModels extends Model
{
    use HasFactory;
    protected $table = 'komentar';
    protected $guarded = ['id'];
    protected $fillable = [
        'id_blog',
        'nama',
        'email',
        'komentar',
        'status',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kontakModels extends Model
{
    use HasFactory;
    protected $table = 'kontak';
    protected $guarded = ['id_kontak'];
    protected $fillable = [
        'nama_kontak',
        'email_kontak',
        'notel_kontak',
        'subject_kontak',
        'pesan_kontak',
        'status',
    ];
}

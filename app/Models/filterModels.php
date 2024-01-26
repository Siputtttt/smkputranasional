<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class filterModels extends Model
{
    use HasFactory;
    protected $table = 'filter_galeri';
    protected $fillable = [
        'filter',
    ];
    public $primaryKey = "id_filter";
}

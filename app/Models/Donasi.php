<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donasi extends Model
{
    use HasFactory;
    protected $table = 'donasi';

    protected $fillable = [
        'judul',
        'deskripsi',
        'target_donasi',
        'total_donasi',
        'id_user',
    ];
}

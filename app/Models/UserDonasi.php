<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDonasi extends Model
{
    use HasFactory;
    protected $table = 'user_donasi';

    protected $fillable = [
        'id_user',
        'id_donasi',
        'jumlah_donasi',
    ];
}

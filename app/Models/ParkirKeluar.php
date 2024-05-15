<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParkirKeluar extends Model
{
    use HasFactory;

    protected $fillable = [
        'no_polisi',
        'id_kartu',
        'jam_keluar',
    ];
}

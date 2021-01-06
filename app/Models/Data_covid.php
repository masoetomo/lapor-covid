<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data_covid extends Model
{
    use HasFactory;

    protected $fillable = [
        'penambahan_kasus',
        'dalam_perawatan',
        'penambahan_sembuh',
        'sembuh',
        'meninggal',
        'sakit_bukan_covid',
        'tanggal',
        'id_user'
    ];
}

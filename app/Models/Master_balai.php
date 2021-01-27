<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Master_balai extends Model
{
    use HasFactory;

    protected $fillable = [
        'tipe_balai',
        'nama',
        'jumlah_pegawai'
    ];
}

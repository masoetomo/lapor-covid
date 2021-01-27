<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Master_unit extends Model
{
    use HasFactory;

    protected $fillable = [
        'deputi',
        'unit',
        'jumlah_pegawai'
    ];

    public function wilayah()
    {
        return $this->belongsTo(Master_wilayah::class,'id_wilayah','id');
    }
}

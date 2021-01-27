<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Master_wilayah extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_wilayah'
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'id_wilayah');
    }
}

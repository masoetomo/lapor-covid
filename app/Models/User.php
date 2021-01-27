<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'username',
        'tipe_akun',
        'id_wilayah',
        'id_unit'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function wilayah()
    {
        return $this->belongsTo(Master_wilayah::class,'id_wilayah','id');
    }

    public function tipeAkun()
    {
        return $this->belongsTo(Master_tipe_akun::class,'tipe_akun','id');
    }

    public function idUnit()
    {
        return $this->belongsTo(Master_unit::class,'id_unit','id');
    }
    public function idBalaiUnit()
    {
        return $this->belongsTo(Master_balai::class,'id_unit','id');
    }
    public function idlokaUnit()
    {
        return $this->belongsTo(Master_loka::class,'id_unit','id');
    }
}

<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'is_admin',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    public function profil(){

        return $this->hasOne('App\Profil');

    }

    public function iklan(){

        return $this->hasMany('App\Iklan');

    }

    public function pelaporan(){

        return $this->hasMany('App\PelaporanUser');

    }

    public function transaksi(){

        return $this->hasMany('App\Transaksi');

    }

    public function notofikasi(){

        return $this->hasMany('App\Notifikasi');

    }

    public function pesan(){

        return $this->hasMany('App\Pesan');

    }
    
     protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}

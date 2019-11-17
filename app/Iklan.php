<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Iklan extends Model
{
    protected $table = "iklans";
    protected $fillable = [
        'user_id',	'kategori',	'pemilik', 'nama_barang', 'harga_sewa', 'deskripsi', 'status', 'suka'
    ];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function gambar(){
        return $this->hasMany('App\Gambar');
    }

    public function ulasan(){
        return $this->hasMany('App\Ulasan');
    }

    public function getCreatedAtAttribute()
    {
        return \Carbon\Carbon::parse($this->attributes['created_at'])->format('d M Y H:i');
    }
}

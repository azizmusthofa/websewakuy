<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = "transaksis";
    protected $fillable = [
        'user_id',	'iklan_id',	'pembayaran', 'pengambilan_barang', 'tanggal_sewa', 'lama', 'total', 'acc'
    ];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function iklan()
    {
    	return $this->belongsTo('App\Iklan');
    }

    public function notifikasi()
    {
    	return $this->hasOne('App\Notifikasi');
    }

    public function getTanggalSewaAttribute()
    {
        return \Carbon\Carbon::parse($this->attributes['tanggal_sewa'])->format('d M Y');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notifikasi extends Model
{
    protected $table = "notifikasis";
    protected $fillable = [
        'user_id',	'transaksi_id',	'isi'
    ];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function transaksi()
    {
    	return $this->belongsTo('App\Transaksi');
    }
}

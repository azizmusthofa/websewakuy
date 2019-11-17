<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
    protected $table = "profils";

    protected $fillable = [
        'user_id', 'jenis_kelamin', 'alamat', 'kota', 'telpon', 'file',
    ];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}

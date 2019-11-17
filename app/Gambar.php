<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gambar extends Model
{
    protected $table = "gambars";
    protected $fillable = ['iklan_id', 'file'];

    public function iklan()
    {
    	return $this->belongsTo('App\Iklan');
    }
}

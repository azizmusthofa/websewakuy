<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ulasan extends Model
{
    protected $table = "ulasans";
    protected $fillable = ['iklan_id', 'nama', 'email', 'isi', 'rating'];

    public function iklan()
    {
    	return $this->belongsTo('App\Iklan');
    }
    public function getCreatedAtAttribute()
    {
        return \Carbon\Carbon::parse($this->attributes['created_at'])->format('d M Y H:i');
    }
}

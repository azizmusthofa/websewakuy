<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PelaporanIklan extends Model
{
    protected $table = "pelaporan_iklans";
    protected $fillable = [
        'iklan_id',	'pelapor_id', 'alasan', 'keterangan'
    ];

    public function iklan()
    {
    	return $this->belongsTo('App\Iklan');
    }
    
    public function getCreatedAtAttribute()
    {
        return \Carbon\Carbon::parse($this->attributes['created_at'])->format('d M Y H:i');
    }
}

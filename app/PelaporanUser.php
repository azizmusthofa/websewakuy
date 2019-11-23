<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PelaporanUser extends Model
{
    protected $table = "pelaporan_users";
    protected $fillable = [
        'user_id',	'pelapor_id', 'alasan', 'keterangan'
    ];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function getCreatedAtAttribute()
    {
        return \Carbon\Carbon::parse($this->attributes['created_at'])->format('d M Y H:i');
    }
}

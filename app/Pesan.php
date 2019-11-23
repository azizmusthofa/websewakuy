<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pesan extends Model
{
    protected $fillable = [
        'isi_pesan',
    ];

    protected $appends = ['selfMessage'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function getSelfMessageAttribute()
    {
        return $this->user_id === auth()->user()->id;
    }
}

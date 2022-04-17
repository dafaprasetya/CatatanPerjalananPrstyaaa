<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    protected $fillable = [
        'user_id',
        'lokasi',
        'jam',
        'tanggal',
        'suhu',
    ];
    protected $dateFormat = 'Y-m-d';
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Psikolog extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'psikolog';
    protected $guarded = [
        'id'
    ];
    protected $with = [
        'user'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function jadwal()
    {
        return $this->hasMany(Jadwal::class);
    }
    public function keahlian()
    {
        return $this->hasMany(Keahlian::class);
    }
    
    public function konsultasi()
    {
        return $this->hasMany(Konsultasi::class);
    }
    public function psikotes()
    {
        return $this->hasMany(Psikotes::class);
    }
}

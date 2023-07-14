<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Jadwal extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'jadwal';
    protected $guarded = [
        'id'
    ];

    protected $with = [
        'psikolog',
        'ruangan',
    ];


    public function psikolog()
    {
        return $this->belongsTo(Psikolog::class)->withTrashed();
    }

    public function ruangan()
    {
        return $this->belongsTo(Ruangan::class)->withTrashed();
    }
    
    public function konsultasi()
    {
        return $this->hasMany(Konsultasi::class)->withTrashed();
    }

    public function psikotes()
    {
        return $this->hasMany(Psikotes::class)->withTrashed();
    }
}

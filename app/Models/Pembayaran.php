<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pembayaran extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'pembayaran';
    protected $guarded = [
        'id'
    ];

    protected $with = [
        'psikotes',
        'konsultasi'
    ];

    public function psikotes()
    {
        return $this->belongsTo(Psikotes::class, 'psikotes_id');
    }

    public function konsultasi()
    {
        return $this->belongsTo(Konsultasi::class, 'konsultasi_id');
    }
}

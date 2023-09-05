<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Psikotes extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'psikotes';
    protected $guarded = [
        'id'
    ];

    protected $with = [
        'psikolog',
        'member',
        'jadwal',
        'jenis_psikotes',
    ];

    public function member()
    {
        return $this->belongsTo(Member::class, 'member_id');
    }
    public function jenis_psikotes()
    {
        return $this->belongsTo(JenisPsikotes::class, 'jenis_psikotes_id');
    }

    public function psikolog()
    {
        return $this->belongsTo(Psikolog::class, 'psikolog_id');
    }

    public function jadwal()
    {
        return $this->belongsTo(Jadwal::class, 'jadwal_id');
    }

    public function nilai_psikotes()
    {
        return $this->hasOne(NilaiPsikotes::class);
    }
    public function pembayaran()
    {
        return $this->hasOne(Pembayaran::class);
    }
}

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
        'jadwal'
    ];

    public function member()
    {
        return $this->belongsTo(Member::class, 'member_id')->withTrashed();
    }

    public function psikolog()
    {
        return $this->belongsTo(Psikolog::class, 'psikolog_id')->withTrashed();
    }

    public function jadwal()
    {
        return $this->belongsTo(Jadwal::class, 'jadwal_id')->withTrashed();
    }

    public function nilai_psikotes()
    {
        return $this->hasOne(NilaiPsikotes::class)->withTrashed();
    }
    public function nilai_komponen()
    {
        return $this->hasMany(NilaiKomponen::class)->withTrashed();
    }
    public function pembayaran()
    {
        return $this->hasMany(Pembayaran::class)->withTrashed();
    }
}

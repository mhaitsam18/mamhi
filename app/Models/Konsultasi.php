<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Konsultasi extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'konsultasi';
    protected $guarded = [
        'id'
    ];
    protected $with = [
        'member',
        'psikolog',
        'jadwal',
    ];

    public function member()
    {
        return $this->belongsTo(Member::class, 'member_id');
    }
    public function psikolog()
    {
        return $this->belongsTo(Psikolog::class, 'psikolog_id');
    }

    public function jadwal()
    {
        return $this->belongsTo(Jadwal::class, 'jadwal_id');
    }

    public function diagnosis()
    {
        return $this->hasOne(Diagnosis::class);
    }

    public function pembayaran()
    {
        return $this->hasOne(Pembayaran::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiKomponen extends Model
{
    use HasFactory;
    protected $guarded = [
        'id'
    ];

    protected $with = [
        'komponen_nilai',
        'nilai_psikotes'
    ];

    public function komponen_nilai()
    {
        return $this->belongsTo(KomponenNilai::class, 'komponen_nilai_id')->withTrashed();
    }

    public function nilai_psikotes()
    {
        return $this->belongsTo(NilaiPsikotes::class, 'nilai_psikotes_id')->withTrashed();
    }
}

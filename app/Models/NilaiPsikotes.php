<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiPsikotes extends Model
{
    use HasFactory;

    protected $table = 'nilai_psikotes';
    protected $guarded = [
        'id'
    ];

    protected $with = [
        'psikotes'
    ];

    public function psikotes()
    {
        return $this->belongsTo(Psikotes::class, 'psikotes_id')->withTrashed();
    }
    public function nilai_komponen()
    {
        return $this->hasMany(NilaiKomponen::class)->withTrashed();
    }


}

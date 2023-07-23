<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JenisPsikotes extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'jenis_psikotes';
    protected $guarded = [
        'id'
    ];
    // protected $with = [
    //     'psikotes'
    // ];

    public function psikotes()
    {
        return $this->hasMany(Psikotes::class)->withTrashed();
    }
}

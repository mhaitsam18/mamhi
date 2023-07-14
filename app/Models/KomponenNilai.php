<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KomponenNilai extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'komponen_nilai';
    protected $guarded = [
        'id'
    ];

    public function nilai_komponen()
    {
        return $this->hasMany(NilaiKomponen::class)->withTrashed();
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ruangan extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'ruangan';
    protected $guarded = [
        'id'
    ];


    public function jadwal()
    {
        return $this->hasMany(Jadwal::class);
    }

}

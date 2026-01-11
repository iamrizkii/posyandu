<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ortu extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function anak()
    {
        return $this->hasMany(Anak::class);
    }

    public function anaks()
    {
        return $this->hasMany(Anak::class);
    }
}

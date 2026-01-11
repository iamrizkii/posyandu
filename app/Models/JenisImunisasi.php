<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisImunisasi extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function imunisasi()
    {
        return $this->hasMany(Imunisasi::class, 'jenisimunisasi_id');
    }

    public function imunisasis()
    {
        return $this->hasMany(Imunisasi::class, 'jenisimunisasi_id');
    }

}

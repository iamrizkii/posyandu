<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imunisasi extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $with = ['jenisimunisasi', 'anak'];
    protected $dates = ['tgl_imun'];

    public function anak() {
        return $this->belongsTo(Anak::class);
    }

    public function jenisimunisasi() {
        return $this->belongsTo(JenisImunisasi::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timbang extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $dates = ['tanggal'];

    public function anak()
    {
        return $this->belongsTo(Anak::class);
    }
}

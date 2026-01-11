<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anak extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $with = ['ortu'];
    protected $dates = ['tgl_lhr'];

    public function ortu()
    {
        return $this->belongsTo(Ortu::class);
    }
    public function imunisasi()
    {
        return $this->hasMany(Imunisasi::class);
    }

    public function imunisasis()
    {
        return $this->hasMany(Imunisasi::class);
    }

    public function vitamina()
    {
        return $this->hasMany(VitaminA::class);
    }

    public function vitaminAs()
    {
        return $this->hasMany(VitaminA::class);
    }

    public function getAgeAttribute()
    {
        setlocale(LC_TIME, 'id_ID');
        \Carbon\Carbon::setLocale('id');
        \Carbon\Carbon::now()->isoFormat('D MMMM Y');
        return $this->tgl_lhr->diff(\Carbon\Carbon::now())->format('%y Tahun, %m Bulan, %d Hari');
    }
}

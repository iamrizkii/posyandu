<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VitaminA extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $with = ['anak'];

    public function anak() {
        return $this->belongsTo(Anak::class);
    }
}

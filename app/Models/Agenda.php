<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Agenda extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = ['id'];
    protected $dates = ['waktu'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'judul'
            ]
        ];
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}

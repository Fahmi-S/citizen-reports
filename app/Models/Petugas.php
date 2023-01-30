<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Petugas extends Model
{
    use HasFactory, Sluggable, SoftDeletes;
    protected $table = 'petugas';

    protected $fillable = [
        'nama_petugas',
        'foto',
        'slug',
        'username',
        'password',
        'telp',
        'level',
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'nama_petugas'
            ]
        ];
    }
}

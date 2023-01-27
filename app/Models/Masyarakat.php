<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
// use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Warga;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Masyarakat extends Warga
{
    use HasFactory, Notifiable, Sluggable, SoftDeletes;
    public $incrementing = false;

    protected $primaryKey = 'nik';
    protected $keyType = 'string';
    protected $table = 'masyarakat';
    protected $guard = 'masyarakat';

    protected $fillable = [
        'nik', 'nama', 'slug', 'username', 'password','telp',
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'nama'
            ]
        ];
    }

    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Get all of the comments for the Masyarakat
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function report()
    {
        return $this->hasMany(Report::class, 'nik', 'nik');
    }
}

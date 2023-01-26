<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
// use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Warga;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Masyarakat extends Warga
{
    use HasFactory, Notifiable;
    public $incrementing = false;

    protected $primaryKey = 'nik';
    protected $keyType = 'string';
    protected $table = 'masyarakat';
    protected $guard = 'masyarakat';

    protected $fillable = [
        'nik', 'nama', 'username', 'password','telp',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}

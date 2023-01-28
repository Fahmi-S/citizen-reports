<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;
    protected $table = 'pengaduan';
    protected $fillable = [
        'tgl_pengaduan',
        'nik',
        'isi_laporan',
        'foto',
        'status',
    ];

    public function masyarakat()
    {
        return $this->belongsTo(Masyarakat::class, 'nik', 'nik');
    }

    public function tanggapan()
    {
        return $this->hasOne(Tanggapan::class, 'id_pengaduan', 'id');
    }
}

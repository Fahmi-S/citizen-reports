<?php

namespace App\Models;

use App\Models\Report;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tanggapan extends Model
{
    use HasFactory;
    protected $table = 'tanggapan';
    protected $fillable = [
        'id',
        'id_pengaduan',
        'tgl_tanggapan',
        'tanggapan',
        'id_petugas',
    ];


    public function reports()
    {
        return $this->belongsTo(Report::class, 'id_pengaduan', 'id');
    }
}

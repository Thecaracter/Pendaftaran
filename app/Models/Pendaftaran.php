<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;
    protected $table = 'pendaftaran';

    protected $fillable = [
        'id_lomba',
        'nama',
        'email',
        'no_hp',
        'alamat',
        'asal_sekolah',
        'nisn',
        'status_pembayaran',
        'tanggal_pendaftaran',
    ];

    protected $casts = [
        'status_pembayaran' => 'integer',
        'tanggal_pendaftaran' => 'datetime',
    ];

    public function lomba()
    {
        return $this->belongsTo(Lomba::class, 'id_lomba');
    }
}
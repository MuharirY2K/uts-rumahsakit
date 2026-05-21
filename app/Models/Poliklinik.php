<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poliklinik extends Model
{
    use HasFactory;

    // Menentukan nama tabel rumah sakit di database
    protected $table = 'polikliniks';

    // Menentukan kolom-kolom yang boleh diisi massal (mass assignment)
    protected $fillable = [
        'kode_poli',
        'nama_poli',
        'tipe_layanan',
        'status',
    ];

    // ===== RELASI =====

    /**
     * Satu Poliklinik memiliki BANYAK Dokter
     * Relasi: hasMany
     */
    public function dokters()
    {
        // Menghubungkan ke model Dokter menggunakan foreign key 'poliklinik_id'
        return $this->hasMany(Dokter::class, 'poliklinik_id');
    }
}

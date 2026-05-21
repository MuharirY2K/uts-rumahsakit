<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    use HasFactory;

    // Menentukan nama tabel di database
    protected $table = 'dokters';

    // Kolom yang diizinkan untuk pengisian massal
    protected $fillable = [
        'poliklinik_id',
        'str_id',
        'nama',
        'email',
        'tahun_bergabung',
        'status',
        'no_hp',
        'alamat',
        'foto',
    ];

    // ===== RELASI =====

    /**
     * Dokter MILIK satu Poliklinik
     * Relasi: belongsTo
     * Akses: $dokter->poliklinik->nama_poli
     */
    public function poliklinik()
    {
        return $this->belongsTo(Poliklinik::class, 'poliklinik_id');
    }

    /**
     * Satu Dokter memiliki BANYAK Jadwal Praktik
     * Relasi: hasMany
     * Akses: $dokter->jadwalPraktiks
     */
    public function jadwalPraktiks()
    {
        return $this->hasMany(JadwalPraktik::class, 'dokter_id');
    }

    // ===== HELPER METHOD (ACCESSOR) =====

    /**
     * Hitung total kuota pelayanan pasien dari semua jadwal dokter ini
     * Akses: $dokter->total_kuota
     */
    public function getTotalKuotaAttribute(): int
    {
        // Jika belum memiliki jadwal praktik, kembalikan nilai 0
        if ($this->jadwalPraktiks->isEmpty()) {
            return 0;
        }

        // Menjumlahkan seluruh kolom kuota_pasien dari jadwal milik dokter ini
        return (int) $this->jadwalPraktiks->sum('kuota_pasien');
    }
}

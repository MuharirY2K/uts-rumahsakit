<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalPraktik extends Model
{
    use HasFactory;

    // Menentukan nama tabel rumah sakit di database
    protected $table = 'jadwalpraktiks';

    // Kolom-kolom yang diizinkan untuk pengisian massal
    protected $fillable = [
        'dokter_id',
        'kode_ruangan',
        'hari',
        'kuota_pasien',
        'jam_mulai',
        'jam_selesai',
        'sesi',
        'periode_aktif',
    ];

    // Menghastikan tipe data spesifik saat data diakses
    protected $casts = [
        'kuota_pasien' => 'integer',
        'jam_mulai'    => 'datetime:H:i', // Memformat output waktu agar rapi (Jam:Menit)
        'jam_selesai'  => 'datetime:H:i',
    ];

    // ===== RELASI =====

    /**
     * Jadwal Praktik MILIK satu Dokter
     * Relasi: belongsTo
     * Akses: $jadwal->dokter->nama
     */
    public function dokter()
    {
        return $this->belongsTo(Dokter::class, 'dokter_id');
    }

    // ===== HELPER: Kategori kapasitas pelayanan berdasarkan jumlah kuota =====
    public static function kategoriKuota(int $kuota): string
    {
        return match(true) {
            $kuota <= 10 => 'Terbatas',
            $kuota <= 25 => 'Sedang',
            default      => 'Banyak',
        };
    }
}

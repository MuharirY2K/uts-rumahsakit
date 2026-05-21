<?php

namespace Database\Factories;

use App\Models\Dokter;
use App\Models\JadwalPraktik;
use Illuminate\Database\Eloquent\Factories\Factory;

class JadwalPraktikFactory extends Factory
{
    // Menggantikan array $matakuliah menjadi data set operasional jadwal rumah sakit
    private static array $operasionalJadwal = [
        ['sesi' => 'Pagi',  'mulai' => '08:00', 'selesai' => '12:00', 'kuota' => 15],
        ['sesi' => 'Siang', 'mulai' => '13:00', 'selesai' => '16:00', 'kuota' => 12],
        ['sesi' => 'Sore',  'mulai' => '16:00', 'selesai' => '19:00', 'kuota' => 10],
        ['sesi' => 'Malam', 'mulai' => '19:00', 'selesai' => '21:00', 'kuota' => 8],
    ];

    public function definition(): array
    {
        // Mengambil salah satu pengaturan sesi praktik secara acak
        $jadwal = fake()->randomElement(self::$operasionalJadwal);
        $periodeAktif = fake()->numberBetween(2025, 2026);

        return [
            // Sepadan dengan mahasiswa_id (Menghubungkan ke ID dokter acak yang aktif)
            'dokter_id'     => Dokter::inRandomOrder()->value('id'),

            // Sepadan dengan kode_mk (Membuat kode ruang periksa acak, misal: R-105)
            'kode_ruangan'  => 'R-' . fake()->numerify('###'),

            // Sepadan dengan nama_mk (Mengisi nama hari praktik)
            'hari'          => fake()->randomElement(['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu']),

            // Sepadan dengan sks
            'kuota_pasien'  => $jadwal['kuota'],

            // Sepadan dengan nilai_angka & nilai_huruf
            'jam_mulai'     => $jadwal['mulai'],
            'jam_selesai'   => $jadwal['selesai'],

            // Sepadan dengan semester
            'sesi'          => $jadwal['sesi'],

            // Sepadan dengan tahun_akademik
            'periode_aktif' => $periodeAktif,
        ];
    }
}

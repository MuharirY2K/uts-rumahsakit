<?php
// database/seeders/JadwalPraktikSeeder.php

namespace Database\Seeders;

use App\Models\Dokter;
use App\Models\JadwalPraktik;
use Illuminate\Database\Seeder;

class JadwalPraktikSeeder extends Seeder
{
    public function run(): void
    {
        // Pastikan data dokter sudah ada sebelum membuat jadwal praktik
        if (Dokter::count() === 0) {
            $this->command->warn('DokterSeeder harus dijalankan lebih dulu!');
            return;
        }

        // Setiap dokter mendapat 1-3 jadwal praktik operasional di RS
        Dokter::all()->each(function ($dokter) {
            $jumlahJadwal = rand(1, 3);

            JadwalPraktik::factory($jumlahJadwal)->create([
                'dokter_id' => $dokter->id,
            ]);
        });

        // Pesan sukses di terminal
        $this->command->info('JadwalPraktikSeeder: ' . JadwalPraktik::count() . ' data jadwal praktik berhasil dibuat.');
    }
}

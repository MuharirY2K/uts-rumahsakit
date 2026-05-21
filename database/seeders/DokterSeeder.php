<?php
// database/seeders/DokterSeeder.php

namespace Database\Seeders;

use App\Models\Poliklinik;
use App\Models\Dokter;
use Illuminate\Database\Seeder;

class DokterSeeder extends Seeder
{
    public function run(): void
    {
        // Pastikan data poliklinik sudah ada (Sepadan dengan pengecekan Prodi)
        if (Poliklinik::count() === 0) {
            $this->command->warn('PoliklinikSeeder harus dijalankan lebih dulu!');
            return;
        }

        // Buat 30 dokter dummy menggunakan Factory (Sepadan dengan factory mahasiswa)
        Dokter::factory(30)->create();

        // Tambah 1 data dokter manual untuk keperluan demo/testing login/fitur
        // Kita ambil contoh dokter yang ditugaskan di Poliklinik Umum (POL-UMM)
        $poliklinik = Poliklinik::where('kode_poli', 'POL-UMM')->first();

        Dokter::create([
            'poliklinik_id'   => $poliklinik->id,
            'str_id'          => '3111100221143254', // 16 digit STR dummy
            'nama'            => 'dr. Ahmad Rizky Pratama, Sp.PD',
            'email'           => 'ahmad.rizky@example.com',
            'tahun_bergabung' => 2021,
            'status'          => 'aktif',
            'no_hp'           => '081234567890',
            'alamat'          => 'Jl. Sudirman No. 10, Jakarta',
        ]);

        $this->command->info('DokterSeeder: ' . Dokter::count() . ' data dokter berhasil dibuat.');
    }
}

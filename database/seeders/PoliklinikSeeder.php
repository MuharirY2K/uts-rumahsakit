<?php
// database/seeders/PoliklinikSeeder.php

namespace Database\Seeders;

use App\Models\Poliklinik;
use Illuminate\Database\Seeder;

class PoliklinikSeeder extends Seeder
{
    public function run(): void
    {
        // Data poliklinik yang pasti ada (data statis)
        $polikliniks = [
            ['kode_poli' => 'POL-UMM',  'nama_poli' => 'Poliklinik Umum',                  'tipe_layanan' => 'Reguler',   'status' => 'aktif'],
            ['kode_poli' => 'POL-ANAK', 'nama_poli' => 'Poliklinik Anak',                  'tipe_layanan' => 'Reguler',   'status' => 'aktif'],
            ['kode_poli' => 'POL-INT',  'nama_poli' => 'Poliklinik Penyakit Dalam',         'tipe_layanan' => 'Reguler',   'status' => 'aktif'],
            ['kode_poli' => 'POL-GIGI', 'nama_poli' => 'Poliklinik Gigi dan Mulut',         'tipe_layanan' => 'Reguler',   'status' => 'aktif'],
            ['kode_poli' => 'POL-OBG',  'nama_poli' => 'Poliklinik Kebidanan & Kandungan', 'tipe_layanan' => 'Eksekutif', 'status' => 'aktif'],
        ];

        foreach ($polikliniks as $poli) {
            Poliklinik::create($poli);
        }

        // Pesan informasi sukses di terminal saat menjalankan php artisan db:seed
        $this->command->info('PoliklinikSeeder: ' . count($polikliniks) . ' poliklinik berhasil dibuat.');
    }
}

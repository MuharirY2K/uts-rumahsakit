<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Urutan ini WAJIB diikuti karena adanya foreign key (Integritas Data):
        // 1. Poliklinik dulu (Tabel Master Utama, tidak bergantung pada tabel lain)
        // 2. Dokter (Bergantung pada tabel polikliniks via poliklinik_id)
        // 3. JadwalPraktik (Bergantung pada tabel dokters via dokter_id)
        $this->call([
            PoliklinikSeeder::class,
            DokterSeeder::class,
            JadwalPraktikSeeder::class,
        ]);
    }
}

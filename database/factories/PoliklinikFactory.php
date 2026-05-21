<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PoliklinikFactory extends Factory
{
    public function definition(): array
    {
        // Menyediakan data tiruan poliklinik rumah sakit yang realistis
        $polikliniks = [
            ['kode' => 'POL-UMM',  'nama' => 'Poliklinik Umum',         'layanan' => 'Reguler'],
            ['kode' => 'POL-ANAK', 'nama' => 'Poliklinik Anak',         'layanan' => 'Reguler'],
            ['kode' => 'POL-INT',  'nama' => 'Poliklinik Penyakit Dalam', 'layanan' => 'Reguler'],
            ['kode' => 'POL-GIGI', 'nama' => 'Poliklinik Gigi dan Mulut', 'layanan' => 'Reguler'],
            ['kode' => 'POL-OBG',  'nama' => 'Poliklinik Kebidanan & Kandungan', 'layanan' => 'Eksekutif'],
            ['kode' => 'POL-MATA', 'nama' => 'Poliklinik Mata',         'layanan' => 'Reguler'],
            ['kode' => 'POL-MCU',  'nama' => 'Poliklinik Medical Check Up', 'layanan' => 'MCU'],
        ];

        // Mengambil salah satu elemen acak secara unik agar tidak terjadi duplikasi saat seeding
        $poli = fake()->unique()->randomElement($polikliniks);

        return [
            'kode_poli'    => $poli['kode'],
            'nama_poli'    => $poli['nama'],
            'tipe_layanan' => $poli['layanan'],
            'status'       => 'aktif',
        ];
    }
}

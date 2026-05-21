<?php

namespace Database\Factories;

use App\Models\Poliklinik;
use Illuminate\Database\Eloquent\Factories\Factory;

class DokterFactory extends Factory
{
    public function definition(): array
    {
        // Sepadan dengan angkatan (Tahun dokter bergabung di RS, rentang beberapa tahun ke belakang)
        $tahunBergabung = fake()->numberBetween(2018, 2025);

        // Ambil poliklinik_id secara acak dari data yang sudah ada di database (Sepadan dengan prodiId)
        $poliklinikId = Poliklinik::inRandomOrder()->value('id');

        return [
            'poliklinik_id'   => $poliklinikId,

            // Sepadan dengan nim (Membuat format STR Dokter unik berisi 16 digit angka acak)
            'str_id'          => fake()->unique()->numerify('################'),

            'nama'            => fake()->name(),
            'email'           => fake()->unique()->safeEmail(),
            'tahun_bergabung' => $tahunBergabung,

            // Sepadan dengan status mahasiswa (Disesuaikan dengan pilihan enum status keaktifan rumah sakit)
            'status'          => fake()->randomElement([
                'aktif', 'aktif', 'aktif', 'cuti', 'resign'
            ]),

            'no_hp'           => '08' . fake()->numerify('##########'),
            'alamat'          => fake()->address(),
            'foto'            => null,
        ];
    }
}

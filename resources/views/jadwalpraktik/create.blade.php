<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('jadwal_praktiks', function (Blueprint $table) {
            $table->id();

            // Foreign Key ke tabel dokters (Sepadan dengan mahasiswa_id)
            $table->foreignId('dokter_id')
                  ->constrained('dokters')
                  ->onDelete('cascade'); // jika dokter dihapus, jadwal praktiknya ikut terhapus

            // Sepadan dengan 'kode_mk' (contoh: R-101, LT2-04)
            $table->string('kode_ruangan', 10);

            // Sepadan dengan 'nama_mk' (contoh: Senin, Selasa, Rabu)
            $table->string('hari', 10);

            // Sepadan dengan 'sks' (kapasitas pasien per sesi jadwal)
            $table->tinyInteger('kuota_pasien');

            // Sepadan dengan 'nilai_angka' & 'nilai_huruf' (menggunakan tipe data waktu asli)
            $table->time('jam_mulai');
            $table->time('jam_selesai');

            // Sepadan dengan 'semester' (contoh: Pagi, Siang, Malam)
            $table->string('sesi', 10);

            // Sepadan dengan 'tahun_akademik' (masa berlaku jadwal, contoh: 2026)
            $table->year('periode_aktif');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jadwal_praktiks');
    }
};

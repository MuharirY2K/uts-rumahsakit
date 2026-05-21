<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('jadwalpraktiks', function (Blueprint $table) {
            $table->id();

            // PASTIKAN BARIS INI MENGGUNAKAN dokter_id DAN constrained('dokters')
            $table->foreignId('dokter_id')
                  ->constrained('dokters')
                  ->onDelete('cascade');

            $table->string('kode_ruangan', 10);
            $table->string('hari', 10);
            $table->tinyInteger('kuota_pasien');
            $table->time('jam_mulai');
            $table->time('jam_selesai');
            $table->string('sesi', 10);
            $table->year('periode_aktif');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jadwalpraktiks');
    }
};

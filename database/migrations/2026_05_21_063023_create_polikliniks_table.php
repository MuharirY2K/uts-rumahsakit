<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Pastikan nama tabelnya 'polikliniks'
        Schema::create('polikliniks', function (Blueprint $table) {
            $table->id();
            $table->string('kode_poli', 10)->unique(); // Pastikan 'kode_poli'
            $table->string('nama_poli', 100);          // Pastikan 'nama_poli'
            $table->enum('tipe_layanan', ['Reguler', 'Eksekutif', 'MCU', 'BPJS'])->default('Reguler');
            $table->enum('status', ['aktif', 'nonaktif'])->default('aktif');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('polikliniks');
    }
};

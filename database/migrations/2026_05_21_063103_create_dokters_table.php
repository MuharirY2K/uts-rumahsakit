<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('dokters', function (Blueprint $table) {
            $table->id();

            // PASTIKAN BARIS INI MENGGUNAKAN poliklinik_id DAN polikliniks
            $table->foreignId('poliklinik_id')
                  ->constrained('polikliniks')
                  ->onDelete('restrict');

            $table->string('str_id', 20)->unique();
            $table->string('nama', 100);
            $table->string('email', 100)->unique();
            $table->year('tahun_bergabung');
            $table->enum('status', ['aktif', 'cuti', 'resign'])->default('aktif');
            $table->string('no_hp', 15)->nullable();
            $table->text('alamat')->nullable();
            $table->string('foto')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('dokters');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('jadwal_siswas', function (Blueprint $table) {
            $table->id();
            $table->string('hari');
            $table->time('jam_mulai');
            $table->time('jam_selesai');
            $table->unsignedBigInteger('siswa_id');
            $table->string('namakursus', 50)->nullable();
            $table->string('namainstruktur', 50)->nullable();
            $table->timestamps();

            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal_siswas');
    }
};

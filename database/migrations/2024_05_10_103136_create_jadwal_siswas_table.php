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
            $table->unsignedBigInteger('kursus_id');
            $table->unsignedBigInteger('instruktur_id');
            $table->timestamps();

            // Define foreign key constraints
            $table->foreign('siswa_id')->references('id')->on('siswas')->onDelete('cascade');
            $table->foreign('kursus_id')->references('id')->on('kursuses')->onDelete('cascade'); 
            $table->foreign('instruktur_id')->references('id')->on('instrukturs')->onDelete('cascade'); 
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

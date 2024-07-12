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
        Schema::create('kursuses', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kursus', 30);
            $table->decimal('harga', 8, 2);
            $table->string('deskripsi')->nullable();
            $table->unsignedBigInteger('instruktur_id');
            $table->foreign('instruktur_id')->references('id')->on('instrukturs')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kursuses');
    }
};

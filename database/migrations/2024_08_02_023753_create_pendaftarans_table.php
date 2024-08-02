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
        Schema::create('pendaftarans', function (Blueprint $table) {
            $table->id();
            $table->string('id_pendaftaran')->unique();
            $table->string('foto')->nullable();
            $table->string('nama', 50);
            $table->string('orangtua', 50 );
            $table->string('emailortu', 50);
            $table->string('jk', 10);
            $table->string('email')->nullable();
            $table->string('no_telp', 15);
            $table->string('alamat', 150);
            $table->unsignedBigInteger('kursus_id');
	        $table->foreign('kursus_id')->references('id')->on('kursuses')->onDelete('cascade'); 
            $table->date('tgl_lahir');
            $table->enum('status', ['active', 'inactive', 'pending'])->default('inactive');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftarans');
    }
};

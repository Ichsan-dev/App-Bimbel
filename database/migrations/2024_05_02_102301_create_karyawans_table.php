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
    Schema::create('karyawan', function (Blueprint $table) {
        $table->id();
        $table->string('nama', 100);
        $table->string('jk', 10); // Ubah menjadi char(1) jika hanya ada dua opsi
        $table->string('no_telp', 15); // Sesuaikan panjang jika perlu
        $table->string('email')->nullable();
        $table->string('pend_akhir')->nullable(); // Sesuaikan panjang jika perlu
        $table->string('alamat');
        $table->date('tanggal_lahir');
        $table->foreignId('jabatan_id')->constrained('jabatans');
        $table->timestamps();
    });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('karyawans');
    }
};

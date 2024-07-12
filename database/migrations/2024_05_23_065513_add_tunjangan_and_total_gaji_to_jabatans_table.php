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
        Schema::table('jabatans', function (Blueprint $table) {
            $table->decimal('tunjangan_transport', 10, 2)->default(0.00)->after('gaji');
            $table->decimal('tunjangan_makan', 10, 2)->default(0.00)->after('tunjangan_transport');
            $table->decimal('total_gaji', 10, 2)->virtualAs('gaji + tunjangan_transport + tunjangan_makan')->after('tunjangan_makan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('jabatans', function (Blueprint $table) {
            $table->dropColumn('tunjangan_transport');
            $table->dropColumn('tunjangan_makan');
            $table->dropColumn('total_gaji');
        });
    }
};

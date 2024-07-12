<?php

use App\Models\setting;
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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('key');
            $table->string('label');
            $table->string('value')->nullable();
            $table->string('type');
            $table->timestamps();
        });

         setting::create([
            'key'=>'_site-name',
            'label'=>'Judul Situs',
            'value'=>'Website Sederhana',
            'type'=>'text',
        ]);
        setting::create([
            'key'=>'_location',
            'label'=>'Alamat Kantor',
            'value'=>'Cirebon, Jawa Barat, Indonesia',
            'type'=>'text',
        ]);
        setting::create([
            'key'=>'_tiktok',
            'label'=>'Tiktok',
            'value'=>'https://www.tiktok.com',
            'type'=>'text',
        ]);
        setting::create([
            'key'=>'_instagram',
            'label'=>'Instagram',
            'value'=>'https://www.instagram.com',
            'type'=>'text',
        ]);
        setting::create([
            'key'=>'_facebook',
            'label'=>'Facebook',
            'value'=>'https://www.facebook.com',
            'type'=>'text',
        ]);
        setting::create([
            'key'=>'_email',
            'label'=>'Email',
            'value'=>'bimbelrumahpinus@gmail.com',
            'type'=>'text',
        ]);
        setting::create([
            'key'=>'_site_description',
            'label'=>'Site Deskription',
            'value'=>'Website Sederhana dengan admin Filament',
            'type'=>'text',
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};

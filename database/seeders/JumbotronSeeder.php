<?php

namespace Database\Seeders;

use App\Models\Jumbotron;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JumbotronSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Jumbotron::create([
            'title'         => 'Ichsan Mochammad F',
            'description'   => ' Hari ini adalah hari kamis uhuyy',
            'image'         => 'tidak ada gambar'
        ]);
    }
}

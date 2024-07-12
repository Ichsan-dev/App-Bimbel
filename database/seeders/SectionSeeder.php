<?php

namespace Database\Seeders;

use App\Models\section;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        section::create([
            'content'   => 'Ichsan Moch F',
            'thumbnail'   => 'Ichsan Moch F',
            'title'   => 'Ichsan Moch F',
        ]);
    }
}

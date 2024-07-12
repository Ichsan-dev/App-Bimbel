<?php

namespace Database\Seeders;

use App\Models\karyawan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KaryawanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        karyawan::create([
            'nama'          => 'Yulia Suryanti',
            'jk'            => 'Wanita',
            'no_telp'       => '08882350151',
            'email'         => 'yuliasur30@gmail.com',
            'pend_akhir'    => 'SMA',
            'alamat'        => 'Jalan Pinus I no 252 Cirebon Girang, Talun',
            'tanggal_lahir' => '1978-05-28',
            'jabatan_id'    => '1'
        ]);
    }
}

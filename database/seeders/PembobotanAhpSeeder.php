<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PembobotanAhpSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('pembobotan_ahp')->insert([
            ['id_sub_kriteria' => 1,  'bobot_lokal' => 0.2637, 'bobot_global' => 0.0529],
            ['id_sub_kriteria' => 2,  'bobot_lokal' => 0.3143, 'bobot_global' => 0.0631],
            ['id_sub_kriteria' => 3,  'bobot_lokal' => 0.2183, 'bobot_global' => 0.0438],
            ['id_sub_kriteria' => 4,  'bobot_lokal' => 0.2790, 'bobot_global' => 0.0560],
            ['id_sub_kriteria' => 5,  'bobot_lokal' => 0.0812, 'bobot_global' => 0.0163],
            ['id_sub_kriteria' => 6,  'bobot_lokal' => 0.5726, 'bobot_global' => 0.3159],
            ['id_sub_kriteria' => 7,  'bobot_lokal' => 0.4263, 'bobot_global' => 0.2354],
            ['id_sub_kriteria' => 8,  'bobot_lokal' => 0.1810, 'bobot_global' => 0.0998],
            ['id_sub_kriteria' => 9,  'bobot_lokal' => 0.1108, 'bobot_global' => 0.0611],
            ['id_sub_kriteria' => 10, 'bobot_lokal' => 0.7339, 'bobot_global' => 0.0410],
            ['id_sub_kriteria' => 11, 'bobot_lokal' => 0.2661, 'bobot_global' => 0.0148],
        ]);
    }
}

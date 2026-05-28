<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KriteriaSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('kriteria')->insert([
            ['kode_kriteria' => 'C1', 'nama_kriteria' => 'Performa'],
            ['kode_kriteria' => 'C2', 'nama_kriteria' => 'Formulasi dan Keamanan'],
            ['kode_kriteria' => 'C3', 'nama_kriteria' => 'Aspek Ekonomi'],
        ]);
    }
}

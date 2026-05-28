<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubKriteriaSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('sub_kriteria')->insert([
            // C1 - Performa
            ['id_kriteria' => 1, 'kode_sub_kriteria' => 'C11', 'nama_sub_kriteria' => 'Hidrasi', 'jenis' => 'benefit'],
            ['id_kriteria' => 1, 'kode_sub_kriteria' => 'C12', 'nama_sub_kriteria' => 'Memperbaiki Skin Barrier', 'jenis' => 'benefit'],
            ['id_kriteria' => 1, 'kode_sub_kriteria' => 'C13', 'nama_sub_kriteria' => 'Calming', 'jenis' => 'benefit'],
            ['id_kriteria' => 1, 'kode_sub_kriteria' => 'C14', 'nama_sub_kriteria' => 'Kontrol Minyak', 'jenis' => 'benefit'],
            ['id_kriteria' => 1, 'kode_sub_kriteria' => 'C15', 'nama_sub_kriteria' => 'Mencerahkan', 'jenis' => 'benefit'],
            // C2 - Formulasi dan Keamanan
            ['id_kriteria' => 2, 'kode_sub_kriteria' => 'C21', 'nama_sub_kriteria' => 'Non-Komedogenik', 'jenis' => 'benefit'],
            ['id_kriteria' => 2, 'kode_sub_kriteria' => 'C22', 'nama_sub_kriteria' => 'Bebas Iritan', 'jenis' => 'benefit'],
            ['id_kriteria' => 2, 'kode_sub_kriteria' => 'C23', 'nama_sub_kriteria' => 'Tekstur', 'jenis' => 'benefit'],
            ['id_kriteria' => 2, 'kode_sub_kriteria' => 'C24', 'nama_sub_kriteria' => 'Aroma', 'jenis' => 'benefit'],
            // C3 - Aspek Ekonomi
            ['id_kriteria' => 3, 'kode_sub_kriteria' => 'C31', 'nama_sub_kriteria' => 'Harga', 'jenis' => 'cost'],
            ['id_kriteria' => 3, 'kode_sub_kriteria' => 'C32', 'nama_sub_kriteria' => 'Kuantitas Produk (Netto)', 'jenis' => 'benefit'],
        ]);
    }
}

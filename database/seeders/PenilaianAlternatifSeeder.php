<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenilaianAlternatifSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            // C11 - Hidrasi
            [1, 1, 5], [2, 1, 5], [3, 1, 5], [4, 1, 5], [5, 1, 4],
            // C12 - Skin Barrier
            [1, 2, 5], [2, 2, 3], [3, 2, 3], [4, 2, 2], [5, 2, 1],
            // C13 - Calming
            [1, 3, 4], [2, 3, 5], [3, 3, 3], [4, 3, 4], [5, 3, 4],
            // C14 - Kontrol Minyak
            [1, 4, 5], [2, 4, 5], [3, 4, 4], [4, 4, 2], [5, 4, 5],
            // C15 - Mencerahkan
            [1, 5, 2], [2, 5, 4], [3, 5, 2], [4, 5, 1], [5, 5, 5],
            // C21 - Non-Komedogenik
            [1, 6, 4], [2, 6, 5], [3, 6, 2], [4, 6, 1], [5, 6, 4],
            // C22 - Bebas Iritan
            [1, 7, 3], [2, 7, 3], [3, 7, 4], [4, 7, 3], [5, 7, 2],
            // C23 - Tekstur
            [1, 8, 5], [2, 8, 5], [3, 8, 4], [4, 8, 5], [5, 8, 5],
            // C24 - Aroma
            [1, 9, 4], [2, 9, 4], [3, 9, 5], [4, 9, 1], [5, 9, 1],
            // C31 - Harga
            [1, 10, 3], [2, 10, 5], [3, 10, 3], [4, 10, 4], [5, 10, 2],
            // C32 - Kuantitas
            [1, 11, 2], [2, 11, 2], [3, 11, 5], [4, 11, 5], [5, 11, 2],
        ];

        foreach ($data as $d) {
            DB::table('penilaian_alternatif')->insert([
                'id_alternatif'   => $d[0],
                'id_sub_kriteria' => $d[1],
                'nilai'           => $d[2],
            ]);
        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AlternatifSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('alternatif')->insert([
            ['kode_alternatif' => 'A1', 'nama_produk' => 'Skintific 5X Ceramide Barrier Repair Moisture Gel', 'merek' => 'Skintific', 'foto' => null],
            ['kode_alternatif' => 'A2', 'nama_produk' => 'Effaclar Duo+M', 'merek' => 'La Roche-Posay', 'foto' => null],
            ['kode_alternatif' => 'A3', 'nama_produk' => 'Moisturizing Lotion', 'merek' => 'Cetaphil', 'foto' => null],
            ['kode_alternatif' => 'A4', 'nama_produk' => 'Oil-free Ultra Moisturizing Lotion', 'merek' => 'COSRX', 'foto' => null],
            ['kode_alternatif' => 'A5', 'nama_produk' => 'Oil Free Brightening Daily Moisturizer', 'merek' => 'Azarine', 'foto' => null],
        ]);
    }
}

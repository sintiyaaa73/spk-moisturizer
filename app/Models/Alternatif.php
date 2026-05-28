<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alternatif extends Model
{
    protected $table = 'alternatif';

    protected $fillable = [
        'kode_alternatif',
        'nama_produk',
        'merek',
        'foto',
    ];
}

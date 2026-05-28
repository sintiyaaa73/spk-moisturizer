<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PerhitunganSaw extends Model
{
    protected $table = 'perhitungan_saw';

    protected $fillable = [
        'id_alternatif',
        'nilai_normalisasi',
        'nilai_akhir',
        'ranking',
    ];

    public function alternatif()
    {
        return $this->belongsTo(Alternatif::class, 'id_alternatif');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PenilaianAlternatif extends Model
{
    protected $table = 'penilaian_alternatif';

    protected $fillable = [
        'id_alternatif',
        'id_sub_kriteria',
        'nilai',
    ];

    public function alternatif()
    {
        return $this->belongsTo(Alternatif::class, 'id_alternatif');
    }

    public function subKriteria()
    {
        return $this->belongsTo(SubKriteria::class, 'id_sub_kriteria');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PembobotanAhp extends Model
{
    protected $table = 'pembobotan_ahp';

    protected $fillable = [
        'id_sub_kriteria',
        'bobot_lokal',
        'bobot_global',
    ];

    public function subKriteria()
    {
        return $this->belongsTo(SubKriteria::class, 'id_sub_kriteria');
    }
}

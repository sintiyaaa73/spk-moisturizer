<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RequestProduk extends Model
{
    protected $table = 'request_produk';

    protected $fillable = [
        'id_user',
        'nama_produk',
        'merek',
        'foto',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}

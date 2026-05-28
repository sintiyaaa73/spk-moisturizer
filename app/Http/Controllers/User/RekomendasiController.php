<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PerhitunganSaw;
use App\Models\Alternatif;

class RekomendasiController extends Controller
{
    public function index()
    {
        $hasil = PerhitunganSaw::with('alternatif')
            ->orderBy('ranking')
            ->get();

        return view('user.rekomendasi', compact('hasil'));
    }
}

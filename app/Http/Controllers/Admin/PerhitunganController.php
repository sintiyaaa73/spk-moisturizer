<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Alternatif;
use App\Models\SubKriteria;
use App\Models\PembobotanAhp;
use App\Models\PenilaianAlternatif;
use App\Models\PerhitunganSaw;

class PerhitunganController extends Controller
{
    public function index()
    {
        $hasil = PerhitunganSaw::with('alternatif')
            ->orderBy('ranking')
            ->get();

        $subKriteria = SubKriteria::with('kriteria')->get();
        $bobot       = PembobotanAhp::with('subKriteria')->get();
        $alternatif  = Alternatif::all();
        $penilaian   = PenilaianAlternatif::all();

        return view('admin.perhitungan.index', compact(
            'hasil', 'subKriteria', 'bobot', 'alternatif', 'penilaian'
        ));
    }

    public function hitung()
    {
        // Ambil semua data
        $alternatif  = Alternatif::all();
        $subKriteria = SubKriteria::all();
        $bobot       = PembobotanAhp::all()->keyBy('id_sub_kriteria');
        $penilaian   = PenilaianAlternatif::all();

        // Buat matriks keputusan [id_alternatif][id_sub_kriteria] = nilai
        $matriks = [];
        foreach ($penilaian as $p) {
            $matriks[$p->id_alternatif][$p->id_sub_kriteria] = $p->nilai;
        }

        // Normalisasi SAW & hitung nilai akhir
        $nilaiAkhir = [];
        foreach ($alternatif as $alt) {
            $nilaiAkhir[$alt->id] = 0;
        }

        foreach ($subKriteria as $sk) {
            // Ambil semua nilai untuk sub kriteria ini
            $nilaiPerSk = [];
            foreach ($alternatif as $alt) {
                $nilaiPerSk[$alt->id] = $matriks[$alt->id][$sk->id] ?? 0;
            }

            // Normalisasi
            if ($sk->jenis == 'benefit') {
                $maxVal = max($nilaiPerSk);
                foreach ($alternatif as $alt) {
                    $normalized = $maxVal > 0 ? $nilaiPerSk[$alt->id] / $maxVal : 0;
                    $nilaiAkhir[$alt->id] += $normalized * ($bobot[$sk->id]->bobot_global ?? 0);
                }
            } else {
                // Cost
                $minVal = min(array_filter($nilaiPerSk, fn($v) => $v > 0));
                foreach ($alternatif as $alt) {
                    $normalized = $nilaiPerSk[$alt->id] > 0 ? $minVal / $nilaiPerSk[$alt->id] : 0;
                    $nilaiAkhir[$alt->id] += $normalized * ($bobot[$sk->id]->bobot_global ?? 0);
                }
            }
        }

        // Ranking
        arsort($nilaiAkhir);
        $ranking = 1;

        // Hapus hasil lama
        PerhitunganSaw::truncate();

        foreach ($nilaiAkhir as $idAlt => $nilai) {
            PerhitunganSaw::create([
                'id_alternatif'    => $idAlt,
                'nilai_normalisasi' => $nilai,
                'nilai_akhir'      => $nilai,
                'ranking'          => $ranking++,
            ]);
        }

        return redirect()->route('admin.perhitungan.index')
            ->with('success', 'Perhitungan AHP-SAW berhasil dijalankan!');
    }
}

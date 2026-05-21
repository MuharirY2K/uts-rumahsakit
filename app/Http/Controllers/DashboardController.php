<?php

namespace App\Http\Controllers;

// Mengubah import model akademik menjadi model medis
use App\Models\Poliklinik;
use App\Models\Dokter;
use App\Models\JadwalPraktik;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Menghitung total data dari masing-masing tabel rumah sakit
        $totalPoliklinik = Poliklinik::count();
        $totalDokter      = Dokter::count();
        $totalJadwal      = JadwalPraktik::count();

        // Mengambil 5 dokter terbaru lengkap dengan data polikliniknya
        $dokterTerbaru   = Dokter::with('poliklinik')
                            ->latest()
                            ->take(5)
                            ->get();

        // Mengirimkan variabel ke view dashboard
        return view('dashboard', compact(
            'totalPoliklinik',
            'totalDokter',
            'totalJadwal',
            'dokterTerbaru'
        ));
    }
}

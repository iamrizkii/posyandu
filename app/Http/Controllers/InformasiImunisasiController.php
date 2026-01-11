<?php

namespace App\Http\Controllers;

use App\Models\Anak;
use App\Models\Imunisasi;
use App\Models\JenisImunisasi;
use Illuminate\Http\Request;
use Carbon\Carbon;

class InformasiImunisasiController extends Controller
{
    /**
     * Dashboard ringkasan informasi imunisasi
     */
    public function index()
    {
        $today = Carbon::now();
        $batasUsia = 5; // Anak usia maksimal 5 tahun yang dapat diimunisasi

        // Hitung anak yang dapat diimunisasi (usia 0-5 tahun)
        $dapatDiimunisasi = Anak::whereDate('tgl_lhr', '>=', $today->copy()->subYears($batasUsia))->count();

        // Hitung anak yang tidak dapat diimunisasi (usia > 5 tahun)
        $tidakDapatDiimunisasi = Anak::whereDate('tgl_lhr', '<', $today->copy()->subYears($batasUsia))->count();

        // Hitung anak yang sudah pernah diimunisasi (minimal 1x)
        $sudahDiimunisasi = Anak::whereHas('imunisasis')->count();

        // Hitung anak yang belum pernah diimunisasi sama sekali
        $belumDiimunisasi = Anak::whereDoesntHave('imunisasis')->count();

        // Ambil jenis imunisasi untuk statistik
        $jenisImunisasis = JenisImunisasi::withCount('imunisasis')->get();

        return view('dashboard.informasi_imunisasi.index', compact(
            'dapatDiimunisasi',
            'tidakDapatDiimunisasi',
            'sudahDiimunisasi',
            'belumDiimunisasi',
            'jenisImunisasis'
        ));
    }

    /**
     * Daftar anak yang DAPAT diimunisasi (usia 0-5 tahun)
     */
    public function dapatDiimunisasi()
    {
        $today = Carbon::now();
        $batasUsia = 5;

        $anaks = Anak::with(['ortu', 'imunisasis.jenisimunisasi'])
            ->whereDate('tgl_lhr', '>=', $today->copy()->subYears($batasUsia))
            ->orderBy('tgl_lhr', 'desc')
            ->get();

        return view('dashboard.informasi_imunisasi.dapat', compact('anaks'));
    }

    /**
     * Daftar anak yang TIDAK dapat diimunisasi (usia > 5 tahun)
     */
    public function tidakDapatDiimunisasi()
    {
        $today = Carbon::now();
        $batasUsia = 5;

        $anaks = Anak::with(['ortu', 'imunisasis.jenisimunisasi'])
            ->whereDate('tgl_lhr', '<', $today->copy()->subYears($batasUsia))
            ->orderBy('tgl_lhr', 'asc')
            ->get();

        return view('dashboard.informasi_imunisasi.tidak_dapat', compact('anaks'));
    }

    /**
     * Daftar anak yang SUDAH diimunisasi (minimal 1x)
     */
    public function sudahDiimunisasi()
    {
        $anaks = Anak::with(['ortu', 'imunisasis.jenisimunisasi'])
            ->whereHas('imunisasis')
            ->withCount('imunisasis')
            ->orderBy('imunisasis_count', 'desc')
            ->get();

        return view('dashboard.informasi_imunisasi.sudah', compact('anaks'));
    }

    /**
     * Daftar anak yang BELUM pernah diimunisasi
     */
    public function belumDiimunisasi()
    {
        $anaks = Anak::with(['ortu'])
            ->whereDoesntHave('imunisasis')
            ->orderBy('tgl_lhr', 'desc')
            ->get();

        return view('dashboard.informasi_imunisasi.belum', compact('anaks'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Anak;
use App\Models\Ortu;
use App\Models\User;
use App\Models\Imunisasi;
use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $today = Carbon::now();
        $batasUsia = 5;

        $data = [
            'active' => 'dashboard',
            'ibu' => Ortu::count(),
            'anak' => Anak::count(),
            'user' => User::count(),
            'imunisasi' => Imunisasi::count(),
            'sudahImunisasi' => Anak::whereHas('imunisasis')->count(),
            'belumImunisasi' => Anak::whereDoesntHave('imunisasis')->count(),
            'dapatImunisasi' => Anak::whereDate('tgl_lhr', '>=', $today->copy()->subYears($batasUsia))->count()
        ];

        // Pengaduan stats for Admin/Bidan
        if (auth()->user()->level != 'ortu') {
            $data['pengaduanPending'] = Pengaduan::where('status', 'Pending')->count();
            $data['pengaduanProses'] = Pengaduan::where('status', 'Proses')->count();
            $data['pengaduanSelesai'] = Pengaduan::where('status', 'Selesai')->count();
            $data['pengaduanTotal'] = Pengaduan::count();
        }

        if (auth()->user()->level == 'ortu') {
            $ortu = auth()->user()->ortu;
            if ($ortu) {
                $anaks = $ortu->anaks()->with('timbangs')->get();
                $data['anaks'] = $anaks;

                // Prepare Chart Data
                $chartData = [];
                foreach ($anaks as $anak) {
                    $labels = [];
                    $berat = [];
                    $tinggi = [];
                    foreach ($anak->timbangs as $timbang) {
                        $labels[] = $timbang->tanggal->format('M Y');
                        $berat[] = $timbang->berat_badan;
                        $tinggi[] = $timbang->tinggi_badan;
                    }
                    $chartData[$anak->id] = [
                        'labels' => $labels,
                        'berat' => $berat,
                        'tinggi' => $tinggi
                    ];
                }
                $data['chartData'] = $chartData;
            }
        }

        return view('dashboard.index', $data);
    }
}

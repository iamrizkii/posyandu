<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anak;
use App\Models\Timbang;
use App\Models\Imunisasi;

class DashboardLaporanController extends Controller
{
    public function index()
    {
        return view('dashboard.laporan.index');
    }

    public function preview(Request $request)
    {
        $jenis = $request->jenis;
        $bulan = $request->bulan;
        $tahun = $request->tahun;

        $data = [];
        $title = '';

        if ($jenis == 'anak') {
            $data = Anak::latest()->get();
            $title = 'Laporan Data Anak';
        } elseif ($jenis == 'timbang') {
            $data = Timbang::whereMonth('tanggal', $bulan)
                ->whereYear('tanggal', $tahun)
                ->with('anak')
                ->get();
            $title = 'Laporan Penimbangan - ' . date("F", mktime(0, 0, 0, $bulan, 10)) . ' ' . $tahun;
        } elseif ($jenis == 'imunisasi') {
            $data = Imunisasi::whereMonth('tanggal_imunisasi', $bulan)
                ->whereYear('tanggal_imunisasi', $tahun)
                ->with(['anak', 'jenis_imunisasi'])
                ->get();
            $title = 'Laporan Imunisasi - ' . date("F", mktime(0, 0, 0, $bulan, 10)) . ' ' . $tahun;
        }

        if ($request->has('print')) {
            return view('dashboard.laporan.print', compact('data', 'title', 'jenis'));
        }

        return view('dashboard.laporan.preview', compact('data', 'title', 'jenis', 'bulan', 'tahun'));
    }
}

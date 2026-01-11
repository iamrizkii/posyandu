<?php

namespace App\Http\Controllers;

use App\Models\Anak;
use App\Models\Ortu;
use App\Models\User;
use App\Models\Imunisasi;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $today = Carbon::now();
        $batasUsia = 5;

        return view('dashboard.index', [
            'ibu' => Ortu::count(),
            'anak' => Anak::count(),
            'user' => User::count(),
            'imunisasi' => Imunisasi::count(),
            'sudahImunisasi' => Anak::whereHas('imunisasis')->count(),
            'belumImunisasi' => Anak::whereDoesntHave('imunisasis')->count(),
            'dapatImunisasi' => Anak::whereDate('tgl_lhr', '>=', $today->copy()->subYears($batasUsia))->count()
        ]);
    }
}

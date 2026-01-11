<?php

namespace App\Http\Controllers;

use App\Models\Timbang;
use App\Models\Anak;
use Illuminate\Http\Request;

class DashboardTimbangController extends Controller
{
    public function index()
    {
        return view('dashboard.timbangs.index', [
            'timbangs' => Timbang::with('anak')->latest('tanggal')->get()
        ]);
    }

    public function create()
    {
        return view('dashboard.timbangs.create', [
            'anaks' => Anak::all()
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'anak_id' => 'required|exists:anaks,id',
            'tanggal' => 'required|date',
            'berat_badan' => 'required|numeric',
            'tinggi_badan' => 'required|numeric',
            'lingkar_kepala' => 'required|numeric',
            'keterangan' => 'nullable'
        ]);

        Timbang::create($validatedData);

        return redirect('/dashboard/timbangs')->with('success', 'Data penimbangan berhasil ditambahkan!');
    }

    public function edit(Timbang $timbang)
    {
        return view('dashboard.timbangs.edit', [
            'timbang' => $timbang,
            'anaks' => Anak::all()
        ]);
    }

    public function update(Request $request, Timbang $timbang)
    {
        $validatedData = $request->validate([
            'anak_id' => 'required|exists:anaks,id',
            'tanggal' => 'required|date',
            'berat_badan' => 'required|numeric',
            'tinggi_badan' => 'required|numeric',
            'lingkar_kepala' => 'required|numeric',
            'keterangan' => 'nullable'
        ]);

        Timbang::where('id', $timbang->id)->update($validatedData);

        return redirect('/dashboard/timbangs')->with('success', 'Data penimbangan berhasil diperbarui!');
    }

    public function destroy(Timbang $timbang)
    {
        Timbang::destroy($timbang->id);
        return redirect('/dashboard/timbangs')->with('success', 'Data penimbangan berhasil dihapus!');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Anak;
use App\Models\Imunisasi;
use App\Models\JenisImunisasi;
use Illuminate\Http\Request;

class DashboardImunisasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.imunisasis.index', [
            'imuns' => Imunisasi::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mytime = \Carbon\Carbon::now();
        return view('dashboard.imunisasis.create', [
            'anaks' => Anak::all(),
            'datas' => JenisImunisasi::all(),
            'now' => $mytime
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'jenisimunisasi_id' => 'required',
            'anak_id' => 'required',
            'tgl_imun' => 'required',
            'booster' => 'required',
            'ket_imun' => 'required|max:255'
        ]);

        Imunisasi::create($validatedData);

        return redirect('/dashboard/imunisasis')->with('success', 'Imunisasi Successfully Added!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Imunisasi  $imunisasi
     * @return \Illuminate\Http\Response
     */
    public function edit(Imunisasi $imunisasi)
    {
        return view('dashboard.imunisasis.edit', [
            'imun' => $imunisasi,
            'anaks' => Anak::all(),
            'datas' => JenisImunisasi::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Imunisasi  $imunisasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Imunisasi $imunisasi)
    {
        $rules = [
            'jenisimunisasi_id' => 'required',
            'anak_id' => 'required',
            'booster' => 'required',
            'ket_imun' => 'required|max:255'
        ];

        $validatedData = $request->validate($rules);

        Imunisasi::where('id', $imunisasi->id)->update($validatedData);

        return redirect('/dashboard/imunisasis')->with('success', 'Imunisasi Successfully Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Imunisasi  $imunisasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Imunisasi $imunisasi)
    {
        Imunisasi::destroy($imunisasi->id);

        return redirect('/dashboard/imunisasis')->with('success', 'Imunisasi has been deleted!');
    }
}

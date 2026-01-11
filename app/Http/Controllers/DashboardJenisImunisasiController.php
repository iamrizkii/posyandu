<?php

namespace App\Http\Controllers;

use App\Models\JenisImunisasi;
use Illuminate\Http\Request;

class DashboardJenisImunisasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.jenis_imunisasis.index', [
            'datas' => JenisImunisasi::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.jenis_imunisasis.create', [
            'datas' => JenisImunisasi::all()
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
            'nama_imun' => 'required|max:255|unique:jenis_imunisasis'
        ]);

        JenisImunisasi::create($validatedData);

        return redirect('/dashboard/jenis_imunisasis')->with('success', 'Jenis Imunisasi Successfully Added!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JenisImunisasi  $jenisImunisasi
     * @return \Illuminate\Http\Response
     */
    public function edit(JenisImunisasi $jenisImunisasi)
    {
        return view('dashboard.jenis_imunisasis.edit', [
            'jenis' => $jenisImunisasi
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\JenisImunisasi  $jenisImunisasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JenisImunisasi $jenisImunisasi)
    {

        if($request->nama_imun != $jenisImunisasi->nama_imun) {
            $rules['nama_imun'] = 'required|max:255|unique:jenis_imunisasis'; //Database jenis_imunisasis
        }

        $validatedData = $request->validate($rules);

        JenisImunisasi::where('id', $jenisImunisasi->id)->update($validatedData);

        return redirect('/dashboard/jenis_imunisasis')->with('success', 'Jenis Imunisasi Successfully Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JenisImunisasi  $jenisImunisasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(JenisImunisasi $jenisImunisasi)
    {
        JenisImunisasi::destroy($jenisImunisasi->id);

        return redirect('/dashboard/jenis_imunisasis')->with('success', 'Jenis Imunisasi has been deleted!');
    }
}

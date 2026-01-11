<?php

namespace App\Http\Controllers;

use App\Models\Ortu;
use Illuminate\Http\Request;

class DashboardOrtuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.ortus.index', [
            'ortus' => Ortu::with('anaks')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.ortus.create');
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
            'nama_ibu' => 'required|max:255|unique:ortus',
            'nama_ayah' => 'required|max:255|unique:ortus',
            'tempat_lhr' => 'required|max:255',
            'tgl_lhr' => 'required|max:255',
            'alamat' => 'required|max:255',
            'agama' => 'required',
            'nik' => 'required|max:255',
            'kk' => 'required|max:255',
            'nohp' => 'required|max:255'
        ]);

        Ortu::create($validatedData);

        return redirect('/dashboard/ortus')->with('success', 'Ortus Successfully Added!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ortu  $ortu
     * @return \Illuminate\Http\Response
     */
    public function edit(Ortu $ortu)
    {
        return view('dashboard.ortus.edit', [
            'ortu' => $ortu
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ortu  $ortu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ortu $ortu)
    {
        $rules = [
            'tempat_lhr' => 'required|max:255',
            'tgl_lhr' => 'required|max:255',
            'alamat' => 'required|max:255',
            'agama' => 'required',
            'nik' => 'required|max:255',
            'kk' => 'required|max:255',
            'nohp' => 'required|max:255'
        ];

        if ($request->nama_ibu != $ortu->nama_ibu) {
            $rules['nama_ibu'] = 'required|max:255|unique:ortus';
        }

        if ($request->nama_ayah != $ortu->nama_ayah) {
            $rules['nama_ayah'] = 'required|max:255|unique:ortus';
        }

        $validatedData = $request->validate($rules);

        Ortu::where('id', $ortu->id)->update($validatedData);

        return redirect('/dashboard/ortus')->with('success', 'Ortu Successfully Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ortu  $ortu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ortu $ortu)
    {
        Ortu::destroy($ortu->id);

        return redirect('/dashboard/ortus')->with('success', 'Ortu has been deleted!');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Anak;
use App\Models\Ortu;
use Illuminate\Http\Request;

class DashboardAnakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.anaks.index', [
            'anaks' => Anak::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.anaks.create', [
            'ortus' => Ortu::all()
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
            'nama_anak' => 'required|max:255|unique:anaks',
            'ortu_id' => 'required',
            'tempat_lhr' => 'required|max:255',
            'tgl_lhr' => 'required|max:255',
            'bb_lhr' => 'required|max:255',
            'tb_lhr' => 'required|max:255',
            'jenis_kelamin' => 'required',
            'anak_ke' => 'required|max:255',
            'nik_anak' => 'required|max:255',
            'bpjs_anak' => 'required|max:255'
        ]);

        Anak::create($validatedData);

        return redirect('/dashboard/anaks')->with('success', 'Anaks Successfully Added!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Anak  $anak
     * @return \Illuminate\Http\Response
     */
    public function edit(Anak $anak)
    {
        return view('dashboard.anaks.edit', [
            'anak' => $anak,
            'ortus' => Ortu::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Anak  $anak
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Anak $anak)
    {
        $rules = [
            'ortu_id' => 'required',
            'tempat_lhr' => 'required|max:255',
            'tgl_lhr' => 'required|max:255',
            'bb_lhr' => 'required|max:255',
            'tb_lhr' => 'required|max:255',
            'jenis_kelamin' => 'required',
            'anak_ke' => 'required|max:255',
            'nik_anak' => 'required|max:255',
            'bpjs_anak' => 'required|max:255'
        ];

        if($request->nama_anak != $anak->nama_anak) {
            $rules['nama_anak'] = 'required|max:255|unique:anaks';
        }

        $validatedData = $request->validate($rules);

        Anak::where('id', $anak->id)->update($validatedData);

        return redirect('/dashboard/anaks')->with('success', 'Anak Successfully Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Anak  $anak
     * @return \Illuminate\Http\Response
     */
    public function destroy(Anak $anak)
    {
        Anak::destroy($anak->id);

        return redirect('/dashboard/anaks')->with('success', 'Anak has been deleted!');
    }
}

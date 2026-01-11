<?php

namespace App\Http\Controllers;

use App\Models\BukuTamu;
use Illuminate\Http\Request;

class DashboardBukuTamuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.buku_tamus.index', [
            'tamus' => BukuTamu::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.buku_tamus.create', [
            'tamus' => BukuTamu::all()
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
            'nama_tamu' => 'required|max:255',
            'alamat' => 'required|max:255',
            'jabatan' => 'required|max:255',
            'keperluan' => 'required|max:255'
        ]);

        BukuTamu::create($validatedData);

        return redirect('/dashboard/buku_tamus')->with('success', 'Tamu Successfully Added!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BukuTamu  $bukuTamu
     * @return \Illuminate\Http\Response
     */
    public function edit(BukuTamu $bukuTamu)
    {
        return view('dashboard.buku_tamus.edit', [
            'tamu' => $bukuTamu
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BukuTamu  $bukuTamu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BukuTamu $bukuTamu)
    {
        $rules = [
            'nama_tamu' => 'required|max:255',
            'alamat' => 'required|max:255',
            'jabatan' => 'required|max:255',
            'keperluan' => 'required|max:255'
        ];

        $validatedData = $request->validate($rules);

        BukuTamu::where('id', $bukuTamu->id)->update($validatedData);

        return redirect('/dashboard/buku_tamus')->with('success', 'Tamu Successfully Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BukuTamu  $bukuTamu
     * @return \Illuminate\Http\Response
     */
    public function destroy(BukuTamu $bukuTamu)
    {
        BukuTamu::destroy($bukuTamu->id);

        return redirect('/dashboard/buku_tamus')->with('success', 'Tamu has been deleted!');
    }
}

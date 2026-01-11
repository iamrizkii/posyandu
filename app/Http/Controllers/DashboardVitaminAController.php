<?php

namespace App\Http\Controllers;

use App\Models\Anak;
use App\Models\VitaminA;
use Illuminate\Http\Request;

class DashboardVitaminAController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.vitamin_as.index', [
            'vitamins' => VitaminA::all()
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
        return view('dashboard.vitamin_as.create', [
            'anaks' => Anak::all(),
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
            'anak_id' => 'required',
            'tgl' => 'required',
            'keterangan' => 'required|max:255'
        ]);

        VitaminA::create($validatedData);

        return redirect('/dashboard/vitamin_as')->with('success', 'Vitamin A Successfully Added!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VitaminA  $vitaminA
     * @return \Illuminate\Http\Response
     */
    public function edit(VitaminA $vitaminA)
    {
        return view('dashboard.vitamin_as.edit', [
            'vitamin' => $vitaminA,
            'anaks' => Anak::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\VitaminA  $vitaminA
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VitaminA $vitaminA)
    {
        $rules = [
            'anak_id' => 'required',
            'keterangan' => 'required|max:255'
        ];

        $validatedData = $request->validate($rules);

        VitaminA::where('id', $vitaminA->id)->update($validatedData);

        return redirect('/dashboard/vitamin_as')->with('success', 'Vitamin A Successfully Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VitaminA  $vitaminA
     * @return \Illuminate\Http\Response
     */
    public function destroy(VitaminA $vitaminA)
    {
        VitaminA::destroy($vitaminA->id);

        return redirect('/dashboard/vitamin_as')->with('success', 'Vitamin A has been deleted!');
    }
}

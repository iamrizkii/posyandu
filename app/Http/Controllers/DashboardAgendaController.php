<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardAgendaController extends Controller
{
    public function index()
    {
        return view('dashboard.agendas.index', [
            'agendas' => Agenda::latest()->get()
        ]);
    }

    public function create()
    {
        return view('dashboard.agendas.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul' => 'required|max:255',
            'isi' => 'required',
            'lokasi' => 'required',
            'waktu' => 'required',
            'status' => 'required'
        ]);

        $validatedData['slug'] = SlugService::createSlug(Agenda::class, 'slug', $request->judul);

        Agenda::create($validatedData);

        return redirect('/dashboard/agendas')->with('success', 'Agenda baru berhasil ditambahkan!');
    }

    public function edit(Agenda $agenda)
    {
        return view('dashboard.agendas.edit', [
            'agenda' => $agenda
        ]);
    }

    public function update(Request $request, Agenda $agenda)
    {
        $rules = [
            'judul' => 'required|max:255',
            'isi' => 'required',
            'lokasi' => 'required',
            'waktu' => 'required',
            'status' => 'required'
        ];

        $validatedData = $request->validate($rules);

        if ($request->judul != $agenda->judul) {
            $validatedData['slug'] = SlugService::createSlug(Agenda::class, 'slug', $request->judul);
        }

        Agenda::where('id', $agenda->id)->update($validatedData);

        return redirect('/dashboard/agendas')->with('success', 'Agenda berhasil diperbarui!');
    }

    public function destroy(Agenda $agenda)
    {
        Agenda::destroy($agenda->id);
        return redirect('/dashboard/agendas')->with('success', 'Agenda berhasil dihapus!');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Agenda::class, 'slug', $request->judul);
        return response()->json(['slug' => $slug]);
    }
}

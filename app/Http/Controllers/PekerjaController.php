<?php

namespace App\Http\Controllers;

use App\Models\Pekerja;
use App\Http\Requests\PekerjaRequest;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PekerjaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pekerja = Pekerja::all();
        return view('pekerja.index', compact('pekerja'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pekerja.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\PekerjaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PekerjaRequest $request)
    {
        Pekerja::create($request->validated());
        return redirect()->route('pekerja.index')->with('success', 'Pekerja created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pekerja  $pekerja
     * @return \Illuminate\Http\Response
     */
    public function show(Pekerja $pekerja)
    {
        return view('pekerja.show', compact('pekerja'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pekerja  $pekerja
     * @return \Illuminate\Http\Response
     */
    public function edit(Pekerja $pekerja)
    {
        return view('pekerja.edit', compact('pekerja'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\PekerjaRequest  $request
     * @param  \App\Models\Pekerja  $pekerja
     * @return \Illuminate\Http\Response
     */
    public function update(PekerjaRequest $request, Pekerja $pekerja)
    {
        $pekerja->update($request->validated());
        return redirect()->route('pekerja.index')->with('success', 'Pekerja updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pekerja  $pekerja
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pekerja $pekerja)
    {
        $pekerja->delete();
        return redirect()->route('pekerja.index')->with('success', 'Pekerja deleted successfully.');
    }

    public function print()
    {
        $pekerja = Pekerja::all();

        $data = Pdf::loadview('pekerja/print', ['pekerja' => $pekerja])->setPaper('a4', 'landscape');

        return $data->download('laporan.pdf');
    }
}

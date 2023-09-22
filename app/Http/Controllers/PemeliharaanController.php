<?php

namespace App\Http\Controllers;

use App\Models\Pemeliharaan;
use App\Http\Requests\PemeliharaanRequest;
use App\Models\Pekerja;
use App\Models\Tpu;
use Barryvdh\DomPDF\Facade\Pdf;

class PemeliharaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pemeliharaan = Pemeliharaan::all();
        return view('pemeliharaan.index', compact('pemeliharaan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pekerja = Pekerja::all()->map(function ($item, $key) {
            return ['label' => $item->nama, 'value' => $item->id];
        });

        return view('pemeliharaan.create', compact('pekerja'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\PemeliharaanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PemeliharaanRequest $request)
    {
        Pemeliharaan::create($request->validated());

        return redirect()->route('pemeliharaan.index')->with('success', 'Pemeliharaan created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pemeliharaan  $pemeliharaan
     * @return \Illuminate\Http\Response
     */
    public function show(Pemeliharaan $pemeliharaan)
    {
        return view('pemeliharaan.show', compact('pemeliharaan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pemeliharaan  $pemeliharaan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pemeliharaan $pemeliharaan)
    {
        $pekerja = Pekerja::all()->map(function ($item, $key) {
            return ['label' => $item->nama, 'value' => $item->id];
        });

        return view('pemeliharaan.edit', compact('pemeliharaan', 'pekerja'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\PemeliharaanRequest  $request
     * @param  \App\Models\Pemeliharaan  $pemeliharaan
     * @return \Illuminate\Http\Response
     */
    public function update(PemeliharaanRequest $request, Pemeliharaan $pemeliharaan)
    {
        $pemeliharaan->update($request->validated());
        return redirect()->route('pemeliharaan.index')->with('success', 'Pemeliharaan updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pemeliharaan  $pemeliharaan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pemeliharaan $pemeliharaan)
    {
        $pemeliharaan->delete();
        return redirect()->route('pemeliharaan.index')->with('success', 'Pemeliharaan deleted successfully.');
    }

    public function print()
    {
        $pemeliharaan = Pemeliharaan::all();

        $data = Pdf::loadview('pemeliharaan/print', ['pemeliharaan' => $pemeliharaan])->setPaper('a4', 'landscape');

        return $data->download('laporan.pdf');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Upah;
use App\Http\Requests\UpahRequest;
use App\Models\Pekerja;
use App\Models\Tpu;
use Barryvdh\DomPDF\Facade\Pdf;

class UpahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $upah = Upah::all();
        return view('upah.index', compact('upah'));
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

        return view('upah.create', compact('pekerja'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\UpahRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UpahRequest $request)
    {
        Upah::create($request->validated());

        return redirect()->route('upah.index')->with('success', 'Upah berhasil dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Upah  $upah
     * @return \Illuminate\Http\Response
     */
    public function show(Upah $upah)
    {
        return view('upah.show', compact('upah'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Upah  $upah
     * @return \Illuminate\Http\Response
     */
    public function edit(Upah $upah)
    {
        $pekerja = Pekerja::all()->map(function ($item, $key) {
            return ['label' => $item->nama, 'value' => $item->id];
        });

        return view('upah.edit', compact('upah', 'pekerja'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpahRequest  $request
     * @param  \App\Models\Upah  $upah
     * @return \Illuminate\Http\Response
     */
    public function update(UpahRequest $request, Upah $upah)
    {
        $upah->update($request->validated());
        return redirect()->route('upah.index')->with('success', 'Upah berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Upah  $upah
     * @return \Illuminate\Http\Response
     */
    public function destroy(Upah $upah)
    {
        $upah->delete();
        return redirect()->route('upah.index')->with('success', 'Upah berhasil dihapus');
    }

    public function print()
    {
        $upah = Upah::all();

        $data = Pdf::loadview('upah/print', ['upah' => $upah])->setPaper('a4', 'landscape');

        return $data->download('laporan.pdf');
    }
}

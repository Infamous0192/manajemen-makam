<?php

namespace App\Http\Controllers;

use App\Models\Fasilitas;
use App\Http\Requests\FasilitasRequest;
use App\Models\Tpu;
use Barryvdh\DomPDF\Facade\Pdf;

class FasilitasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fasilitas = Fasilitas::all();
        return view('fasilitas.index', compact('fasilitas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('fasilitas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\FasilitasRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FasilitasRequest $request)
    {
        Fasilitas::create($request->validated());

        return redirect()->route('fasilitas.index')->with('success', 'Fasilitas created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fasilitas  $fasilitas
     * @return \Illuminate\Http\Response
     */
    public function show(Fasilitas $fasilitas)
    {
        $tpu = Tpu::all()->map(function ($item, $key) {
            return ['label' => $item->nama, 'value' => $item->id];
        });

        return view('fasilitas.show', compact('fasilitas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fasilitas  $fasilitas
     * @return \Illuminate\Http\Response
     */
    public function edit(Fasilitas $fasilitas)
    {
        return view('fasilitas.edit', compact('fasilitas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\FasilitasRequest  $request
     * @param  \App\Models\Fasilitas  $fasilitas
     * @return \Illuminate\Http\Response
     */
    public function update(FasilitasRequest $request, Fasilitas $fasilitas)
    {
        $fasilitas->update($request->validated());
        return redirect()->route('fasilitas.index')->with('success', 'Fasilitas updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fasilitas  $fasilitas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fasilitas $fasilitas)
    {
        $fasilitas->delete();
        return redirect()->route('fasilitas.index')->with('success', 'Fasilitas deleted successfully.');
    }

    public function print()
    {
        $fasilitas = Fasilitas::all();

        $data = Pdf::loadview('fasilitas/print', ['fasilitas' => $fasilitas])->setPaper('a4', 'landscape');

        return $data->download('laporan.pdf');
    }
}

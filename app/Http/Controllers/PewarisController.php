<?php

namespace App\Http\Controllers;

use App\Models\Pewaris;
use App\Http\Requests\PewarisRequest;
use App\Models\Jenazah;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PewarisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pewaris = Pewaris::all();
        return view('pewaris.index', compact('pewaris'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mendiang = Jenazah::all()
            ->map(function ($item, $key) {
                return ['label' => $item->nama . ' (' . $item->nik . ')', 'value' => $item->id];
            });

        return view('pewaris.create', compact('mendiang'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\PewarisRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PewarisRequest $request)
    {
        Pewaris::create($request->validated());
        return redirect()->route('pewaris.index')->with('success', 'Pewaris created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pewaris  $pewaris
     * @return \Illuminate\Http\Response
     */
    public function show(Pewaris $pewaris)
    {
        $data = Pdf::loadview('pewaris/surat', ['pewaris' => $pewaris]);
        //mendownload laporan.pdf
        return $data->download('surat.pdf');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pewaris  $pewaris
     * @return \Illuminate\Http\Response
     */
    public function edit(Pewaris $pewaris)
    {
        $mendiang = Jenazah::all()
            ->map(function ($item, $key) {
                return ['label' => $item->nama . ' (' . $item->nik . ')', 'value' => $item->id];
            });

        return view('pewaris.edit', compact('pewaris', 'mendiang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\PewarisRequest  $request
     * @param  \App\Models\Pewaris  $pewaris
     * @return \Illuminate\Http\Response
     */
    public function update(PewarisRequest $request, Pewaris $pewaris)
    {
        $pewaris->update($request->validated());
        return redirect()->route('pewaris.index')->with('success', 'Pewaris updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pewaris  $pewaris
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pewaris $pewaris)
    {
        $pewaris->delete();
        return redirect()->route('pewaris.index')->with('success', 'Pewaris deleted successfully.');
    }

    public function laporan()
    {
        $pewaris = Pewaris::all();

        $data = Pdf::loadview('pewaris/print', ['pewaris' => $pewaris])->setPaper('a4', 'landscape');

        return $data->download('laporan.pdf');
    }
}

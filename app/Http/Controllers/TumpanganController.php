<?php

namespace App\Http\Controllers;

use App\Models\Tumpangan;
use App\Http\Requests\TumpanganRequest;
use App\Models\Jenazah;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class TumpanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tumpangan = Tumpangan::all();
        return view('tumpangan.index', compact('tumpangan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jenazah = Jenazah::all()->map(function ($item, $key) {
            return ['label' => $item->nama . ' (' . $item->nik . ')', 'value' => $item->id];
        });

        return view('tumpangan.create', compact('jenazah'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\TumpanganRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TumpanganRequest $request)
    {
        Tumpangan::create($request->validated());
        return redirect()->route('tumpangan.index')->with('success', 'Tumpangan created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tumpangan  $tumpangan
     * @return \Illuminate\Http\Response
     */
    public function show(Tumpangan $tumpangan)
    {
        $data = Pdf::loadview('tumpangan/surat', ['tumpangan' => $tumpangan]);
        //mendownload laporan.pdf
        return $data->download('surat.pdf');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tumpangan  $tumpangan
     * @return \Illuminate\Http\Response
     */
    public function edit(Tumpangan $tumpangan)
    {
        $jenazah = Jenazah::all()->map(function ($item, $key) {
            return ['label' => $item->nama . ' (' . $item->nik . ')', 'value' => $item->id];
        });

        return view('tumpangan.edit', compact('tumpangan', 'jenazah'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\TumpanganRequest  $request
     * @param  \App\Models\Tumpangan  $tumpangan
     * @return \Illuminate\Http\Response
     */
    public function update(TumpanganRequest $request, Tumpangan $tumpangan)
    {
        $tumpangan->update($request->validated());
        return redirect()->route('tumpangan.index')->with('success', 'Tumpangan updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tumpangan  $tumpangan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tumpangan $tumpangan)
    {
        $tumpangan->delete();
        return redirect()->route('tumpangan.index')->with('success', 'Tumpangan deleted successfully.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\JenazahKenal;
use App\Http\Requests\JenazahKenalRequest;
use App\Models\Makam;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class JenazahKenalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jenazahKenal = JenazahKenal::all();
        return view('jenazah-kenal.index', compact('jenazahKenal'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $makam = Makam::leftJoin('jenazah_kenal', 'makam.id', '=', 'jenazah_kenal.id_makam')
            ->leftJoin('jenazah', 'makam.id', '=', 'jenazah.id_makam')
            ->whereNull('jenazah.id_makam')
            ->whereNull('jenazah_kenal.id_makam')
            ->select('makam.*')
            ->get()
            ->map(function ($item, $key) {
                return ['label' => $item->nama . ' (' . $item->tpu->nama . ')', 'value' => $item->id];
            });

        return view('jenazah-kenal.create', compact('makam'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\JenazahKenalRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(JenazahKenalRequest $request)
    {
        JenazahKenal::create($request->validated());
        return redirect()->route('jenazah-kenal.index')->with('success', 'Jenazah Kenal created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JenazahKenal  $jenazahKenal
     * @return \Illuminate\Http\Response
     */
    public function show(JenazahKenal $jenazahKenal)
    {
        $makam = Makam::leftJoin('jenazah_kenal', 'makam.id', '=', 'jenazah_kenal.id_makam')
            ->leftJoin('jenazah', 'makam.id', '=', 'jenazah.id_makam')
            ->whereNull('jenazah.id_makam')
            ->whereNull('jenazah_kenal.id_makam')
            ->select('makam.*')
            ->get()
            ->map(function ($item, $key) {
                return ['label' => $item->nama . ' (' . $item->tpu->nama . ')', 'value' => $item->id];
            });

        return view('jenazah-kenal.show', compact('jenazah', 'makam'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JenazahKenal  $jenazahKenal
     * @return \Illuminate\Http\Response
     */
    public function edit(JenazahKenal $jenazahKenal)
    {
        $makam = Makam::leftJoin('jenazah_kenal', 'makam.id', '=', 'jenazah_kenal.id_makam')
            ->leftJoin('jenazah', 'makam.id', '=', 'jenazah.id_makam')
            ->whereNull('jenazah.id_makam')
            ->whereNull('jenazah_kenal.id_makam')
            ->orWhere('jenazah_kenal.id', $jenazahKenal->id)
            ->select('makam.*')
            ->get()
            ->map(function ($item, $key) {
                return ['label' => $item->nama . ' (' . $item->tpu->nama . ')', 'value' => $item->id];
            });


        return view('jenazah-kenal.edit', compact('jenazahKenal', 'makam'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\JenazahKenalRequest  $request
     * @param  \App\Models\JenazahKenal  $jenazahKenal
     * @return \Illuminate\Http\Response
     */
    public function update(JenazahKenalRequest $request, JenazahKenal $jenazahKenal)
    {
        $jenazahKenal->update($request->validated());
        return redirect()->route('jenazah-kenal.index')->with('success', 'Jenazah Kenal updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JenazahKenal  $jenazahKenal
     * @return \Illuminate\Http\Response
     */
    public function destroy(JenazahKenal $jenazahKenal)
    {
        $jenazahKenal->delete();
        return redirect()->route('jenazah-kenal.index')->with('success', 'Jenazah Kenal deleted successfully.');
    }

    public function laporan()
    {
        $jenazah = JenazahKenal::all();

        $data = Pdf::loadview('jenazah-kenal/print', ['jenazah' => $jenazah])->setPaper('a4', 'landscape');

        return $data->download('laporan.pdf');
    }
}

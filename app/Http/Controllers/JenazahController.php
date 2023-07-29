<?php

namespace App\Http\Controllers;

use App\Models\Jenazah;
use App\Http\Requests\JenazahRequest;
use App\Models\Makam;
use App\Models\Pesanan;
use Illuminate\Http\Request;

class JenazahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jenazah = Jenazah::all();
        return view('jenazah.index', compact('jenazah'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $makam = Makam::select('makam.*')
            ->leftJoin('jenazah_kenal', 'makam.id', '=', 'jenazah_kenal.id_makam')
            ->leftJoin('jenazah', 'makam.id', '=', 'jenazah.id_makam')
            ->whereNull('jenazah.id_makam')
            ->whereNull('jenazah_kenal.id_makam')
            ->get()
            ->map(function ($item, $key) {
                return ['label' => $item->nama . ' (' . $item->tpu->nama . ')', 'value' => $item->id];
            });

        $pesanan = Pesanan::leftJoin('jenazah', 'pesanan.id', '=', 'jenazah.id_pesanan')
            ->whereNull('jenazah.id_pesanan')
            ->select('pesanan.*')
            ->get()
            ->map(function ($item, $key) {
                return ['label' => $item->nama, 'value' => $item->id];
            });

        return view('jenazah.create', compact('makam', 'pesanan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\JenazahRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(JenazahRequest $request)
    {
        Jenazah::create($request->validated());
        return redirect()->route('jenazah.index')->with('success', 'Jenazah created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jenazah  $jenazah
     * @return \Illuminate\Http\Response
     */
    public function show(Jenazah $jenazah)
    {
        $makam = Makam::select('makam.*')
            ->leftJoin('jenazah_kenal', 'makam.id', '=', 'jenazah_kenal.id_makam')
            ->leftJoin('jenazah', 'makam.id', '=', 'jenazah.id_makam')
            ->whereNull('jenazah.id_makam')
            ->whereNull('jenazah_kenal.id_makam')
            ->orWhere('jenazah.id', $jenazah->id)
            ->get()
            ->map(function ($item, $key) {
                return ['label' => $item->nama . ' (' . $item->tpu->nama . ')', 'value' => $item->id];
            });

        $pesanan = Pesanan::leftJoin('jenazah', 'pesanan.id', '=', 'jenazah.id_pesanan')
            ->whereNull('jenazah.id_pesanan')
            ->select('pesanan.*')
            ->orWhere('jenazah.id', $jenazah->id)
            ->get()
            ->map(function ($item, $key) {
                return ['label' => $item->nama, 'value' => $item->id];
            });

        return view('jenazah.show', compact('jenazah', 'makam', 'pesanan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jenazah  $jenazah
     * @return \Illuminate\Http\Response
     */
    public function edit(Jenazah $jenazah)
    {
        $makam = Makam::select('makam.*')
            ->leftJoin('jenazah_kenal', 'makam.id', '=', 'jenazah_kenal.id_makam')
            ->leftJoin('jenazah', 'makam.id', '=', 'jenazah.id_makam')
            ->whereNull('jenazah.id_makam')
            ->whereNull('jenazah_kenal.id_makam')
            ->orWhere('jenazah.id', $jenazah->id)
            ->get()
            ->map(function ($item, $key) {
                return ['label' => $item->nama . ' (' . $item->tpu->nama . ')', 'value' => $item->id];
            });

        $pesanan = Pesanan::leftJoin('jenazah', 'pesanan.id', '=', 'jenazah.id_pesanan')
            ->whereNull('jenazah.id_pesanan')
            ->select('pesanan.*')
            ->orWhere('jenazah.id', $jenazah->id)
            ->get()
            ->map(function ($item, $key) {
                return ['label' => $item->nama, 'value' => $item->id];
            });

        return view('jenazah.edit', compact('jenazah', 'makam', 'pesanan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\JenazahRequest  $request
     * @param  \App\Models\Jenazah  $jenazah
     * @return \Illuminate\Http\Response
     */
    public function update(JenazahRequest $request, Jenazah $jenazah)
    {
        $jenazah->update($request->validated());
        return redirect()->route('jenazah.index')->with('success', 'Jenazah updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jenazah  $jenazah
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jenazah $jenazah)
    {
        $jenazah->delete();
        return redirect()->route('jenazah.index')->with('success', 'Jenazah deleted successfully.');
    }
}

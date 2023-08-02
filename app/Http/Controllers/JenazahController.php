<?php

namespace App\Http\Controllers;

use App\Models\Jenazah;
use App\Http\Requests\JenazahRequest;
use App\Models\Makam;
use App\Models\Pesanan;
use App\Models\Tpu;
use Barryvdh\DomPDF\Facade\Pdf;
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
        $tpu = Tpu::all()->map(function ($item, $key) {
            return ['label' => $item->nama, 'value' => $item->id];
        });

        $blok = Makam::select('id_tpu', 'nama')->groupBy('id_tpu', 'nama')->get();
        $makam = Makam::select('makam.*')
            ->leftJoin('jenazah_kenal', 'makam.id', '=', 'jenazah_kenal.id_makam')
            ->leftJoin('jenazah', 'makam.id', '=', 'jenazah.id_makam')
            ->whereNull('jenazah.id_makam')
            ->whereNull('jenazah_kenal.id_makam')
            ->get();

        $pesanan = Pesanan::leftJoin('jenazah', 'pesanan.id', '=', 'jenazah.id_pesanan')
            ->whereNull('jenazah.id_pesanan')
            ->select('pesanan.*')
            ->get()
            ->map(function ($item, $key) {
                return ['label' => $item->nama, 'value' => $item->id];
            });

        return view('jenazah.create', compact('makam', 'blok', 'tpu', 'pesanan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\JenazahRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(JenazahRequest $request)
    {
        $data = $request->validated();
        $pesanan = Pesanan::find($request->get('id_pesanan'));
        $data['nama'] = $pesanan->nama;

        Jenazah::create($data);
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
        $data = Pdf::loadview('jenazah/surat', ['jenazah' => $jenazah]);
        //mendownload laporan.pdf
        return $data->download('surat.pdf');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jenazah  $jenazah
     * @return \Illuminate\Http\Response
     */
    public function edit(Jenazah $jenazah)
    {
        $tpu = Tpu::all()->map(function ($item, $key) {
            return ['label' => $item->nama, 'value' => $item->id];
        });

        $blok = Makam::select('id_tpu', 'nama')->groupBy('id_tpu', 'nama')->get();
        $makam = Makam::select('makam.*')
            ->leftJoin('jenazah_kenal', 'makam.id', '=', 'jenazah_kenal.id_makam')
            ->leftJoin('jenazah', 'makam.id', '=', 'jenazah.id_makam')
            ->whereNull('jenazah.id_makam')
            ->whereNull('jenazah_kenal.id_makam')
            ->orWhere('jenazah.id', $jenazah->id)
            ->get();

        $pesanan = Pesanan::leftJoin('jenazah', 'pesanan.id', '=', 'jenazah.id_pesanan')
            ->whereNull('jenazah.id_pesanan')
            ->select('pesanan.*')
            ->orWhere('jenazah.id', $jenazah->id)
            ->get()
            ->map(function ($item, $key) {
                return ['label' => $item->nama, 'value' => $item->id];
            });

        return view('jenazah.edit', compact('jenazah', 'blok', 'tpu', 'makam', 'pesanan'));
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
        $data = $request->validated();
        $pesanan = Pesanan::find($request->get('id_pesanan'));
        $data['nama'] = $pesanan->nama;

        $jenazah->update($data);
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

    public function laporan()
    {
        $jenazah = Jenazah::all();

        $data = PDF::loadview('jenazah/print', ['jenazah' => $jenazah])->setPaper('a4', 'landscape');

        return $data->download('laporan.pdf');
    }
}

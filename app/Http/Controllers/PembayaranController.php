<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Http\Requests\PembayaranRequest;
use App\Models\Jenazah;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pembayaran = Pembayaran::all();
        return view('pembayaran.index', compact('pembayaran'));
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

        return view('pembayaran.create', compact('jenazah'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\PembayaranRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PembayaranRequest $request)
    {
        $data = $request->validated();
        $data['id_makam'] = Jenazah::find($request->get('id_jenazah'))->id_makam;

        Pembayaran::create($data);
        return redirect()->route('keuangan.index')->with('success', 'Pembayaran created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function show(Pembayaran $pembayaran)
    {
        $jenazah = Jenazah::all()->map(function ($item, $key) {
            return ['label' => $item->nama . ' (' . $item->nik . ')', 'value' => $item->id];
        });

        return view('pembayaran.show', compact('pembayaran', 'jenazah'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function edit(Pembayaran $pembayaran)
    {
        $jenazah = Jenazah::all()->map(function ($item, $key) {
            return ['label' => $item->nama . ' (' . $item->nik . ')', 'value' => $item->id];
        });

        return view('pembayaran.edit', compact('pembayaran', 'jenazah'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\PembayaranRequest  $request
     * @param  \App\Models\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function update(PembayaranRequest $request, Pembayaran $pembayaran)
    {
        $data = $request->validated();
        $data['id_makam'] = Jenazah::find($request->get('id_jenazah'))->id_makam;

        $pembayaran->update($data);
        return redirect()->route('keuangan.index')->with('success', 'Pembayaran updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pembayaran $pembayaran)
    {
        $pembayaran->delete();
        return redirect()->route('keuangan.index')->with('success', 'Pembayaran deleted successfully.');
    }
}

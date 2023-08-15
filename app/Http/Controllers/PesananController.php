<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use App\Http\Requests\PesananRequest;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pesanan = Pesanan::all();
        return view('pesanan.index', compact('pesanan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pesanan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\PesananRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PesananRequest $request)
    {
        Pesanan::create($request->validated());
        return redirect()->route('pesanan.index')->with('success', 'Pesanan created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pesanan  $pesanan
     * @return \Illuminate\Http\Response
     */
    public function show(Pesanan $pesanan)
    {
        return view('pesanan.show', compact('pesanan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pesanan  $pesanan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pesanan $pesanan)
    {
        return view('pesanan.edit', compact('pesanan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\PesananRequest  $request
     * @param  \App\Models\Pesanan  $pesanan
     * @return \Illuminate\Http\Response
     */
    public function update(PesananRequest $request, Pesanan $pesanan)
    {
        $pesanan->update($request->validated());
        return redirect()->route('pesanan.index')->with('success', 'Pesanan updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pesanan  $pesanan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pesanan $pesanan)
    {
        $pesanan->delete();
        return redirect()->route('pesanan.index')->with('success', 'Pesanan deleted successfully.');
    }

    public function print()
    {
        $pesanan = Pesanan::all();

        $data = Pdf::loadview('pesanan/print', ['pesanan' => $pesanan])->setPaper('a4', 'landscape');

        return $data->download('laporan.pdf');
    }
}

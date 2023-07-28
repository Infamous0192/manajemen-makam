<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Http\Requests\PembayaranRequest;
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
        return view('pembayaran.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\PembayaranRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PembayaranRequest $request)
    {
        Pembayaran::create($request->validated());
        return redirect()->route('pembayaran.index')->with('success', 'Pembayaran created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function show(Pembayaran $pembayaran)
    {
        return view('pembayaran.show', compact('pembayaran'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function edit(Pembayaran $pembayaran)
    {
        return view('pembayaran.edit', compact('pembayaran'));
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
        $pembayaran->update($request->validated());
        return redirect()->route('pembayaran.index')->with('success', 'Pembayaran updated successfully.');
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
        return redirect()->route('pembayaran.index')->with('success', 'Pembayaran deleted successfully.');
    }
}

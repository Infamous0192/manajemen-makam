<?php

namespace App\Http\Controllers;

use App\Models\Tumpangan;
use App\Http\Requests\TumpanganRequest;
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
        return view('tumpangan.create');
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
        return view('tumpangan.show', compact('tumpangan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tumpangan  $tumpangan
     * @return \Illuminate\Http\Response
     */
    public function edit(Tumpangan $tumpangan)
    {
        return view('tumpangan.edit', compact('tumpangan'));
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

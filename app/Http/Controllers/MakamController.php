<?php

namespace App\Http\Controllers;

use App\Models\Makam;
use App\Http\Requests\MakamRequest;
use Illuminate\Http\Request;

class MakamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $makam = Makam::all();
        return view('makam.index', compact('makam'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('makam.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\MakamRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MakamRequest $request)
    {
        Makam::create($request->validated());
        return redirect()->route('makam.index')->with('success', 'Makam created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Makam  $makam
     * @return \Illuminate\Http\Response
     */
    public function show(Makam $makam)
    {
        return view('makam.show', compact('makam'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Makam  $makam
     * @return \Illuminate\Http\Response
     */
    public function edit(Makam $makam)
    {
        return view('makam.edit', compact('makam'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\MakamRequest  $request
     * @param  \App\Models\Makam  $makam
     * @return \Illuminate\Http\Response
     */
    public function update(MakamRequest $request, Makam $makam)
    {
        $makam->update($request->validated());
        return redirect()->route('makam.index')->with('success', 'Makam updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Makam  $makam
     * @return \Illuminate\Http\Response
     */
    public function destroy(Makam $makam)
    {
        $makam->delete();
        return redirect()->route('makam.index')->with('success', 'Makam deleted successfully.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\JenazahKenal;
use App\Http\Requests\JenazahKenalRequest;
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
        $jenazah = JenazahKenal::all();
        return view('jenazah_kenal.index', compact('jenazah'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jenazah_kenal.create');
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
        return redirect()->route('jenazah_kenal.index')->with('success', 'Jenazah Kenal created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JenazahKenal  $jenazah
     * @return \Illuminate\Http\Response
     */
    public function show(JenazahKenal $jenazah)
    {
        return view('jenazah_kenal.show', compact('jenazah'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JenazahKenal  $jenazah
     * @return \Illuminate\Http\Response
     */
    public function edit(JenazahKenal $jenazah)
    {
        return view('jenazah_kenal.edit', compact('jenazah'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\JenazahKenalRequest  $request
     * @param  \App\Models\JenazahKenal  $jenazah
     * @return \Illuminate\Http\Response
     */
    public function update(JenazahKenalRequest $request, JenazahKenal $jenazah)
    {
        $jenazah->update($request->validated());
        return redirect()->route('jenazah_kenal.index')->with('success', 'Jenazah Kenal updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JenazahKenal  $jenazah
     * @return \Illuminate\Http\Response
     */
    public function destroy(JenazahKenal $jenazah)
    {
        $jenazah->delete();
        return redirect()->route('jenazah_kenal.index')->with('success', 'Jenazah Kenal deleted successfully.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Jenazah;
use App\Http\Requests\JenazahRequest;
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
        return view('jenazah.create');
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
        return view('jenazah.show', compact('jenazah'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jenazah  $jenazah
     * @return \Illuminate\Http\Response
     */
    public function edit(Jenazah $jenazah)
    {
        return view('jenazah.edit', compact('jenazah'));
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

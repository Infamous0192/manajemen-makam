<?php

namespace App\Http\Controllers;

use App\Models\Tpu;
use App\Http\Requests\TpuRequest;
use Illuminate\Http\Request;

class TpuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tpu = Tpu::all();
        return view('tpu.index', compact('tpu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tpu.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\TpuRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TpuRequest $request)
    {
        Tpu::create($request->validated());
        return redirect()->route('tpu.index')->with('success', 'Tpu created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tpu  $tpu
     * @return \Illuminate\Http\Response
     */
    public function show(Tpu $tpu)
    {
        return view('tpu.show', compact('tpu'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tpu  $tpu
     * @return \Illuminate\Http\Response
     */
    public function edit(Tpu $tpu)
    {
        return view('tpu.edit', compact('tpu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\TpuRequest  $request
     * @param  \App\Models\Tpu  $tpu
     * @return \Illuminate\Http\Response
     */
    public function update(TpuRequest $request, Tpu $tpu)
    {
        $tpu->update($request->validated());
        return redirect()->route('tpu.index')->with('success', 'Tpu updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tpu  $tpu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tpu $tpu)
    {
        $tpu->delete();
        return redirect()->route('tpu.index')->with('success', 'Tpu deleted successfully.');
    }
}

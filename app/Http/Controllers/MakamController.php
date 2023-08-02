<?php

namespace App\Http\Controllers;

use App\Models\Makam;
use App\Http\Requests\MakamRequest;
use App\Models\Tpu;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

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
        $tpu = Tpu::all()->map(function ($item, $key) {
            return ['label' => $item->nama, 'value' => $item->id];
        });

        return view('makam.create', compact('tpu'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\MakamRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MakamRequest $request)
    {
        if (!Makam::isAvailable($request)) {
            throw ValidationException::withMessages([
                'baris' => 'Blok tidak tersedia',
                'kolom' => 'Blok tidak tersedia',
                'nama'  => 'Blok tidak tersedia',
            ]);
        }

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
        $tpu = Tpu::all()->map(function ($item, $key) {
            return ['label' => $item->nama, 'value' => $item->id];
        });

        return view('makam.show', compact('makam', 'tpu'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Makam  $makam
     * @return \Illuminate\Http\Response
     */
    public function edit(Makam $makam)
    {
        $tpu = Tpu::all()->map(function ($item, $key) {
            return ['label' => $item->nama, 'value' => $item->id];
        });

        return view('makam.edit', compact('makam', 'tpu'));
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
        if (!Makam::isAvailable($request, $makam->id)) {
            throw ValidationException::withMessages([
                'baris' => 'Blok tidak tersedia',
                'kolom' => 'Blok tidak tersedia',
                'nama'  => 'Blok tidak tersedia',
            ]);
        }

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

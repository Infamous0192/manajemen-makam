<?php

namespace App\Http\Controllers;

use App\Models\Kenal;
use Illuminate\Http\Request;
use Hash;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\DataTables;

class KenalController extends Controller
{
    public function index()
    {
        return view('kenal.index');
    }
    public function getkenal(Request $request)
    {
        if ($request->ajax()) {
            $kenal = Kenal::all();
            return DataTables::of($kenal)
                ->editcolumn('aksi', function ($kenal) {
                    return view('partials._action', [
                        'model' => $kenal,
                        'form_url' => route('kenal.destroy', $kenal->id),
                        'edit_url' => route('kenal.edit', $kenal->id),
                    ]);
                })
                ->addIndexColumn()
                ->rawColumns(['aksi'])
                ->make(true);
        }
    }

    public function create()
    {
        return view('kenal.tambah');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_jenazah' => 'required',
            'kelamin' => 'required',
            'alamat_temu' => 'required',
            'tanggal_temu' => 'required',
            'desa_temu' => 'required',
            'kabupaten_temu' => 'required',
            'provinsi_temu' => 'required',
            'negara_temu' => 'required',
            'rt_temu' => 'required',
            'rw_temu' => 'required',
        ]);

        Kenal::create($validated);

        //toast('berhasil menambahkan data pengguna');
        Alert::success('sukses', 'berhasil menambahkan data pengguna');
        return redirect()->route('kenal.index');
    }

    public function show($id)
    {
        //
    }

    public function edit(Kenal $kenal)
    {
        return view('kenal.edit', compact('kenal'));
    }

    public function update(Request $request, Kenal $kenal)
    {
        $validated = $request->validate([
            'nama_jenazah' => 'required',
            'kelamin' => 'required',
            'alamat_temu' => 'required',
            'tanggal_temu' => 'required',
            'desa_temu' => 'required',
            'kabupaten_temu' => 'required',
            'provinsi_temu' => 'required',
            'negara_temu' => 'required',
            'rt_temu' => 'required',
            'rw_temu' => 'required',
        ]);

        $kenal->update($validated);

        //toast('berhasil menambahkan data pengguna');
        Alert::success('sukses', 'berhasil mengedit data pengguna');
        return redirect()->route('kenal.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kenal $kenal)
    {
        $kenal->destroy($kenal->id);

        Alert::success('sukses', 'berhasil menghapus data pengguna');
        return redirect()->route('kenal.index');
    }
}

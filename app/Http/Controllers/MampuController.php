<?php

namespace App\Http\Controllers;

use App\Models\Mampu;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\DataTables;

class MampuController extends Controller
{
    public function index()
    {
        return view('mampu.index');
    }

    public function getMampu(Request $request)
    {
        if ($request->ajax()) {
            $mampu = Mampu::all();
            return DataTables::of($mampu)
                ->editcolumn('aksi', function ($mampu) {
                    return view('partials._action', [
                        'model' => $mampu,
                        'form_url' => route('mampu.destroy', $mampu->id),
                        'edit_url' => route('mampu.edit', $mampu->id),
                        'print_url' => route('mampu.show', $mampu->id),
                    ]);
                })
                ->addIndexColumn()
                ->rawColumns(['aksi'])
                ->make(true);
        }
    }

    public function create()
    {
        return view('mampu.tambah');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nik' => 'required|size:16',
            'nama_lengkap' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'alamat_ktp' => 'required',
            'alamat_now' => 'required',
            'desa' => 'required',
            'kecamatan' => 'required',
            'kota' => 'required',
            'provinsi' => 'required',
            'negara' => 'required',
            'rw' => 'required',
            'rt' => 'required',
            'agama' => 'required',
            'pendidikan' => 'required',
            'pekerjaan' => 'required',
            'kawin' => 'required',
            'tinggal' => 'required',
            'tempat_dimakamkan' => 'required',
            'tanggal_meninggal' => 'required',
            'tanggal_dimakamkan' => 'required',
        ]);

        Mampu::create($validated);

        //toast('berhasil menambahkan data pengguna');
        Alert::success('sukses', 'berhasil menambahkan data pengguna');
        return redirect()->route('mampu.index');
    }

    public function show(Mampu $mampu)
    {
        $data = PDF::loadview('mampu/surat', ['mampu' => $mampu]);
        //mendownload laporan.pdf
        return $data->download('surat.pdf');
    }

    public function edit(Mampu $mampu)
    {
        return view('mampu.edit', compact('mampu'));
    }

    public function update(Request $request, Mampu $mampu)
    {
        $validated = $request->validate([
            'nik' => 'required|size:16',
            'nama_lengkap' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'alamat_ktp' => 'required',
            'alamat_now' => 'required',
            'desa' => 'required',
            'kecamatan' => 'required',
            'kota' => 'required',
            'provinsi' => 'required',
            'negara' => 'required',
            'rw' => 'required',
            'rt' => 'required',
            'agama' => 'required',
            'pendidikan' => 'required',
            'pekerjaan' => 'required',
            'kawin' => 'required',
            'tinggal' => 'required',
            'tempat_dimakamkan' => 'required',
            'tanggal_meninggal' => 'required',
            'tanggal_dimakamkan' => 'required',
        ]);

        $mampu->update($validated);

        //toast('berhasil menambahkan data pengguna');
        Alert::success('Success', 'Berhasil mengedit data');
        return redirect()->route('mampu.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(mampu $mampu)
    {
        $mampu->destroy($mampu->id);

        Alert::success('Success', 'Berhasil menghapus data');
        return redirect()->route('mampu.index');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Mampu;
use App\Models\Waris;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\DataTables;

class WarisController extends Controller
{
    public function index()
    {
        return view('waris.index');
    }

    public function getwaris(Request $request)
    {
        if ($request->ajax()) {
            $waris = Waris::with('mampu')->get();
            return DataTables::of($waris)
                ->editcolumn('aksi', function ($waris) {
                    return view('partials._action', [
                        'model' => $waris,
                        'form_url' => route('waris.destroy', $waris->id),
                        'edit_url' => route('waris.edit', $waris->id),
                        'print_url' => route('waris.show', $waris->id),
                    ]);
                })
                ->addIndexColumn()
                ->rawColumns(['aksi'])
                ->make(true);
        }
    }

    public function create()
    {
        $mampu = Mampu::all();

        return view('waris.tambah', compact('mampu'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_mendiang' => 'required',
            'status_waris' => 'required',
            'nik_waris' => 'required|size:16',
            'nama_waris' => 'required',
            'tempat_waris' => 'required',
            'tanggal_waris' => 'required',
            'kelamin' => 'required',
            'kecamatan' => 'required',
            'kabupaten' => 'required',
            'provinsi' => 'required',
            'agama' => 'required',
            'negara' => 'required',
            'pekerjaan' => 'required',
            'no_hp' => 'required'
        ]);

        Waris::create($validated);

        //toast('berhasil menambahkan waris');
        Alert::success('sukses', 'berhasil menambahkan waris');
        return redirect()->route('waris.index');
    }

    public function show($id)
    {
        $waris = Waris::with('mampu')->find($id);
        $data = PDF::loadview('waris/surat', ['waris' => $waris]);
        //mendownload laporan.pdf
        return $data->download('surat.pdf');
    }

    public function edit($id)
    {
        $waris = Waris::with('mampu')->find($id);
        $mampu = Mampu::all();
        return view('waris.edit', ['waris' => $waris, 'mampu' => $mampu]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'id_mendiang' => 'required',
            'status_waris' => 'required',
            'nik_waris' => 'required|size:16',
            'nama_waris' => 'required',
            'tempat_waris' => 'required',
            'tanggal_waris' => 'required',
            'kelamin' => 'required',
            'kecamatan' => 'required',
            'kabupaten' => 'required',
            'provinsi' => 'required',
            'agama' => 'required',
            'negara' => 'required',
            'pekerjaan' => 'required',
            'no_hp' => 'required'
        ]);

        $waris = Waris::with('mampu')->find($id);

        $waris->update($validated);

        //toast('berhasil menambahkan waris');
        Alert::success('sukses', 'berhasil mengedit waris');
        return redirect()->route('waris.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Waris::destroy($id);

        Alert::success('sukses', 'berhasil menghapus waris');
        return redirect()->route('waris.index');
    }
}

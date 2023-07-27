<?php

namespace App\Http\Controllers;

use App\Models\Kenal;
use App\Models\Mampu;
use App\Models\Waris;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index()
    {
        //menampilkan halaman laporan
        return view('laporan');
    }

    public function export()
    {
        //mengambil data dan tampilan dari halaman laporan_pdf
        //data di bawah ini bisa kalian ganti nantinya dengan data dari database

        $data = PDF::loadview('laporan_pdf', ['data' => 'ini adalah contoh laporan PDF']);
        //mendownload laporan.pdf
        return $data->download('laporan.pdf');
    }

    public function mampu()
    {
        $mampu = Mampu::all();

        return view('mampu/print', ['mampu' => $mampu]);

        $data = PDF::loadview('mampu/print', ['mampu' => $mampu])->setPaper('a4', 'landscape');
        //mendownload laporan.pdf
        return $data->download('laporan.pdf');
    }

    public function kenal()
    {
        $kenal = Kenal::all();

        $data = PDF::loadview('kenal/print', ['kenal' => $kenal]);
        //mendownload laporan.pdf
        return $data->download('laporan.pdf');
    }

    public function waris()
    {
        $waris = Waris::with('mampu')->get();

        $data = PDF::loadview('waris/print', ['waris' => $waris]);
        //mendownload laporan.pdf
        return $data->download('laporan.pdf');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Kenal;
use App\Models\Mampu;
use App\Models\Pembayaran;
use App\Models\Pengeluaran;
use App\Models\Waris;
use Illuminate\Http\Request;

class KeuanganController extends Controller
{
    /**
     * Show the keuangan page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $pembayaran = Pembayaran::all();
        $pengeluaran = Pengeluaran::all();

        return view('keuangan.index', compact('pembayaran', 'pengeluaran'));
    }
}

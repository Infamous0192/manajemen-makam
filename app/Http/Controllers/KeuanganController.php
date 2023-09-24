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

        $total = [
            'pendapatan' => Pembayaran::sum('jumlah'),
            'pengeluaran' => Pengeluaran::sum('jumlah'),
        ];

        $rekap = [
            'pendapatan' => Pembayaran::selectRaw('MONTH(created_at) AS bulan, SUM(jumlah) AS total')
                ->groupByRaw('MONTH(created_at)')
                ->get(),
            'pengeluaran' => Pengeluaran::selectRaw('MONTH(created_at) AS bulan, SUM(jumlah) AS total')
                ->groupByRaw('MONTH(created_at)')
                ->get()
        ];

        return view('keuangan.index', compact('pembayaran', 'pengeluaran', 'total', 'rekap'));
    }
}

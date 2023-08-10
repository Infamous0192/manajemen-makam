<?php

namespace App\Http\Controllers;

use App\Models\Jenazah;
use App\Models\JenazahKenal;
use App\Models\Kenal;
use App\Models\Makam;
use App\Models\Mampu;
use App\Models\Pewaris;
use App\Models\Waris;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $jenazah = Jenazah::count();
        $kenal = JenazahKenal::count();
        $pewaris = Pewaris::count();

        $makam_total = Makam::count();
        $makam_terpakai = Makam::join('jenazah', 'jenazah.id_makam', '=', 'makam.id', 'left')
            ->join('jenazah_kenal', 'jenazah_kenal.id_makam', '=', 'makam.id', 'left')
            ->whereNotNull('jenazah.id')
            ->orWhereNotNull('jenazah_kenal.id')
            ->count();
        $makam_tersedia = Makam::join('jenazah', 'jenazah.id_makam', '=', 'makam.id', 'left')
            ->join('jenazah_kenal', 'jenazah_kenal.id_makam', '=', 'makam.id', 'left')
            ->whereNull('jenazah.id')
            ->whereNull('jenazah_kenal.id')
            ->count();

        return view('home', compact('jenazah', 'kenal', 'pewaris', 'makam_total', 'makam_terpakai', 'makam_tersedia'));
    }
}

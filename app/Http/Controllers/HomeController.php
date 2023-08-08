<?php

namespace App\Http\Controllers;

use App\Models\Jenazah;
use App\Models\JenazahKenal;
use App\Models\Kenal;
use App\Models\Mampu;
use App\Models\Pewaris;
use App\Models\Waris;
use Illuminate\Http\Request;

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

        return view('home', [
            'kenal' => $kenal,
            'jenazah' => $jenazah,
            'pewaris' => $pewaris,
        ]);
    }
}

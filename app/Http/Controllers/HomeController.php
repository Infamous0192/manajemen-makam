<?php

namespace App\Http\Controllers;

use App\Models\Kenal;
use App\Models\Mampu;
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
        $kenal = Kenal::get()->count();
        $mampu = Mampu::get()->count();
        $waris = Waris::get()->count();

        return view('home', [
            'kenal' => $kenal,
            'mampu' => $mampu,
            'waris' => $waris,
        ]);
    }
}

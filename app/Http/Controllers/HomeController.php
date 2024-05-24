<?php

namespace App\Http\Controllers;

use App\Models\Sawah;
use App\Models\Bendung;

use App\Models\Kabkota;
use App\Models\Dirigasi;
use App\Models\Jaringan;
use App\Models\Masyarakat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Output\OutputInterface;

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
        $data = [
            'title' => 'Welcome.',
            "kabkota" => Kabkota::all(),
            "dirigasi" => Dirigasi::all(),
            "bendung" => Bendung::all(),
            "sawah" => Sawah::all(),
            "jaringan" => Jaringan::all(),
            'masyarakat' => Masyarakat::all(),
        ];
        return view('admin.home', $data);
    }

    public function map()
    {
        $data = [
            'title' => 'Pemetaan',
            "kabkota" => Kabkota::all(),
            "dirigasi" => Dirigasi::all(),
            "bendung" => Bendung::all(),
            "sawah" => Sawah::all(),
            "jaringan" => Jaringan::all(),
            "masyarakat" => Masyarakat::all(),
        ];
        return view('home', $data);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Sawah;
use App\Models\Bendung;
use App\Models\Kabkota;
use App\Models\Dirigasi;
use Illuminate\Http\Request;
use PhpParser\Node\Scalar\MagicConst\Dir;

class DirigasiController extends Controller
{
    //autentikasi
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index(Dirigasi $dirigasi)
    {
        return view('outer.dirigasi.index', [
            "title" => "Daerah Irigasi",
            "dirigasi" => Dirigasi::all(),
            "kabkota" => Kabkota::all(),
            "kabkota" => Bendung::all(),
            "sawah" => Sawah::all(),
        ]);
    }

    public function detail(Dirigasi $dirigasi)
    {
        return view('outer.dirigasi.detail', [
            "title" => 'Detail Daerah Irigasi',
            "dirigasi" => $dirigasi,
            'bendung' => $dirigasi->bendung,
            'kabkota' => $dirigasi->kabkota,
            'jaringan' => $dirigasi->jaringan,
            "sawah" => Sawah::all(),
            // "kabkota" => Kabkota::all()
        ]);
    }
}

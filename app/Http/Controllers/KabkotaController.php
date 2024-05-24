<?php

namespace App\Http\Controllers;

use App\Models\Sawah;
use App\Models\Kabkota;
use App\Models\Dirigasi;
use Illuminate\Http\Request;


class KabkotaController extends Controller
{
    //autentikasi
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index(Kabkota $kabkota)
    {
        return view('outer.kabkota.index', [
            "title" => "Pemetaan Kab.Kota",
            "kabkota" => Kabkota::all(),
            "dirigasi" => Dirigasi::all()
        ]);
    }

    public function detail(Kabkota $kabkota)
    {
        return view('outer.kabkota.detail', [
            "title" => 'Detail Daerah Irigasi',
            "kabkota" => $kabkota,
            'bendung' => $kabkota->bendung,
            'dirigasi' => $kabkota->dirigasi,
            "sawah" => Sawah::all(),
            // "kabkota" => Kabkota::all()
        ]);
    }
}

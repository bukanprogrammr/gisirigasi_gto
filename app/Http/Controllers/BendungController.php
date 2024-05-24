<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dirigasi;
use App\Models\Bendung;
use App\Models\Kabkota;
use Illuminate\Support\Facades\Storage;

class BendungController extends Controller
{
    public function index(Bendung $bendung)
    {
        return view('outer.bendung.index', [
            "title" => "Pemetaan Bendungan",
            "bendung" => Bendung::all(),
            "dirigasi" => $bendung->dirigasi,
            "kabkota" => Kabkota::all()
        ]);
    }

    public function detail(bendung $bendung)
    {
        return view('bendung.detail', [
            "bendung" => $bendung,
            "dirigasi" => Dirigasi::all()
        ]);
    }

}

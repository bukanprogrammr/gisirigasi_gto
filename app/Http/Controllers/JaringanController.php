<?php

namespace App\Http\Controllers;

use App\Models\Kabkota;
use App\Models\Jaringan;
use Illuminate\Http\Request;

class JaringanController extends Controller
{
    public function index(Jaringan $jaringan)
    {
        return view('outer.jaringan.index', [
            "title" => "Pemetaan Jaringan Irigasi",
            "jaringan" => Jaringan::all(),
            "dirigasi" => $jaringan->dirigasi,
            "kabkota" => Kabkota::all(),
            // "id" => public_path("storage/"),
            // "id1" => jaringan::find($jaringan)
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Sawah;
use App\Models\Kabkota;
use App\Models\Dirigasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SawahController extends Controller
{
    public function index(Sawah $sawah)
    {
        return view('outer.sawah.index', [
            "title" => "Pemetaan Sawah",
            "sawah" => Sawah::all(),
            "dirigasi" => $sawah->kabkota,
            "kabkota" => Kabkota::all(),
            // "id" => public_path("storage/"),
            // "id1" => Sawah::find($sawah)
        ]);
    }


    public function downloadFile(Request $request, $id)
    {
        $sawah = Sawah::findOrFail($id);
        // $file_path = public_path("storage/" . $sawah->geojson);
        $file_path = $sawah->geojson;
        $file = $sawah->geojson;
        $headers = ['Content-Type' => 'application/geojson'];

        // $filePath = 'storage/' . $sawah->id;
        // $filePath = public_path("pH7ZHXosOk8ZMCCxCS3TdxpFQguBvHOqV0TuvvRO.json");
        // return Storage::download($sawah->geojson);
        return response()->download(public_path('storage/' . $file_path));
    }
}

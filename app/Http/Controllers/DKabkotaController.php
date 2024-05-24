<?php

namespace App\Http\Controllers;

use App\Models\Kabkota;
use App\Models\Masyarakat;
use App\Rules\GeoJsonFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DKabkotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.kabkotas.index', [
            "title" => "Data Kab./Kota",
            "kabkota" => Kabkota::all(),
            "masyarakat" => Masyarakat::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.kabkotas.create', [
            "title" => "Data Kab./Kota",
            "masyarakat" => Masyarakat::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate(
            [
                'nama_kabkota' => 'required',
                'warna' => 'required',
                'geojson'  => ['required', 'file', 'max:6144', new GeoJsonFile],
            ]
        );

        if ($file = $request->file('geojson')); {
            $newFileName = uniqid() . '.' . $file->getClientOriginalExtension();
            $validatedData['geojson'] = $request->file('geojson')->storeAs('geojson-kabkota', $newFileName);
        }

        Kabkota::create($validatedData);

        return redirect('/admin/kabkotas')->with('pesan', 'Tambah Data Berhasil!');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kabkota  $kabkota
     * @return \Illuminate\Http\Response
     */
    public function show(Kabkota $kabkota)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kabkota  $kabkota
     * @return \Illuminate\Http\Response
     */
    public function edit(Kabkota $kabkota)
    {
        return view('admin.kabkotas.edit', [
            "title" => "Data Kab./Kota",
            "kabkota" => $kabkota,
            "masyarakat" => Masyarakat::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kabkota  $kabkota
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kabkota $kabkota)
    {
        $rules = [
            'nama_kabkota' => 'required',
            'warna' => 'required',
            'geojson'  => ['file', 'max:6144', new GeoJsonFile],
        ];

        $validatedData = $request->validate($rules);

        // Hapus file lama jika ada
        if ($request->hasFile('geojson') && $kabkota->geojson) {
            Storage::delete($kabkota->geojson); // Hapus file lama dari penyimpanan
        }

        // Simpan file baru
        if ($file = $request->file('geojson')) {
            $newFileName = uniqid() . '.' . $file->getClientOriginalExtension();
            $validatedData['geojson'] = $request->file('geojson')->storeAs('geojson-kabkota', $newFileName);
        }

        Kabkota::where('id', $kabkota->id)
            ->update($validatedData);

        return redirect('/admin/kabkotas')->with('pesan', 'dirigasi Berhasil Diubah!');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kabkota  $kabkota
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kabkota $kabkota)
    {
        if ($kabkota->geojson) {
            Storage::delete($kabkota->geojson);
        }
        Kabkota::destroy($kabkota->id);
        return redirect('/admin/kabkotas')->with('pesan', 'Hapus Data Berhasil!');
    }

    public function downloadGeoJson($id)
    {
        $kabkota = Kabkota::findOrFail($id);
        $geoJson = $kabkota->geojson; // assuming you have a `geo_json` column in your `kabkota` table
        $newName = time() . '.geojson';

        return Storage::download($geoJson);
    }
}

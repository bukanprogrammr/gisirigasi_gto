<?php

namespace App\Http\Controllers;

use App\Models\Sawah;
use App\Models\Kabkota;
use App\Models\Masyarakat;
use App\Rules\GeoJsonFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class DSawahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Sawah $sawah)
    {
        return view('admin.sawahs.index', [
            "title" => "Data Sawah",
            "sawah" => Sawah::all(),
            "masyarakat" => Masyarakat::all(),
            "geojson" => 'storage/' . $sawah
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sawahs.create', [
            "title" => "Data Sawah",
            "kabkota" => Kabkota::all(),
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
                'kabkota_id' => 'required',
                'geojson'  => ['required', 'file', 'max:10240', new GeoJsonFile],
            ]
        );

        if ($file = $request->file('geojson')); {
            $newFileName = uniqid() . '.' . $file->getClientOriginalExtension();
            $validatedData['geojson'] = $request->file('geojson')->storeAs('geojson-sawah', $newFileName);
        }

        Sawah::create($validatedData);

        return redirect('/admin/sawahs')->with('pesan', 'Tambah Data Berhasil!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sawah  $sawah
     * @return \Illuminate\Http\Response
     */
    public function show(Sawah $sawah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sawah  $sawah
     * @return \Illuminate\Http\Response
     */
    public function edit(Sawah $sawah)
    {
        return view('admin.sawahs.edit', [
            "title" => "Data Sawah",
            "sawah" => $sawah,
            "kabkota" => Kabkota::all(),
            "masyarakat" => Masyarakat::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sawah  $sawah
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sawah $sawah)
    {
        $rules = [
            'geojson'  => ['required', 'file', 'max:10240', new GeoJsonFile],
        ];

        $validatedData = $request->validate($rules);

        // Hapus file lama jika ada
        if ($request->hasFile('geojson') && $sawah->geojson) {
            Storage::delete($sawah->geojson); // Hapus file lama dari penyimpanan
        }

        // Simpan file baru
        if ($file = $request->file('geojson')) {
            $newFileName = uniqid() . '.' . $file->getClientOriginalExtension();
            $validatedData['geojson'] = $request->file('geojson')->storeAs('geojson-sawah', $newFileName);
        }

        Sawah::where('id', $sawah->id)
            ->update($validatedData);

        return redirect('/admin/sawahs')->with('pesan', 'dirigasi Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sawah  $sawah
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sawah $sawah)
    {
        Sawah::destroy($sawah->id);
        return redirect('/admin/sawahs')->with('pesan', 'Hapus Data Berhasil!');
    }

    public function downloadFile(Sawah $sawah)
    {
        return Storage::download($sawah);
    }

    public function downloadGeoJson($id)
    {
        $sawah = Sawah::findOrFail($id);
        $geoJson = $sawah->geojson; // assuming you have a `geo_json` column in your `sawah` table
        $newName = time() . '.geojson';

        return Storage::download($geoJson);
    }
    // public function downloadFile($sawah)
    // {
    //     $path = Sawah::where("id", $sawah)->value("storage/");
    //     return Storage::download($path);
    // }


}

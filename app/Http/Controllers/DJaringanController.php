<?php

namespace App\Http\Controllers;

use App\Models\Dirigasi;
use App\Models\Jaringan;
use App\Models\Masyarakat;
use App\Rules\GeoJsonFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Js;

class DJaringanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.jaringans.index', [
            "title" => "Data Jaringan Irigasi",
            "jaringan" => Jaringan::all(),
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
        return view('admin.jaringans.create', [
            "title" => "Data Jaringan Irigasi",
            "dirigasi" => Dirigasi::all(),
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
                'dirigasi_id' => 'required|unique:jaringans,dirigasi_id',
                'geojson' => 'required',
                'foto' => 'image|file|max:1024',
            ],
            [
                'dirigasi_id.unique' => 'Daerah Irigasi sudah ada.', // Pesan kustom untuk validasi unik
            ]
        );

        // $file = $request->file('geojson');

        // $newFileName = uniqid() . '.' . $file->getClientOriginalExtension();
        // if ($request->file('geojson')); {
        //     $validatedData['geojson'] = $request->file('geojson')->storeAs('geojson-jaringan', $newFileName);
        // }

        // Simpan file GeoJSON
        $geojsonFile = $request->file('geojson');
        $geojsonFileName = uniqid() . '.' . $geojsonFile->getClientOriginalExtension();
        $geojsonFilePath = $geojsonFile->storeAs('geojson-jaringan', $geojsonFileName);

        // Simpan foto
        $fotoFile = $request->file('foto');
        $fotoFileName = uniqid() . '.' . $fotoFile->getClientOriginalExtension();
        $fotoFilePath = $fotoFile->storeAs('foto-jaringan', $fotoFileName);

        // Tambahkan nama file ke dalam data yang akan disimpan
        $validatedData['geojson'] = $geojsonFilePath;
        $validatedData['foto'] = $fotoFilePath;

        Jaringan::create($validatedData);

        return redirect('/admin/jaringans')->with('pesan', 'Tambah Data Berhasil!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Jaringan $jaringan)
    {
        return view('admin.jaringans.edit', [
            "title" => "Data Jaringan Irigasi",
            "jaringan" => $jaringan,
            "dirigasi" => Dirigasi::all(),
            "masyarakat" => Masyarakat::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, Jaringan $jaringan)
    {
        // Validasi input
        $validatedData = $request->validate([
            'foto' => 'nullable|image', // Opsional: update foto
            'geojson' => 'nullable|file|max:10240', // Opsional: update GeoJSON
        ]);

        // Update foto jika ada yang diunggah
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($jaringan->foto) {
                Storage::delete($jaringan->foto);
            }

            // Simpan foto baru
            $fotoPath = $request->file('foto')->store('foto-jaringan');
            $validatedData['foto'] = $fotoPath;
        }

        // Update file GeoJSON jika ada yang diunggah
        if ($request->hasFile('geojson')) {
            // Hapus file GeoJSON lama jika ada
            if ($jaringan->geojson) {
                Storage::delete($jaringan->geojson);
            }

            // Simpan file GeoJSON baru
            $geojsonPath = $request->file('geojson')->store('geojson-jaringan');
            $validatedData['geojson'] = $geojsonPath;
        }

        // Update data jaringan
        $jaringan->update($validatedData);

        return redirect('/admin/jaringans')->with('pesan', 'Dirigasi Berhasil Diubah!');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jaringan $jaringan)
    {
        if ($jaringan->geojson) {
            Storage::delete($jaringan->geojson);
        }
        Jaringan::destroy($jaringan->id);
        return redirect('/admin/jaringans')->with('pesan', 'Hapus Data Berhasil!');
    }

    public function downloadFile(Jaringan $jaringan)
    {
        return Storage::download($jaringan);
    }

    public function downloadGeoJson($id)
    {
        $jaringan = Jaringan::findOrFail($id);
        $geoJson = $jaringan->geojson; // assuming you have a `geo_json` column in your `jaringan` table
        $newName = time() . '.geojson';

        return Storage::download($geoJson);
    }
}

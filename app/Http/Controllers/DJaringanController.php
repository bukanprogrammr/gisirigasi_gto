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
                'geojson' => ['file', 'max:6144', 'required', new GeoJsonFile],
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
        if ($file = $request->file('geojson')) {
            $newFileName = uniqid() . '.' . $file->getClientOriginalExtension();
            // Simpan file dan dapatkan path-nya
            $path = $file->storeAs('public/geojson-jaringan', $newFileName);
            // Hanya simpan nama file ke dalam database
            $validatedData['geojson'] = $newFileName;
        }
        // Simpan foto
        if ($request->file('foto')) {
            $fotoPath = $request->file('foto')->store('public/foto-jaringan');
            $validatedData['foto'] = basename($fotoPath); // Mengambil hanya nama file
        }


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
            'geojson'  => ['file', 'max:6144', new GeoJsonFile], // Opsional: update GeoJSON
        ]);

        // Update foto jika ada yang diunggah
        if ($request->hasFile('foto') && $jaringan->foto) {
            if ($jaringan->foto !== null) {
                Storage::delete('public/foto-jaringan/' . $jaringan->foto);
            }
            $fotoPath = $request->file('foto')->store('public/foto-jaringan');
            $validatedData['foto'] = basename($fotoPath); // Mengambil hanya nama file
        }

        // Hapus file lama jika ada
        if ($request->hasFile('geojson') && $jaringan->geojson) {
            Storage::delete('public/geojson-jaringan/' . $jaringan->geojson); // Hapus file lama dari penyimpanan
        }

        // Simpan file baru
        if ($file = $request->file('geojson')) {
            $newFileName = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/geojson-jaringan', $newFileName);
            $validatedData['geojson'] = $newFileName;
        }

        // Update data jaringan
        $jaringan->update($validatedData);

        return redirect('/admin/jaringans')->with('pesan', 'Ubah Data Berhasil!');
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
            Storage::delete('public/geojson-jaringan/' . $jaringan->geojson);
        }

        if ($jaringan->foto) {
            Storage::delete('public/foto-jaringan/' . $jaringan->foto);
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
        $geoJson = 'public/geojson-jaringan/' . $jaringan->geojson; // assuming you have a `geo_json` column in your `jaringan` table
        $newName = time() . '.geojson';

        return Storage::download($geoJson);
    }
}

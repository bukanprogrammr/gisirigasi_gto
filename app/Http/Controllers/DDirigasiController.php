<?php

namespace App\Http\Controllers;

use App\Models\Dirigasi;
use App\Models\Kabkota;
use App\Models\Masyarakat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DDirigasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return view('admin.dirigasis.index', [
            "title" => "Data Daerah Irigasi",
            "dirigasi" => Dirigasi::all(),
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
        return view('admin.dirigasis.create', [
            "title" => "Data Daerah Irigasi",
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
                'nama_dirigasi' => 'required',
                'kabkota_id' => 'required',
                'luas' => 'required',
            ]
        );

        $dirigasi = Dirigasi::create([
            'nama_dirigasi' => $validatedData['nama_dirigasi'],
            'luas' => $validatedData['luas'],
        ]);

        $dirigasi->kabkota()->attach($validatedData['kabkota_id']);



        return redirect('/admin/dirigasis')->with('pesan', 'Tambah Data Berhasil!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dirigasi  $dirigasi
     * @return \Illuminate\Http\Response
     */
    public function show(Dirigasi $dirigasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dirigasi  $dirigasi
     * @return \Illuminate\Http\Response
     */
    public function edit(Dirigasi $dirigasi)
    {
        return view('admin.dirigasis.edit', [
            "title" => "Data Daerah Irigasi",
            "dirigasi" => $dirigasi,
            "kabkota" => Kabkota::all(),
            "masyarakat" => Masyarakat::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dirigasi  $dirigasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dirigasi $dirigasi)
    {
        $rules = [
            'nama_dirigasi' => 'required',
            // 'kabkota_id' => 'required',
            'luas' => 'required',
        ];

        $validatedData = $request->validate($rules);

        Dirigasi::where('id', $dirigasi->id)
            ->update($validatedData);

        $dirigasi->kabkota()->sync($request->kabkota_id);

        return redirect('/admin/dirigasis')->with('pesan', 'dirigasi Berhasil Diubah!');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dirigasi  $dirigasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dirigasi $dirigasi)
    {
        if ($dirigasi->geojson) {
            Storage::delete($dirigasi->geojson);
        }
        Dirigasi::destroy($dirigasi->id);
        return redirect('/admin/dirigasis')->with('pesan', 'Hapus Data Berhasil!');
    }
}

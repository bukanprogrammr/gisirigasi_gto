<?php

namespace App\Http\Controllers;

use App\Models\Bendung;
use App\Models\Dirigasi;
use App\Models\Masyarakat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DBendungController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.bendungs.index', [
            "title" => "Data Bendung",
            "bendung" => Bendung::all(),
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
        return view('admin.bendungs.create', [
            "title" => "Data Bendung",
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
                'dirigasi_id' => 'required',
                'koordinat' => 'required',
                'foto' => 'image|file|max:1024',
            ]
        );
        if ($request->file('foto')) {
            $fotoPath = $request->file('foto')->store('public/foto-bendung');
            $validatedData['foto'] = basename($fotoPath); // Mengambil hanya nama file
        }
        Bendung::create($validatedData);

        return redirect('/admin/bendungs')->with('pesan', 'Tambah Data Berhasil!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bendung  $bendung
     * @return \Illuminate\Http\Response
     */
    public function show(Bendung $bendung)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bendung  $bendung
     * @return \Illuminate\Http\Response
     */
    public function edit(Bendung $bendung)
    {
        return view('admin.bendungs.edit', [
            "title" => "Data Bendung",
            "bendung" => $bendung,
            "dirigasi" => Dirigasi::all(),
            "masyarakat" => Masyarakat::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bendung  $bendung
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bendung $bendung)
    {
        $rules = [
            'koordinat' => 'required',
            'foto' => 'image|file|max:1024',
        ];

        $validatedData = $request->validate($rules);

        if ($request->hasFile('foto') && $bendung->foto) {
            if ($bendung->foto !== null) {
                Storage::delete('public/foto-bendung/' . $bendung->foto);
            }
            $fotoPath = $request->file('foto')->store('public/foto-bendung');
            $validatedData['foto'] = basename($fotoPath); // Mengambil hanya nama file
        }

        Bendung::where('id', $bendung->id)
            ->update($validatedData);

        return redirect('/admin/bendungs')->with('pesan', 'Ubah Data Berhasil!');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bendung  $bendung
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bendung $bendung)
    {
        if ($bendung->foto) {
            Storage::delete('public/foto-bendung/' . $bendung->foto);
        }
        Bendung::destroy($bendung->id);
        return redirect('/admin/bendungs')->with('pesan', 'Hapus Data Berhasil!');
    }
}

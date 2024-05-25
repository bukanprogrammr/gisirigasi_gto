<?php

namespace App\Http\Controllers;

use App\Models\Masyarakat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DMasaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.masyarakats.index', [
            "title" => "Pengaduan Masyarakat",
            "masyarakat" => Masyarakat::latest()->get(),
            "kosong" => Masyarakat::whereNull('tanggapan')->get(),
            "berisi" => Masyarakat::whereNotNull('tanggapan')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Masyarakat  $masyarakat
     * @return \Illuminate\Http\Response
     */
    public function show(Masyarakat $masyarakat)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Masyarakat  $masyarakat
     * @return \Illuminate\Http\Response
     */
    public function edit(Masyarakat $masyarakat)
    {
        return view('admin.masyarakats.edit', [
            'masyarakat' => $masyarakat
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Masyarakat  $masyarakat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Masyarakat $masyarakat)
    {
        $rules = [
            'tanggapan' => 'required',
        ];

        $validatedData = $request->validate($rules);

        if ($request->file('foto')) {
            if ($masyarakat->foto <> "") {
                unlink(public_path('storage') . '/' . $masyarakat->foto);
            }
            $validatedData['foto'] = $request->file('foto')->store('foto-masyarakat');
        }

        Masyarakat::where('id', $masyarakat->id)
            ->update($validatedData);

        return redirect('/admin/masyarakats')->with('pesan', 'Berhasil menanggapi, ketuk kembali kritik/saran untuk edit tanggapan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Masyarakat  $masyarakat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Masyarakat $masyarakat)
    {
        if ($masyarakat->foto) {
            Storage::delete('public/foto-masalah/' . $masyarakat->foto);
        }
        Masyarakat::destroy($masyarakat->id);
        return redirect('/admin/masyarakats')->with('pesan', 'Hapus Data Berhasil!');
    }
}

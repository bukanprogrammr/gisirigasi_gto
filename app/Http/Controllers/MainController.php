<?php

namespace App\Http\Controllers;

use App\Models\Sawah;
use App\Models\Bendung;
use App\Models\Kabkota;
use App\Models\Dirigasi;
use App\Models\Jaringan;
use App\Models\Masyarakat;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function maindirigasi(Dirigasi $dirigasi)
    {
        return view('outer.dirigasi', [
            "title" => "Daerah Irigasi",
            "dirigasi" => Dirigasi::all(),
            "kabkota" => Kabkota::all(),
            "kabkota" => Bendung::all(),
            "sawah" => Sawah::all(),
        ]);
    }

    public function maindetaildirigasi(Dirigasi $dirigasi)
    {
        return view('outer.detaildirigasi', [
            "title" => 'Detail Daerah Irigasi',
            "dirigasi" => $dirigasi,
            'bendung' => $dirigasi->bendung,
            'kabkota' => $dirigasi->kabkota,
            'jaringan' => $dirigasi->jaringan,
            "sawah" => Sawah::all(),
            // "kabkota" => Kabkota::all()
        ]);
    }

    public function mainbendung(Bendung $bendung)
    {
        return view('outer.bendung', [
            "title" => "Pemetaan Bendungan",
            "bendung" => Bendung::all(),
            "dirigasi" => $bendung->dirigasi,
            "kabkota" => Kabkota::all()
        ]);
    }

    public function mainjaringan(Jaringan $jaringan)
    {
        return view('outer.jaringan', [
            "title" => "Pemetaan Jaringan Irigasi",
            "jaringan" => Jaringan::all(),
            "dirigasi" => $jaringan->dirigasi,
            "kabkota" => Kabkota::all(),
            // "id" => public_path("storage/"),
            // "id1" => jaringan::find($jaringan)
        ]);
    }

    public function mainsawah(Sawah $sawah)
    {
        return view('outer.sawah', [
            "title" => "Pemetaan Sawah",
            "sawah" => Sawah::all(),
            "dirigasi" => $sawah->kabkota,
            "kabkota" => Kabkota::all(),
            // "id" => public_path("storage/"),
            // "id1" => Sawah::find($sawah)
        ]);
    }

    public function createmasyarakat()
    {
        return view('main', [
            "title" => "Data masyarakat",
            "masyarakat" => Masyarakat::latest()->get(),
        ]);
    }

    public function storemasyarakat(Request $request)
    {
        $validatedData = $request->validate(
            [
                'nik' => 'required',
                'nama' => 'required',
                'no_hp' => 'required',
                'koordinat' => 'required',
                'foto' => 'required|image|file|max:2048',
                'kritik' => 'required',
            ]
        );
        if ($request->file('foto')) {
            $pathFoto = $request->file('foto')->store('public/foto-masalah');
            $validatedData['foto'] = basename($pathFoto);
        }
        Masyarakat::create($validatedData);

        return redirect('/')->with('pesan', 'Pengaduan Berhasil Terkirim, Terimakasih Partisipasinya!');
    }

    public function map()
    {
        $data = [
            'title' => 'Beranda',
            "kabkota" => Kabkota::all(),
            "dirigasi" => Dirigasi::all(),
            "bendung" => Bendung::all(),
            "sawah" => Sawah::all(),
            "jaringan" => Jaringan::all(),
            "masyarakat" => Masyarakat::all(),
        ];
        return view('map', $data);
    }
}

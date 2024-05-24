<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MapModel extends Model
{
    // panggil semua data di database
    public function Data1()
    {
        return DB::table('tbl_kec')
            ->get();
    }

    public function Data2($id_kec)
    {
        return DB::table('tbl_vegetasi')
            ->join('tbl_level', 'tbl_level.id_level', '=', 'tbl_vegetasi.id_level')
            ->join('tbl_kec', 'tbl_kec.id_kec', '=', 'tbl_vegetasi.id_kec')
            ->where('tbl_vegetasi.id_kec', $id_kec)
            ->get();
    }

    public function Data4($id_level)
    {
        return DB::table('tbl_vegetasi')
            ->join('tbl_level', 'tbl_level.id_level', '=', 'tbl_vegetasi.id_level')
            ->join('tbl_kec', 'tbl_kec.id_kec', '=', 'tbl_vegetasi.id_kec')
            ->where('tbl_vegetasi.id_level', $id_level)
            ->get();
    }

    public function AllData1()
    {
        return DB::table('tbl_vegetasi')
            ->join('tbl_level', 'tbl_level.id_level', '=', 'tbl_vegetasi.id_level')
            ->join('tbl_kec', 'tbl_kec.id_kec', '=', 'tbl_vegetasi.id_kec')
            ->get();
    }
    public function Data5($id_vegetasi)
    {
        return DB::table('tbl_vegetasi')
            ->join('tbl_level', 'tbl_level.id_level', '=', 'tbl_vegetasi.id_level')
            ->join('tbl_kec', 'tbl_kec.id_kec', '=', 'tbl_vegetasi.id_kec')
            ->where('id_vegetasi', $id_vegetasi)
            ->first();
    }


    public function Data3()
    {
        return DB::table('tbl_level')
            ->get();
    }

    public function Detail1($id_kec)
    {
        return DB::table('tbl_kec')
            ->where('id_kec', $id_kec)
            ->first();
    }

    public function Detail2($id_level)
    {
        return DB::table('tbl_level')
            ->where('id_level', $id_level)
            ->first();
    }

    public function Details($id_vegetasi)
    {
        return DB::table('tbl_vegetasi')
            ->where('id_vegetasi', $id_vegetasi)
            ->first();
    }
}

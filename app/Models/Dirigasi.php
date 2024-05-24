<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dirigasi extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $with = ['kabkota'];

    public static function find($id)
    {
        $dirigasi = static::all();
        return $dirigasi->firstWhere('slug', $id);
    }

    public function kabkota()
    {
        return $this->belongsToMany(Kabkota::class, 'kabkotadirigasis', 'dirigasi_id', 'kabkota_id');
    }

    // //1-n inverse
    // public function kabkota()
    // {
    //     return $this->belongsTo(Kabkota::class);
    // }

    //n-1
    public function bendung()
    {
        return $this->hasMany(Bendung::class);
    }

    //n-1
    public function jaringan()
    {
        return $this->hasMany(Jaringan::class);
    }

    // pengakalan resource
    // public function getRouteKeyName()
    // {
    //     return 'slug';
    // }

    //automasi slu
}

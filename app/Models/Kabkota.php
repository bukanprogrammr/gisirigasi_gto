<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kabkota extends Model
{
    use HasFactory;

    protected $guarded = ['id'];


    public static function find($id)
    {
        $kabkota = static::all();
        return $kabkota->firstWhere('slug', $id);
    }

    public function dirigasi()
    {
        return $this->belongsToMany(Dirigasi::class, 'kabkotadirigasis', 'kabkota_id', 'dirigasi_id');
    }

    // //n-1
    // public function dirigasi()
    // {
    //     return $this->hasMany(Dirigasi::class);
    // }

    public function sawah()
    {
        return $this->hasMany(Sawah::class);
    }



    // pengakalan resource
    // public function getRouteKeyName()
    // {
    //     return 'slug';
    // }


}

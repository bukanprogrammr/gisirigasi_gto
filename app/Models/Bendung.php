<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bendung extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $with = ['dirigasi'];

    public static function find($id)
    {
        $bendung = static::all();
        return $bendung->firstWhere('slug', $id);
    }

    //1-n inverse
    public function dirigasi()
    {
        return $this->belongsTo(Dirigasi::class);
    }
}

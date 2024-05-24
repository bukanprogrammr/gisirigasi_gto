<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jaringan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $with = ['dirigasi'];

    //1-n inverse
    public function dirigasi()
    {
        return $this->belongsTo(Dirigasi::class);
    }
}

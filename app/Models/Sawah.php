<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sawah extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $with = ['kabkota'];

    //1-n inverse
    public function kabkota()
    {
        return $this->belongsTo(Kabkota::class);
    }
}

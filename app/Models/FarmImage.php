<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FarmImage extends Model
{
    use HasFactory;

    protected $guarded = ['id'];


    public function getFarm()
    {
        return $this->belongsTo(Farm::class, 'farm_id');
    }
}

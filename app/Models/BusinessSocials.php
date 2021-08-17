<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessSocials extends Model
{
    use HasFactory;

    public function getBusiness()
    {
        return $this->belongsTo(Business::class, 'business_id');
    }
}

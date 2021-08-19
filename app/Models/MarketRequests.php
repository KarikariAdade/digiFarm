<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MarketRequests extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function getBusiness()
    {
        return $this->belongsTo(Business::class, 'business_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessType extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getBusiness()
    {
        return $this->hasManyThrough(MarketRequests::class, Business::class, 'type_id', 'business_id');
    }

}

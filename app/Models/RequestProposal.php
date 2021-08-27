<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestProposal extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function getBusiness()
    {
        return $this->belongsTo(Business::class, 'business_id');
    }

    public function getRequest()
    {
        return $this->belongsTo(MarketRequests::class, 'request_id');
    }

    public function getUser()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

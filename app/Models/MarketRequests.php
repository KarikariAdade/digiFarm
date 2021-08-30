<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class MarketRequests extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public const LIMIT = 100;

    public function getBusiness()
    {
        return $this->belongsTo(Business::class, 'business_id');
    }

    public function getProposals()
    {
        return $this->hasMany(RequestProposal::class, 'request_id');
    }

    public function limit()
    {
        return Str::of($this->description)->limit(self::LIMIT, '...');
    }

    public function requestUrl()
    {
        return route('website.market.details', [$this->id, Str::random(10), Str::slug($this->title)]);
    }

    public function submitProposalLink()
    {
        return route('website.market.proposal.submit', [$this->id, Str::slug($this->title)]);
    }

}

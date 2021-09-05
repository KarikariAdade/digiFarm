<?php

namespace App\Models;

use App\Http\Requests\BusinessMarketRequest;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\HasDatabaseNotifications;
use Illuminate\Notifications\Notifiable;

class Business extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable, HasDatabaseNotifications;

    protected $guard = 'business';

    protected $guarded = ['id'];

    protected $table = 'businesses';

    protected $hidden = [
        'password',
        'remember_token'
    ];


    public function getBusinessType()
    {
        return $this->belongsTo(BusinessType::class, 'type_id');
    }

    public function getBusinessSocials()
    {
        return $this->belongsTo(BusinessSocials::class, 'business_id');
    }

    public function getBusinessSize()
    {
        return $this->belongsTo(BusinessSize::class, 'business_size');
    }

    public function getCountry()
    {
        return $this->belongsTo(Country::class, 'country');
    }

    public function getRegion()
    {
        return $this->belongsTo(Region::class, 'region');
    }

    public function getMarketRequests()
    {
        return $this->hasMany(MarketRequests::class, 'business_id');
    }

    public function getClients()
    {
        return $this->hasMany(Clients::class, 'business_id');
    }

    public function getProposals()
    {
        return $this->hasMany(RequestProposal::class, 'business_id');
    }

    public function getApprovedRequests()
    {
        return MarketRequests::query()->where('is_approved', true)->where('business_id', $this->id)->count();
    }

}

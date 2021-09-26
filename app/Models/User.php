<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use willvincent\Rateable\Rateable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable, VerifiesEmails, Rateable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getSocials()
    {
        return $this->hasOne(FarmerSocials::class, 'user_id');
    }

    public function getCountry()
    {
        return $this->belongsTo(Country::class, 'country');
    }

    public function getRegion()
    {
        return $this->belongsTo(Region::class, 'region');
    }

    public function getFarms()
    {
        return $this->hasMany(Farm::class, 'user_id');
    }

    public function getClients()
    {
        return $this->hasMany(Clients::class, 'user_id');
    }

    public function getProposals()
    {
        return $this->hasMany(RequestProposal::class, 'user_id');
    }

    public function getReviews()
    {
        return $this->hasMany(ClientReview::class, 'user_id');
    }

    public function paginateReview()
    {
        return ClientReview::query()->where('user_id', $this->id)->orderBy('id', 'desc')->paginate(5);
    }

    public function avgRating()
    {
        return $this->getReviews()->avg('rating');
    }

    public function farmerDetailUrl()
    {
        return route('website.farmers.detail', [$this->id, Str::random(10), Str::slug($this->name)]);
    }

}

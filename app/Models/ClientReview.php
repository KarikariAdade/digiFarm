<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class ClientReview extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function getUser()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getBusiness()
    {
        return $this->belongsTo(Business::class, 'business_id');
    }

    public function getDateDiff()
    {
        return Carbon::parse($this->created_at)->diffForHumans();
    }
}

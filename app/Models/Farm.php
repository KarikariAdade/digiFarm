<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Farm extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function getUser()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


    public function getImages()
    {
        return $this->hasMany(FarmImage::class, 'farm_id');
    }

    public function getCategory()
    {
        return $this->belongsTo(FarmCategory::class, 'farm_category_id');
    }


    public function getSubCategory()
    {
        return $this->belongsTo(FarmSubCategory::class, 'farm_sub_category_id');
    }
}

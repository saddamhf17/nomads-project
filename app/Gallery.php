<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Gallery extends Model
{
    use softDeletes;

    protected $fillable =[
        'travel_package_id', 'image', 
    ];

    protected $hidden = [];

    public function travel_package(){
        return $this->belongsTo(TravelPackage::class, 'travel_package_id', 'id');
    }
}

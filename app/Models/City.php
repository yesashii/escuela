<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    //

    protected $table = 'cities';



    public function countries()
    {
        // |countries| -< |cities|
        return $this->belongsTo(Country::class,'country_id', 'id');
    }    
    
    public function users()
    {
        // |users| >- |cities|
        return $this->hasMany(User::class, 'city_id', 'id');
    }

    // | offices | >- | cities |
    public function offices()
    {
        return $this->hasMany(Office::class, 'city_id');
    }
    

}

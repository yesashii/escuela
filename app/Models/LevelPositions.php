<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LevelPositions extends Model
{
    //
    protected $table = 'levelPositions';


    // |levelPositions| -< |positions|
    public function positions()
    {
        return $this->hasMany(Position::class,'levelpositions_id','id');
    }
    
}

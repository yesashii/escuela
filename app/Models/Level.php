<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    //
    protected $table = 'levels';


    // | levels | -< | positions |
    public function positions()
    {
        return $this->hasMany(Position::class);
    }
}

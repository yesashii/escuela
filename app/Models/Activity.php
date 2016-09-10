<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    //
    protected $table = 'activities';

    // | activities | -< | companies |
    public function companies()
    {
        return $this->hasMany(Company::class);
    }

}

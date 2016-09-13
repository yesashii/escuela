<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    //
    protected $table = 'positions';

    // | levels | -< | positions |
    public function levels()
    {
        return $this->hasMany(Level::class, 'level_id');
    }

    // | Users | >-< | positions |
    public function users()
    {
        return $this->belongsToMany(User::class, 'position_users', 'position_id', 'user_id' );
    }
}

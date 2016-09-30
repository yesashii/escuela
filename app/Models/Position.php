<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    //
    protected $table = 'positions';

    // | levelPositions | -< | positions | (funciona) |hasMany| -< |belongsTo|
    public function levelPositions()
    {
        return $this->belongsTo(levelPositions::class, 'levelpositions_id', 'id');
    }


    // | departments | -< | positions | (funciona) |hasMany| -< |belongsTo|
    public function departments()
    {
        return $this->belongsTo(Departments::class, 'department_id', 'id');
    }

    // | Users | >-< | positions | ()
    public function users()
    {
        return $this->belongsToMany(User::class, 'position_users', 'position_id', 'user_id' );
    }
}

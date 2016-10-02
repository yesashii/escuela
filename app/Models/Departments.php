<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Departments extends Model
{
    //
    protected $table = 'departments';

    // | levelDepartments | -< | departments | (funciona) |hasMany| -< |belongsTo|
    public function levelDepartments()
    {
        return $this->belongsTo(LevelDepartments::class, 'levelDepartments_id', 'id');
    }
}

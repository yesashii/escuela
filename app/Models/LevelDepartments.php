<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LevelDepartments extends Model
{
    //
    protected $table = 'LevelDepartments';



    // |levelDepartments| -< |departments|
    public function departments()
    {
        return $this->hasMany(Departments::class,'levelDepartments_id','id');
    }




}

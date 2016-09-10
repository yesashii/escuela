<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    //
    protected $table = 'offices';

    // | offices | >- | cities |
    public function cities()
    {
        return $this->belongsTo(City::class);
    }

    // | offices | -< | departments |
    public function departments()
    {
        return $this->hasMany(Department::class,'office_id');
    }

}

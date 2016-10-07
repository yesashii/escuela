<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    //
    protected $table = 'assignments';

    // |assignments| >- |assets|
    public function assets()
    {
        return $this->belongsTo(Asset::class,'asset_id', 'id');
    }

    // |assignments| >- |users|
    public function users()
    {
        return $this->belongsTo(User::class,'user_id', 'id');
    }

    // |assignments| >- |state_assignments|
    public function state_assignments()
    {
        return $this->belongsTo(StateAssignment::class,'state_assignment_id', 'id');
    }


}

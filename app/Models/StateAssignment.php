<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StateAssignment extends Model
{
    //
    protected $table = 'state_assignments';


    // |state_assignments| >-< |assignments|
    public function assignments()
    {
        return $this->belongsToMany(Assignment::class,
            'state_assignment_assignments',
            'state_assignment_id',
            'assignment_id'
        );
    }

}

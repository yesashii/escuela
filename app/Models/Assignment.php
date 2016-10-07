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

    // |assignments| >- |assets|
    public function users()
    {
        return $this->belongsTo(User::class,'user_id', 'id');
    }

    // |state_assignments| >-< |assignments|
    public function state_assignments()
    {
        return $this->belongsToMany(
            StateAssignment::class,
            'state_assignment_assignments',
            'assignment_id',
            'state_assignment_id'
        );
    }




}

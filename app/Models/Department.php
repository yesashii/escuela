<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    //
    protected $table = 'departments';

    // | offices | -< | departments |
    public function offices()
    {
        return $this->belongsTo(Office::class);
    }

    // | Users | >-< | departments |
    public function users()
    {
        return $this->belongsToMany(User::class, 'department_users', 'user_id', 'department_id' );
    }
}

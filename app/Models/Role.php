<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //

    protected $table = 'roles';


    // |roles| >-< |users|
    public function users()
    {
          return $this->belongsToMany(User::class, 'user_roles', 'role_id', 'user_id');
        //return $this->belongsToMany(Role::class, 'user_roles', 'user_id', 'role_id');
    }

}

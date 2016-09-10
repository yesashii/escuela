<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

class StateAsset extends Model
{
    //
    protected $table = 'state_assets';


    // | state_assets | >- | assets |
    public function assets()
    {        
        return $this->hasMany(Asset::class, 'asset_id');
    }
}

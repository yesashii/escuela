<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    //
    protected $table = 'assets';

    public function assignments()
    {
        return $this->hasMany(Assignment::class,'asset_id');
    }


    // | state_assets | >- | assets |
    public function state_assets()
    {
        return $this->belongsTo(Asset::class);
    }

    // | suppliers | -< | assets |
    public function suppliers()
    {
        return $this->belongsTo(Supplier::class);
    }

    // | purchases | -< | assets |
    public function assets()
    {
        return $this->belongsTo(Purchase::class);
    }
    
}

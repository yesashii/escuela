<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    //
    protected $table = 'assets';



    // | suppliers | -< | assets |
    public function suppliers()
    {
        return $this->belongsTo(Supplier::class,'supplier_id', 'id');
    }

    // | state_assets | >- | assets |
    public function state_assets()
    {
        return $this->belongsTo(StateAsset::class, 'state_asset_id', 'id');
    }

    // | purchases | >- | assets |
    public function purchases()
    {
        return $this->belongsTo(Purchase::class, 'purchase_id', 'id');
    }


    // | assignments | >- | assets |
    public function assignments()
    {
        return $this->hasMany(Assignment::class,'asset_id', 'id');
    }






    // | purchases | -< | assets |
    public function assets()
    {
        return $this->belongsTo(Purchase::class);
    }
    
}

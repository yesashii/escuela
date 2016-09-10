<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    //
    protected $table = 'purchases';

    // | purchases | -< | assets |
    public function assets()
    {
        return $this->hasMany(Asset::class, 'purchase_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    //
    protected $table = 'currencies';

    // |suppliers| >-< |currencies|
    public function suppliers()
    {
        return $this->belongsToMany(Supplier::class, 'currency_suppliers', 'currency_id', 'supplier_id');
    }

}

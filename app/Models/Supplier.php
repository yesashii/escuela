<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    //
    protected $table = 'suppliers';



    // |suppliers| >-< |currencies|
    public function currencies()
    {
        return $this->belongsToMany(Currency::class, 'currency_suppliers', 'supplier_id', 'currency_id');
    }

    // |suppliers| >-< |pay_metods|
    public function  pay_metods()
    {
        return $this->belongsToMany(PayMetod::class, 'pay_suppliers','supplier_id', 'pay_metod_id');
    }

    // | suppliers | -< | assets |
    public function assets()
    {
        return $this->belongsTo(Asset::class, 'supplier_id');
    }


}

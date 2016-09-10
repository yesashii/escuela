<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PayMetod extends Model
{
    //
    protected $table = 'pay_metods';


    // |suppliers| >-< |pay_metods|
    public function  suppliers()
    {
        return $this->belongsToMany(Supplier::class, 'pay_suppliers','pay_metod_id', 'supplier_id');
    }
}

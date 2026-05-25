<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PharmacySaleItem extends Model
{
    protected $fillable = [
        'pharmacy_sale_id',
        'pharmacy_product_id',
        'quantity',
        'unit_price',
        'subtotal',
    ];

    public function product()
    {
        return $this->belongsTo(PharmacyProduct::class, 'pharmacy_product_id');
    }

    public function sale()
    {
        return $this->belongsTo(PharmacySale::class);
    }
}

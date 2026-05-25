<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PharmacySale extends Model
{
    protected $fillable = [
        'prescription_id',
        'total_amount',
        'payment_method',
        'transaction_reference',
    ];

    public function prescription()
    {
        return $this->belongsTo(Prescription::class);
    }

    public function items()
    {
        return $this->hasMany(PharmacySaleItem::class);
    }
}

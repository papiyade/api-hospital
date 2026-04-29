<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PharmacyTransaction extends Model
{
    protected $fillable = [
        'prescription_id',
        'status',
        'total_amount',
        'payment_method',
        'transaction_reference'
    ];

    public function prescription()
    {
        return $this->belongsTo(Prescription::class);
    }
}

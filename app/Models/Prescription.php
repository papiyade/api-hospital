<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Prescription extends Model
{
    protected $fillable = [
        'consultation_id',
        'notes',
        'qr_code',
        'status'
    ];

    public function consultation()
    {
        return $this->belongsTo(Consultation::class);
    }

    public function medications()
    {
return $this->belongsToMany(
    Medication::class,
    'medication_prescription',
    'prescription_id',
    'medication_id'
)->withPivot(['dosage', 'frequency', 'duration'])
 ->withTimestamps();
    }

    public function transaction()
    {
        return $this->hasOne(PharmacyTransaction::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($prescription) {
            $prescription->qr_code = (string) Str::uuid();
        });
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medication extends Model
{
    protected $fillable = ['name', 'stock'];

    public function prescriptions()
    {
        return $this->belongsToMany(
            Prescription::class,
            'medication_prescription',
            'medication_id',
            'prescription_id'
        )->withPivot(['dosage', 'frequency', 'duration'])
         ->withTimestamps();
    }
}

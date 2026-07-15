<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    //
    protected $fillable = [
    'user_id',
    'birth_date',
    'phone',
    'address',
    'gender',
    'blood_group',
    'allergies',
    'medical_history',
    'emergency_contact_name',
    'emergency_contact_phone',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

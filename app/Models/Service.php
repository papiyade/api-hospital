<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    //
    protected $fillable = [
    'department_id',
    'name',
    'code',
    'capacity',
    'consultation_time'
];
    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function doctors()
    {
        return $this->hasMany(Doctor::class);
    }
}

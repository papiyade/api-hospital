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
    'address'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

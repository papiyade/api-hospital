<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    //
    protected $fillable = [
    'name',
    'code'
];
    public function services()
    {
        return $this->hasMany(Service::class);
    }
}

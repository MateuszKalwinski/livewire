<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $fillable = [
        'name',
        'description',
    ];

    public function prices()
    {
        return $this->hasMany(Price::class);
    }
}

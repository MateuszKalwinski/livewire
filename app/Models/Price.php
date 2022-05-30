<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    public $fillable = [
        'product_id',
        'price',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}

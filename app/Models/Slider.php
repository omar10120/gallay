<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $fillable = ['product_id', 'position', 'is_active'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}



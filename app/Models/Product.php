<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product_gallery';
    
    protected $fillable = [
        'name',
        'price',
        'image',
        'category_id'
    ];

    protected $casts = [
        'price' => 'decimal:2'
    ];

    // Additional images removed

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product_gallery';
    
    protected $fillable = [
        'name',
        'images',
        'price',
        'image'
    ];

    protected $casts = [
        'images' => 'array',
        'price' => 'decimal:2'
    ];

    public function getImagesAttribute($value)
    {
        return $value ? json_decode($value, true) : [];
    }

    public function setImagesAttribute($value)
    {
        $this->attributes['images'] = is_array($value) ? json_encode($value) : $value;
    }
}

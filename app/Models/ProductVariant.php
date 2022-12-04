<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariant extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'sku',
        'price',
        'stock'
    ];

    public function sets()
    {
        return $this->hasMany(ProductVariantSet::class);
    }

    public function attributes()
    {
        return $this->belongsToMany(Attribute::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariantSet extends Model
{
    use HasFactory;

    protected $fillable = [
        'set',
        'price'
    ];
}

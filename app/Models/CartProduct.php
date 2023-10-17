<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class CartProduct extends Pivot
{
    protected $fillable = ['cart_id', 'product_id'];
}

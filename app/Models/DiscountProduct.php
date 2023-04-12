<?php

namespace Kerung\Models;

use Illuminate\Database\Eloquent\Model;

class DiscountProduct extends Model
{
     /**
     * @var string
     */
    protected $table = 'kng_discount_products';

    /**
     * @var array
     */
    protected $fillable = [
    	'discount_id',
        'product_id'
    ];
}

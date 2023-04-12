<?php

namespace Kerung\Models;

use Illuminate\Database\Eloquent\Model;

class CouponProduct extends Model
{
     /**
     * @var string
     */
    protected $table = 'kng_coupon_products';

    /**
     * @var array
     */
    protected $fillable = [
    	'coupon_id',
        'product_id'
    ];
}

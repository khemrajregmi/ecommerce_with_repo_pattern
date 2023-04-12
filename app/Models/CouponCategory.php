<?php

namespace Kerung\Models;

use Illuminate\Database\Eloquent\Model;

class CouponCategory extends Model
{
    
     /**
     * @var string
     */
    protected $table = 'kng_coupon_categories';

    /**
     * @var array
     */
    protected $fillable = [
        'coupon_id',
        'category_id'
    ];
}

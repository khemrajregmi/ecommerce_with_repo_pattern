<?php

namespace Kerung\Models;

use Illuminate\Database\Eloquent\Model;

class DiscountStore extends Model
{
     /**
     * @var string
     */
    protected $table = 'kng_discount_stores';

    /**
     * @var array
     */
    protected $fillable = [
    	'discount_id',
        'store_id'
    ];
}

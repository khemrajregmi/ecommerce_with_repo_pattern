<?php

namespace Kerung\Models;

use Illuminate\Database\Eloquent\Model;

class DiscountCategory extends Model
{
     /**
     * @var string
     */
    protected $table = 'kng_discount_categories';

    /**
     * @var array
     */
    protected $fillable = [
    	'discount_id',
        'category_id'
    ];
}

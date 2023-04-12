<?php

namespace Kerung\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductDiscount extends Model
{
    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    
    /**
     * @var string
     */
    protected $table = 'kng_product_discounts';


     /**
     * Primary key
     *
     * @var string
     */
    protected $primaryKey = 'product_discount_id';

    /**
     * @var array
     */
    protected $fillable = [
        'product_discount_id',
        'product_id',
        'quantity',
        'priority',
        'percent',
        'date_start',
        'date_end'
    ];
}

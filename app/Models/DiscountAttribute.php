<?php

namespace Kerung\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DiscountAttribute extends Model
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
    protected $table = 'kng_discount_attributes';

    protected $guarded = ['discount_id'];

    /**
     * Primary key
     *
     * @var string
     */
    protected $primaryKey = 'discount_attribute_id';

    /**
     * @var array
     */
    protected $fillable = [
        'discount_attribute_id',
        'discount_id',                                                  
        'amount',
        'percentage',                                                  
        'min_bill_amount',
        'total_min_quantity',
        'additional_quantity',
        'start_at',
        'end_at',
        'type'
    ];
}

<?php

namespace Kerung\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductReturnReason extends Model
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
    protected $table = 'kng_product_return_reasons';

    /**
     * Primary key
     *
     * @var string
     */
    protected $primaryKey = 'product_return_reason_id';

    /**
     * @var array
     */
    protected $fillable = [
        'product_return_reason_id',
        'name'
    ];
}

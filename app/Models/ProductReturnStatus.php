<?php

namespace Kerung\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductReturnStatus extends Model
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
    protected $table = 'kng_product_return_statuses';

    /**
     * Primary key
     *
     * @var string
     */
    protected $primaryKey = 'product_return_status_id';

    /**
     * @var array
     */
    protected $fillable = [
        'product_return_status_id',
        'name'
    ];
}

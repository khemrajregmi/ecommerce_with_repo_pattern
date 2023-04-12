<?php

namespace Kerung\Models;

use Illuminate\Database\Eloquent\Model;

class ProductToStore extends Model
{
     /**
     * @var string
     */
    protected $table = 'kng_product_to_store';

    /**
     * @var array
     */
    protected $fillable = [
        'product_id',
        'store_id'
    ];
}

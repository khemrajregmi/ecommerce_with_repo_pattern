<?php

namespace Kerung\Models;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
     /**
     * @var string
     */
    protected $table = 'kng_product_to_categories';

    /**
     * @var array
     */
    protected $fillable = [
        'product_id',
        'category_id'
    ];

    
    
}

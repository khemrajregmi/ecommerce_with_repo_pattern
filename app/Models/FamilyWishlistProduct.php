<?php

namespace Kerung\Models;

use Illuminate\Database\Eloquent\Model;

class FamilyWishlistProduct extends Model
{
    /**
     * @var string
     */
    protected $table = 'kng_familywish_products';


    /**
     * Primary key
     *
     * @var string
     */
    protected $primaryKey = 'familywish_product_id';


    /**
     * @var array
     */
    protected $fillable = [
        'familywish_product_id',
        'f_s_w_id',
        'product_id',
        'name',
        'price',
        'quantity'
    ];

   
}


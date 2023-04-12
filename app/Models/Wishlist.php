<?php

namespace Kerung\Models;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    /**
     * @var string
     */
    protected $table = 'kng_customer_wishlists';

    /**
     * @var array
     */
    protected $fillable = [
        'product_id',
        'customer_id'
    ];
}

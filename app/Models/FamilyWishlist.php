<?php

namespace Kerung\Models;

use Illuminate\Database\Eloquent\Model;

class FamilyWishlist extends Model
{
    /**
     * @var string
     */
    protected $table = 'kng_family_size_wishlists';


    /**
     * Primary key
     *
     * @var string
     */
    protected $primaryKey = 'f_s_w_id';


    /**
     * @var array
     */
    protected $fillable = [
        'f_s_w_id',
        'customer_id',
        'customer_family_type_id',
        'duration_id'
    ];

   
}

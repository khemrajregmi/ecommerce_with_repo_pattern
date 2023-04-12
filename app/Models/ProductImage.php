<?php

namespace Kerung\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductImage extends Model
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
    protected $table = 'kng_product_images';


     /**
     * Primary key
     *
     * @var string
     */
    protected $primaryKey = 'product_image_id';


    /**
     * @var array
     */
    protected $fillable = [
        'product_image_id',
        'product_id',
        'image'
    ];
}

<?php

namespace Kerung\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FeatureProduct extends Model
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
    protected $table = 'kng_feature_products';


     /**
     * Primary key
     *
     * @var string
     */
    protected $primaryKey = 'feature_product_id';


    /**
     * @var array
     */
    protected $fillable = [
        'feature_product_id',
        'product_id'
    ];


    /**
     * Get the Product  for the Product Return
     */
    public function feature_product()
    {
        return $this->hasOne('Kerung\Models\Product','product_id');
    }
}

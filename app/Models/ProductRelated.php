<?php

namespace Kerung\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductRelated extends Model
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
    protected $table = 'kng_product_related';


    protected  $primaryKey = 'related_id';


    /**
     * @var array
     */
    protected $fillable = [
        'product_id',
        'related_id'
    ];

    /**
     * Relation With Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo('Kerung\Models\Product','product_id');
    }
}

<?php

namespace Kerung\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductReturn extends Model
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
    protected $table = 'kng_product_returns';

    /**
     * Primary key
     *
     * @var string
     */
    protected $primaryKey = 'product_return_id';

    /**
     * @var array
     */
    protected $fillable = [
        'product_return_id',
        'order_id',
        'product_id',
        'customer_id',
        'firstname',
        'lastname',
        'email',
        'telephone',
        'product',
        'model',
        'quantity',
        'opened',
        'product_return_reason_id',
        'product_return_action_id',
        'product_return_status_id',
        'comment',
        'date_ordered'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function Store()
    {
        return $this->belongsToMany(Store::class,'kng_return_store','product_return_id','store_id');
    }

    /**
     * Get the Product for the ProductReturn.
     */
    public function Product()
    {
        return $this->belongsTo('Kerung\Models\Product','product_id');
    }
}

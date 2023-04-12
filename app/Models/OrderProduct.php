<?php

namespace Kerung\Models;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    

    /**
     * @var string
     */
    protected $table = 'kng_order_products';

    /**
     * Primary key
     *
     * @var string
     */
    protected $primaryKey = 'order_product_id';

    /**
     * Fill able Data
     *
     * @var array
     */
    protected $fillable = [
            'order_product_id',
            'order_id',
            'product_id',
            'name',
            'model',
            'price',
            'quantity',
            'total',
            'tax',
            'reward',
        ];

    public function order()
    {
            return $this->belongsTo('Kerung\Models\Order','order_id');
    }


}

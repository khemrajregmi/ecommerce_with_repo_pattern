<?php

namespace Kerung\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductReward extends Model
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
    protected $table = 'kng_product_rewards';


     /**
     * Primary key
     *
     * @var string
     */
    protected $primaryKey = 'product_reward_id';

    /**
     * @var array
     */
    protected $fillable = [
        'product_reward_id',
        'product_id',
        'customer_group_id',
        'points'
    ];
}

<?php

namespace Kerung\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Coupon extends Model
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
    protected $table = 'kng_coupons';


    /**
     * Primary key
     *
     * @var string
     */
    protected $primaryKey = 'coupon_id';

    /**
     * Fillable Data
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'code',
        'type',
        'discount',
        'logged',
        'shipping',
        'total',
        'date_start',
        'date_end',
        'uses_total',
        'uses_customer',
        'status',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function Category()
    {
        return $this->belongsToMany(Category::class, 'kng_coupon_categories', 'coupon_id',
            'category_id')->withTimestamps();
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function Product()
    {
        return $this->belongsToMany(Product::class, 'kng_coupon_products', 'coupon_id',
            'product_id')->withTimestamps();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function Store()
    {
        return $this->belongsToMany(Store::class,'kng_coupon_store','coupon_id','store_id')->withTimestamps();
    }

}

<?php

namespace Kerung\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Discount extends Model
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
    protected $table = 'kng_discounts';

    protected $guarded = ['discount_type_id'];

    /**
     * Primary key
     *
     * @var string
     */
    protected $primaryKey = 'discount_id';

    /**
     * @var array
     */
    protected $fillable = [
        'discount_id',
        'discount_type_id',                                                  
        'name',
        'description'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function Category()
    {
    
        return $this->belongsToMany(Category::class, 'kng_discount_categories', 'discount_id',
            'category_id')->withTimestamps();
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function Product()
    {
        return $this->belongsToMany(Product::class, 'kng_discount_products', 'discount_id',
            'product_id')->withTimestamps();
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function Store()
    {
        return $this->belongsToMany(Store::class, 'kng_discount_stores', 'discount_id',
            'store_id')->withTimestamps();
    }

    /**
     * Get the Discount Type for the Discount.
     */
    public function discountType()
    {
        return $this->belongsTo('Kerung\Models\DiscountType','discount_type_id');
    }

    

}

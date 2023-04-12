<?php

namespace Kerung\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    
    use Sluggable;
    /**
     * @var string
     */
    protected $table = 'kng_products';

    protected $guarded = ['manufacturer_id', 'stock_status_id'];

    /**
     * Primary key
     *
     * @var string
     */
    protected $primaryKey = 'product_id';

    /**
     * @var array
     */
    protected $fillable = [
        'product_id',
        'name',
        'slug',
        'description',
        'tag',
        'model',
        'sku',
        'quantity',
        'stock_status_id',
        'image',
        'newarrival',
        'manufacturer_id',
        'shipping',
        'price',
        'weight',
        'weight_class_id',
        'length',
        'height',
        'width',
        'length_class_id',
        'subtract',
        'status',
        'viewed',
        'minimum',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'is_discountable'
    ];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    /**
     * @return $this
     */
    public function Attribute()
    {
        return $this->belongsToMany(Attribute::class)->withPivot('text');
    }

     /**
     * @return $this
     */
    public function stockStatus()
    {
        return $this->belongsTo('Kerung\Models\StockStatus','stock_status_id');
    }

     /**
     * @return $this
     */
    public function manufacturer()
    {
        return $this->belongsTo('Kerung\Models\Manufacturer','manufacturer_id');
    }

     /**
     * @return $this
     */
    public function weightClass()
    {
        return $this->belongsTo('Kerung\Models\WeightClass','weight_class_id');
    }


     /**
     * @return $this
     */
    public function lengthClass()
    {
        return $this->belongsTo('Kerung\Models\LengthClass','length_class_id');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function Discount()
    {
        return $this->hasOne(ProductDiscount::class);
    }

   

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function Images()
    {
        return $this->hasMany(ProductImage::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function Category()
    {
        return $this->belongsToMany(Category::class, 'kng_product_to_categories', 'product_id',
            'category_id')->withTimestamps();
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function Store()
    {
        return $this->belongsToMany(Store::class,'kng_product_to_store','product_id','store_id')->withTimestamps();
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function Customer()
    {
        return $this->belongsToMany(Customer::class, 'kng_customer_wishlists', 'product_id',
            'customer_id')->withTimestamps();
    }


     /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
     public function coupons()
    {
        return $this->belongsToMany(Coupon::class,'kng_coupon_products');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function discounts()
    {
        return $this->belongsToMany(Discount::class,'kng_discount_products');
    }

    /**
     * Get the Product  for the Product Return
     */
    public function Productreturn()
    {
        return $this->hasMany('Kerung\Models\ProductReturn','product_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function orders()
    {
        return $this->belongsToMany(Order::class,'kng_order_product','product_id','order_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    
    /**
     * Calculating the average of Rating
     */
    public function getAvgRating()
    {
        return $this->reviews()
          ->selectRaw('avg(rating) as aggregate, product_id')
          ->groupBy('product_id');
    }


    /**
     * Get the average of Rating Attribute
     */
    public function getAvgRatingAttribute()
    {   
        
        if ( ! array_key_exists('getAvgRating', $this->relations)) {
           $this->load('getAvgRating');
        }

        $relation = $this->getRelation('getAvgRating')->first();

        return ($relation) ? $relation->aggregate : null;
    }

}

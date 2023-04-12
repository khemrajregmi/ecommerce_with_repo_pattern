<?php

namespace Kerung\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Review extends Model
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
    protected $table = 'kng_product_reviews';


    protected $guarded = ['product_id'];


    /**
     * Primary key
     *
     * @var string
     */
    protected $primaryKey = 'product_review_id';

    /**
     * @var array
     */
    protected $fillable = [
        'product_review_id',
        'product_id',
        'customer_id',
        'author',
        'text',
        'rating',
        'status'
    ];


    /**
     * Get the ReviewProduct for the Product.
     */
    public function reviewProduct()
    {
        return $this->belongsTo('Kerung\Models\Product','product_id');
    }

    // public function setCustomerIdAttribute($value){
    //     $this->attributes['customer_id'] = $value == "null" ? null : $value;
    // }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function Store()
    {
        return $this->belongsToMany(Store::class,'kng_review_store','product_review_id','store_id')->withTimestamps();
    }
}

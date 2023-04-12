<?php

namespace Kerung\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Authenticatable
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
    protected $table = 'kng_customers';

    protected $guarded = ['customer_group_id'];

    /**
     * Primary key
     *
     * @var string
     */
    protected $primaryKey = 'customer_id';

    /**
     * @var array
     */
    protected $fillable = [
        'customer_id',
        'customer_group_id',
        'store_id',
        'language_id',
        'firstname',
        'lastname',
        'email',
        'password',
        'telephone',
        'fax',
        'cart',
        'wishlist',
        'newsletter',
        'address_id',
        'custom_field',
        'ip',
        'status',
        'approved',
        'safe',
        'image',
        'remember_token'
    ];

     /**
     * Get the CustomerGroup for the Customer.
     */
    public function customerGroup()
    {
        return $this->belongsTo('Kerung\Models\CustomerGroup','customer_group_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function products()
    {
        return $this->belongsToMany(Product::class,'kng_customer_wishlists');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function Store()
    {
        return $this->belongsToMany(Store::class,'kng_customer_store','customer_id','store_id')->withTimestamps();
    }
}

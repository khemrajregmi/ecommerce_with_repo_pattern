<?php

namespace Kerung\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
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
    protected $table = 'kng_orders';

   protected $guarded = ['customer_group_id','order_status_id','customer_id'];

    /**
     * Primary key
     *
     * @var string
     */
    protected $primaryKey = 'order_id';

   /**
     * @var array
     */
    protected $fillable = [
    	'order_id',
        'invoice_no',
        'invoice_prefix',
        'store_id',
        'store_url',
        'customer_id',
        'customer_group_id',
        'firstname',
        'lastname',
        'email',
        'telephone',
        'fax',
        'customer_field',
        'payment_firstname',
        'payment_lastname',
        'payment_company',
        'payment_address_1',
        'payment_address_2',
        'shipping_country_id',
        'shipping_state_id',
        'shipping_city_id',
        'shipping_area_id',
        'payment_postcode',
        'payment_country',
        'payment_region',
        'payment_address_format',
        'payment_custom_field',
        'payment_method',
        'payment_code',
        'shipping_firstname',
        'shipping_lastname',
        'shipping_company',
        'shipping_address_1',
        'shipping_address_2',
        'payment_country_id',
        'payment_state_id',
        'payment_city_id',
        'payment_area_id',
        'shipping_postcode',
        'shipping_country',
        'shipping_region',
        'shipping_address_format',
        'shipping_custom_field',
        'shipping_method',
        'shipping_code',
        'comment',
        'total',
        'order_status_id',
        'affiliate_id',
        'commission',
        'tracking',
        'currency_id',
        'ip',
        'forwarded_ip',
        'user_agent'
        
    ];


    /**
     * Get the CustomerGroup for the order.
     */
    public function customerGroup()
    {
        return $this->belongsTo('Kerung\Models\CustomerGroup','customer_group_id');
    }

    /**
     * Get the Customer for the order.
     */
    public function customer()
    {
        return $this->belongsTo('Kerung\Models\Customer','customer_id');
    }

    /**
     * Get the Country for the Order.
     */
    public function paymentCountry()
    {
        return $this->belongsTo('Kerung\Models\Country','payment_country_id');
    }

     /**
     * Get the State for the order.
     */
    public function paymentState()
    {
        return $this->belongsTo('Kerung\Models\State','payment_state_id');
    }

     /**
     * Get the State for the order.
     */
    public function paymentCity()
    {
        return $this->belongsTo('Kerung\Models\City','payment_city_id');
    }


     /**
     * Get the Area for the order.
     */
    public function paymentArea()
    {
        return $this->belongsTo('Kerung\Models\Area','shipping_area_id');
    }


    /**
     * Get the Country for the Shipping.
     */
    public function shippingCountry()
    {
        return $this->belongsTo('Kerung\Models\Country','shipping_country_id');
    }

     /**
     * Get the State for the Shipping.
     */
    public function shippingState()
    {
        return $this->belongsTo('Kerung\Models\State','shipping_state_id');
    }

     /**
     * Get the State for the Shipping.
     */
    public function shippingCity()
    {
        return $this->belongsTo('Kerung\Models\City','shipping_city_id');
    }


     /**
     * Get the Area for the Shipping.
     */
    public function shippingArea()
    {
        return $this->belongsTo('Kerung\Models\Area','shipping_area_id');
    }



    /**
     * Get the OrderStatus for the Order.
     */
    public function orderStatus()
    {
        return $this->belongsTo('Kerung\Models\OrderStatus','order_status_id');
    }

     /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function Store()
    {
        return $this->belongsToMany(Store::class,'kng_order_store','order_id','store_id')->withTimestamps();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function Product()
    {
        return $this->belongsToMany(Product::class,'kng_order_products','order_id','product_id')->withTimestamps();
    }

    public function orderProduct()
    {
        return $this->hasMany('Kerung\Models\OrderProduct','order_id');
    }
    
}

<?php

namespace Kerung\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Store extends Model
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
    protected $table = 'kng_stores';


    /**
     * Primary key
     *
     * @var string
     */
    protected $primaryKey = 'store_id';


    /**
     * @var array
     */
    protected $fillable = [
        'contact_name',
        'contact_phone',
        'contact_email',
        'street',
        'store_name',
        'store_phone',
        'store_logo',
        'state_id',
        'city_id',
        'location_id',
        'dispatch',
        'collection',
        'delivery',
        'about_store',
        'email_order',
        'order_email',
        'sms_option',
        'phone',
        'automatic_order_assign',
        'commission',
        'invoice_period',
        'meta_titles',
        'meta_keywords',
        'meta_description',
        'status'


    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function city()
    {
        return $this->belongsTo(City::class,'city_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function area()
    {
        return $this->belongsTo(Area::class,'location_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function products()
    {
        return $this->belongsToMany(Product::class,'kng_product_to_store','store_id','product_id')->withTimestamps();
    }

     
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function discounts()
    {
        return $this->belongsToMany(Discount::class,'kng_discount_stores','store_id','discount_id');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function manufacturers()
    {
        return $this->belongsToMany(Manufacturer::class,'kng_manufacturer_store','store_id','manufacturer_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function reviews()
    {
        return $this->belongsToMany(Review::class,'kng_review_store','store_id','product_review_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */

    public function orders()
    {
        return $this->belongsToMany(Order::class,'kng_order_store','store_id','order_id');
    }


     /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function productreturns()
    {
        return $this->belongsToMany(ProductReturn::class,'kng_return_store','store_id','product_return_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */

    public function vouchers()
    {
        return $this->belongsToMany(Voucher::class,'kng_voucher_store','store_id','voucher_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */

    public function voucherthemes()
    {
        return $this->belongsToMany(VoucherTheme::class,'kng_voucher_theme_store','store_id','voucher_theme_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */

    public function customers()
    {
        return $this->belongsToMany(Customer::class,'kng_customer_store','store_id','customer_id');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */

    public function customergroups()
    {
        return $this->belongsToMany(CustomerGroup::class,'kng_customergroup_store','store_id','customer_group_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */

    public function coupons()
    {
        return $this->belongsToMany(Coupon::class,'kng_coupon_store','store_id','coupon_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */

    public function discounttypes()
    {
        return $this->belongsToMany(DiscountType::class,'kng_discounttype_store','store_id','discount_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */

    public function combooffers()
    {
        return $this->belongsToMany(ComboOffer::class,'kng_combooffer_store','store_id','combo_offer_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */

    public function combotypes()
    {
        return $this->belongsToMany(ComboType::class,'kng_combotype_store','store_id','combo_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */

    public function customerFamilyTypes()
    {
        return $this->belongsToMany(CustomerFamilyType::class,'kng_familysize_store','store_id','customer_family_type_id');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */

    public function durations()
    {
        return $this->belongsToMany(Duration::class,'kng_duration_store','store_id','duration_id');
    }


}

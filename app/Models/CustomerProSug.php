<?php

namespace Kerung\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CustomerProSug extends Model
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
    protected $table = 'kng_product_cust_sugts';


    /**
     * Primary key
     *
     * @var string
     */
    protected $primaryKey = 'product_cus_sug_id';


    /**
     * @var array
     */
    protected $fillable = [
        'product_cus_sug_id',
        'customer_id',
        'product_name',
        'model',
        'brand',
        'message'
    ];


    /**
     * Get the CustomerGroup for the order.
     */
    public function customer()
    {
        return $this->belongsTo('Kerung\Models\Customer','customer_id');
    }
   
    // public function Store()
    // {
    //     return $this->belongsToMany(Store::class,'kng_customergroup_store','customer_group_id','store_id')->withTimestamps();
    // }
}

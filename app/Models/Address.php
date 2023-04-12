<?php

namespace Kerung\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model
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
    protected $table = 'kng_addresses';

    // protected $guarded = ['customer_id','country_id','state_id','city_id'];

    /**
     * Primary key
     *
     * @var string
     */
    protected $primaryKey = 'address_id';

    /**
     * @var array
     */
    protected $fillable = [
    	'address_id',
    	'customer_id',
    	'country_id',
    	'state_id',
        'address_1',
        'address_2',
    	'city_id',
        'area_id',
        'firstname',
        'lastname',
        'company',
        'telephone',
    	'postcode',
        'custom_field'
    ];

     /**
     * Get the Country for the Address.
     */
    public function Country()
    {
        return $this->belongsTo('Kerung\Models\Country','country_id');
    }

     /**
     * Get the State for the Address.
     */
    public function State()
    {
        return $this->belongsTo('Kerung\Models\State','state_id');
    }

     /**
     * Get the State for the Address.
     */
    public function City()
    {
        return $this->belongsTo('Kerung\Models\City','city_id');
    }

    /**
     * Get the State for the Address.
     */
    public function Area()
    {
        return $this->belongsTo('Kerung\Models\Area','area_id');
    }

    /**
     * Get the State for the Address.
     */
    public function Customer()
    {
        return $this->belongsTo('Kerung\Models\Customer','customer_id');
    }
}

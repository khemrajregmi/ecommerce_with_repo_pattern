<?php

namespace Kerung\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Country extends Model
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
    protected $table = 'kng_countries';

    /**
     * Primary key
     *
     * @var string
     */
    protected $primaryKey = 'country_id';

    /**
     * @var array
     */
    protected $fillable = [
        'country_id',
        'name',
        'iso',
        'phone_code',
        'currency_name',
        'currency_code',
        'currency_symbol'
    ];

    /**
     * Get the Customer for the customer group.
     */
    public function Order()
    {
        return $this->hasMany('App\Models\Order','country_id');
    }

}
